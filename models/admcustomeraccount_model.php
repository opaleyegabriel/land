<?php

class Admcustomeraccount_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }
    public function nameofclient($orderno){
        $sth=$this->db->prepare("SELECT * FROM tbl_profile a INNER JOIN tbl_orders b ON b.mobile=a.phone WHERE b.orderno=:orderno AND b.paid='Y'");
        $sth->execute(array(
            ':orderno'=>$orderno
        ));
        return $sth->fetch();
        
    }

    public function unblockreport($data) {
        //tbl_blockedaccountreport
        $sth=$this->db->prepare("INSERT INTO tbl_blockedaccountreport(mobile,qty,orderno,oldprice,newprice,startdate,enddate,newstartdate,sms,reportedby,branchid,comment) VALUES(:mobile,:qty,:orderno,:oldprice,:newprice,:startdate,:enddate,:newstartdate,:sms,:reportedby,:branchid,:comment)");
        $sth->execute(array(
            ':mobile'=>$data['mobile'],
            ':qty'=>$data['qty'],
            ':orderno'=>$data['orderno'],
            ':oldprice'=>$data['oldprice'],
            ':newprice'=>$data['newprice'],
            ':startdate'=>$data['startdate'],
            ':enddate'=>$data['enddate'],
            ':newstartdate'=>$data['newstartdate'],
            ':sms'=>$data['sms'],
            ':reportedby'=>$data['reportedby'],
            ':branchid'=>$data['branchid'],
            ':comment'=>$data['comment']
        ));

        //now unblock by updating three tables
        //1. tbl_orders
        $ord=$this->db->prepare("UPDATE tbl_orders SET price=:newprice,created_at=:newstartdate WHERE mobile=:mobile AND orderno=:lngorderno AND paid='Y'");
        $ord->execute(array(
            ':newprice'=>$data['newprice'],
            ':newstartdate'=>$data['newstartdate'],
            ':mobile'=>$data['mobile'],
            ':lngorderno'=>$data['lngorderno']
        ));
        //2. tbl_payments
        $nprice=$data['newprice'] * $data['qty'];
        $pay=$this->db->prepare("UPDATE tbl_payments SET price=:newprice WHERE qty > 0 AND orderno=:srtorderno AND mobile=:mobile");
        $pay->execute(array(
            ':newprice'=>$nprice,
            ':srtorderno'=>$data['orderno'],
            ':mobile'=>$data['mobile'],

        ));
        //3. tbl_debt
        //$nprice=$data['newprice'] * $data['qty'];
        $debt=$this->db->prepare("UPDATE tbl_debt SET debit=:newprice WHERE debit > 0 AND orderno=:srtorderno AND mobile=:mobile");
        $debt->execute(array(
            ':newprice'=>$nprice,
            ':srtorderno'=>$data['orderno'],
            ':mobile'=>$data['mobile'],
            
        ));

        echo '<script type="text/javascript">';
        echo 'alert("Report Submitted successfully");
       
      echo </script>'; 
    }
    public function dailyhistory($orderno){

        $search=$this->db->prepare("SELECT * FROM tbl_payments WHERE refid=:refid order by id limit 1");
        $search->execute(array(
            ':refid'=>$orderno
        ));
        $result=$search->fetch();
        //print_r($result);
        //exit;
        if($result){
            $sth=$this->db->prepare("SELECT * FROM tbl_dailyhistory WHERE orderno =:orderno ORDER BY id DESC LIMIT 2");
            $sth->execute(array(
                 ':orderno'=>$result['orderno']
            ));
            return $sth->fetchAll();

        }
    }
    public function transactiondailyreport($data){
        $insert=$this->db->prepare("INSERT INTO tbl_dailyhistory(balance,uptodate,comment,comment2,mobile,orderno,reportby,branchid)
         VALUES(:b,:upd,:co1,:co2,:mobile,:orderno,:rptby,:branchid)");
        $insert->execute(array(
            ':b'=>$data['balance'],
            ':upd'=>$data['uptodate'],
            ':co1'=>$data['comment'],
            ':co2'=>$data['comment2'],
            ':mobile'=>$data['mobile'],
            ':orderno'=>$data['orderno'],
            ':rptby'=>$data['reportedby'],
            ':branchid'=>$data['branchid']
        ));
        echo '<script type="text/javascript">';
			            echo 'alert("Account Unblock  successfully and report submitted");
                       
			          echo </script>';
    }

    public function numofmonthlengthforaproduct($orderno){
        $order= $orderno .'%';
        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE orderno like :orderno AND paid=:p");
        $sth->execute(array(
            ':orderno'=>$order,
            ':p'=>'Y'
        ));

        $result= $sth->fetch();
        if($result){
            $pid=$result['pid'];
            $p=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:id");
            $p->execute(array(
                ':id'=>$pid
            ));
            return $p->fetch();
        }
    }
    public function attributedpayments($orderno){
       /*
        $order= $orderno .'%';
        $sth1=$this->db->prepare("SELECT * FROM tbl_orders WHERE orderno like :orderno AND paid=:p");
        $sth1->execute(array(
            ':orderno'=>$order,
            ':p'=>'Y'
        ));

        $result= $sth1->fetch();
        if($result){
            //get payment details
            /*
            $finalorderno=substr($result['orderno'],12);
            $select=$this->db->prepare("SELECT DISTINCT a.created_at,a.mobile,a.orderno,a.debit,a.credit,a.refid FROM tbl_payments a where a.orderno=:orderno;");
            $select->execute(array(
                ':orderno'=>$finalorderno
                
            ));

            return $select->fetchAll();
        }
            */
        
           // $mobile=$result['mobile'];
        $sth=$this->db->prepare("SELECT tbl_orders.created_at,tbl_orders.pid,tbl_orders.pname,tbl_orders.pqty,tbl_orders.price,tbl_orders.mobile,tbl_payments.credit, tbl_payments.orderno FROM tbl_payments INNER JOIN tbl_orders ON tbl_orders.mobile=tbl_payments.mobile WHERE tbl_orders.orderno=:order AND tbl_orders.paid='Y';");

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $sth->execute(array(

                ':order'=>$orderno
               // ':mobile'=>$mobile
             ));
            return $sth->fetchAll();

        
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