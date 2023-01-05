<?php 

namespace modulus\admin\category\model;
use core\model;
use \library\session;
use \library\cookie;
use \library\http;
use \library\error;
use \library\message;
use \library\User;
use \library\File as f;
use \Valitron\Validator as v;

class categoryModel extends model
{
    public function categoryCount()
    {
        return count($this->db->sql("
            
            SELECT category_id FROM category 
            
            INNER JOIN section ON section.section_id = category.section_id
            
            ORDER BY category.category_id DESC", 2));
    }

    public function category($start, $limit)
    {
        return $this->db->t2where('category', 'section',
            "category.category_id > 0  ORDER BY category_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function section()
    {
        return $this->db->t1('section', 2);
    }

    /*crud*/
    public function __categoryCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'category_title',
            'category_subtitle',
            'category_content',
        ]);

        error::jsonvalitron($v);

        if(has_file($_FILES, 'category_image'))
        {
            $image = (new f)->set($_FILES, 'category_image')->get();

            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            } 
            $data  += ['category_image' => $image['name']];
            $data  += ['category_imagesize' => $image['size']];
        }

        $data += ['category_slug' => seo($data['category_title'])];

        $category = $this->db->t1where('category', 'category_slug=?', [
            $data['category_slug']
        ]);

        if($category){
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->make('category', $data);

        $category = $this->db->t1where('category', 'category_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'category' => $category,
                'render' => 'category_create',
            ])->json();

        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function _categoryUpdate($id)
    {
        $category =  $this->db->t2where('category', 'section', 'category.category_id=?', [$id]);
        return $category ? $category : redirect('panel/category');
    }

    public function __categoryUpdate()
    {
        $image_delete = $_POST['image_delete'];

        $data = except($_POST, ['image_delete']);

        $data = peel_tag_array($data);

        $v = new v($data);

        $v->rule('required', [
            'category_title',
            'category_content',
            'category_id',
        ]);

        error::jsonvalitron($v);
        
        if(has_file($_FILES, 'category_image'))
        {
            $image = (new f)->set($_FILES, 'category_image')->get();
            
            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            }
            $data  += ['category_image' => $image['name']];
            $data  += ['category_imagesize' => $image['size']];
        }

        $data += ['category_slug' => seo($data['category_title'])];
        
        $data += ['category_updated_at' => date('Y-m-d H:i:s')];

        $category = $this->db->t1where('category', 'category_slug=? && category_id != ?', [
            $data['category_slug'], $data['category_id']
        ]);

        if($category)
        {
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->update('category', $data, [
            'id' => 'category_id',
        ]);

        $category = $this->db->t2where('category', 'section', 'category.category_id=?', [
            $data['category_id']
        ]);

        $section = $this->db->t1('section', 2);

        if($return['status'] == TRUE)
        {
            
            !isset($image) ?: (new f)->drop($image_delete);

            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'category' => $category,
                'section' => $section,
                'icon' => svg_list(),
                'render' => 'category_update'
            ])->json();

        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }


    public function _categoryDelete($id)
    {
        $category = $this->db->t1where('category', 'category_id=?', [$id]);

        if($category)
        {
            $this->db->whereupdate('article', 'category_id=?', 'category_id=?', [
                17, $category->category_id
            ]);
        }else
        {
            (new message)->code(404)->return('not_found')->json();
        }

        $return = $this->db->wheredelete('category', 'category_id=?', [
            $category->category_id
        ]);

        if($return['status'] == TRUE)
        {
            empty($category->category_image) ?: (new f)->drop($category->category_image);
            
            (new message)->code(200)->return('deleted')->json();
        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function categoryStatus($category_id)
    {
        $return = $this->db->whereupdate('category', 'category_status=?', 'category_id=?', [
            $this->db->t1where('category', 'category_id=?', [$category_id])->category_status == 0 ? 1 : 0, $category_id
        ]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('status_success')->json()
            : (new message)->code(404)->return('status_error')->json();
    }

    public function sectionSlug($section_slug)
    {
        $section = $this->db->t1where('section', 'section_slug=?', [$section_slug]);

        if($section)
        {
            return $section;
        }
        else
        {
            (new message)->code(300)->return('empty')->http('home')->get();
        }
    }

    public function categoryBySectionCount($section_slug)
    {
         $category = count($this->db->sql("
            
            SELECT category_id FROM category 
            
            INNER JOIN section ON section.section_id = category.section_id
            
            WHERE section.section_slug = '{$section_slug}'

        ", 2));

        if($category)
        {
            return $category;
        }
        else
        {
            (new message)->code(300)->return('empty')->get()->http('panel/section');
        }
    }

    public function categoryBySection($section_slug, $start, $limit)
    {
        return $this->db->t2where('category', 'section', 
            
            "section.section_slug=? ORDER BY category.category_id DESC LIMIT {$start}, {$limit}", [$section_slug], 2, 2);
    }

    public function __categorySearch()
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

        $category = $this->db->sql("

            SELECT * FROM category WHERE
                
            category_id LIKE '%{$search}%' OR
                
            category_title LIKE '%{$search}%' OR 

            category_subtitle LIKE '%{$search}%'
                
            ORDER BY category_id DESC LIMIT 10

        ", 2, 1);

        $category ?: (new message)->code(300)->return('not_found')->json();

        $category_ids = $this->getIn($category, 'category_id');

        $category = $this->db->t2wherein('category', 'section', 'category.category_id', $category_ids, 2);

        if($category)
        {
            (new message)->code(200)->data([
                'category' => $category, 
                'render' => 'category_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}

