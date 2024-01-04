<?php
class Samp_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

public function payAgain($data){
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
            ':credit'=>$data['credit']
            ':debt'=>0,
            ));
        $message="Your Payment  for land purchase is succefully accepted";
             $s_status="Yes";
             $data=array('message'=>$message,'s_status'=>$s_status);
             echo json_encode($data);        
    }



    public function allmyproducts(){
    	//Delete from temp_table
    	$sthdel=$this->db->prepare("DELETE FROM temp_billings WHERE mobile=:mobile");
    	$sthdel->execute(array(
    		':mobile'=>session::get("lphone")
    		));

        $sth=$this->db->prepare("SELECT tbl_orders.pid,tbl_orders.pname,tbl_orders.pqty,tbl_orders.price,tbl_orders.mobile,tbl_payments.orderno FROM tbl_orders INNER JOIN tbl_payments ON tbl_orders.orderno=tbl_payments.refid WHERE 
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
        		$sthinsert=$this->db->prepare("INSERT INTO temp_billings(mobile,orderno,pid,pname,qty,price,totalamt,amountpaid,due,allocation) VALUES(:m,:o,:id,:p,:qty,:price,:tamt,:amtp,:d,:al)");
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
                    ':al'=>$alks
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