<?php

class Admdailyreport_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
        

    }

    public function rekereport($id){
        $sth=$this->db->prepare("SELECT c.orderno as srtorder,a.pid,a.pname,a.price,a.pqty,(a.price* a.pqty) as totalAmt,sum(c.credit) as Amountpaid, 
        ((a.price* a.pqty)- sum(c.credit)) as balance, a.mobile,a.paid,b.name,a.orderno FROM tbl_orders a, tbl_profile b, tbl_debt c 
        WHERE c.mobile=a.mobile AND a.mobile=b.phone and a.paid='Y' and (a.pid=1 or a.pid=5 OR a.pid=22 or a.pid=23 or a.pid=24)
        GROUP by a.orderno;");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function oshinreport($id){
        $sth=$this->db->prepare("SELECT c.orderno as srtorder,a.pid,a.pname,a.price,a.pqty,(a.price* a.pqty) as totalAmt,sum(c.credit) as Amountpaid, 
        ((a.price* a.pqty)- sum(c.credit)) as balance, a.mobile,a.paid,b.name,a.orderno FROM tbl_orders a, tbl_profile b, tbl_debt c 
        WHERE c.mobile=a.mobile AND a.mobile=b.phone and a.paid='Y' and (a.pid=6 or a.pid=7 OR a.pid=11 or a.pid=25 or a.pid=26)
        GROUP by a.orderno;");
        $sth->execute();
        return $sth->fetchAll();
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
    public function alllands(){
        $sth=$this->db->prepare("SELECT * FROM tbl_products");
        $sth->execute();
        return $sth->fetchAll();
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