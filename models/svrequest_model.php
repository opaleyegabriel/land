<?php

class Svrequest_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();

    }
    public function newrequest($data){
    	$s=$this->db->prepare("SELECT * FROM tbl_sitevisit WHERE requestby=:requestby AND vstatus='N'");
    	$s->execute(array(
    		':requestby'=>$data['requestby']
    		));
    	$r=$s->fetchAll();
    	if($r){
    		echo '<script type="text/javascript">';
                        echo 'alert("Similar Request submitted earlier, please wait for approval");
                        window.location.href = "'.URL.'svrequest";';
                      echo "</script>";
    	}else{
    		$sth=$this->db->prepare("INSERT INTO tbl_sitevisit (requestby,site,purpose,branch,amount,vstatus) VALUES(:requestby,:site,:purpose,:branch,:amount,:vstatus)");
    		$sth->execute(array(
    			':requestby'=>$data['requestby'],
    			':site'=>$data['site'],
    			':purpose'=>$data['purpose'],
    			':branch'=>$data['branch'],
    			':amount'=>$data['amount'],
    			':vstatus'=>'N'
    			));
            echo '<script type="text/javascript">';
                        echo 'alert("Site Visitation Request Submitted, Wait for approval");
                        window.location.href = "'.URL.'svrequest";';
                      echo "</script>";
    	}
    	
    }
}