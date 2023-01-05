<?php 

namespace modulus\admin\comment\model;
use core\model;
use \library\error;
use \library\message;
use \library\User;
use \Valitron\Validator as v;

class commentModel extends model
{
    public function commentCount()
    {
        return count($this->db->sql("
            
            SELECT comment_id FROM comment 
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id
            
        ", 2));
    }

    public function comment($start, $limit)
    {
        return $this->db->sql("SELECT comment.*, user.*, article.*  FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id

            ORDER BY comment_id DESC LIMIT {$start}, {$limit}", 2);
    }

    public function _commentDelete($comment_id)
    {
        $comment = $this->db->t1where('comment', 'comment_id=?', [$comment_id], 1);

        if($comment)
        {
            $this->db->wheredelete('comment_rating', 'comment_id=?', [$comment_id]);

            $return = $this->db->wheredelete('comment', 'comment_id=?', [$comment_id]);
        }
        
        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function commentByArticle($article_id)
    {
        return $this->db->sql("SELECT comment.*, user.* FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id

            WHERE article.article_id = {$article_id}

            ORDER BY comment.comment_id DESC 

            LIMIT 7

        ", 2);
    }

    public function _commentLoadMore($article_id, $start_id)
    {
        if($start_id == 0)
        {
            (new message)->code(300)->return('empty')->json();
        }

        $last_comment = $this->db->t1where('comment', 'article_id=? ORDER BY comment_id ASC', [$article_id]);

        if($last_comment == FALSE)
        {
            (new message)->code(300)->return('empty')->json();
        }

        if($last_comment->comment_id == $start_id)
        {
            (new message)->code(300)->return('empty')->json();
        }

        $comment = $this->db->sql("

            SELECT comment.*, user.*, article.article_id FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id
            
            WHERE article.article_id = $article_id  AND

            comment.comment_id < $start_id

            ORDER BY comment.comment_id DESC

            LIMIT 7
            
        ", 2, 1);


        if($comment == FALSE)
        {
            (new message)->code(300)->return('not_found')->json();
        }

        (new message)->code(200)->data([
            'comment' => $comment, 
            'render' => 'comment_read',
            'last_comment_id' => $comment[count($comment)-1]['comment_id'],
            'this_article_id' => $article_id
        ])->json();
    }

    public function __commentCreate()
    {
        #redirect
        $http1 = 'home';

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
        $v->rule('lengthMax', 'comment_text', 3001);

        error::jsonvalitron($v);

        /*user*/
        $data->user_id = User::user_id();

        $status = $this->db->make('comment', (array) $data);

        $comment = $this->db->sql("SELECT user.*, comment.*, article.article_id FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id
            
            WHERE article.article_id = {$data->article_id} AND 
            
            comment.comment_id = {$status['id']} 

        ");

        (new message)->code(200)->return('success')->data([
            'comment' => $comment,
            'render' => 'comment_create'
        ])->json();
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

    public function __commentSearch()
    {
        $data = peel_tag_array($_POST);

        $v = new v((array) $data);

        $v->rule('required', [
            'search',
        ]);

        $v->rule('lengthMin', 'search', 1);
        
        $v->rule('lengthMax', 'search', 100);

        error::jsonvalitron($v);

        $search = trim($data['search']);

        $comment = $this->db->sql("SELECT comment.*, user.*, article.article_id FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id

            WHERE 
            
            comment.comment_id LIKE '%{$search}%' OR
            
            user.user_id LIKE '%{$search}%' OR
            
            article.article_id LIKE '%{$search}%'

            ORDER BY comment.comment_id DESC 

            LIMIT 100

        ", 2, 1);

        $comment ?: (new message)->code(300)->return('not_found')->json();

        $comment_ids = $this->getIn($comment, 'comment_id');

        $comment = $this->db->t2wherein('comment', 'article', 'comment.comment_id', $comment_ids, 2);

        if($comment)
        {
            (new message)->code(200)->data([
                'comment' => $comment, 
                'render' => 'comment_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
