<?php

class Unapprovedpays_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
        

    }
    public function unapprovedlist(){
        $sth=$this->db->prepare("SELECT * FROM tbl_prepayment WHERE usedstatus='N';");
        $sth->execute();
        //$sth=$this->db->prepare("SELECT DISTINCT a.clientname,a.amount,a.usedstatus,a.usedby,b.name FROM tbl_prepayment a, tbl_profile b WHERE a.usedby=b.phone AND a.usedstatus='Y';");
        
        return $sth->fetchAll();
    }

}