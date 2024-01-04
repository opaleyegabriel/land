<?php
class Amountpaid_Model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

     public function transactions(){

         $sth=$this->db->prepare("SELECT * FROM tbl_payments WHERE mobile=:e");

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $sth->execute(array(

            ':e'=>session::get('lphone')            

            ));

        return $sth->fetchAll();

    }
}