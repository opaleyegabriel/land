<?php
class Svrequest extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                 $this->view->js=array('sendsmsdetails/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }
        }





    function index(){
       $this->view->requestlist=$this->model->requestlist();
        $this->view->render('svrequest/index');
    }

    public function newrequest(){
        $data=array();
        $data['site']=$_POST['site'];
        $data['purpose']=$_POST['purpose'];
        $data['amount']=$_POST['amount'];
        $data['requestby']=Session::get("currentuser");
        $data['branch']=session::get("branch");
        //echo "<pre>";
        //print_r($data);
        $this->model->newrequest($data);

    }
    public function feedback($id){
        $this->view->selectedsitevisitrecords=$this->model->selectedsitevisitrecords($id);
        $this->view->render('svrequest/feedback');
    }
    public function submitfeedback(){
        $data=array();
        $data['id']=$_POST['id'];
        $data['pleased']=$_POST['pleased'];
        $data['client']=$_POST['client'];
        $data['feedback']=$_POST['feedback'];
        $this->model->submitfeedback($data);
        $this->view->render('svrequest/index');
    }
    
    
}
?>