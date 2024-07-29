<?php

class Admrdr_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

    public function allrewards(){
        $sth=$this->db->prepare("SELECT * FROM tbl_rewards");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function deleteduplicate($id){
        $sth=$this->db->prepare("DELETE FROM tbl_rewards WHERE id='$id'");
        $sth->execute();
    }
}