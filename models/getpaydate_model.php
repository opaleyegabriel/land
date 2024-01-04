<?php
  class Getpaydate_Model extends Model{
    function __construct(){
      parent::__construct();
      Session::init();
    }
    public function alluserpay($data){
     $sql=$this->db->prepare("SELECT  distinct(tbl_profile.name, tbl_allocations.plots, tbl_payments.created_at) FROM tbl_payments INNER JOIN tbl_profile ON tbl_payments.mobile = tbl_profile.phone INNER JOIN tbl_allocations ON tbl_payments.mobile = tbl_allocations.mobile WHERE tbl_payments.mobile =:mobile");
     $sql->execute(array(
       ':mobile'=>$data['mobile']
     ));
     return $sql->fetchAll();
       //$result=$sql->fetch();
       //$rows=$sql->rowCount();
     }
  }
