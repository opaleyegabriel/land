<?php
class Admbawithraws_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();
    }

        public function listofwithdrawals(){
           // $sth=$this->db->prepare("SELECT a.id,b.cname,a.mobile,a.amount,a.status FROM tbl_withdrawals a INNER JOIN tbl_affiliate_users b ON a.mobile=b.mobile");
            //$sth->execute();
            //print_r($sth->fetchAll());
            return "hello";
            //return $sth->fetchAll();
        }

    }

