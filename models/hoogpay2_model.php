<?php

class Hoogpay2_model extends Model {

    function __construct()

    {

        parent::__construct();

        Session::init();

    }



    public function getorders(){



        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE mobile=:m AND paid='N'");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':m'=> Session::get('lphone')

            ));

        return $sth->fetchAll();

    }



    public function getordersbanktopay(){

        $orderno="%".Session::get('orderno');

        $mobile=Session::get('lphone');

        $sth=$this->db->prepare('SELECT tbl_orders.pid,tbl_orders.orderno,tbl_orders.mobile,tbl_orders.paid,tbl_products.id,tbl_products.AgentPcent,tbl_products.Bank,tbl_products.AcctNum FROM tbl_orders INNER JOIN tbl_products ON tbl_orders.pid=tbl_products.id WHERE tbl_orders.mobile="'.$mobile.'" AND tbl_orders.orderno like "'. $orderno .'";');
        //$sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        return $sth->fetchAll();

    }

    public function paymenttrackcheck($data){

     

       

     /*

          //delete from the tracking table

             $sthtdel=$this->db->prepare("SELECT * FROM tbl_profile a, tbl_paymenttracks b where a.phone=:phone and a.email=b.email and b.accessed='N'");

             $sthtdel->execute(array(

               ':phone'=>Session::get('lphone')

             ));

             $findel=$sthtdel->fetch();

             if($findel){

               //now delete it

               $nowdel=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE email=:email and accessed='N'");

               $nowdel->execute(array(

                   ':email'=>$findel['email']

               ));

             }

   

*/



        $sth=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:e AND pstatus=:y and accessed=:n");        

        $sth->execute(array(

            ':e'=> $data['email'],            

            ':y'=> 'Y',

            ':n'=>'N'

            ));

        $rec= $sth->fetch();

        if($rec){

            $message="Payment Approved";

             $s_status="Yes";

             $d=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($d);    

        }else{

            $message="Payment Not Approved";

             $s_status="No";

             $d=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($d); 

        }

    }

    public function check4approval($data){

        $sth=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:e and orderno=:o AND pstatus=:y");        

        $sth->execute(array(

            ':e'=> $data['email'],

            ':o'=>$data['orderno'],

            ':y'=> 'Y'

            ));

        $rec= $sth->fetch();

        if($rec){

            $message="Payment Approved";

             $s_status="Yes";

             $d=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($d);    

        }

    }

    public function paymenttrack($data){

        /* 

        //delete all existing order not approved

        $sthdelete=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:phone AND paid=:p");

        $sthdelete->execute(array(

          ':phone'=>Session::get('lphone'),

          ':p'=>'N'

          ));

          */

          //delete from the tracking table

             $sthtdel=$this->db->prepare("SELECT * FROM tbl_profile a, tbl_paymenttracks b where a.phone=:phone and a.email=b.email and b.accessed='N'");

             $sthtdel->execute(array(

               ':phone'=>Session::get('lphone')

             ));

             $findel=$sthtdel->fetch();

             if($findel){

               //now delete it

               $nowdel=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE email=:email and accessed='N'");

               $nowdel->execute(array(

                   ':email'=>$findel['email']

               ));

             }

   



      





        $sths1=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:ord AND accessed=:ps");

        $sths1->execute(array(

            ':ord'=>$data['email'],

            ':ps'=>'N'

            ));

        $rec_exit=$sths1->fetch();

        if($rec_exit){

            $message="unconfirmed Payment Exist";

             $unconfirmed="Yes";

             $d=array('message'=>$message,'unconfirmed'=>$s_status);

             echo json_encode($d);   

        }else{            



        $sth1=$this->db->prepare("INSERT INTO tbl_paymenttracks (email,amount,orderno,sentfrom,accessed,pstatus) VALUES (:email,:amount,:orderno,:sentfrom,:accessed,:pstatus)");

        $sth1->execute(array(

            ':email'=>$data['email'],

            ':amount'=>$data['amount'],

            ':orderno'=>$data['orderno'],

            ':sentfrom'=>$data['sentfrom'],

            ':accessed'=>'N',

            ':pstatus'=>''            

            ));



       



        

        $sth=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:e AND orderno=:orderno and pstatus=:p ");        

        $sth->execute(array(

            ':e'=> $data['email'],

            ':orderno'=>$data['orderno'],

            ':p'=> ''

            ));

        $rec= $sth->fetch();

        if($rec){

            $message="Waiting for payment auto approval";

             $s_status="Yes";

             $d=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($d);    

        }else

        {

            $message="Payment notification not sent due to bad network";

             $s_status="No";

             $d=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($d); 

        }

        }

}





public function payagain_new($data){

   /*

     //delete all existing order not approved

        $sthdelete=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:phone AND paid=:p");

        $sthdelete->execute(array(

          ':phone'=>Session::get('lphone'),

          ':p'=>'N'

          ));

 

          //delete from the tracking table

          $sthtdel=$this->db->prepare("SELECT * FROM tbl_profile a, tbl_paymenttracks b where a.phone=:phone and a.email=b.email and b.accessed='N'");

          $sthtdel->execute(array(

            ':phone'=>Session::get('lphone')

          ));

          $findel=$sthtdel->fetch();

          if($findel){

            //now delete it

            $nowdel=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE email=:email and accessed='N'");

            $nowdel->execute(array(

                ':email'=>$findel['email']

            ));

          }

          */



         $sthpaytracks=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:o AND accessed=:n AND pstatus=:y");

            $sthpaytracks->execute(array(                           

                ':o'=>$data['email'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

            $ok=$sthpaytracks->fetch();

        if($ok){



            //get existing orderno

            $s=$this->db->prepare("SELECT DISTINCT orderno FROM tbl_debt WHERE mobile=:m");

            $s->setFetchMode(PDO::FETCH_ASSOC);

            $s->execute(array(

                ':m'=>$data['mobile']

                ));

            $myrec=$s->fetch();

            if($myrec){

                $orderno=$myrec['orderno'];



                

                $sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES (:mobile,:orderno,:refid,:qty,:price,:debit,:credit)");

        $sth->execute(array(

            ':mobile'=>$data['mobile'],

            ':orderno'=>$data['orderno'],

            ':refid'=>$data['refid'],

            ':qty'=>0,

            ':price'=>0,

            ':debit'=>0,

            ':credit'=>$data['credit']

            ));



        //save extra

        $sthe=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:mobile,:orderno,:debit,:credit,:debt)");

        $sthe->execute(array(

            ':mobile'=>$data['mobile'],

            ':orderno'=>$orderno,

            ':debit'=>0,

            ':credit'=>$data['credit'],

            ':debt'=>0

            ));









            //calculate referer percentage

        //find the referer

        $sthfindreferer=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:m");

        $sthfindreferer->execute(array(

            ':m'=>$data['mobile']

            ));

        $referer=$sthfindreferer->fetch();

        if($referer){

            //Insert record in reward table

            $agt=((Session::get("agentpcent"))/100);

            $amt=($agt * $data['credit']);

             $reward=$this->db->prepare("INSERT INTO tbl_rewards (mobile,client_mobile,client_paid,r7pcent,credit,tag,cashout) VALUES(:mob,:cmob,:cpaid,:r7,:cr,:tag,:csh)");

            $reward->execute(array(

                ':mob'=>$referer['agentcode'],

                ':cmob'=>$data['mobile'],

                ':cpaid'=>$data['credit'],
                ':r7'=>$amt,
                ':cr'=>0,
                ':tag'=>'AP',
                ':csh'=>'N'

                ));

        }





            //mark as access in tbl_paymenttracks

            $sthpaytrack=$this->db->prepare("UPDATE tbl_paymenttracks SET accessed=:accessed WHERE email=:o AND accessed=:n AND pstatus=:y");

            $sthpaytrack->execute(array(

                ':accessed'=>'Y',               

                ':o'=>$data['email'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

        

                $message="Your Payment  for land purchase is succefully accepted";

                     $s_status="Yes";

                     $data=array('message'=>$message,'s_status'=>$s_status);

                     echo json_encode($data);   
            }                

        }             

    }











    public function payagain($data){

        /*

         //delete all existing order not approved

        $sthdelete=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:phone AND paid=:p");

        $sthdelete->execute(array(

          ':phone'=>Session::get('lphone'),

          ':p'=>'N'

          ));

*/

        

         $sthpaytracks=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE orderno=:o AND accessed=:n AND pstatus=:y");

            $sthpaytracks->execute(array(                           

                ':o'=>$data['refid'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

            $ok=$sthpaytracks->fetch();

        if($ok){

                $sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES (:mobile,:orderno,:refid,:qty,:price,:debit,:credit)");

        $sth->execute(array(

            ':mobile'=>$data['mobile'],

            ':orderno'=>$data['orderno'],

            ':refid'=>$data['refid'],

            ':qty'=>0,

            ':price'=>0,

            ':debit'=>0,

            ':credit'=>$data['credit']

            ));



        //save extra

        $sthe=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:mobile,:orderno,:debit,:credit,:debt)");

        $sthe->execute(array(

            ':mobile'=>$data['mobile'],

            ':orderno'=>$data['orderno'],

            ':debit'=>0,

            ':credit'=>$data['credit'],

            ':debt'=>0

            ));



              //calculate referer percentage

        //find the referer

        $sthfindreferer=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:m");

        $sthfindreferer->execute(array(

            ':m'=>$data['mobile']

            ));

        $referer=$sthfindreferer->fetch();

        if($referer){

            //Insert record in reward table

            $agt=((Session::get("agentpcent"))/100);

            $amt=($agt * $data['credit']);

            $reward=$this->db->prepare("INSERT INTO tbl_rewards (mobile,client_mobile,client_paid,r7pcent,credit,tag,cashout) VALUES(:mob,:cmob,:cpaid,:r7,:cr,:tag,:csh)");

            $reward->execute(array(

                ':mob'=>$referer['agentcode'],

                ':cmob'=>$data['mobile'],

                ':cpaid'=>$data['credit'],
                ':r7'=>$amt,
                ':cr'=>0,
                ':tag'=>'AP',
                ':csh'=>'N'

                ));

        }







            //mark as access in tbl_paymenttracks

            $sthpaytrack=$this->db->prepare("UPDATE tbl_paymenttracks SET accessed=:accessed WHERE orderno=:o AND accessed=:n AND pstatus=:y");

            $sthpaytrack->execute(array(

                ':accessed'=>'Y',               

                ':o'=>$data['refid'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

        

        $message="Your Payment  for land purchase is successfully accepted";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data);   



            }









             

    }

}