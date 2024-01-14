<?php

class Svfeedback_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();

    }
	public function treatfeedback($data){
		$sth=$this->db->prepare("UPDATE tbl_sitevisit SET admincomment=:adc, vstatus=:vst WHERE id=:id");
		$sth->execute(array(
			':adc'=>$data['admincomment'],
			':vst'=>'TREATED',
			':id'=>$data['id']
		));

		echo '<script type="text/javascript">';
			            echo 'alert("Site Visitation Feedback sucessfully marked treated");
			            window.location.href = "'.URL.'svfeedback";';
			          echo "</script>";
	}
	public function requestlist(){
		
		$sth=$this->db->prepare("SELECT * FROM tbl_sitevisit WHERE vstatus <>:vst ORDER BY id DESC");
		$sth->execute(array(
			':vst'=>'TREATED'
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
}