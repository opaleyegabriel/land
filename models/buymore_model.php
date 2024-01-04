<?php
class Buymore_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

	 public function allitems(){
	    $sth=$this->db->prepare("SELECT * FROM `tbl_products` ");
	    $sth->execute(array(
  	));
	return $sth->fetchAll();
	}
	public function reorder($data){
		 $sthsel=$this->db->prepare("SELECT * FROM tbl_products WHERE id=:id");
        $sthsel->execute(array(
            ':id'=>$data['pid']
            ));
        $result=$sthsel->fetch();
        if($result){
            //delete all order not yet approved before creating another order for buy more
             $sthdeleteorder=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:mobile AND paid= :pa");
            $sthdeleteorder->execute(array(
                ':mobile'=>$data['mobile'],
                ':pa'=>'N'
                ));
           // echo "<pre>";
            //print_r($result);
            //exit();
            $sth=$this->db->prepare("INSERT INTO tbl_orders (pid,pname,price,pqty,deposit,orderno,mobile,paid) VALUES(:p,:pn,:pr,:pq,:d,:o,:m,:pa)");
        $sth->execute(array(
            ':p'=>$data['pid'],
            ':pn'=>$result['product_name'],
            ':pr'=>$data['price'],
            ':pq'=>$data['qty'],
            ':d'=>$data['deposit'],
            ':o'=>$data['orderno'],
            ':m'=>$data['mobile'],
            ':pa'=>'N'
            ));
         header('location: '. URL . 'hoogpay');    
        }
        

		//Insert the 
	}

public function all_ind_products(){
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