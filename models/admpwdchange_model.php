<?php

class Admpwdchange_model extends Model {

    function __construct()

    {

        parent::__construct();
        session::init();
    }

    public function pwdchange($data){
        //check if the password exist before changing it
        $sth=$this->db->prepare("SELECT * FROM tbl_adm WHERE pwd=:pwd AND username=:username");
        $sth->execute(array(
            ':pwd'=>$data['old'],
            ':username'=>session::get("currentuser") 
        ));
        $result=$sth->fetch();
        if($result){

        $update=$this->db->prepare("UPDATE tbl_adm SET pwd=:pwd WHERE username=:username");
        $update->execute(array(
            ':pwd'=>$data['new'],
            ':username'=>session::get("currentuser")
        ));
                Session::destroy();
                header('location: '. URL . 'admlogin');
               exit;

        }else {
            echo '<script type="text/javascript">';
			            echo 'alert("Old password not matched the login, please use correct old password");
                        window.location.href = "'.URL.'admpwdchange";';
			          echo "</script>";
        }
        
    }    
}