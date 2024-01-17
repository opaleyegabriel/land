<?php

class Admcustomeraccount_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }
    public function attributedpayments($orderno){
        $order= $orderno .'%';
        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE orderno like :orderno AND paid=:p");
        $sth->execute(array(
            ':orderno'=>$order,
            ':p'=>'Y'
        ));

        $result= $sth->fetch();
        if($result){
            //get payment details
            $select=$this->db->prepare("SELECT a.created_at,a.mobile,a.orderno,b.pqty,b.price,b.orderno,a.debit,a.credit FROM tbl_payments a, tbl_orders b where b.orderno=:orderno and a.mobile=b.mobile and b.paid='Y' and a.mobile=:mobile;");
            $select->execute(array(
                ':orderno'=>$result['orderno'],
                ':mobile'=>$result['mobile']
            ));

            return $select->fetchAll();
        } 
    }
    public function orderdetails($orderno){
        $order= $orderno .'%';
        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE orderno like :orderno AND paid=:p");
        $sth->execute(array(
            ':orderno'=>$order,
            ':p'=>'Y'
        ));
        return $sth->fetch();

    }
    public function listofclients(){
        $sth=$this->db->prepare("SELECT distinct a.username,a.mobile,a.fullname,b.name,b.phone FROM tbl_adm a, tbl_profile b where a.mobile=b.accountofficer and b.accountofficer=:loginmobile;");
        $sth->execute(array(
            ':loginmobile'=>session::get("loginmobile")
        ));
        return $sth->fetchAll();
    }

    public function personalorders($phone){
        $select=$this->db->prepare("SELECT * FROM tbl_orders WHERE paid=:p AND mobile=:mobile");
        $select->execute(array(
            ':p'=>'Y',
            ':mobile'=>$phone
        ));

        return $select->fetchAll();
    }
}