<?php
class Subcheckout_Model extends Model {
    function __construct()
    {
        parent::__construct();
        Session::init();
    }




public function payagain($data){
			//print_r($data);
			//exit();
	
			$sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES (:mobile,:orderno,:refid,:qty,:price,:debit,:credit)");

	        $sth->execute(array(

	            ':mobile'=>$data['mobile'],

	            ':orderno'=>$data['orderno'],

	            ':refid'=>$data['refid'],

	            ':qty'=>0,

	            ':price'=>0,

	            ':debit'=>0,

	            ':credit'=>$data['credit']

	            ));



		        //save extra
		        $sthe=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:mobile,:orderno,:debit,:credit,:debt)");

		        $sthe->execute(array(

		            ':mobile'=>$data['mobile'],

		            ':orderno'=>$data['orderno'],

		            ':debit'=>0,

		            ':credit'=>$data['credit'],

		            ':debt'=>0

		            ));



        	      //calculate referer percentage

		        //find the referer

		        $sthfindreferer=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:m");

		        $sthfindreferer->execute(array(

		            ':m'=>$data['mobile']

		            ));

		        $referer=$sthfindreferer->fetch();

		        if($referer){

		            //Insert record in reward table

		            $agt=((Session::get("agentpcent"))/100);

		            $amt=($agt * $data['credit']);

		            $reward=$this->db->prepare("INSERT INTO tbl_rewards (mobile,client_mobile,client_paid,r7pcent,credit,tag,cashout) VALUES(:mob,:cmob,:cpaid,:r7,:cr,:tag,:csh)");

		            $reward->execute(array(

		                ':mob'=>$referer['agentcode'],

		                ':cmob'=>$data['mobile'],

		                ':cpaid'=>$data['credit'],
		                ':r7'=>$amt,
		                ':cr'=>0,
		                ':tag'=>'AP',
		                ':csh'=>'N'

		                ));

		        }


	        $message="Your Payment  for land purchase is successfully accepted";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data);   



    }
}








