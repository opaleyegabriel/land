<?php
class Firstcheckout extends Controller{
    function __construct()
    {
        parent::__construct();
        Session::init();
        $this->view->js=array('firstcheckout/js/default.js');
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
            $this->view->myorders=$this->model->getorders();
            $this->view->render('firstcheckout/index');

        }



        public function savepayment(){
          $data=array();
          $data['mobile']=$_POST['mobile'];
          $data['orderno']=$_POST['orderno'];
          $data['refid']=$_POST['refid'];
          $data['product']=$_POST['product'];
          $data['qty']=$_POST['qty'];
          $data['price']=$_POST['price'];
          $data['debit']=$_POST['debit'];
          $data['credit']=$_POST['credit'];
         // $data['pstatus']='I';
          $this->model->savepayment($data);
        }


       
}
?>