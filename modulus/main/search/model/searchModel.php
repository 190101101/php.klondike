<?php 

namespace modulus\main\search\model;
use core\model;
use \library\message;
use \library\cookie;
use \library\error;
use \Valitron\Validator as v;

class searchModel extends model
{
    public function __articleSearchCheck()
    {
        $data = peel_tag_array($_POST);

        $v = new v((array) $data);

        $v->rule('required', [
            'search',
        ]);

        $v->rule('lengthMin', 'search', 3);
        
        $v->rule('lengthMax', 'search', 20);

        error::valitron($v, 'home');

        !cookie::read('spam') ?: (new message)->code(300)->return('time_spam')->time(10)->get()->http('home');

        cookie::create('spam', 1, 10);

        return $data;

    }

    public function __articleSearch($post)
    {
        return $this->db->sql("
            
            SELECT article.*, category.*, section.* FROM article 

            INNER JOIN category ON category.category_id = article.category_id

            INNER JOIN section ON section.section_id = category.section_id

            WHERE article.article_title LIKE '%{$post['search']}%' AND

            article.article_status = 1

            ORDER BY article.article_id DESC LIMIT 15

        ", 2) 

        ?

        : (new message)->code(300)->return('not_found')->get()->http('home');
    }
}
