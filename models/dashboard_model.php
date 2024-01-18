<?php

class Dashboard_Model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }



    public function renewnow($data){
        //insert imto tbl_old_order
        $oda="%".$data['orderno']."%";
        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE orderno like :oda AND mobile=:mobile AND paid='Y'");
        $sth->execute(array(
                ':mobile'=>session::get('lphone'),
                ':oda'=> $oda
            ));
        $result=$sth->fetch();
        if($result){
            $corderno=$result['orderno'];
            $price=$result['price'];
            $olddate=$result['created_at'];
            $pid=$result['pid'];
            $qty=$result['pqty'];
             //insert imto tbl_old_order
            $sthinsert=$this->db->prepare("INSERT INTO tbl_old_order (orderno,pricepu,old_date) VALUES(:orderno,:pricepu,:old_date)");
            $sthinsert->execute(array(
                ':orderno'=>$corderno,
                ':pricepu'=>$price,
                ':old_date'=>$olddate
                ));

             //update tbl_order
            //get current price
            $sthCurrentPrice=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:pid");
            $sthCurrentPrice->execute(array(
                ':pid'=>$pid
                ));
            $finds=$sthCurrentPrice->fetch();
            if($finds){
                $currentprice=$finds['price'];
            }
            $ndate=date_format($data['newstartdate'],"Y-m-d H:i:s");
             $sthOrder=$this->db->prepare("UPDATE tbl_orders SET price=:price,created_at=:ndate WHERE mobile=:mobile AND orderno=:orderno AND paid='Y'");
             $sthOrder->execute(array(
                ':price'=>$currentprice,
                ':ndate'=>$ndate,
                ':mobile'=>session::get('lphone'),
                ':orderno'=>$corderno
                ));

             //update tbl_debt
             $tamt=$currentprice * $qty;
              $sthDebt=$this->db->prepare("UPDATE tbl_debt SET debit=:debit,created_at=:ndate WHERE mobile=:mobile AND orderno=:orderno AND credit >:credit AND debt >:debt");
             $sthOrder->execute(array(
                ':debit'=>$tamt,
                ':ndate'=>$ndate,
                ':mobile'=>session::get('lphone'),
                ':orderno'=>$data['orderno'],
                ':credit'=>0,
                ':debt'=>0
                ));        
             
              $sthDebt=$this->db->prepare("UPDATE tbl_payments SET price=:price,debit=:debit,created_at=:ndate WHERE mobile=:mobile AND orderno=:orderno AND qty >:qty");
             $sthOrder->execute(array(
                ':debit'=>$tamt,
                ':ndate'=>$ndate,
                ':mobile'=>session::get('lphone'),
                ':orderno'=>$data['orderno'],
                ':qty'=>0,
                ':price'=>$currentprice
                ));
        }
    }



    public function dateofcontractactivation(){

        $sth=$this->db->prepare("SELECT DISTINCT a.pid,a.orderno,a.mobile,b.created_at,c.pplannum FROM tbl_orders a, tbl_payments b, tbl_products c WHERE a.mobile=b.mobile AND a.orderno=b.refid and b.mobile =:mobile and b.qty >0 and a.pid=c.id;");

        $sth->execute(array(

            ':mobile'=>session::get('lphone')

            ));



        return $sth->fetch();

    }





    public function offset($data){

        $sth=$this->db->prepare("INSERT INTO  tbl_reward_out (mobile,amount,pstatus,bank) VALUES (:mobile,:amount,:pstatus,:bank)");

        $sth->execute(array(

            ':mobile'=>session::get('lphone'),

            ':amount'=>$data['sevenpcent'],

            ':pstatus'=>'offset',

            ':bank'=>"NIL"

            ));



        //tbl_debt

            $sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,qty,price,debit,credit) VALUES (:mobile,:orderno,:refid,:qty,:price,:debit,:credit)");

        $sth->execute(array(

            ':mobile'=>session::get('lphone'),

            ':orderno'=>$data['orderno'],

            ':refid'=>$data['orderno'],

            ':qty'=>0,

            ':price'=>0,

            ':debit'=>0,

            ':credit'=>$data['sevenpcent']

            ));



        //save extra

        $sthe=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES(:mobile,:orderno,:debit,:credit,:debt)");

        $sthe->execute(array(

            ':mobile'=>session::get('lphone'),

            ':orderno'=>$data['orderno'],

            ':debit'=>0,

            ':credit'=>$data['sevenpcent'],

            ':debt'=>0

            ));





         //update reward table to be R = request

        $sthr=$this->db->prepare("UPDATE tbl_rewards SET cashout=:cash WHERE mobile=:mobile AND cashout='N'");

        $sthr->execute(array(

            ':cash'=>"P",

            ':mobile'=>session::get('lphone')

        ));

        $message="Your Payment  through Bonus Offset for land purchase is succefully accepted";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data); 

       

    }



    public function withdraw($data)

    {

        $sth=$this->db->prepare("INSERT INTO  tbl_reward_out (mobile,amount,pstatus,bank) VALUES (:mobile,:amount,:pstatus,:bank)");

        $sth->execute(array(

            ':mobile'=>session::get('lphone'),

            ':amount'=>$data['sevenpcent'],

            ':pstatus'=>'Withdraw',

            ':bank'=>$data['bank']

            ));

        //update reward table to be R = request

        $sthr=$this->db->prepare("UPDATE tbl_rewards SET cashout=:cash WHERE mobile=:mobile");

        $sthr->execute(array(

            ':cash'=>"R",

            ':mobile'=>session::get('lphone')

        ));



        $message="Bonus Withdrawal Request Successful. Your Account will be credited within 24-48 hours";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data); 



    }



    public function myrewards(){

         $sth=$this->db->prepare("SELECT sum(r7pcent) as totAmt FROM tbl_rewards WHERE mobile=:e AND cashout=:n");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':e'=>session::get('lphone'),

            ':n'=>'N'

            ));

        return $sth->fetch();

    }

    public function checkforunsettledpayments(){

        $sth=$this->db->prepare("SELECT * FROM tbl_paymenttracks WHERE email=:e AND accessed=:n");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':e'=>session::get('email'),

            ':n'=>'N'

            ));

        return $sth->fetch();



    }

    public function payagain($data){

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

        $message="Your Payment  for land purchase is successfully accepted";

             $s_status="Yes";

             $data=array('message'=>$message,'s_status'=>$s_status);

             echo json_encode($data);        

    }



    public function saveorder($data){


//delete existing unapproved or successful order
         $sth=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:mobile AND paid=:pa");   
        $sth->execute(array(
            ':mobile'=> Session::get('lphone'),
            ':pa'=>'N'
            ));      

        //please check for the existing order

        $sthExistingOrder=$this->db->prepare("SELECT * FROM tbl_orders WHERE mobile=:mobile AND paid=:pa");

        $sthExistingOrder->execute(array(

            ':mobile'=>$data['mobile'],

            ':pa'=>'N'

            ));

        $rr=$sthExistingOrder->fetchAll();

        if($rr){

            echo '<script>alert("An order Exist, please wait for approval")</script>';

               header('location: '. URL . 'dashboard');   

        }else{

                //select the product descrition

                $sthsel=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:id");

                $sthsel->execute(array(

                    ':id'=>$data['pid']

                    ));

                $result=$sthsel->fetch();

                if($result){

                    //delete order not approve for this particlar person

                    $sthdeleteorder=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:mobile AND paid= :pa");

                    $sthdeleteorder->execute(array(

                        ':mobile'=>$data['mobile'],

                        ':pa'=>'N'

                        ));

                        //delete from the paymenttracker table

                        $sthget=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:mobile");

                        $sthget->execute(array(

                            ':mobile'=>$data['mobile']

                        ));

                        $resultget=$sthget->fetch();

                        if($resultget){

                            $selectedEmail=$resultget['email'];

                            //now delete using email'

                            $sthdeleget=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE accessed=:n and (pstatus=:p OR pstatus=:q) AND email=:email");

                            $sthdeleget->execute(array(

                                ':n'=>"N",

                                ':p'=>"",

                                ':q'=>"Y",

                                ':email'=>$selectedEmail

                            ));

                        }

                    $sth=$this->db->prepare("INSERT INTO tbl_orders (pid,pname,price,pqty,deposit,orderno,mobile,paid) VALUES(:p,:pn,:pr,:pq,:d,:o,:m,:pa)");

                $sth->execute(array(

                    ':p'=>$data['pid'],

                    ':pn'=>$result['product_name'],

                    ':pr'=>$data['price'],

                    ':pq'=>$data['pqty'],

                    ':d'=>$data['deposit'],

                    ':o'=>$data['orderno'],

                    ':m'=>$data['mobile'],

                    ':pa'=>'N'

                    ));

               

                }

    }

        

    }



    public function savepayment($data){

    	$sth=$this->db->prepare("INSERT INTO tbl_payments(mobile,orderno,refid,product,qty,price,debit,credit) VALUES(:m,:o,:r,:p,:q,:pr,:d,:c)");

    	$sth->execute(array(



    		':m'=>$data['mobile'],

    		':o'=>$data['orderno'],

    		':r'=>$data['refid'],

    		':p'=>$data['product'],

    		':q'=>$data['qty'],

    		':pr'=>$data['price'],

    		':d'=>$data['debit'],

    		':c'=>$data['credit']    		

    		));

    	$message="Your startup Payment is succefully";

         $s_status="Yes";

         $data=array('message'=>$message,'s_status'=>$s_status);

         echo json_encode($data);

    }







    public function allitems(){

	    $sth=$this->db->prepare("SELECT * FROM `tbl_products` order by id desc ");

	    $sth->execute(array(

  	));

	return $sth->fetchAll();

	}







public function all_ind_products(){

        //Delete from temp_table

        $sthdel=$this->db->prepare("DELETE FROM temp_billings WHERE mobile=:mobile");

        $sthdel->execute(array(

            ':mobile'=>session::get("lphone")

            ));



        $sth=$this->db->prepare("SELECT DISTINCT tbl_orders.created_at,tbl_orders.pid,tbl_orders.pname,tbl_orders.pqty,tbl_orders.price,tbl_orders.mobile,tbl_payments.orderno FROM tbl_orders INNER JOIN tbl_payments ON tbl_orders.orderno=tbl_payments.refid WHERE 

            tbl_payments.mobile=:mobile AND tbl_orders.paid='Y'

            ");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':mobile'=>session::get("lphone")

            ));

        //print_r($sth->fetchAll());

        //exit();

        $result=$sth->fetchAll();

        if($result){



            //print_r($result);

            //exit();



            //insert the result into another table(temp table)

            foreach ($result as $key => $value) {

                # code...

                $pid=$value['pid'];

                $pname=$value['pname'];

                $qty=$value['pqty'];

                $price=$value['price'];

                $totalamount=$price * $qty;

                $orderno=$value['orderno'];
                $date_created=$value['created_at'];

                //get amount paid

                $sthamtpaid=$this->db->prepare("SELECT SUM(credit) AS amtpaid FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno ");

                $sthamtpaid->execute(array(

                    ':mobile'=>session::get("lphone"),

                    ':orderno'=>$orderno

                    ));

                $amtp=$sthamtpaid->fetch();

                $amountpaid=$amtp['amtpaid'];

                //echo $amountpaid;

                //exit();



                //now get amount due

                $sthdue=$this->db->prepare("SELECT sum(debt)-SUM(credit) as amtdue FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno ");

                $sthdue->execute(array(

                    ':mobile'=>session::get("lphone"),

                    ':orderno'=>$orderno

                    ));

                $due=$sthdue->fetch();

                $Amountdue=$due['amtdue'];

                if($Amountdue < 0){

                    $Amountdue=0;

                }





                    //Get allocation

                $sthAllocation=$this->db->prepare("SELECT * FROM tbl_allocations WHERE pid=:pd AND mobile=:mobile");

                $sthAllocation->execute(array(

                    ':pd'=>$pid,

                    ':mobile'=>session::get("lphone")

                    ));

                $alk=$sthAllocation->fetchAll();



                if($alk){

                    $alks="";

                    foreach ($alk as $key => $value) {

                        //echo $value['plots'];

                        $alks .= " ". $value['plots'];

                        //$result .= $char;

                    }

                }

               // exit();

                

                //Now insert

                //$sthinsert=$this->db->prepare("INSERT INTO temp_billings(mobile,orderno,pid,pname,qty,price,totalamount,amountpaid,due) VALUES(:m,:o,:id,:p,:q,:price,:totamt,:amtpaid,:due)");

                $sthinsert=$this->db->prepare("INSERT INTO temp_billings(mobile,orderno,pid,pname,qty,price,totalamt,amountpaid,due,allocation,order_date) VALUES(:m,:o,:id,:p,:qty,:price,:tamt,:amtp,:d,:al,:ordd)");

                $sthinsert->execute(array(

                    ':m'=>session::get("lphone"),

                    ':o'=>$orderno,

                    ':id'=>$pid,

                    ':p'=>$pname,

                    ':qty'=>$qty,

                    ':price'=>$price,

                    ':tamt'=>$totalamount,

                    ':amtp'=>$amountpaid,

                    ':d'=>$Amountdue,

                    ':al'=>$alks,
                    ':ordd'=>$date_created

                    ));

            

            }

        }



        $sthreturn=$this->db->prepare("SELECT * FROM temp_billings WHERE mobile=:mobile");

        $sthreturn->execute(array(

            ':mobile'=>session::get("lphone")

            ));

        $rResult=$sthreturn->fetchAll();

        return $rResult;

    }



}

