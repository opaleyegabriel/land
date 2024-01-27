<?php

class Admdailyreport_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
        

    }


    public function dailyclientaccounthistory(){
        $today="%".date("Y-m-d H:i:s");
    $sth=$this->db->prepare("SELECT DISTINCT a.balance,a.uptodate,a.comment,a.mobile,b.name  FROM tbl_dailyhistory a, tbl_profile b WHERE a.mobile=b.phone AND a.branchid=:bid AND a.reportedby:rpt AND a.created_at like :dd");
    $sth->execute(array(
        ':dd'=>$today,
        ':rpt'=>session::get("currentuser"),
        ':bid'=>session::get("branchid")
    ));

    return $sth->fetchAll();
    }

    public function display($data){
        $dd=date('Y-m-d', strtotime($data['datepicker'])) ."%";
        //print_r($dd);
        //exit;
        
        $sth=$this->db->prepare("SELECT * FROM tbl_dailyhistory WHERE branchid=:br AND created_at like :cat");
        $sth->execute(array(
            ':br'=>$data['branch'],
            ':cat'=>$dd
        ));
        return $sth->fetchAll();
    }
}