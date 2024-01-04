<?php
class Payinfo_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }
    public function searchFunction($data){
    	$sth=$this->db->prepare("SELECT tbl_bas_target.bas_mobile, tbl_bas_target.client_mobile,tbl_bas_target.client_name,tbl_bas_target.qty,tbl_payments.debit,tbl_payments.credit,tbl_payments.created_at FROM `tbl_bas_target` INNER JOIN tbl_payments ON tbl_payments.mobile=tbl_bas_target.client_mobile WHERE tbl_payments.mobile=:cmobile");
    	$sth->execute(array(
    		':cmobile'=>$data['mobile']
    		));
    	return $sth->fetchAll();
    }
}