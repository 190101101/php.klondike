<?php 

namespace modulus\main\home\model;
use core\model;

class homeModel extends model
{
    public function articleCount()
    {
         return count($this->db->sql("
            
            SELECT article_id FROM article 
            
            INNER JOIN category ON category.category_id = article.category_id
            
            INNER JOIN section ON section.section_id = category.section_id
            
            WHERE 
                
                article.article_status = 1 AND 
                
                category.category_status = 1 AND 
                
                section.section_status = 1
        ", 2));
    }

    public function articles($start, $limit)
    {
        return $this->db->t3where('article', 'category', 'section',
            "article.article_status=1 AND category.category_status=1 AND category.category_status=1
            ORDER BY article_id DESC
            LIMIT {$start}, {$limit}", [], 2, 2);
    }
}
