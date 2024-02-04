<?php

class Admdailyreport_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
        

    }


    public function updatereport($data){
        $inf=$data['comment2']."  Manager Report :  " . $data['response'];
        $sth=$this->db->prepare("UPDATE tbl_dailyhistory SET rstatus=:rst,comment2=:inf WHERE id=:id");
        $sth->execute(array(
            ':id'=>$data['id'],
            ':inf'=>$inf,
            ':rst'=>"CLOSED"
        ));
    }
    public function viewdailyreports($id){
        $sth=$this->db->prepare("SELECT * FROM tbl_dailyhistory a INNER JOIN tbl_profile b ON a.mobile=b.phone WHERE a.id=:id AND rstatus=:rst");
        $sth->execute(array(
            ':id'=>$id,
            ':rst'=>'N'
        ));
        return $sth->fetch();
    }

    public function dailyclientaccounthistory(){
        $today="%".date("Y-m-d H:i:s");
    $sth=$this->db->prepare("SELECT DISTINCT a.balance,a.uptodate,a.comment,a.mobile,b.name  FROM tbl_dailyhistory a, tbl_profile b WHERE a.rstatus=:rst AND a.mobile=b.phone AND a.branchid=:bid AND a.reportedby:rpt AND a.created_at like :dd");
    $sth->execute(array(
        ':dd'=>$today,
        ':rpt'=>session::get("currentuser"),
        ':bid'=>session::get("branchid"),
        ':rst'=>'N'
    ));

    return $sth->fetchAll();
    }

    public function display($data){
        $dd=date('Y-m-d', strtotime($data['datepicker'])) ."%";
        //print_r($dd);
        //exit;
        
        $sth=$this->db->prepare("SELECT * FROM tbl_dailyhistory WHERE rstatus=:rst AND branchid=:br AND created_at like :cat");
        $sth->execute(array(
            ':br'=>$data['branch'],
            ':cat'=>$dd,
            ':rst'=>'N'
        ));
        return $sth->fetchAll();
    }
}