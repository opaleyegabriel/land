<?php
class Subcheckout extends Controller{
    function __construct()
    {
        parent::__construct();
        Session::init();
        $this->view->js=array('subcheckout/js/default.js');
        $logged=Session::get('loggedIn');
        if ($logged==false)
        {
            Session::destroy();
            header('location: '. URL . 'index');
            exit;
        }

      }

      function index(){
            //echo 'INSIDE INDEX INDEX';
           // $this->view->myorders=$this->model->getorders();
            $this->view->render('subcheckout/index');

        }


 public function payagain(){
        $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['refid']=$_POST['refid'];
        $data['credit']=$_POST['credit'];
        $this->model->payagain($data);

      }

       
}
?>