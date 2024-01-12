<?php

class Imprest_model extends Model {

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


    public function new($data){
    	$sth=$this->db->prepare("INSERT INTO tbl_impresthead(amount,branchid,ustatus) VALUES(:amount,:branchid,:ustatus)");
    	$sth->execute(array(
    		':amount'=>$data['amount'],
    		':branchid'=>$data["staff"],
    		':ustatus'=> "Start"
    		));
    }

    public function unclosedimprestvouchers(){
    	$sth=$this->db->prepare("SELECT * FROM tbl_impresthead WHERE ustatus <> :ust");
    	$sth->execute(array(
    		':ust'=> "CLOSED"
    		));
    	return $sth->fetchAll();
    }


}