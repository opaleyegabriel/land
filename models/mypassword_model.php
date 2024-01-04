<?php
class Mypassword_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    

    public function getmypassword($data){
    	$sth=$this->db->prepare("SELECT * FROM tbl_users WHERE phone=:mobile");
    	$sth->execute(array(
    		':mobile'=>$data['mobile']
    		));
    	$result=$sth->fetch();
        if($result){
            $pwd=$result['password'];
            $message=$pwd;
            $found_status="Yes";
            $dat=array('message'=>$message,'found_status'=>$found_status);
            echo json_encode($dat);
        }else
        {
            $message="Mobile Number not exist";
            $found_status="No";
            $dat=array('message'=>$message,'found_status'=>$found_status);
            echo json_encode($dat);
        }
        
    	
    }
}