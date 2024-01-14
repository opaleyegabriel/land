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


    public function new($data){
		$check=$this->db->prepare("SELECT * FROM tbl_impresthead WHERE branchid=:bid AND ustatus=:ust");
		$check->execute(array(
			':branchid'=>$data['staff'],
			':ust'=>'OPEN'
		));
		$result=$check->fetch();
		if($result){
			//you cant add imprest for any branch that doesnt retired the existing money sent as imprest previously
		}else{
			$sth=$this->db->prepare("INSERT INTO tbl_impresthead(amount,branchid,ustatus) VALUES(:amount,:branchid,:ustatus)");
    		$sth->execute(array(
    		':amount'=>$data['amount'],
    		':branchid'=>$data["staff"],
    		':ustatus'=> "OPEN"
    		));
		}
    	
    }

    public function unclosedimprestvouchers(){
    	$sth=$this->db->prepare("SELECT * FROM tbl_impresthead WHERE ustatus <> :ust");
    	$sth->execute(array(
    		':ust'=> "CLOSED"
    		));
    	return $sth->fetchAll();
    }


}