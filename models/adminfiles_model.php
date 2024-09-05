<?php

class Adminfiles_model extends Model {

    function __construct()

    {

        parent::__construct();

        session::init();

    }

    public function deleteunapprovedpaymentrequest(){
        $sth=$this->db->prepare("DELETE FROM tbl_paymenttracks WHERE accessed='N' and pstatus='Y'");
        $sth->execute();
        echo '<script type="text/javascript">';
        echo 'alert("You have successfully deleted unsuccessful orders");
        window.location.href = "'.URL.'adminfiles"';
      echo "</script>";

    }





    //SELECT tbl_profile.name,tbl_profile.phone,tbl_profile.email FROM `tbl_profile` INNER JOIN tbl_paymenttracks on tbl_profile.email=tbl_paymenttracks.email



    

   

}