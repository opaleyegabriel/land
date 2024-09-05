<?php

class Admbaw_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

    public function sayhi(){
        
        $sth=$this->db->prepare("SELECT a.id,b.cname,a.mobile,a.amount,a.status FROM tbl_withdrawals a INNER JOIN tbl_affiliate_users b ON a.mobile=b.mobile");
            $sth->execute();
        return ($sth->fetchAll());
    }
    public function reject($mobile){
        $sth=$this->db->prepare("UPDATE tbl_withdrawals SET status='Reject' WHERE (status='Pending' or status='Approved') AND mobile=:mobile");
        $sth->execute(array(
            ':mobile'=>$mobile
        ));
        echo '<script type="text/javascript">';
        echo 'alert("You have successfully rejected selected record");
        window.location.href = "'.URL.'admbaw"';
      echo "</script>";
    }
    public function paid($mobile){
        //get the value
        $sthsel=$this->db->prepare("SELECT * FROM tbl_withdrawals WHERE status='Approved' AND mobile=:mobile");
        $sthsel->execute(array(
            ':mobile'=>$mobile
        ));
        $result=$sthsel->fetch();
        $amt=$result['amount'];
        //print_r($result);
        //echo "I want to check";
        //exit;
        
        $sth=$this->db->prepare("UPDATE tbl_withdrawals SET status='Paid' WHERE  status='Approved' AND mobile=:mobile");
        $sth->execute(array(
            ':mobile'=>$mobile
        ));
        
        
        
        $sthcredit=$this->db->prepare("INSERT INTO tbl_rewards (mobile,client_mobile,client_paid,r7pcent,credit,tag,cashout) VALUES(:mobile,'NIL','0','0',:credit,'0','OUT')");
        $sthcredit->execute(array(
            ':mobile'=>$mobile,
            ':credit'=>$amt
        ));
        echo '<script type="text/javascript">';
        echo 'alert("You have successfully effected Paid Status on selected record");
        window.location.href = "'.URL.'admbaw"';
      echo "</script>";
    }
    public function approve($mobile){
        $sth=$this->db->prepare("UPDATE tbl_withdrawals SET status='Approved' WHERE status='Pending' AND mobile=:mobile");
        $sth->execute(array(
            ':mobile'=>$mobile
        ));
        echo '<script type="text/javascript">';
        echo 'alert("You have successfully approve selected record");
        window.location.href = "'.URL.'admbaw"';
      echo "</script>";
    }





    //SELECT tbl_profile.name,tbl_profile.phone,tbl_profile.email FROM `tbl_profile` INNER JOIN tbl_paymenttracks on tbl_profile.email=tbl_paymenttracks.email



    

   

}