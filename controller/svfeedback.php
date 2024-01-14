<?php
class Svfeedback extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                 $this->view->js=array('svfeedback/js/default.js');
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
       $this->view->requestlist=$this->model->requestlist();
        $this->view->render('svfeedback/index');
    }
    public function feedback($id){
        $this->view->selectedsitevisitrecords=$this->model->selectedsitevisitrecords($id);
        $this->view->render('svfeedback/feedback');
    }

    public function treatfeedback(){
        $data=array();
        $data['id']=$_POST['id'];
        $data['admincomment']=$_POST['admincomment'];
        $this->model->treatfeedback($data);
        $this->view->render('svfeedback/index');
    }
    
    
}
?>