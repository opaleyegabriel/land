<?php

class Addallws_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
        

    }

    public function add($data){
    	$s=$this->db->prepare("SELECT * FROM tbl_affiliate_users WHERE mobile=:mobile");
    	$s->execute(array(
    			':mobile'=>$data['mobile']    			
    			));    		
    	$finder=$s->rowCount();
    	if($finder > 0){

			$sth=$this->db->prepare("INSERT INTO tbl_affiliate_allw (mobile,amount) VALUES (:mobile,:amount)");
			$sth->execute(array(
			    			':mobile'=>$data['mobile'],
			    			':amount'=>$data['amount']
			    			));    		
			 
			    	echo '<script type="text/javascript">';
			            echo 'alert("Allowance successfully Added");
			            window.location.href = "'.URL.'prepay";';
			          echo "</script>";

    	}else{
    		echo '<script type="text/javascript">';
			            echo 'alert("No such user found!");
			            window.location.href = "'.URL.'prepay";';
			          echo "</script>";

    	}
    }


    
}