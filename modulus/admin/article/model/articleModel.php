<?php 

namespace modulus\admin\article\model;
use core\model;
use \library\error;
use \library\message;
use \library\File as f;
use \Valitron\Validator as v;

class articleModel extends model
{
	public function articleCount()
    {
        return count($this->db->sql("
            
            SELECT article_id FROM article 
            
            INNER JOIN category ON category.category_id = article.category_id
            
            INNER JOIN section ON section.section_id = category.section_id
            
            ORDER BY article.article_id DESC", 2));
    }

    public function articles($start, $limit)
    {
        return $this->db->t3where('article', 'category', 'section',
            "article.article_id > 0  ORDER BY article_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function category()
    {
        return $this->db->t1('category', 2);
    }

    /*crud*/
    public function __articleCreate()
    {
        $article_content = $_POST['article_content'];
        
        $data = except($_POST, ['article_content']);

        $peel = peel_tag_array($data);

        $data = $peel;
        
        $data += ['article_content' => $article_content];

        $v = new v($data);

        $v->rule('required', [
            'article_title',
            'category_id',
            'article_content',
        ]);

        $v->rule('lengthMax', 'article_content', 60000);

        error::jsonvalitron($v);

        if(has_file($_FILES, 'article_image'))
        {
            $image = (new f)->set($_FILES, 'article_image')->get();

            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            } 
            $data  += ['article_image' => $image['name']];
            $data  += ['article_imagesize' => $image['size']];
        }

        if(!empty($data['article_archive']) && !empty($data['article_archivesize']))
        {
            $this->db->whereupdate('setting', 
                    'setting_value = setting_value + 1', 'setting_key=?', ['file']);
        }

        $data += ['article_slug' => seo($data['article_title'])];

        $article = $this->db->t1where('article', 'article_slug=?', [
            $data['article_slug']
        ]);

        if($article){
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->make('article', $data);

        $article = $this->db->t3where('article', 'category', 'section', 'article.article_id=?', [
            $return['id']
        ]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->move($image);
            
            if(isset($archive)){

                (new f)->move($archive);

                $this->db->whereupdate('setting', 
                    'setting_value = setting_value + 1', 'setting_key=?', ['file']);
            }

            (new message)->code(200)->return('success')->data([
                'article' => $article,
                'render' => 'article_create' 
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _articleUpdate($id)
    {
        $article =  $this->db->t2where('article', 'category', 'article.article_id=?', [$id]);
        return $article ? $article : redirect('panel/article');
    }

    public function __articleUpdate()
    {
        $image_delete = $_POST['image_delete'];
        
        $article_content = $_POST['article_content'];

        $data = except($_POST, ['image_delete', 'article_content']);

        $peel = peel_tag_array($data);

        $data = $peel;

        $data += ['article_content' => $article_content];

        $where_article = $this->db->t1where('article', 'article_id=?', [$data['article_id']]);

        if(!$where_article)
        {
            (new message)->code(404)->return('not_found')->json();
        }

        $v = new v($data);

        $v->rule('required', [
            'article_title',
            'article_content',
            'article_id',
            'category_id',
        ]);

        error::jsonvalitron($v);
        
        if(has_file($_FILES, 'article_image'))
        {
            $image = (new f)->set($_FILES, 'article_image')->get();
            
            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            }
            $data  += ['article_image' => $image['name']];
            $data  += ['article_imagesize' => $image['size']];
        }

        $data += ['article_slug' => seo($data['article_title'])];

        $article = $this->db->t1where('article', 'article_slug=? && article_id != ?', [
            $data['article_slug'], $data['article_id']
        ]);

        if($article)
        {
            (new message)->code(300)->return('already_have')->json();
        }

        $data += ['article_updated_at' => date('Y-m-d H:i:s')];

        $return = $this->db->update('article', $data, [
            'id' => 'article_id',
        ]);

        $article = $this->db->t3where('article', 'category', 'section', 'article.article_id=?', [
            $data['article_id']
        ]);

        if(empty($where_article->article_archive)
        and !empty($article->article_archive)
        and !empty($article->article_archivesize))
        {
            $this->db->whereupdate('setting', 
                        'setting_value = setting_value + 1', 'setting_key=?', ['file']);
        }

        if(!empty($where_article->article_archive) 
        and empty($data['article_archive'])
        and empty($data['article_archivesize']))
        {
            $this->db->whereupdate('setting', 
                        'setting_value = setting_value - 1', 'setting_key=?', ['file']);
        }

        $category = $this->db->t1('category', 2);

        if($return['status'] == TRUE)
        {

            !isset($image) ?: (new f)->drop($image_delete);

            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'article' => $article,
                'category' => $category,
                'render' => 'article_update'
            ])->json();

        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }


    public function _articleDelete($article_id)
    {
        $article = $this->db->t1where('article', 'article_id=?', [$article_id], 1);

        if($article)
        {
            $comment = $this->db->t1where('comment', 'article_id=?', [$article_id], 2, 1);

            if($comment)
            {
                $comment_ids = $this->getIn($comment, 'comment_id');

                $this->db->wheredelete('comment', 'article_id=?', [$article_id]);

                $this->db->wheredeletein('comment_rating', 'comment_id', $comment_ids);
            }
            
            $images = $this->db->t1where('image', 'article_id=?', [$article_id], 2, 1);

            if($images)
            {
                $images_id = $this->getIn($images, 'article_id');

                foreach($images as $image){
                    if(!empty($image['image_image']))
                    {
                        (new f())->drop($image['image_image']);
                    }
                }

                $this->db->wheredeletein('image', 'article_id', $images_id);
            }
        }
        else
        {
            (new message)->code(404)->return('not_found')->json();
        }


        $return = $this->db->wheredelete('article', 'article_id=?', [$article_id]);

        if($return['status'] == TRUE)
        {
            empty($article['article_image']) ?: (new f)->drop($article['article_image']);
            
            if(!empty($article['article_archive']) && !empty($article['article_archivesize']))
            {
                $this->db->whereupdate('setting', 
                        'setting_value = setting_value - 1', 'setting_key=?', ['file']);
            }


            (new message)->code(200)->return('deleted')->json();
        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function categoryBySlug($section_slug, $category_slug)
    {
        $category = $this->db->t2where('category', 'section', 
            "section.section_slug=? AND category.category_slug=?", 
            [$section_slug, $category_slug]);

        if($category)
        {
            return $category;
        }
        else
        {
            (new message)->code(300)->return('not_found')->get()->http('panel/category');
        }
    }

    public function articleByCategoryCount($section_slug, $category_slug)
    {
        return count($this->db->sql("
            
            SELECT article_id FROM article 
            
            INNER JOIN category ON category.category_id = article.category_id
            
            INNER JOIN section ON section.section_id = category.section_id
            
            WHERE category.category_slug = '{$category_slug}' AND section.section_slug = '{$section_slug}'
        ", 2));
    }

    public function articleByCategory($section_slug, $category_slug, $start, $limit)
    {
        return $this->db->t3where('article', 'category', 'section',
            
            "section.section_slug=? AND category.category_slug=?
            
            LIMIT {$start}, {$limit}", [$section_slug, $category_slug], 2, 2);
    }

    public function articleStatus($article_id)
    {

        $article = $this->db->t1where('article', 'article_id=?', [$article_id]);

        if($article)
        {
            $status = $article->article_status == 0 ? 1 : 0;
        }else
        {
            (new message)->code(404)->return('not_found')->json();
        }

        $return = $this->db->whereupdate('article', 'article_status=?', 'article_id=?', [
            $status, $article_id
        ]);

        $return['status'] == TRUE

            ? (new message)->code(200)->return('status_success')->json()

            : (new message)->code(404)->return('status_error')->json();
    }

    public function __articleSearch()
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

        $article = $this->db->sql("

            SELECT * FROM article WHERE
                
            article_id LIKE '%{$search}%' OR
                
            article_title LIKE '%{$search}%' OR 
                
            article_archive LIKE '%{$search}%'

            ORDER BY article_id DESC LIMIT 10

        ", 2, 1);

        $article ?: (new message)->code(300)->return('not_found')->json();

        $article_ids = $this->getIn($article, 'article_id');

        $article = $this->db->t3wherein('article', 'category', 'section', 'article.article_id', $article_ids, 2);

        if($article)
        {
            (new message)->code(200)->data([
                'article' => $article, 
                'render' => 'article_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
