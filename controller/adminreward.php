<?php
class Adminreward extends Controller{
    function __construct()
    {
        parent::__construct();
        Session::init();
       
    }
    function index(){    
    $this->view->render('adminreward/index');
    }
    public function reward(){
        $data=array();
        $data['mobileno']=$_POST['mobileno'];
        $data['description']="Target for this reward must be met, the target is 20 plots to a plot";
        $data['target']=$_POST['target'];
        $data['ctv']=$_POST['ctv'];
        $data['plots']=$_POST['plots'];
        echo "<pre>";
        print_r($data);
    }
                       
}
                            