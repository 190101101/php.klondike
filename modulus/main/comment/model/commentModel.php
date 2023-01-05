<?php 

namespace modulus\main\comment\model;
use core\model;
use \library\session;
use \library\http;
use \library\error;
use \library\message;
use \library\User;
use \Valitron\Validator as v;

class commentModel extends model
{
    public function __addComment()
    {
        #peel tags of array
        $data = (object) peel_tag_array ($_POST);

        #check via valitron
        v::lang('ru');

        $v = new v((array) $data);

        $v->rule('required', [
            'comment_text',
            'article_id',
        ]);

        $v->rule('lengthMin', 'comment_text', 2);
        $v->rule('lengthMax', 'comment_text', 1000);

        error::jsonvalitron($v);

        /*check article*/
        $article = $this->db->t1id('article', $data->article_id);

        $article ?: (new message)->code(404)->return('not_found')->json();

        /*create coment*/
        $data->user_id = user_id();
        
        $data->comment_date = date('m.d.y');

        $return = $this->db->create('comment', (array) $data);

        if($return['status'] == TRUE)
        {
            $comment = $this->db->t1where('comment', 'article_id=? ORDER BY comment_id DESC', [
                $data->article_id
            ]);

            $data->user_login = user_login();
            
            $data->user_level = user_level();
            
            $data->comment_like = $comment->comment_like;
            
            $data->comment_dislike = $comment->comment_dislike;
            
            $data->comment_id = $comment->comment_id;

            (new message)->code(200)->data([
                'comment' => $data,
                'render' => 'comment_create',
            ])->json();
        }
        else
        {   
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _commentDelete($comment_id)
    {
        $comment = $this->db->t1where('comment', 'comment_id=?', [$comment_id], 1);

        if($comment)
        {
            $this->db->wheredelete('comment_rating', 'comment_id=?', [$comment_id]);

            $return = $this->db->wheredelete('comment', 'comment_id=?', [$comment_id]);

            if($return['status'] == TRUE)
            {
                (new message)->code(200)->return('deleted')->data([
                    'render' => 'comment_delete'
                ])->json();
            }
            else
            {
                (new message)->code(404)->return('error')->json();
            }
        }
        else
        {
            (new message)->code(404)->return('not_found')->json();
        }

    }

    public function _commentRating($grade, $comment_id)
    {
        $rating = ['like', 'dislike'];

        if(in_array($grade, $rating) === FALSE)
        {
            (new message)->code(404)->json();
        }

        $comment = $this->db->t1where('comment', 'comment_id=?', [$comment_id], 1);

        if(!$comment)
        {
            (new message)->code(300)->json();
        }

        $comment_rating = $this->db->t1where('comment_rating', 'comment_id=? AND user_id=?', [
            $comment['comment_id'], User::user_id()
        ]);

        if($comment_rating)
        {
            (new message)->code(300)->json();
        }

        $comment['comment_'.$grade] += 1;

        $status = $this->db->update('comment', (array) $comment,[
            'id' => 'comment_id'
        ]);

        if($status['status'])
        {
            $this->db->create('comment_rating', [
                'comment_id' => $comment['comment_id'],
                'user_id' => User::user_id(),
            ]);

            (new message)->code(200)->data([
                'comment' => $comment,
                'render' => 'comment_'.$grade,
            ])->json();

        }
        else
        {
            (new message)->code(404)->json();
        }
    }

    public function _commentLoadMore($article_id, $start_id)
    {
        if($start_id == 1)
        {
            (new message)->code(300)->json();
        }

        $first_id = $this->db->t1where('comment', 'article_id=? ORDER BY comment_id ASC', [$article_id]);

        if($first_id == FALSE)
        {
            (new message)->code(404)->json();
        }

        if($first_id == $start_id)
        {
            (new message)->code(300)->json();
        }

        $comment = $this->db->sql("

            SELECT comment.*, user.*, article.article_id FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id
            
            WHERE article.article_id = $article_id  AND

            comment.comment_id < $start_id

            ORDER BY comment.comment_id DESC

            LIMIT 50
            
        ", 2, 1);


        if($comment == FALSE)
        {
            (new message)->code(300)->json();
        }

        (new message)->code(200)->data([
            'comment' => $comment, 
            'render' => 'comment_load',
            'this_article_id' => $article_id,
            'last_comment_id' => $comment[count($comment)-1]['comment_id'],
        ])->json();
    }
}
