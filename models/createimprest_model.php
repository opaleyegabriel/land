<?php

class Createimprest_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }


    public function GetStaff(){
    	$sth=$this->db->prepare("SELECT * FROM tbl_adm WHERE usertype=0");
    	$sth->execute();
    	return $sth->fetchAll();
    }
}