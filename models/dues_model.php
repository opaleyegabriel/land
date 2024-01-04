<?php
class Dues_model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }

    public function sendsms(){
    	echo "sms loading..";
    }

    public function calc3pcent(){
    	$sth=$this->db->prepare("SELECT tbl_dues.bas,tbl_dues.mobile,tbl_dues.plot,tbl_dues.Tamount,tbl_dues.paid,tbl_dues.balance,tbl_dues.due,tbl_profile.name FROM tbl_dues INNER JOIN tbl_profile ON tbl_dues.mobile=tbl_profile.phone");
    	$sth->execute();
    	$result=$sth->fetchAll();
    	
    	foreach ($result as $key => $value) {
    		# code...
    		$plot=0;
    		$tamount=0; $cost=0; $d=0; $dd=0; $dailyamt=0;
    		$maxdueamtpplot=0; 
    		$noofdaysminus=0;
    		$plot=($value['plot']);
    		$tamount=($value['Tamount']);
    		$paid=$value['paid'];
    		$actualppplot=($paid/$plot);

    		$cost=($tamount/$plot);
    		if($cost == 120000){
    			$dailyamt=500;
    		}elseif ($cost == 160000) {
    			$dailyamt=700;
    		}elseif ($cost == 150000) {
    			$dailyamt=750;
    		}elseif ($cost == 180000) {
    			$dailyamt=750;
    		}elseif ($cost == 600000) {
    			$dailyamt=1250;
    		}
    		$due=0;
    		$due = $value['due'];
    		$dueno_ofdate = ($due/$dailyamt);    		
    		$dd = $dueno_ofdate/$plot;   		
    		
    		$noofdaysminus = (60 - $dd);
    		$coment="";

    		if($actualppplot == 2500){
    			echo "Client Name: ".  $value['name'] . "  " .  $value['mobile'] . "  No. Of Purchased Plot: ". $plot . "<br>";
    			echo "Cost per plot ". $cost . " Total Cost  ". $tamount . " Total Amount Paid  ". $value['paid'] . "<br>";
    			echo "Total Balance  ". $value['balance'] . " Daily Amount ". $dailyamt . "<br>";    		
    			echo "Due amount : ". $due . " Due number of days : ". $dd . "<br>";				
				echo ".........................................................................<br>";
    		}


    	}
    	
    	//echo "<pre>";
    	//print_r($result);
    	//exit();
    }
    public function sms(){
    	$sth=$this->db->prepare("SELECT tbl_dues.bas,tbl_dues.mobile,tbl_dues.plot,tbl_dues.Tamount,tbl_dues.paid,tbl_dues.balance,tbl_dues.due,tbl_bas_target.client_name FROM tbl_dues INNER JOIN tbl_bas_target ON tbl_dues.mobile=tbl_bas_target.client_mobile");
    	$sth->execute();
    	$result=$sth->fetchAll();
    	
    	foreach ($result as $key => $value) {
    		# code...
    		$plot=0;
    		$tamount=0; $cost=0; $d=0; $dd=0; $dailyamt=0;
    		$maxdueamtpplot=0; $noofdaysminus=0;
    		$plot=($value['plot']);
    		$tamount=($value['Tamount']);
    		$cost=($tamount/$plot);
    		if($cost == 120000){
    			$dailyamt=500;
    		}elseif ($cost == 160000) {
    			$dailyamt=700;
    		}elseif ($cost == 150000) {
    			$dailyamt=750;
    		}elseif ($cost == 180000) {
    			$dailyamt=750;
    		}elseif ($cost == 600000) {
    			$dailyamt=1250;
    		}
    		$due=0;
    		$due = $value['due'];
    		$dueno_ofdate = ($due/$dailyamt);    		
    		$dd = $dueno_ofdate/$plot;   		
    		
    		$noofdaysminus = (60 - $dd);
    		$coment="";

    		if($noofdaysminus > 20){
    			if($plot > 1){
    				$plots= $plot."plots";
    			}else
    			{
    				$plots= $plot."plot";
    			}
    			$paid=0;
    			$balance=0;
    			$balance=$value['balance'];
    			$paid=$value['paid'];
    			$message="Dear Client,your land:".$plots.",Cost=N".number_format($tamount).",Paid=N". number_format($paid).",Balance=N".number_format($balance).",with an overdue of N".number_format($due).".Kindly pay the overdue.Thanks.DreamCityHES Ltd";
    		}



    		if($noofdaysminus < 15){
    			$coment= "Disconnection Warining";
    		}

    		if($noofdaysminus < 10){
    			$coment= "You will be disconneted in " . $noofdaysminus." days";
    		}
    		
    		if($noofdaysminus < 5){
    			$coment= "Please pay now, failure to pay, your account will be cancel in  " . $noofdaysminus." days";
    		}

    		if($noofdaysminus < 0){
    			$coment= "We may delete you land account with us any any moment, to avoid that you can pay any amount now!";
    		}
    		echo "No. Of Purchased Plot: ". $plot . "<br>";
    		echo "Cost per plot ". $cost . "<br>";
    		echo "Total Cost  ". $tamount . "<br>";
    		echo "Total Amount Paid  ". $value['paid'] . "<br>";
    		echo "Total Balance  ". $value['balance'] . "<br>";
    		echo "Daily Amount ". $dailyamt . "<br>";
    		echo "Due amount : ". $due . "<br>";
			echo "Due number of days : ". $dd . "<br>";
    		
    		echo "My Name is ". $value['client_name'] . "<br>";
    		echo  $coment . "<br>";
    		echo $message ."<br>";
    		//start message

							







    		

    		echo "<pre>";
    		echo "<br>";


    	}
    	
    	//echo "<pre>";
    	//print_r($result);
    	//exit();

    }
	public function makeduesrecord(){
		require("totalworkingdays.php");
				//initialize the class
		

		$sth=$this->db->prepare("SELECT * FROM tbl_payments WHERE qty > 0");
		$sth->execute();
		$result=$sth->fetchAll();
		//echo "<pre>";
		//print_r($result);
		foreach ($result as $key => $value) {
				$numofdays=0;
				

				//get date
				$thatdate=$value['created_at'];
				$startDate=date("Y-m-d", strtotime($thatdate));
				$endDate=date("Y-m-d");
				
				$twd = new totalWorkingDays();
				//set Holiday by its name (optional)
				$twd->setHoliday(array('Saturday','Sunday'));
				//set Dates as Holiday (optional)
				$twd->setHolidate(array('1st January 2023', '2023-01-12', '24-12-2023','1st January 2024', '2024-01-12', '24-12-2024'));
				//Calculate to find total working days
				$numofdays= $twd->calculate($startDate, $endDate);
				$qty=0;
				$orderno=0;
				$mobile=0;
				$price=0;
				$debit=0;
				$daily=0;

				



				$qty=$value['qty'];
				$orderno=$value['orderno'];
				$mobile=$value['mobile'];
				$price=$value['price'];
				$debit=$value['debit'];
				

				$sthPickInfor=$this->db->prepare("SELECT a.mobile,a.orderno,a.qty,a.price,a.debit,b.pid,c.pplannum,c.daily FROM tbl_payments a,tbl_orders b, tbl_products c WHERE a.mobile=b.mobile AND b.orderno=a.refid AND b.pid=c.id AND a.mobile=:mobile AND a.orderno=:orderno");
				$sthPickInfor->execute(array(
					':mobile'=>$mobile,
					':orderno'=>$orderno
					));
				$pickResult=$sthPickInfor->fetch();
				if($pickResult){
					
				}


				//get daily suppose paid value
				if($price == 120000){
					$daily=500;
				}
				if($price == 160000){
					$daily=700;
				}
				if($price == 180000){
					$daily=750;
				}
				if($price == 600000){
					$daily=1250;
				}
				//sum total paid
				$sthsum=$this->db->prepare("SELECT SUM(credit) as totalpaid FROM tbl_payments WHERE mobile=:mobile");
				$sthsum->execute(array(
					':mobile'=>$mobile
					));
				$rec=$sthsum->fetch();
				$totalpaid=$rec['totalpaid'];

				$d = ($daily*$numofdays * $qty);
				if($totalpaid < $d){
					$due=0;
					$due= $d - $totalpaid;
					//check if this record is there before
					$sthcheck=$this->db->prepare("DELETE FROM tbl_debt WHERE mobile=:mobile AND orderno=:orderno AND debit < 1 AND credit < 1 AND debt > 1");
					$sthcheck->execute(array(
						':mobile'=>$mobile,
						':orderno'=>$orderno
						));
					//nOW iNSERT
					$sthInsert=$this->db->prepare("INSERT INTO tbl_debt (mobile,orderno,debit,credit,debt) VALUES (:mobile,:orderno,:debit,:credit,:debt) ");
					$sthInsert->execute(array(
						':mobile'=>$mobile,
						':orderno'=>$orderno,
						':debit'=>0,
						':credit'=>0,
						':debt'=>$due
						));

					//create dues records
					$sthdrec=$this->db->prepare("DELETE FROM tbl_dues WHERE mobile=:mobile");
					$sthdrec->execute(array(
						':mobile'=>$mobile
						));
					//get agent that registered this client
					$sthba=$this->db->prepare("SELECT * FROM tbl_bas_target WHERE client_mobile=:client_mobile");
					$sthba->execute(array(
					':client_mobile'=>$mobile
					));
					$baresult=$sthba->fetch();
					if($baresult){
						$bas_mobile=$baresult['bas_mobile'];
					}else{
						$bas_mobile="Office";
					}
					
					

					$sthdinsert=$this->db->prepare("INSERT INTO tbl_dues (bas,mobile,plot,tamount,paid,balance,due) VALUES (:bas,:mobile,:plot,:tamount,:paid,:balance,:due)");
					$sthdinsert->execute(array(
						':bas'=>$bas_mobile,
						':mobile'=>$mobile,
						':plot'=>$qty,
						':tamount'=>$debit,
						':paid'=>$totalpaid,
						':balance'=>$debit -$totalpaid,
						':due'=>$due
						));
				}else{
					//create dues records
					$sthdrec=$this->db->prepare("DELETE FROM tbl_dues WHERE mobile=:mobile");
					$sthdrec->execute(array(
						':mobile'=>$mobile
						));
					//get agent that registered this client
					$sthba=$this->db->prepare("SELECT * FROM tbl_bas_target WHERE client_mobile=:client_mobile");
					$sthba->execute(array(
					':client_mobile'=>$mobile
					));
					$baresult=$sthba->fetch();
					if($baresult){
						$bas_mobile=$baresult['bas_mobile'];
					}else
					{
						$bas_mobile="Office";
					}
					

					
					$sthdinsert=$this->db->prepare("INSERT INTO tbl_dues (bas,mobile,plot,tamount,paid,balance,due) VALUES (:bas,:mobile,:plot,:tamount,:paid,:balance,:due)");
					$sthdinsert->execute(array(
						':bas'=>$bas_mobile,
						':mobile'=>$mobile,
						':plot'=>$qty,
						':tamount'=>$debit,
						':paid'=>$totalpaid,
						':balance'=>$debit -$totalpaid,
						':due'=>0
						));

				}

				


		}
		echo "Done !";
		exit();
	}

}


















