<?php
class Firstcheckout_Model extends Model {
    function __construct()
    {
        parent::__construct();
        Session::init();
    }




    public function getorders(){

        $sth=$this->db->prepare("SELECT * FROM tbl_orders WHERE mobile=:mobile AND paid=:pa");   
        $sth->execute(array(
            ':mobile'=> Session::get('lphone'),
            ':pa'=>'N'
            ));
       // print_r($sth->fetch());
       // exit();

        return $sth->fetch();
    }



    
    public function savepayment($data)
    {
        
        /*
            
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

        */


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
    
            }
            //calculate salary for the activate process
            //check if MinAmt is paid
            if($minAmtPaid)
        
            $message="Your startup Payment is succefully";
             $s_status="Yes";
             $data=array('message'=>$message,'s_status'=>$s_status);
             echo json_encode($data);        //
        }

    	
    }



}
