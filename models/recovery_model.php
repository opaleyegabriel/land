<?php
class Recovery_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }
   // 08036879070 or 08038336917

    public function dueslist(){
    	$sth=$this->db->prepare("SELECT tbl_dues.bas,tbl_dues.mobile,tbl_dues.plot,tbl_dues.Tamount,tbl_dues.paid,tbl_dues.balance,tbl_dues.due,tbl_bas_target.client_name FROM tbl_dues INNER JOIN tbl_bas_target ON tbl_dues.mobile=tbl_bas_target.client_mobile");
    	$sth->execute(array(
    		':bas'=>session::get("ba_acctno")
    		));
    	return $sth->fetchAll();
    	
    }

    public function details($id){

       $sth=$this->db->prepare("SELECT tbl_bas_target.bas_mobile, tbl_bas_target.client_mobile,tbl_bas_target.client_name,tbl_bas_target.qty,tbl_payments.debit,tbl_payments.credit,tbl_payments.created_at FROM `tbl_bas_target` INNER JOIN tbl_payments ON tbl_payments.mobile=tbl_bas_target.client_mobile WHERE tbl_payments.mobile=:myid
            "); 
       $sth->execute(array(
        ':myid'=>$id
        ));
       return $sth->fetchAll();
    }
}