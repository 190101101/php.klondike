<?php 

namespace library;
use \library\cookies;

class guest 
{
    public static function counter()
    {
        $cookie_key = 'guest';
        // $guest_ip = trim(REMOTE_ADDR());
        $guest_ip = '2400:cb00:70:1024::a29e:7eac';
        
        $guest = db()->t1where('guest', 'guest_ip = ?', [$guest_ip]);

        if($guest){
            $do_update = false;
            if(cookies::stored($cookie_key)){
                $c = (array) @json_decode(cookies::read($cookie_key), true);
                if($c){
                    if( $c['guest_last_visit'] < (time() - (60 * 5)) ){
                        $do_update = true;
                    }
                } else{
                    $do_update = true;
                }
            }else{  
                $do_update = true;
            }

            if($do_update){
                $time = time();
                $guest->guest_last_visit = time();
                db()->whereupdate('guest', 'guest_last_visit = ?', 'guest_id =?', [time(), $guest->guest_id]);

                cookies::store($cookie_key, json_encode([
                    'guest_id' => $guest->guest_id,
                    'guest_last_visit' => $time,
                ]));
            }

        } else {
            $time = time();

            $guestdata = [
                'guest_ip' => $guest_ip,
                'guest_last_visit' => $time,
            ];

            db()->create('guest', $guestdata);
            $guest = db()->t1desc('guest');

            cookies::store($cookie_key, json_encode([
                'guest_id' => $guest->guest_id,
                'guest_last_visit' => $time,
            ]));
        }
        $guest_count = db()->t1wherecount('guest', 'guest_id', 'guest_last_visit > ? ', [
            time() - (3600)
        ]);
        return $guest_count->count;
    }
}
