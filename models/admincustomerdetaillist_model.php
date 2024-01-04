<?php

class Admincustomerdetaillist_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

    public function listofland()
    {
        $sth=$this->db->prepare("SELECT * FROM tbl_products");
        $sth->execute();
        return $sth->fetchAll();
    }


}