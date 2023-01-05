<?php 

namespace modulus\admin\section\model;
use core\model;
use \library\error;
use \library\message;
use \library\file as f;
use \Valitron\Validator as v;

class sectionModel extends model
{
	public function sectionCount()
    {
        return count($this->db->sql("
            
            SELECT section_id FROM section 
            
            ORDER BY section.section_id DESC", 2));
    }

    public function section($start, $limit)
    {
        return $this->db->t1where('section', "section_id > 0  ORDER BY section_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    /*crud*/
    public function __sectionCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'section',
            'section_title',
        ]);

        error::jsonvalitron($v);

        $data += ['section_slug' => seo($data['section_title'])];

        $section = $this->db->t1where('section', 'section_slug=?', [
            $data['section_slug']
        ]);

        if($section){
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->make('section', $data);

        $section = $this->db->t1where('section', 'section_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'section' => $section,
                'render' => 'section_create'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _sectionUpdate($id)
    {
        $section = $this->db->t1where('section', 'section.section_id=?', [$id]);
        return $section ? $section : redirect('panel/section');
    }

    public function __sectionUpdate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'section',
            'section_title',
            'section_id',
        ]);

        error::jsonvalitron($v);
        
        $data += ['section_slug' => seo($data['section_title'])];

        $section = $this->db->t1where('section', 'section_slug=? && section_id != ?', [
            $data['section_slug'], $data['section_id']
        ]);

        if($section)
        {
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->update('section', $data, [
            'id' => 'section_id',
        ]);

        $section = $this->db->t1where('section', 'section_id=?', [
            $data['section_id']
        ]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'section' => $section,
                'icon' => svg_list(),
                'render' => 'section_update'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function _sectionDelete($id)
    {
        $section = $this->db->t1where('section', 'section_id=?', [$id]);

        if(!$section)
        {
            (new message)->code(404)->return('not_found')->json();
        }
        
        $this->db->whereupdate('category', 'section_id=?', 'section_id=?', [
            4, $section->section_id
        ]);

        $return = $this->db->wheredelete('section', 'section_id=?', [$section->section_id]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function sectionStatus($section_id)
    {
        $section = $this->db->t1where('section', 'section_id=?', [$section_id]);
        
        $status = $section->section_status == 0 ? 1 : 0;

        if(!$section)
        {
            (new message)->code(404)->return('not_found')->json();
        }

        $return = $this->db->whereupdate('section', 'section_status=?', 'section_id=?', [
            $status, $section_id
        ]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('status_success')->json()
            : (new message)->code(404)->return('status_error')->json();
    }

    public function __sectionSearch()
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

        $section = $this->db->sql("

            SELECT * FROM section WHERE
                
            section_id LIKE '%{$search}%' OR
                
            section LIKE '%{$search}%' OR
            
            section_title LIKE '%{$search}%'
                
            ORDER BY section_id DESC LIMIT 10

        ", 2, 1);

        $section ?: (new message)->code(300)->return('not_found')->json();

        $section_ids = $this->getIn($section, 'section_id');

        $section = $this->db->t1wherein('section', 'section.section_id', $section_ids, 2);

        if($section)
        {
            (new message)->code(200)->data([
                'section' => $section, 
                'render' => 'section_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
