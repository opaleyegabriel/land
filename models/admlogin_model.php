<?php
class Admlogin_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();

    }
    
    public function myadmlogin($data){
    	$sth=$this->db->prepare("SELECT * FROM tbl_adm WHERE username=:u AND pwd=:p");
    	$sth->execute(array(
    		':u'=>$data['username'],
    		':p'=>$data['pwd']
    		));
    	$result= $sth->fetch();
        //print_r($result);
        //exit();
    	
        if($result){
            
    		session::set('currentuser',$data['username']);
            session::set("adminuser", true);          
            session::set("usertype", $result['usertype']); 
 		
    	}
        
    }
    
}