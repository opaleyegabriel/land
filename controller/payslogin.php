<?php
class Payslogin extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                

                
        }
    function index(){
        $this->view->render('payslogin/index');
    }

    public function login(){
        $data=array();
        $data['username']=$_POST['username'];
        $data['pwd']=$_POST['pwd'];
        $this->model->login($data);
    }
}
?>