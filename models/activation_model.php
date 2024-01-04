<?php
class Activation_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }


    //SELECT tbl_profile.name,tbl_profile.phone,tbl_profile.email FROM `tbl_profile` INNER JOIN tbl_paymenttracks on tbl_profile.email=tbl_paymenttracks.email

    public function listofactivations(){
    	$sth=$this->db->prepare("SELECT * FROM tbl_activations");
    	$sth->execute();
    	return $sth->fetchAll();
    }
    public function submit($data){
    	$sth=$this->db->prepare("delete FROM tbl_activations WHERE mobile=:mobile ");
    	$sth->execute(array(
    		':mobile'->$data['mobile']
    		));
    	$sthi=$this->db->prepare("INSERT INTO tbl_activations(fname,mobile,client1,client2,client3,client4,client5,client6,client7,client8,client9,client10) VALUES (:fn,:mob,:c1,:c2,:c3,:c4,:c5,:c6,:c7,:c8,:c9,:c10)");
    	$sthi->execute(array(
    		':fn'=>$data['fname'],
    		':mob'=>$data['mobile'],
    		':c1'=>$data['client1'],
    		':c2'=>$data['client2'],
    		':c3'=>$data['client3'],
    		':c4'=>$data['client4'],
    		':c5'=>$data['client5'],
    		':c6'=>$data['client6'],
    		':c7'=>$data['client7'],
    		':c8'=>$data['client8'],
    		':c9'=>$data['client9'],
    		':c10'=>$data['client10']
    		));
    	//create session for informations
    	session::set("saved",true);
    	header('location: '. URL . 'activation');


    }
}