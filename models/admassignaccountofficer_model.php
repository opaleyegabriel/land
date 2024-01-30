<?php

class Admassignaccountofficer_model extends Model {

    function __construct()
    {
        parent::__construct();
        session::init();
    }
    public function alllist(){               
        $sth=$this->db->prepare("SELECT DISTINCT a.pid,a.pname,a.price,a.pqty,a.mobile,a.paid,b.name,b.accountofficer FROM tbl_orders a, tbl_profile b WHERE b.accountofficer='' AND a.mobile=b.phone and a.paid='Y' and (a.pid=1 or a.pid=2 or a.pid=3 or a.pid=4 or a.pid=5 or a.pid=6 or a.pid=7 or a.pid=8 or a.pid=9 or a.pid=10 or a.pid=11 or a.pid=14 or a.pid=22 or a.pid=23 or a.pid=24 or a.pid=25 or a.pid=26 or a.pid=27 or a.pid=28)");
         $sth->execute();        
        return $sth->fetchAll();
    }
    public function alllist_osogbo(){
        $sth=$this->db->prepare("SELECT DISTINCT a.pid,a.pname,a.price,a.pqty,a.mobile,a.paid,b.name,b.accountofficer FROM `tbl_orders` a, tbl_profile b WHERE b.accountofficer='' AND a.mobile=b.phone and a.paid='Y' and (a.pid=12 or a.pid=13 or a.pid=15 or a.pid=16 or a.pid=17 or a.pid=18);");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function alllist_ibadan(){
        $sth=$this->db->prepare("SELECT DISTINCT a.pid,a.pname,a.price,a.pqty,a.mobile,a.paid,b.name,b.accountofficer FROM `tbl_orders` a, tbl_profile b WHERE b.accountofficer='' AND a.mobile=b.phone and a.paid='Y' and (a.pid=19 or a.pid=20 or a.pid=21);");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function selectclient($mobile){
        $sth=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:mobile");
        $sth->execute(array(
            ':mobile'=>$mobile
        ));
        return $sth->fetch();
    }

    public function saveaccountofficer($data){
        $sth=$this->db->prepare("UPDATE tbl_profile SET accountofficer=:aof WHERE phone=:phn");
        $sth->execute(array(
            ':aof'=>$data['accountofficer'],
            ':phn'=>$data['phone']
        ));
        echo '<script type="text/javascript">';
			            echo 'alert("Account Officer updated");
			            window.location.href = "'.URL.'admassignaccountofficer";';
			          echo "</script>";
    }

}