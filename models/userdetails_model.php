
<?php
class Userdetails_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }



public function searchme($data){
	$sth=$this->db->prepare("SELECT tbl_profile.name,tbl_profile.phone,tbl_profile.email,tbl_profile.agentcode,tbl_users.password,tbl_paymenttracks.amount,tbl_paymenttracks.sentfrom,tbl_paymenttracks.accessed,tbl_paymenttracks.pstatus FROM tbl_profile INNER JOIN tbl_users ON tbl_profile.phone=tbl_users.phone INNER JOIN tbl_paymenttracks on tbl_profile.email=tbl_paymenttracks.email WHERE tbl_profile.email=:myemail AND tbl_paymenttracks.accessed='N' AND tbl_paymenttracks.pstatus=''");
	$sth->execute(array(
		':myemail'=>$data['email']
		));

	$results=$sth->fetch();
	//$message="Payment notification not sent due to bad network";
      //       $s_status="No";
        //     $d=array('message'=>$message,'s_status'=>$s_status);
             echo json_encode($results); 
             
}

}