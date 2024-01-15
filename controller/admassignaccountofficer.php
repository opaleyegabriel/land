<?php
class Admassignaccountofficer extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admassignaccountofficer/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }elseif ($usertype != 1) //super admin is 1 other admin is 0
                {
                    # code...
                    header('location: '. URL . 'admdashboard');

                } 
        }





    function index(){
        $this->view->alllist=$this->model->alllist();
        $this->view->alllist_osogbo=$this->model->alllist_osogbo();
        $this->view->alllist_ibadan=$this->model->alllist_ibadan();
        
        
        $this->view->render('admassignaccountofficer/index');
    }

    public function manager($mobile){
        $this->view->selectclient=$this->model->selectclient($mobile);
        $this->view->render('admassignaccountofficer/manager');
    }

    public function saveaccountofficer(){
        $data=array();
        $data['accountofficer']=$_POST['accountofficer'];
        $data['phone']=$_POST['mobile'];
        $this->model->saveaccountofficer($data);
    }
    
    
    
}
?>