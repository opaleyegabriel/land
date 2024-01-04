<?php
class Ddv_Model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }
    
    public function create_ddv()
    {
    	$sth=$this->db->prepare("SELECT DISTINCT mobile FROM tbl_debt");
    	$sth->execute();
    	$result=$sth->fetchAll();
        $dcdate=date("Y-m-d");
        //echo $dcdate . "<br>";
    	//print_r($result);
    	//exit();
    	if($result){
    		foreach ($result as $key => $value) {
    			//sum the debit - credit, if less than the amount
    			$sths=$this->db->prepare("SELECT DISTINCT tbl_products.id,tbl_products.product_name, tbl_orders.orderno,tbl_debt.mobile,tbl_products.daily FROM tbl_products INNER JOIN tbl_orders ON tbl_orders.pid=tbl_products.id INNER JOIN tbl_debt on tbl_debt.mobile=tbl_orders.mobile where tbl_orders.paid='Y' and tbl_debt.ddate <> :dcdate  ORDER BY RAND() LIMIT 50");
                $sths->execute();
                $data=$sths->fetchAll();
                foreach ($data as $ikey => $ivalue) {
                    $mobileno=$ivalue['mobile'];
                    $rorderno=  substr($ivalue['orderno'], 12);
                    $daily=$ivalue['daily'];
                    //determin to drop daily money if the value not equal
                    $sthsum=$this->db->prepare("SELECT (sum(debit) - sum(debt)) as dbalance FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno");
                    $sthsum->execute(array(
                        ':mobile'=>$mobileno,
                        ':orderno'=>$rorderno
                        ));
                    $a_bal=$sthsum->fetch();
                    if($a_bal['dbalance'] <> 0){
                        //then drop another amount for the person
                        $dday=date("l");
                        echo $dday;
                        if(($dday != "Saturday") || ($dday != "Sunday")){
                            $sthinsert=$this->db->prepare("INSERT INTO tbl_debt(mobile,orderno,debit,credit,debt) VALUES (:m,:o,:dr,:cr,:db)");
                            $sthinsert->execute(array(
                                ':m'=>$mobileno,
                                ':o'=>$rorderno,
                                ':dr'=>0,
                                ':cr'=>0,
                                ':db'=>$daily
                                ));
                        }

                    }






                }


    		}
    	}
    }
}