<?php

class Imprest_model extends Model {

    function __construct()

    {
        parent::__construct();
        session::init();

    }
  
	public function imprestheadid(){
		$select=$this->db->prepare("SELECT * FROM tbl_impresthead WHERE branchid=:bid AND ustatus=:ust");
		$select->execute(array(
			':bid'=>session::get("branch"),
			':ust'=>"OPEN"
		));
		return $select->fetch();

	}
    public function new($data){
		


		$select=$this->db->prepare("SELECT * FROM tbl_impresthead WHERE branchid=:bid AND ustatus=:ust");
		$select->execute(array(
			':bid'=>$data['imprestheadid'],
			':ust'=>'OPEN'
		));
		$result=$select->fetch();
		if($result){
			$s=$this->db->prepare("INSERT INTO tbl_imprest (imprestid,branchid,description,amount,istatus)VALUES(:idd,:bid,:descr,:amt,:ist) ");
			$s->execute(array(
				':idd'=>$data['imprestheadid'],
				':bid'=>session::get("branch"),
				':descr'=>$data['description'],
				':amt'=>$data['amount'],
				':ist'=>'Paid'
			));

		}else {
			echo '<script type="text/javascript">';
					echo 'alert("No active imprest to handle the expenses, please Request for imprest");
					window.location.href = "'.URL.'imprest";';
				  echo "</script>";
		}












    }

    public function unretiredimprestvouchers(){
    	$sth=$this->db->prepare("SELECT * FROM tbl_imprest WHERE istatus = :ust AND branchid=:bid");
    	$sth->execute(array(
    		':ust'=> "Paid",
			':bid'=>session::get("branch")
    		));
    	return $sth->fetchAll();
    }


}