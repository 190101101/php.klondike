<?php 

namespace library;
use PDOStatement;
use Exception;
use PDO;

class triangle extends PDO
{
    private $db;
    
    private $lazy   = PDO::FETCH_LAZY;
    
    private $obj    = PDO::FETCH_OBJ;
    
    private $assoc  = PDO::FETCH_ASSOC;
    
    private $column = PDO::FETCH_COLUMN;
    
    private $helper;

    public function __construct()
    {
        $pdo = sprintf("mysql:host=%s;dbname=%s;charset=utf8", DBHOST, DBNAME);
    
        $this->db = new PDO($pdo, DBUSER, DBPASS, $this->option());
    }

    protected function option(): array
    {
        return [
            
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }

    private function fetch($stmt, $mode = 0, $fetch = 0)
    {
        if($mode == 0 && $fetch == 0)
        {
            return $stmt->fetch($this->obj);

        } else if($mode == 1 && $fetch == 0)
        {
            return $stmt->fetch($this->assoc);

        } else if($mode == 0 && $fetch == 1)
        {
            return $stmt->fetch($this->lazy);  
     
        } else if($mode == 1 && $fetch == 1)
        {
            return $stmt->fetchColumn();  

        } else if($mode == 2 && $fetch == 0)
        {
            return $stmt->fetchAll($this->obj);

        } else if($mode == 2 && $fetch == 1)
        {
            return $stmt->fetchAll($this->assoc);

        } else if($mode == 2 && $fetch == 2)
        {
            return $stmt;
        }
    }

    public function keys($data)
    {
        $values = implode(', ', array_map(function($item){
        
            return $item . '=?';
        
        }, array_keys($data)));
        
        return $values;
    }

    public function values($data)
    {
        
        $values = implode(', ', array_map(function($item){
        
            return $item . '=?';
        
        }, array_values($data)));
        
        return $values;
    }

    public function aimp($data)
    {
        $values = implode(' && ', array_map(function($item){
        
            return $item . '=?';
        
        }, array_keys($data)));
        
        return $values;
    }

    public function comma_separated($data)
    {
        $values = implode(', ', array_map(function($item){
        
            return $item;
        
        }, array_values($data)));
        
        return $values;
    }

    public function seperatorLike($data)
    {
        $values = implode(' OR ', array_map(function($item){
        
            return $item . ' Like ?';
        
        }, array_values($data)));
        
        return $values;
    }

    public function question_mark($data)
    {
        $values = implode(', ', array_map(function($item){
        
            return '?';
        
        }, array_values($data)));
        
        return $values;
    }

    public function getIn($data, $by)
    {
        $return = [];

        foreach($data as $key){

            $return[] = $key[$by];

        }

        return $return;
    }

    /*triangle*/
    public function field($t1)
    {
        return $this->db->query("DESCRIBE $t1")->fetchAll($this->column);
    }

    public function columns($t1)
    {
        return $this->db->query("SHOW COLUMNS FROM {$t1}")->fetchAll($this->column);
    }

    #$db->sql('SELECT * FROM code', 2);
    public function sql($sql, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query($sql);
        return $this->fetch($stmt, $mode, $fetch);
    }
    
    #$db->tsql('SELECT * FROM article WHERE article_id = ?', [10]);
    public function tsql($sql, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    // $db->wherecount('notice', 'notice_status = ? && notice_user_id =?', [0, get_user_id()])->count
    public function wherecount($t1, $keys, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM $t1 WHERE $keys");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->wherelikecount('code', 'code_token', 'code 1')->count;
    public function wherelikecount($t1, $c1, $c2, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM $t1
            WHERE $c1 LIKE ? ORDER BY {$t1}_id DESC LIMIT 0, $limit
        "); $stmt->execute(["%$c2%"]);
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->idbyc1('category', 'category_slug', 'javascript');
    public function idbyc1($t1, $c1, $c2, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT {$t1}_id FROM $t1 WHERE $c1 = '{$c2}'");
        return $this->fetch($stmt, $mode, $fetch);
    }

    /*R*/ #$this->db->trianglewhere('comment', 'user', 'article', 'article_slug=?', [$article_slug], 2);
    public function trianglewhere($t1, $t2, $t3, $keys, $values, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t1.{$t3}_id = $t3.{$t3}_id 
            WHERE $keys
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }
    /*triangle*/

    /*t1*/
    #$db->t1('code', 2, 1);
    public function t1($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1desc('code', 2);
    public function t1desc($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 ORDER BY {$t1}_id DESC");
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t1asc($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 ORDER BY {$t1}_id ASC");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1limit('code', 2);
    public function t1limit($t1, $start = 0, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 LIMIT $start, $limit");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1desclimit('code', 2);
    public function t1desclimit($t1, $p1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 ORDER BY {$t1}_id DESC LIMIT 0, $p1");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1where('article', 'article_id = ? AND article_title = ?', ['10', 'keti']);
    #$this->db->t1where('image', 'image_id < ?', [$blog->blog_id]);
    public function t1where($t1, $keys, $values = [], $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM $t1 WHERE $keys");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1wherecolumn('user', ['user_id', 'user_login'], 'user_id=?', ['1']);
    public function t1wherecolumn($t1, $column, $keys, $values = [], $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT {$this->comma_separated($column)} FROM $t1 WHERE $keys");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1wherein('code', 'id', $data, 2);
    public function t1wherein($t1, $keys, $values, $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM $t1 WHERE $keys IN ({$this->question_mark($values)})");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    // $db->t1columnwherein('product', ['product_id'], 'product_id', $products, 2);
    public function t1columnwherein($t1, $column, $keys, $values, $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT {$this->comma_separated($column)} FROM $t1 
            WHERE $keys IN ({$this->question_mark($values)})");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1wherecolumnin('user', ['user_id', 'user_login'], 'user_id', $data, 2);
    public function t1wherecolumnin($t1, $column, $keys, $values, $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT {$this->comma_separated($column)} 

            FROM $t1 WHERE $keys IN ({$this->question_mark($values)})");

        $stmt->execute(array_values($values));
        
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1id('code', '10');
    public function t1id($t1, $id, $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 WHERE {$t1}_id = $id");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1search('code', 'column', '60cc', limit, 2);
    public function t1search($t1, $c1, $c2, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$t1} 
            WHERE $c1 LIKE ? ORDER BY {$t1}_id DESC LIMIT 0, $limit
        "); $stmt->execute(["%$c2%"]);
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t1like($t1, $key, $value, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$t1} 
            WHERE $key LIKE ? ORDER BY {$t1}_id DESC LIMIT $limit
        "); $stmt->execute(["%$value%"]);
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1between('code', 'id', '10 AND 20', 2);
    public function t1between($t1, $column, $sql, $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->query("SELECT * FROM $t1 WHERE $column BETWEEN $sql");
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1matrix('article', ['article_title' => 'keti', ], 2);
    public function t1matrix($t1, $p1 = [], $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM $t1 WHERE {$this->aimp($p1)}");
        $stmt->execute(array_values($p1));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1matrix('info_50', $_POST);
    public function t1filter($t1, $p1 = [], $mode = 0, $fetch= 0)
    {
        foreach($p1 as $key => $val)
            !empty($val) ? $p2[$key] = $val : false;
        $stmt = $this->db->prepare("SELECT * FROM $t1 WHERE {$this->aimp($p2)}");
        $stmt->execute(array_values($p2));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1sum('code', 'permit');
    public function t1sum($t1, $column, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT SUM({$column}) as sum FROM $t1"); 
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t1wheresum($t1, $column, $key, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT SUM({$column}) as sum FROM $t1 WHERE $key");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1max('code');
    public function t1max($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT MAX({$t1}_id) as max FROM $t1"); 
        return $this->fetch($stmt, $mode, $fetch);
    }
    
    #$db->t1min('code');
    public function t1min($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT MIN({$t1}_id) as min FROM $t1"); 
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t1get($t1, $col, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $col FROM $t1"); 
        return $this->fetch($stmt, $mode, $fetch);
    }

    // $this->db->t1wherecount('orders', 'orders_id', 'orders_status=1 && orders_type=?', ['payment']);
    public function t1wherecount($t1, $column, $key, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT COUNT({$column}) as count FROM $t1 WHERE $key");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t1count('code');
    public function t1count($t1, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM $t1"); 
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2('article', 'category', 2);
    public function t2($t1, $t2, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t2.*, $t1.* FROM $t1
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2desc('article', 'category', 2);
    public function t2desc($t1, $t2, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            ORDER BY {$t1}.{$t1}_id DESC
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2limit('article', 'category', 0, 10, 2, 2);
    public function t2limit($t1, $t2, $start = 0, $limit = 100, $mode = 0, $fetch = 0)
    {
        $order = " ORDER BY {$t1}.{$t1}_id DESC ";
        $stmt = $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            $order LIMIT $start, $limit
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2desclimit('article', 'category', limit, 2);
    public function t2desclimit($t1, $t2, $limit, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            ORDER BY {$t1}.{$t1}_id DESC LIMIT $limit
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2column('article', 'category', 'article_title', 'keti');
    public function t2column($t1, $t2, $c1, $c2, $mode = 0, $fetch = 0)
    {
        $stmt =  $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            WHERE {$t1}.{$c1} = '{$c2}'
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2where('article', 'category', 'article_id = ? and category.category_id = ?', ['10', '11']);
    public function t2where($t1, $t2, $keys, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id WHERE $keys
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t2wherein($t1, $t2, $keys, $values, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            WHERE $keys IN ({$this->question_mark($values)})
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    public function t2wherefunc($t1, $t2, $func, $keys, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $func FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id WHERE $keys
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2id('article', 'category', '17', 2);
    public function t2id($t1, $t2, $id, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            WHERE $t1.{$t1}_id = $id
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2search('article', 'category', 'category', 'soft', 2);
    public function t2search($t1, $t2, $c1, $c2, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt =  $this->db->prepare("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            WHERE $c1 LIKE ? ORDER BY {$t1}.{$t1}_id DESC LIMIT $limit
        "); $stmt->execute(["%$c2%"]);
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2between('article', 'category', 'category.category_id', '16 AND 17',  2);
    public function t2between($t1, $t2, $column, $sql, $mode = 0, $fetch= 0)
    {
        $stmt =  $this->db->query("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            WHERE $column BETWEEN $sql
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t2matrix('code', 'token', ['code_name' => 'qwe', 'token.token_id' => '11'], 2);
    public function t2matrix($t1, $t2, $p1 = [], $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            WHERE {$this->aimp($p1)}");
        $stmt->execute(array_values($p1));
        return $this->fetch($stmt, $mode, $fetch);
    }
    
    public function t2wheresum($t1, $t2, $a, $b, $id, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT SUM({$a}) as $a, SUM({$b}) as $b FROM $t1
            INNER JOIN {$t2} ON {$t1}.{$t1}_id = {$t2}.{$t1}_id WHERE {$t1}.{$t1}_id = $id
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    public function t2wherecount($t1, $t2, $column, $key, $values = [], $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT COUNT({$column}) as count FROM $t1
            INNER JOIN {$t2} ON {$t1}.{$t2}_id = {$t2}.{$t2}_id WHERE $key");
        $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }


    #$db->t3('article', 'category', 'section', 2);
    public function t3($t1, $t2, $t3, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3desc('article', 'category', 'section', 2);
    public function t3desc($t1, $t2, $t3, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            ORDER BY {$t1}.{$t1}_id DESC
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3limit('article', 'category', 'section', 5, 2);
    public function t3limit($t1, $t2, $t3, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            ORDER BY {$t1}.{$t1}_id LIMIT 0, $limit
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3desclimit('article', 'category', 'section', 5, 2);
    public function t3desclimit($t1, $t2, $t3, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            ORDER BY {$t1}.{$t1}_id DESC LIMIT $limit
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3column('article', 'category', 'section', 'article.article_id', '24', 2);
    public function t3column($t1, $t2, $t3, $c1, $c2, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id 
            WHERE $c1 = '{$c2}'
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3where('article', 'category', 'section', 'article_id = ? and category = ? AND section = ?', ['10', 'psd', 'freebies']);
    public function t3where($t1, $t2, $t3, $keys, $values, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            WHERE $keys
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }
    
    public function t3wherein($t1, $t2, $t3, $keys, $values, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            WHERE $keys IN ({$this->question_mark($values)})
        "); $stmt->execute(array_values($values));
        return $this->fetch($stmt, $mode, $fetch);
    }
    
    #$db->t3id('article', 'category', 'section', '5', 2);
    public function t3id($t1, $t2, $t3, $id, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            WHERE {$t3}.{$t3}_id = {$id}
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3search('article', 'category', 'section', 'category.category', 'soft', 10, 2, 0);
    public function t3search($t1, $t2, $t3, $c1, $c2, $limit = 100, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->prepare("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id
            WHERE $c1 LIKE ? ORDER BY $t1.{$t1}_id DESC LIMIT $limit
        "); $stmt->execute(["%$c2%"]);
        return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3between('article', 'category', 'section', 'section.section_id', '5 AND 6',  2);
    public function t3between($t1, $t2, $t3, $column, $sql, $mode = 0, $fetch = 0)
    {
        $stmt = $this->db->query("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id 
            WHERE $column BETWEEN $sql
        "); return $this->fetch($stmt, $mode, $fetch);
    }

    #$db->t3matrix('article', 'category', 'section', 
    #    ['article_title' => 'keti', 'category.category_id' => '11', 'section' => 'freebies',
    #], 2);
    public function t3matrix($t1, $t2, $t3, $p1 = [], $mode = 0, $fetch= 0)
    {
        $stmt = $this->db->prepare("SELECT $t3.*, $t2.*, $t1.* FROM $t1 
            INNER JOIN $t2 ON $t1.{$t2}_id = $t2.{$t2}_id 
            INNER JOIN $t3 ON $t2.{$t3}_id = $t3.{$t3}_id 
            WHERE {$this->aimp($p1)}");
        $stmt->execute(array_values($p1));
        return $this->fetch($stmt, $mode, $fetch);
    }
    /*t3*/

    /*create*/
    #$this->db->create('article', $data);
    public function create($t1, $values)
    {   
        try {   
            
            $stmt = $this->db->prepare("INSERT INTO $t1 SET {$this->keys($values)}");
            
            $stmt->execute(array_values($values));
            
            return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];

        }
    }

    public function make($t1, $values)
    {   
        try {   
            $this->db->beginTransaction();
            
            $stmt = $this->db->prepare("INSERT INTO $t1 SET {$this->keys($values)}");
            
            $stmt->execute(array_values($values));
            
            $last_id = $this->db->lastInsertId();
            
            $this->db->commit();
            
            return $stmt->rowCount() > 0 ? 
            
            ['status' => TRUE, 'id' => $last_id] : ['status' => FALSE, 'id' => False];

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];
            
        }
    }
    /*create*/

    /*update*/
        // $this->db->update('user', (array) $data, ['id' => 'user_id']);
    public function update($t1, $values, $p1 = [])
    {
        try {
            
            $id = $values[$p1['id']];
            
            unset($values[$p1['id']]);
            
            $execute = $values;
            
            $execute += [$p1['id'] => $id];

            $stmt = $this->db->prepare("UPDATE $t1 SET {$this->keys($values)} WHERE {$p1['id']}=?");

            $stmt->execute(array_values($execute));
            
            return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    #'table', 'keys=?', 'where id=?', '[values]';
    #$this->db->whereupdate('code', 'code_token=?, code_status=?,', 'code_id=?', [uniqid(), 1, 19]);
    public function whereupdate($t1, $keys, $where, $values)
    {
        try {
            
            $stmt = $this->db->prepare("UPDATE $t1 SET $keys WHERE $where");
            
            $stmt->execute(array_values($values));
            
            return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];
            
        }
    }
    /*update*/

    /*clear*/
    public function clear($t1, $c, $id)
    {
        $stmt = $this->db->query("UPDATE $t1 SET $c = NULL WHERE {$t1}_id = {$id}");
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }
    
    public function increment($t1, $column, $id)
    {
        $stmt = $this->db->query("UPDATE $t1 SET {$column} = {$column} + 1 WHERE {$t1}_id = $id");
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }

    public function decrement($t1, $column, $id)
    {
        $stmt = $this->db->query("UPDATE $t1 SET {$column} = {$column} - 1 WHERE {$t1}_id = $id");
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }
    /*clear*/

    /*delete*/
    public function drop($t1)
    {
        $stmt = $this->db->query("DELETE FROM $t1");

        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }

    #$db->delete('user', 10);
    public function delete($t1, $id)
    {
        $stmt = $this->db->query("DELETE FROM $t1 WHERE {$t1}_id = $id");
        
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }

    #'table', 'where keys=?', '[values]';
    public function wheredelete($t1, $keys, $values)
    {
        
        $stmt = $this->db->prepare("DELETE FROM $t1 WHERE $keys");
        
        $stmt->execute(array_values($values));
        
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }

    public function wheredeletein($t1, $keys, $values)
    {

        $stmt = $this->db->prepare("DELETE FROM $t1 WHERE $keys IN ({$this->question_mark($values)})");
        
        $stmt->execute(array_values($values));
        
        return $stmt->rowCount() > 0 ? ['status' => TRUE] : ['status' => FALSE];
    }
    /*delete*/
}
