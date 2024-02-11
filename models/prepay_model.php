<?php

class Prepay_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();

    }
    public function unapprovedlist(){
         $sth=$this->db->prepare("SELECT * FROM tbl_prepayment WHERE usedstatus='N'");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function delete($id){
        $sth=$this->db->prepare("DELETE FROM tbl_prepayment WHERE id=:id");
        $sth->execute(array(
            ':id'=>$id
        ));
    }
        
    
    public function add($data){
        $cname="%". $data['cname']."%";
        $s=$this->db->prepare("SELECT * FROM tbl_prepayment WHERE clientname like :cname AND amount=:amt AND usedstatus= :n");
        $s->execute(array(
                ':cname'=>$cname,
                ':amt'=>$data['amount'],
                ':n'=>'N'
                ));         
        $finder=$s->rowCount();
        if($finder > 0){
                echo '<script type="text/javascript">';
                        echo 'alert("Similar Unused Payment Transaction !");
                        window.location.href = "'.URL.'prepay";';
                      echo "</script>";

        }else{
            


            $sth=$this->db->prepare("INSERT INTO tbl_prepayment (clientname,amount,usedstatus) VALUES (:cname,:amount,:ub)");
            $sth->execute(array(
                ':cname'=>$data['cname'],
                ':amount'=>$data['amount'],
                ':ub'=>'N'
                            ));         
             
                    echo '<script type="text/javascript">';
                        echo 'alert("Payment Added successfully");
                        window.location.href = "'.URL.'prepay";';
                      echo "</script>";

        }
    	
        /*
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
			            window.location.href = "'.URL.'addallws";';
			          echo "</script>";

    	}else{
    		echo '<script type="text/javascript">';
			            echo 'alert("No such user found!");
			            window.location.href = "'.URL.'addallws";';
			          echo "</script>";

    	}
        */
    }


    
}