<?php
class Clientlist_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    public function listofclients(){
    	$sth=$this->db->prepare("SELECT")
    }

}