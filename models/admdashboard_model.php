<?php
class Admdashboard_Model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    public function createaccount($data){
    	$sth=$this->db->prepare("SELECT * FROM tbl_ba_agent WHERE mobile=:mobile");
    	$sth->execute(array(
    		':mobile'=>$data['mobile']
    		));
    	$rec=$sth->fetch();
    	if($rec){

    	}else
    	{
    		$sthi=$this->db->prepare("INSERT INTO tbl_ba_agent (name,bank,acctnum,mobile,pwd) VALUES (:name,:bank,:acctnum,:mobile,:pwd)");
    		$sthi->execute(array(
    			':name'=>$data['name'],
    			':bank'=>$data['bank'],
    			':acctnum'=>$data['acctnum'],
    			':mobile'=>$data['mobile'],
    			':pwd'=>"0000"
    			));
    		
    	}
    }
}