<?php
class Bonus1000_Model extends Model {
    function __construct()
    {
        parent::__construct();
        session::init();
    }


    public function chargeonsales($data)
    {
    	//check if the BA exist
    	
    		
    	$sthBA=$this->db->prepare("SELECT * FROM tbl_ba_agent WHERE mobile=:mobile");
    	$sthBA->execute(array(
    		':mobile'=>$data['mobile']
    		));
    	$recba=$sthBA->fetch();
    	if($recba){
    		//since the BA exist
    		//check if the client exist
    		$sthc=$this->db->prepare("SELECT DISTINCT tbl_allocations.taken, tbl_profile.name FROM `tbl_profile` INNER JOIN tbl_allocations ON tbl_profile.phone=tbl_allocations.mobile WHERE tbl_profile.phone=:cmobile");
    		$sthc->execute(array(
    			':cmobile'=>$data['cmobile']
    			));
    		$recc=$sthc->fetch();
    		if($recc){
    			//now check if the client has being entered for someone else
    			$sths=$this->db->prepare("SELECT * FROM tbl_bas_target WHERE client_mobile=:cmobile");
    			$sths->execute(array(
    				':cmobile'=>$data['cmobile']
    				));
    			$recs=$sths->fetch();
    			if($recs){
    				session::set("duplicate",true);
    			}else{
    				//now insert into the target table
    			$sthin=$this->db->prepare("INSERT INTO tbl_bas_target (bas_mobile,client_mobile,client_name,qty) VALUES(:bmobile,:cmobile,:cname,:qty)");
    			$sthin->execute(array(
    				':bmobile'=>$data['mobile'],
    				':cmobile'=>$data['cmobile'],
    				':cname'=>$recc['name'],
    				':qty'=>$recc['taken']
    				));
                $sthcredit=$this->db->prepare("INSERT INTO tbl_bonus1000 (acctno,client_mobile,dr,cr) VALUES(:acctno,:cno,:dr,:cr)");
                $sthcredit->execute(array(
                    ':acctno'=>$data['mobile'],
                    ':cno'=>$data['cmobile'],
                    ':dr'=>0,
                    ':cr'=>1000
                    ));
    			session::set("saved",true);
    			}
    			
    		}  
    		else{
    			session::set("clientnotexist",true);
    		}  		
    	}else{
    		session::set("BAnotexist",true);
    	}

    }
}