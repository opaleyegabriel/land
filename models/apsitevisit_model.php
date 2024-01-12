<?php

class Apsitevisit_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }



    public function listofsitevisit2approve(){
    	$s=$this->db->prepare("SELECT * FROM tbl_sitevisit WHERE vstatus=:vs");
    	$s->execute(array(
    		':vs'=>'N'
    		));
    	return $s->fetchAll();
    }

    public function approvesitevisit($id){
    	$sth=$this->db->prepare("SELECT * FROM tbl_sitevisit where id=:id");
    	$sth->execute(array(
    		':id'=>$id
    		));
    	return $sth->fetch();
    }
    public function effectsiteapproval($data){
        $sth=$this->db->prepare("UPDATE tbl_sitevisit SET amount=:amount,comment=:comment,vstatus=:vstatus WHERE id=:id ");
        $sth->execute(array(
            ':amount'=>$data["amount"],
            ':comment'=>$data["comment"],
            ':vstatus'=>$data["decision"],
            ':id'=>$data["id"]
            ));        

            $descr="Being amount for site visit by  ".$data['requestby'];
            //CREATE imprest directly
            $s=$this->db->prepare("INSERT INTO tbl_imprest VALUES(:id,:bid,:descr,:amt,:ist) ");
            $s->execute(array(
                ':id'=>$data['id'],
                ':bid'=>$data['branchid'],
                ':descr'=>$descr,
                ':amt'=>$data['amount'],
                ':ist'=>'Paid'
            ));
    }

}