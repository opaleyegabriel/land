<?php

class Iddreport_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }
    
    public function branchdailyreport($data){
        $sth=$this->db->prepare("SELECT * FROM tbl_dailyhistory WHERE branch=:branch AND create_at =:mdate");
      $sth->execute(array(
        ':branch'=>$data['branch'],
        ':mdate'=>$data['datepicker']
        
        ));
      $result=$sth->fetchAll();
      if($result){
             echo json_encode($result); 
      }
    }

?>