<?php

class Hoogpay_model extends Model {

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



        $sth=$this->db->prepare("SELECT a.pid,a.mobile,a.paid,b.AgentPcent,b.Bank,b.AcctNum FROM `tbl_orders` a, tbl_products b where a.pid=b.id AND a.mobile=:mm and a.paid='N'");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':mm'=> Session::get('lphone')

            ));

        return $sth->fetchAll();

    }





    public function paymenttrackcheck($data){

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



    	$sth1=$this->db->prepare("INSERT INTO tbl_paymenttracks (email,amount,orderno,sentfrom,accessed,pstatus) VALUES (:email,:amount,:orderno,:sentfrom,:accessed,:pstatus)");       $sth1->execute(array(

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







       public function savepayment_new($data)

    {

        $sthpaytracks=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:o AND accessed=:n AND pstatus=:y");

            $sthpaytracks->execute(array(                           

                ':o'=>$data['email'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

            $ok=$sthpaytracks->fetch();

            if($ok){



                //start here



        $sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES(:m,:o,:r,:q,:p,:d,:c)");

        $sth->execute(array(

            ':m'=>$data['mobile'],

            ':o'=>$data['orderno'],

            ':r'=>$data['refid'],            

            ':q'=>$data['qty'],

            ':p'=>$data['price'],

            ':d'=>$data['debit'],

            ':c'=>$data['credit']

            ));       

        $sthdebt=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:m,:o,:d,:c,:db)");

        $sthdebt->execute(array(

            ':m'=>$data['mobile'],

            ':o'=>$data['orderno'],

            ':d'=>$data['debit'],

            ':c'=>$data['credit'],

            ':db'=>$data['credit']

            ));







       

        //update order with the above other number

        $sthupdate=$this->db->prepare("UPDATE tbl_orders SET paid=:paid WHERE orderno=:ord");

        $sthupdate->execute(array(

            ':paid'=>'Y',            

            ':ord'=>$data['refid']

            ));



        //allocate plot(s)

        $sthselect=$this->db->prepare("SELECT tbl_allocationtrack.pid,tbl_allocationtrack.actual,tbl_allocationtrack.taken,tbl_orders.orderno FROM tbl_allocationtrack INNER JOIN tbl_orders ON tbl_allocationtrack.pid=tbl_orders.pid WHERE tbl_orders.orderno=:ord");

        $sthselect->execute(array(

            ':ord'=>$data['refid']

            ));

        $result=$sthselect->fetch();

        if($result){

            $taken=0;

            $plot=0;

            $actual=0;

            $pid=$result['pid'];

            //before further this calculate reward according to pid

                

                    
            //end the calculation here

            $actual=$result['actual'];

            $taken=$result['taken'];

            

            $took=$taken + $data['qty'];



            for ($i=0; $i < $data['qty']; $i++) { 

                 $allocate= " Plot " .++$taken ;

                 //check if allocation exist before

                 /*

                 $sthe=$this->db->prepare("SELECT * FROM tbl_allocations WHERE mobile=:mobile AND orderno=:ord");

                 $sthe->execute(array(                    

                    ':mobile'=>$data['mobile'],

                    ':ord'=>$data['refid']

                    ));

                 $results=$sthe->fetch();

                 if($results){

                        //Update,  

                        $sthallUpdate=$this->db->prepare("UPDATE tbl_allocations SET Plot=:plots WHERE mobile=:mobile AND orderno=:ord");

                        $sthallUpdate->execute(array(

                            ':plots'=>$allocate,

                            ':mobile'=>$data['mobile'],

                            ':ord'=>$data['refid']

                            ));

                 }else

                 {

                    */

                        //else Insert new allocation  

                        $sthallinsert=$this->db->prepare("INSERT INTO tbl_allocations (pid,taken,plots,orderno,mobile) VALUES(:pid,:taken,:plots,:ord,:mobile)");

                        $sthallinsert->execute(array(

                            ':pid'=>$result['pid'],

                            ':taken'=>$data['qty'],

                            ':plots'=>$allocate,                           

                            ':ord'=>$data['refid'],

                             ':mobile'=>$data['mobile']

                            )); 

                 //}

            }

            //now update tbl_allocationtrack

            $sthuu=$this->db->prepare("UPDATE tbl_allocationtrack SET taken=:tk WHERE pid=:pid");

            $sthuu->execute(array(

                ':tk'=>$took,

                ':pid'=>$result['pid']

                ));   



            //update product qty

            //select the product, get the existing value, and minus then update

            $sthp=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:id");

            $sthp->execute(array(

                ':id'=>$result['pid']

                ));

            $productrec=$sthp->fetch();

            if($productrec){

                $left=$productrec["quantity"]-$data['qty'];

                $sthpqty=$this->db->prepare("UPDATE tbl_products SET quantity=:qty WHERE id=:p");

                $sthpqty->execute(array(

                ':qty'=>$left,

                ':p'=>$result['pid']

                ));







                //update reward
                 //find the referer
                        $agt=($productrec["agentpcent"]/100);                        

                        $sthfindreferer=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:m");

                        $sthfindreferer->execute(array(

                            ':m'=>$data['mobile']

                            ));

                        $referer=$sthfindreferer->fetch();

                        if($referer){

                            //Insert record in reward table

                           // $agt=((Session::get("agentpcent"))/100);

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

    

            }

            



            //mark as access in tbl_paymenttracks

            $sthpaytrack=$this->db->prepare("UPDATE tbl_paymenttracks SET accessed=:accessed WHERE email=:o AND accessed=:n AND pstatus=:y");

            $sthpaytrack->execute(array(

                ':accessed'=>'Y',               

                ':o'=>$data['email'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

        

            $message="Your startup Payment is succefully";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data);        //

        }

                //end here

            }







        

    }















       public function savepayment($data)

    {

        $sthpaytracks=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE orderno=:o AND accessed=:n AND pstatus=:y");

            $sthpaytracks->execute(array(                           

                ':o'=>$data['orderno'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

            $ok=$sthpaytracks->fetch();

            if($ok){



                //start here



        $sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES(:m,:o,:r,:q,:p,:d,:c)");

        $sth->execute(array(

            ':m'=>$data['mobile'],

            ':o'=>$data['orderno'],

            ':r'=>$data['refid'],            

            ':q'=>$data['qty'],

            ':p'=>$data['price'],

            ':d'=>$data['debit'],

            ':c'=>$data['credit']

            ));       

        $sthdebt=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:m,:o,:d,:c,:db)");

        $sthdebt->execute(array(

            ':m'=>$data['mobile'],

            ':o'=>$data['orderno'],

            ':d'=>$data['debit'],

            ':c'=>$data['credit'],

            ':db'=>$data['credit']

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

            $reward=$this->db->prepare("INSERT INTO tbl_rewards (mobile,client_mobile,client_paid,r7pcent,cashout) VALUES(:mob,:cmob,:cpaid,:r7,:csh)");

            $reward->execute(array(

                ':mob'=>$referer['agentcode'],

                ':cmob'=>$data['mobile'],

                ':cpaid'=>$data['credit'],

                ':r7'=>$amt,

                ':csh'=>'N'

                ));

        }





        //update order with the above other number

        $sthupdate=$this->db->prepare("UPDATE tbl_orders SET paid=:paid WHERE orderno=:ord");

        $sthupdate->execute(array(

            ':paid'=>'Y',            

            ':ord'=>$data['refid']

            ));



        //allocate plot(s)

        $sthselect=$this->db->prepare("SELECT tbl_allocationtrack.pid,tbl_allocationtrack.actual,tbl_allocationtrack.taken,tbl_orders.orderno FROM tbl_allocationtrack INNER JOIN tbl_orders ON tbl_allocationtrack.pid=tbl_orders.pid WHERE tbl_orders.orderno=:ord");

        $sthselect->execute(array(

            ':ord'=>$data['refid']

            ));

        $result=$sthselect->fetch();

        if($result){

            $taken=0;

            $plot=0;

            $actual=0;

            $pid=$result['pid'];

            $actual=$result['actual'];

            $taken=$result['taken'];

            

            $took=$taken + $data['qty'];



            for ($i=0; $i < $data['qty']; $i++) { 

                 $allocate= " Plot " .++$taken ;

                 //check if allocation exist before

                 /*

                 $sthe=$this->db->prepare("SELECT * FROM tbl_allocations WHERE mobile=:mobile AND orderno=:ord");

                 $sthe->execute(array(                    

                    ':mobile'=>$data['mobile'],

                    ':ord'=>$data['refid']

                    ));

                 $results=$sthe->fetch();

                 if($results){

                        //Update,  

                        $sthallUpdate=$this->db->prepare("UPDATE tbl_allocations SET Plot=:plots WHERE mobile=:mobile AND orderno=:ord");

                        $sthallUpdate->execute(array(

                            ':plots'=>$allocate,

                            ':mobile'=>$data['mobile'],

                            ':ord'=>$data['refid']

                            ));

                 }else

                 {

                    */

                        //else Insert new allocation  

                        $sthallinsert=$this->db->prepare("INSERT INTO tbl_allocations (pid,taken,plots,orderno,mobile) VALUES(:pid,:taken,:plots,:ord,:mobile)");

                        $sthallinsert->execute(array(

                            ':pid'=>$result['pid'],

                            ':taken'=>$data['qty'],

                            ':plots'=>$allocate,                           

                            ':ord'=>$data['refid'],

                             ':mobile'=>$data['mobile']

                            )); 

                 //}

            }

            //now update tbl_allocationtrack

            $sthuu=$this->db->prepare("UPDATE tbl_allocationtrack SET taken=:tk WHERE pid=:pid");

            $sthuu->execute(array(

                ':tk'=>$took,

                ':pid'=>$result['pid']

                ));   



            //update product qty

            //select the product, get the existing value, and minus then update

            $sthp=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:id");

            $sthp->execute(array(

                ':id'=>$result['pid']

                ));

            $productrec=$sthp->fetch();

            if($productrec){

                $left=$productrec["quantity"]-$data['qty'];

                $sthpqty=$this->db->prepare("UPDATE tbl_products SET quantity=:qty WHERE id=:p");

                $sthpqty->execute(array(

                ':qty'=>$left,

                ':p'=>$result['pid']

                ));



                /////Start reward

                //update reward
                 //find the referer
                        $agt=(($productrec["AgentPcent"])/100);                        

                        $sthfindreferer=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:m");

                        $sthfindreferer->execute(array(

                            ':m'=>$data['mobile']

                            ));

                        $referer=$sthfindreferer->fetch();

                        if($referer){

                            //Insert record in reward table

                           // $agt=((Session::get("agentpcent"))/100);

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









    

            }

            



            //mark as access in tbl_paymenttracks

            $sthpaytrack=$this->db->prepare("UPDATE tbl_paymenttracks SET accessed=:accessed WHERE orderno=:o AND accessed=:n AND pstatus=:y");

            $sthpaytrack->execute(array(

                ':accessed'=>'Y',               

                ':o'=>$data['orderno'],

                ':n'=>'N',

                ':y'=>'Y'

                ));

        

            $message="Your startup Payment is succefully";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data);        //

        }

                //end here

            }







        

    }



    

}