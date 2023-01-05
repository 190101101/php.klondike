<?php 

namespace modulus\main\voting\model;
use core\model;
use \library\session;
use \library\http;
use \library\error;
use \library\message;
use \library\User;
use \Valitron\Validator as v;

class votingModel extends model
{
    public function _vote($vote, $voting_id)
    {
        $rating = ['a', 'b'];

        if(in_array($vote, $rating) === FALSE)
        {
            (new message)->code(404)->json();
        }

        $voting = $this->db->t1where('voting', 'voting_id=?', [$voting_id], 1);

        if(!$voting)
        {
            (new message)->code(300)->json();
        }

        $ip_address = REMOTE_ADDR();

        $vote_rating = $this->db->t1where('vote', 'voting_id=? AND ip_address=?', [
            $voting['voting_id'], $ip_address
        ]);

        if($vote_rating)
        {
            (new message)->code(300)->json();
        }

        $voting['voting_vote_count_'.$vote] += 1;

        $voting['voting_vote_count_total'] = $voting['voting_vote_count_a'] + $voting['voting_vote_count_b'];
        $voting['voting_vote_percent_a']   = percent($voting['voting_vote_count_a'], $voting['voting_vote_count_total']);
        $voting['voting_vote_percent_b']   = percent($voting['voting_vote_count_b'], $voting['voting_vote_count_total']);

        $status = $this->db->update('voting', $voting,[
            'id' => 'voting_id'
        ]);

        if($status['status'])
        {
            $this->db->create('vote', [
                'voting_id' => $voting['voting_id'],
                'ip_address' => $ip_address,
            ]);

            (new message)->code(200)->data([
                'voting' => $voting,
                'render' => 'voting_create',
            ])->json();

        }
        else
        {
            (new message)->code(404)->json();
        }
    }
}
