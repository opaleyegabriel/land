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

}