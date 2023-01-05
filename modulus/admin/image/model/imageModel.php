<?php 

namespace modulus\admin\image\model;
use core\model;
use \library\error;
use \library\message;
use \library\File as f;
use \Valitron\Validator as v;

class imageModel extends model
{
    public function imageCount()
    {
        return count($this->db->sql("
            
            SELECT image_id FROM image 
            
            INNER JOIN article ON article.article_id = image.article_id

        ", 2));
    }

    public function image($start, $limit)
    {
        return $this->db->sql("SELECT image.*, article.*  FROM image
            
            INNER JOIN article ON article.article_id = image.article_id
            
            ORDER BY image_id DESC LIMIT {$start}, {$limit}", 2);
    }

    public function __imageCreate()
    {
        $FILES = [];

        $data = peel_tag_array($_POST);

        $last = $this->db->t1desc('image');

        for($i = 0; $i < count($_FILES['image_image']['name']); $i++){

            $FILES['image_image'] = [
                'tmp_name' => $_FILES['image_image']['tmp_name'][$i],
                'name'     => $_FILES['image_image']['name'][$i],
                'type'     => $_FILES['image_image']['type'][$i],
                'size'     => $_FILES['image_image']['size'][$i],
                'error'    => $_FILES['image_image']['error'][$i],
            ];

            $image = (new f)->set($FILES, 'image_image')->get();

            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            }

            $images = [
                'image_image' => $image['name'],
            ]; 

            $images += $data;

            $return = $this->db->create('image', $images);
            $return['status'] == FALSE ?: (new f)->move($image);
        }


        if($last != false)
        {
            $image = $this->db->t2where('image', 'article', 'image.image_id > ?', [
                $last->image_id
            ], 2);
        }else
        {
            $image = $this->db->t2desc('image', 'article', 2);
        }

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                
                'image' => $image, 
                
                'render' => 'image_create'
                
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->referer();
        }
    }

    public function _imageDelete($id)
    {
        $image = $this->db->t1where('image', 'image_id=?', [$id]);

        $return = $this->db->wheredelete('image', 'image_id=?', [$id]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->drop($image->image_image);

            (new message)->code(200)->return('deleted')->json();
        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function imageByArticle($article_id)
    {
        return $this->db->sql("SELECT image.*, article.*  FROM image
            
            INNER JOIN article ON article.article_id = image.article_id
            
            WHERE article.article_id = {$article_id}

            ORDER BY image.image_id DESC 

            LIMIT 5

        ", 2);
    }

    public function _imageLoadMore($article_id, $start_id)
    {
        if($start_id == 0)
        {
            (new message)->code(300)->return('empty')->json();
        }

        $last_image = $this->db->t1where('image', 'article_id=? ORDER BY image_id ASC', [$article_id]);

        if($last_image == FALSE)
        {
            (new message)->code(300)->return('empty')->json();
        }

        if($last_image->image_id == $start_id)
        {
            (new message)->code(300)->return('empty')->json();
        }

        $image = $this->db->sql("

            SELECT image.*, article.article_id FROM image
            
            INNER JOIN article ON article.article_id = image.article_id
            
            WHERE article.article_id = $article_id  AND

            image.image_id < $start_id

            ORDER BY image.image_id DESC

            LIMIT 5
            
        ", 2, 1);


        if($image == FALSE)
        {
            (new message)->code(300)->return('not_found')->json();
        }

        (new message)->code(200)->data([
            'image' => $image, 
            'render' => 'image_read',
            'last_image_id' => $image[count($image)-1]['image_id'],
            'this_article_id' => $article_id,
        ])->json();
    }

    public function __imageSearch()
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

        $image = $this->db->sql("

            SELECT * FROM image WHERE
                
            image_id LIKE '%{$search}%' OR
                
            image_image LIKE '%{$search}%' OR
            
            article_id LIKE '%{$search}%'
                
            ORDER BY image_id DESC LIMIT 10

        ", 2, 1);

        $image ?: (new message)->code(300)->return('not_found')->json();

        $image_ids = $this->getIn($image, 'image_id');

        $image = $this->db->t1wherein('image', 'image_id', $image_ids, 2);

        if($image)
        {
            (new message)->code(200)->data([
                'image' => $image, 
                'render' => 'image_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
