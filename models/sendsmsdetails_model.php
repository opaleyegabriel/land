<?php
class Sendsmsdetails_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }
    public function sendmsg0($data){
       // http://login.bulk-sms.ng/api/?username=user&password=pass&message=test&sender=welcome&mobiles=2348030000000,234802000000
       $message=$data['message'];
       $messageNew=$data['messageNew'];
       $messageMonth=$data['messageMonth'];
       $frm="Dreamcity";
       $to=$data['mobile'];
       $url = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$message."&sender=Dreamcity&mobiles=".$to;
        $url1 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageNew."&sender=Dreamcity&mobiles=".$to;
        $url2 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageMonth."&sender=Dreamcity&mobiles=".$to;
        echo $url ."<br/>" . $url1 ."<br/>" . $url2;
      // $url="http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$message. "&sender=". $frm . "&mobiles=" . $to;
       
            /*
            $ch = curl_init(); 
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $output=curl_exec($ch);
            if(curl_errno($ch))
            {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
            */
             /*           
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $resp = curl_exec($curl);
            curl_close($curl);

            echo $resp;
            
            $username="josseanngel@yahoo.com";
            $password="Missygab@01";
           $url = "http://login.bulk-sms.ng/api/?";
       
            $myvars = 'username=' . $username . '&password=' . $password . '&message=' . $message . '&sender=' . $frm . '&mobiles=' . $to;
            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            */
          //  echo $url;            


    }

    public function sendmsg1($data){
        $message=$data['message'];
        $messageNew=$data['messageNew'];
        $messageMonth=$data['messageMonth'];

       $frm="Dreamcity";
       $to=$data['mobile'];
        $url = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$message."&sender=Dreamcity&mobiles=".$to;
        $url1 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageNew."&sender=Dreamcity&mobiles=".$to;
        $url2 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageMonth."&sender=Dreamcity&mobiles=".$to;
        echo $url ."<br/>" . $url1 ."<br/>" . $url2;
       
    }
    public function sendmsg2($data){
         $message=$data['message'];
         $messageNew=$data['messageNew'];
         $messageMonth=$data['messageMonth'];
       $frm="Dreamcity";
       $to=$data['mobile'];
        $url = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$message."&sender=Dreamcity&mobiles=".$to;
        $url1 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageNew."&sender=Dreamcity&mobiles=".$to;
        $url2 = "http://login.bulk-sms.ng/api/?username=josseanngel@yahoo.com&password=Missygab@01&message=".$messageMonth."&sender=Dreamcity&mobiles=".$to;
        echo $url ."<br/>" . $url1 ."<br/>" . $url2;
    }

    public function getAmtPaid($orderno){
        $sth=$this->db->prepare("SELECT SUM(credit) as amountpaid FROM tbl_payments WHERE mobile=:mobile AND orderno=:orderno");
        $sth->execute(array(
            ':mobile'=>session::get('smobile'),
            ':orderno'=>$orderno
            ));
        $result=$sth->fetch();
    }

    public function getnoOfworkingDays(){
        require("totalworkingdays.php");
                //initialize the class        

        $sth=$this->db->prepare("SELECT * FROM tbl_payments WHERE mobile=:mobile AND qty > 0");
        $sth->execute(array(
            ':mobile'=>session::get('smobile')
            ));
        $result=$sth->fetchAll();
        //echo "<pre>";
        //print_r($result);
        $numofdays=0;
        $new_day=[];
        foreach ($result as $key => $value) {
                //get date
                $thatdate=$value['created_at'];
                $startDate=date("Y-m-d", strtotime($thatdate));
                $endDate=date("Y-m-d");                
                $twd = new totalWorkingDays();
                //set Holiday by its name (optional)
                $twd->setHoliday(array('Saturday','Sunday'));
                //set Dates as Holiday (optional)
                $twd->setHolidate(array('1st January 2023', '2023-01-12', '24-12-2023'));
                //Calculate to find total working days
                $numofdays= $twd->calculate($startDate, $endDate);
                $orderno=$value['orderno'];
                $data=array('number_ofdays'=>$numofdays,'orderno'=>$orderno);
                array_push($new_day, $data);          

        }
        return $new_day;
        
    }

     public function dateofcontractactivation(){

        $sth=$this->db->prepare("SELECT DISTINCT a.pid,a.orderno,a.mobile,b.created_at,c.pplannum,c.daily FROM tbl_orders a, tbl_payments b, tbl_products c WHERE a.mobile=b.mobile AND a.orderno=b.refid and b.mobile =:mobile and b.qty >0 and a.pid=c.id;");

        $sth->execute(array(

            ':mobile'=>session::get('smobile')

            ));

        return $sth->fetchAll();

    }



    public function all_ind_products(){

        //Delete from temp_table

        $sthdel=$this->db->prepare("DELETE FROM temp_billings WHERE mobile=:mobile");

        $sthdel->execute(array(

            ':mobile'=>session::get("smobile")

            ));



        $sth=$this->db->prepare("SELECT DISTINCT tbl_orders.pid,tbl_orders.pname,tbl_orders.pqty,tbl_orders.price,tbl_orders.mobile,tbl_payments.orderno FROM tbl_orders INNER JOIN tbl_payments ON tbl_orders.orderno=tbl_payments.refid WHERE 

            tbl_payments.mobile=:mobile AND tbl_orders.paid='Y'

            ");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':mobile'=>session::get("smobile")

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

                //get amount paid

                $sthamtpaid=$this->db->prepare("SELECT SUM(credit) AS amtpaid FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno ");

                $sthamtpaid->execute(array(

                    ':mobile'=>session::get("smobile"),

                    ':orderno'=>$orderno

                    ));

                $amtp=$sthamtpaid->fetch();

                $amountpaid=$amtp['amtpaid'];

                //echo $amountpaid;

                //exit();



                //now get amount due

                $sthdue=$this->db->prepare("SELECT sum(debt)-SUM(credit) as amtdue FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno ");

                $sthdue->execute(array(

                    ':mobile'=>session::get("smobile"),

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

                    ':mobile'=>session::get("smobile")

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

                $sthinsert=$this->db->prepare("INSERT INTO temp_billings(mobile,orderno,pid,pname,qty,price,totalamt,amountpaid,due,allocation) VALUES(:m,:o,:id,:p,:qty,:price,:tamt,:amtp,:d,:al)");

                $sthinsert->execute(array(

                    ':m'=>session::get("smobile"),

                    ':o'=>$orderno,

                    ':id'=>$pid,

                    ':p'=>$pname,

                    ':qty'=>$qty,

                    ':price'=>$price,

                    ':tamt'=>$totalamount,

                    ':amtp'=>$amountpaid,

                    ':d'=>$Amountdue,

                    ':al'=>$alks

                    ));            

            }

        }



        $sthreturn=$this->db->prepare("SELECT * FROM temp_billings WHERE mobile=:mobile");

        $sthreturn->execute(array(

            ':mobile'=>session::get("smobile")

            ));

        $rResult=$sthreturn->fetchAll();

        return $rResult;

    }



}