<?php 

namespace modulus\admin\voting\model;
use core\model;
use \library\error;
use \library\message;
use \library\file as f;
use \Valitron\Validator as v;

class votingModel extends model
{
	public function votingCount()
    {
        return count($this->db->sql("
            
            SELECT voting_id FROM voting 
            
            ORDER BY voting.voting_id DESC", 2));
    }

    public function voting($start, $limit)
    {
        return $this->db->t1where('voting', "voting_id > 0  ORDER BY voting_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    /*crud*/
    public function __votingCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'voting_content',
            'voting_option_a',
            'voting_option_b',
            'voting_type',
        ]);

        error::jsonvalitron($v);

        $return = $this->db->make('voting', $data);

        $voting = $this->db->t1where('voting', 'voting_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'voting' => $voting,
                'render' => 'voting_create'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->get()->referer();
        }

    }

    public function _votingUpdate($id)
    {
        $voting = $this->db->t1where('voting', 'voting.voting_id=?', [$id]);
        return $voting ? $voting : redirect('panel/voting');
    }

    public function __votingUpdate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'voting_content',
            'voting_option_a',
            'voting_option_b',
            'voting_vote_count_a',
            'voting_vote_count_b',
            'voting_vote_count_total',
            'voting_id',
        ]);

        error::jsonvalitron($v);
        
        $data['voting_vote_count_total'] = $data['voting_vote_count_a'] + $data['voting_vote_count_b'];
        $data['voting_vote_percent_a'] = percent($data['voting_vote_count_a'], $data['voting_vote_count_total']);
        $data['voting_vote_percent_b'] = percent($data['voting_vote_count_b'], $data['voting_vote_count_total']);
        $data['voting_updated_at'] = date('Y-m-d H:i:s');

        $return = $this->db->update('voting', $data, [
            'id' => 'voting_id',
        ]);

        $voting = $this->db->t1where('voting', 'voting_id=?', [
            $data['voting_id']
        ]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'voting' => $voting,
                'render' => 'voting_update'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function _votingDelete($voting_id)
    {
        $voting = $this->db->t1where('voting', 'voting_id=?', [$voting_id], 1);

        if($voting)
        {
            $this->db->wheredelete('vote', 'voting_id=?', [$voting_id]);

            $return = $this->db->wheredelete('voting', 'voting_id=?', [$voting_id]);
        }
        else
        {
            (new message)->code(404)->return('not_found')->json();
        }

        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function votingStatus($voting_id)
    {
        $voting = $this->db->t1where('voting', 'voting_id=?', [$voting_id]);

        if($voting)
        {
            $status = $voting->voting_status == 0 ? 1 : 0;

        }
        else
        {
            (new message)->code(404)->return('not_found')->json();
        }


        $return = $this->db->whereupdate('voting', 'voting_status=?', 'voting_id=?', [
            $status, $voting_id
        ]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('status_success')->json()
            : (new message)->code(404)->return('status_error')->json();
    }
}
