<?php

class Appayment_model extends Model {

    function __construct()
    {
        parent::__construct();
        session::init();
    }
    public function approvedlist(){               
        $sth=$this->db->prepare("SELECT DISTINCT a.clientname,a.amount,a.usedstatus,a.usedby,a.created_at,b.name FROM tbl_prepayment a, tbl_profile b WHERE a.usedby=b.phone AND a.usedstatus='Y';");
         $sth->execute();        
        return $sth->fetchAll();
    }

}