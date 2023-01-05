<?php 

namespace modulus\main\voting\controller;
use modulus\main\voting\model\votingModel;
use core\controller;

class votingController extends controller
{
    public $voting;
    
    public function __construct()
    {
        $this->voting = new votingModel();
    }

    public function __addvoting()
    {
        $this->voting->__addvoting();
    }

    public function _vote($vote, $voting_id)
    {
        $this->voting->_vote($vote, $voting_id);
    }
}

