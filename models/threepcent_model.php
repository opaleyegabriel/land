<?php
class Threepcent_Model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    public function calcpcent1()
    {
    	//echo "hello";
    	//exit();
    	
    		$sth=$this->db->prepare("SELECT tbl_bas_target.bas_mobile, tbl_bas_target.client_mobile,tbl_bas_target.client_name,tbl_bas_target.qty,tbl_payments.credit,tbl_payments.created_at FROM tbl_bas_target INNER JOIN tbl_payments ON tbl_payments.mobile=tbl_bas_target.client_mobile
			WHERE (tbl_payments.created_at >='2022-07-01 00:00:00' AND tbl_payments.created_at <='2022-07-31 23:59:09') AND tbl_bas_target.bas_mobile=:acct");
			$sth->execute(array(
				':acct'=>session::get('ba_acctno')
				));
			$result= $sth->fetchAll();
			return $result;		

    }
}