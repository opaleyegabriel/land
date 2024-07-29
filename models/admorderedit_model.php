<?php

class Admorderedit_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

    public function SearchOrder($data){
        $sth = $this->db->prepare("SELECT * FROM tbl_orders WHERE mobile=:m AND paid='Y'");
        $sth->execute(array(
            ':m'=>$data['mobile']
        ));
        $rec = $sth->fetchAll();
        if($rec){
            echo json_encode($rec);
        }
    }
}