<?php
class Admlogin extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
        }





    function index(){
        $this->view->render('admlogin/index');
    }
    
    public function myadmlogin(){
        $data=array();
        $data['username']=$_POST['username'];
        $data['pwd']=$_POST['pwd'];
        //echo "<pre>";
        //print_r($data);
        $this->model->myadmlogin($data);
         
        $this->view->render('admdashboard/index');
    }
    
}
?>