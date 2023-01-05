<?php 

namespace modulus\main\category\model;
use core\model;
use \library\message;

class categoryModel extends model
{
    public function categoryCount()
    {
         return count($this->db->sql("
            SELECT category_id FROM category 
            INNER JOIN section ON section.section_id = category.section_id
            WHERE 
                category.category_status = 1 AND 
                section.section_status = 1
        ", 2));
    }

    public function category($start, $limit)
    {
        return $this->db->t2where('category', 'section', 
            "category_status=1 AND section_status=1 
            LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function categoryBySlug($section_slug, $category_slug)
    {
        $category = $this->db->t2where('category', 'section', 
            "section.section_slug=? AND category.category_slug=? AND category.category_status=1", 
            [$section_slug, $category_slug]);

        if($category)
        {
            return $category;
        }
        else
        {
            (new message)->code(300)->return('not_found')->http('category')->get();
        }
    }

    public function articleByCategoryCount($section_slug, $category_slug)
    {
         $article =  count($this->db->sql("
            SELECT article_id FROM article 
            INNER JOIN category ON category.category_id = article.category_id
            INNER JOIN section ON section.section_id = category.section_id
            WHERE 
                article.article_status = 1 AND 
                category.category_status = 1 AND 
                category.category_slug = '{$category_slug}' AND
                section.section_slug = '{$section_slug}'
        ", 2));

        if($article)
        {
            return $article;
        }
        else
        {
            (new message)->code(300)->return('category_empty')->http('category')->get();
        }
    }

    public function articleByCategory($section_slug, $category_slug, $start, $limit)
    {
        return $this->db->t3where('article', 'category', 'section',
            "section.section_slug=? AND
            category.category_slug=? AND 
            article.article_status=1 AND 
            category.category_status=1 
            LIMIT {$start}, {$limit}", [$section_slug, $category_slug], 2, 2);
    }
}
