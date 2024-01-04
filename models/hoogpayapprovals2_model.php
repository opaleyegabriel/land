<?php
class Hoogpayapprovals2_model extends Model {
    function __construct()
    {
        parent::__construct();
        Session::init();
    }



     public function getpayments(){

        $sth=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE pstatus='' order by created_at");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function approve($data)
    {
         



        $sths=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE pstatus=:p AND orderno =:orderno");
        $sths->execute(array(
            ':p'=>'',
            ':orderno'=>$data['orderno']
            ));
        $rec=$sths->fetch();

        $sth=$this->db->prepare("UPDATE tbl_paymenttracks SET pstatus=:q WHERE orderno=:orderno AND pstatus=:a");        
        $sth->execute(array(
            ':q'=> 'Y',
            ':orderno'=>$data['orderno'],
            ':a'=> ''
            ));      
        
       // print_r($rec);
       // exit();
            $email=$rec['email'];
            $paidby=$rec['sentfrom'];
            $amtpaid=$rec['amount'];
       //Get Other details
            $stho=$this->db->prepare("SELECT * FROM tbl_profile WHERE email=:email");
            $stho->execute(array(
                ':email'=>$email
                ));
            $data=$stho->fetch();

            $name=$data['name'];
            $mobile=$data['phone'];
            //now update the record management
            $sthInsert=$this->db->prepare("INSERT INTO tbl_daily_transaction(name,amount_paid,paid_by,phone,email) VALUES (:name,:amt,:pby,:phone,:email)");
            $sthInsert->execute(array(
                ':name'=>$name,
                ':amt'=>$amtpaid,
                ':pby'=>$paidby,
                ':phone'=>$mobile,
                ':email'=>$email
                ));


        $sth=$this->db->prepare("UPDATE tbl_paymenttracks SET pstatus=:q WHERE orderno=:orderno AND pstatus=:a");        
        $sth->execute(array(
            ':q'=> 'Y',
            ':orderno'=>$data['orderno'],
            ':a'=> ''
            ));        
            $message="Payment Approved";
             $s_status="Yes";
             $d=array('message'=>$message,'s_status'=>$s_status);
             echo json_encode($d);    
        
    }
    public function delete($data)
    {
        $sth=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE orderno=:orderno AND pstatus=:a");        
        $sth->execute(array(            
            ':orderno'=>$data['ordernod'],
            ':a'=> ''
            ));        
            $message="Payment Removed Successfully";
             $s_status="Yes";
             $d=array('message'=>$message,'s_status'=>$s_status);
             echo json_encode($d);    
        
    }
}