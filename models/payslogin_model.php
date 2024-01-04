<?php
class Payslogin_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();

    }

    public function login($data){
    	$sth=$this->db->prepare("SELECT * FROM tbl_superuser WHERE username=:u AND pwd=:p");
    	$sth->execute(array(
    		':u'=>$data['username'],
    		':p'=>$data['pwd']
    		));
    	$result= $sth->fetch();
    	if($result){
    		session::set('superuser',$data['username']);
    		header('location: '. URL . 'hoogpayapprovals');
    	}else
    	{
    		header('location: '. URL . 'payslogin');
    	}
    }
}