<?php
class Balogins_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    public function login_bas($data){
    	$sth=$this->db->prepare("SELECT * FROM tbl_ba_agent WHERE acctnum=:acctnum AND pwd=:pwd");
        $sth->execute(array(
           ':acctnum'=>$data['mobile'],
           ':pwd'=>$data['password']
            ));
        $rec=$sth->fetch();
        if($rec){
            session::set("ba_name",$rec['name']);
            session::set("ba_acctno",$data['mobile']);
            session::set("ba_bank",$rec['bank']);
            session::set("balogintrue",true);
            header('location: '. URL . 'badashboard');
        }else
        {
            session::set("accountnotexist",true);  
            header('location: '. URL . 'balogins');          
        }
        
    }
}