<?php 

namespace modulus\admin\guest\model;
use core\model;
use \library\error;
use \library\message;
use \library\CURL;
use \Valitron\Validator as v;

class guestModel extends model
{
	public function lastGuestStatus()
    {
        return $this->db->t1where('guest', "guest_id > 0 AND guest_status=0 AND guest_mode=? ORDER BY guest_id DESC", ['new']);
    }

    public function guestCount()
    {
        return count($this->db->sql("
            
            SELECT guest_id FROM guest 
            
            ORDER BY guest.guest_id DESC", 2));
    }

    public function guest($start, $limit)
    {
        return $this->db->t1where('guest', "guest_id > 0  ORDER BY guest_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function _guestDelete($id)
    {
        $return = $this->db->wheredelete('guest', 'guest_id=?', [$id]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function _guestStatus()
    {
        $guest = $this->db->t1where('guest', 'guest_status = 0 AND guest_mode =? LIMIT 20', ['new'], 2, 1);

        $get_guest = [];
        foreach($guest as $value){
            $get_guest[] = [
                'guest_id' => $value['guest_id'],
                'guest_ip' => $value['guest_ip'],
            ];
        }

        $file = '../tmp/ip.json';

        $fopen = fopen($file, 'w');

        foreach($get_guest as $key)
        {
            fwrite($fopen, CURL::get("http://ip-api.com/json/{$key['guest_ip']}?lang=ru").'|');
        }

        fclose($fopen);

        $file = file_get_contents($file);

        $explode = explode('|', $file);

        $clean_data = array_diff($explode, array('', NULL, false));

        $get_data = [];
        
        $get_fail_data = [];

        foreach($clean_data as $key)
        {
            if(json_decode($key)->status == 'success')
            {
                $get_data[] = json_decode($key);
            }
            else
            {
                $get_fail_data[] = json_decode($key);
            }
        }

        $update_data = [];
        
        $update_fail_data = [];

        foreach($get_guest as $guest){
            for($i = 0; $i < count($get_data); $i++)
            {
                if($guest['guest_ip'] == $get_data[$i]->query)
                {
                    $update_data[$i] = [
                        'guest_id' => $guest['guest_id'],
                        'guest_ip' => $guest['guest_ip'],
                        'guest_country' => $get_data[$i]->country,
                        'guest_country_code' => $get_data[$i]->countryCode,
                        'guest_city' => $get_data[$i]->city,
                        'guest_lat' => $get_data[$i]->lat,
                        'guest_lon' => $get_data[$i]->lon,
                        'guest_isp' => $get_data[$i]->isp,
                        'guest_as' => $get_data[$i]->as,
                        'guest_query' => $get_data[$i]->query,
                        'guest_type' => 'reliable',
                        'guest_mode' => 'old',
                        'guest_status' => 1,
                    ];

                    $this->db->update('guest', (array) $update_data[$i], [
                        'id' => 'guest_id'
                    ]);
                }
            }

            for($i = 0; $i < count($get_fail_data); $i++)
            {
                if($guest['guest_ip'] == $get_fail_data[$i]->query)
                {
                    $update_fail_data[$i] = [
                        'guest_id' => $guest['guest_id'],
                        'guest_ip' => $guest['guest_ip'],
                        'guest_type' => 'unreliable',
                        'guest_mode' => 'old',
                    ];

                    $this->db->update('guest', (array) $update_fail_data[$i], [
                        'id' => 'guest_id'
                    ]);
                }
            }
        }

        (new message)->code(200)->return('success')->data([
            'render' => 'guest_read'
        ])->json();
    }

    public function guestRead($guest_id)
    {
        return $this->db->t1where('guest', 'guest_id=?', [$guest_id]);
    }

    public function __guestSearch()
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

        $guest = $this->db->sql("

            SELECT * FROM guest WHERE
                
            guest_id LIKE '%{$search}%' OR
                
            guest_query LIKE '%{$search}%' OR
            
            guest_ip LIKE '%{$search}%'
                
            ORDER BY guest_id DESC LIMIT 10

        ", 2, 1);

        $guest ?: (new message)->code(300)->return('not_found')->json();

        $guest_ids = $this->getIn($guest, 'guest_id');

        $guest = $this->db->t1wherein('guest', 'guest_id', $guest_ids, 2);

        if($guest)
        {
            (new message)->code(200)->data([
                'guest' => $guest, 
                'render' => 'guest_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
