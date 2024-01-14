<?php

class Svrequest_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();

    }
	public function requestlist(){
		$rb="%".session::get('currentuser');
		$sth=$this->db->prepare("SELECT * FROM tbl_sitevisit WHERE vstatus=:vst AND requestby LIKE :rqb");
		$sth->execute(array(
			':vst'=>'APPROVED',
			':rqb'=>$rb
		));
		return $sth->fetchAll();
	}
	public function selectedsitevisitrecords($id){
		$sth=$this->db->prepare("SELECT * FROM tbl_sitevisit WHERE id=:id");
		$sth->execute(array(
			':id'=>$id
		));
		return $sth->fetch();
	}

	public function submitfeedback($data){
		$sth=$this->db->prepare("UPDATE tbl_sitevisit SET pleased=:pls,client=:client,feedback=:feedback,vstatus=:vst WHERE id=:id");
		$sth->execute(array(':pls'=>$data['pleased'],':client'=>$data['client'],':feedback'=>$data['feedback'],':vst'=>'Feedback',':id'=>$data['id']));
		echo '<script type="text/javascript">';
                        echo 'alert("Site Visitation Tracking completed!");
                        window.location.href = "'.URL.'svrequest";';
                      echo "</script>";
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
    		$sth=$this->db->prepare("INSERT INTO tbl_sitevisit (requestby,site,purpose,branchid,amount,vstatus) VALUES(:requestby,:site,:purpose,:branch,:amount,:vstatus)");
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