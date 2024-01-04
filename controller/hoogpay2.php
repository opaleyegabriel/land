<?php

class Hoogpay2 extends Controller{
    function __construct()
            {
               parent::__construct();
               Session::init();
        		$this->view->js=array('hoogpay2/js/default.js');
        		$logged=Session::get('loggedIn');
        if ($logged==false)
        {
            Session::destroy();
            header('location: '. URL . 'index');
            exit;
        }

     }
    function index(){
    	$this->view->myorders=$this->model->getorders();
      $this->view->getOtherInfo=$this->model->getordersbanktopay();
       $this->view->render('hoogpay2/index');   
    }

    public function paymenttrackcheck(){
        $data=array();
        $data['email']=$_POST['email'];               
        $this->model->paymenttrackcheck($data);
    }
    public function paymenttrack(){
    	 $data=array();
    	 $data['email']=$_POST['email'];
    	 $data['amount']=$_POST['amount'];
        $data['orderno']=$_POST['orderno'];
        $data['sentfrom']=$_POST['sentfrom'];
		$this->model->paymenttrack($data);
    }
     public function payagain(){
        $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['refid']=$_POST['refid'];       
        $data['credit']=$_POST['credit'];
        $this->model->payagain($data);
      }


      public function payagain_new(){
        $data=array();
        $data['email']=$_POST['email'];
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['refid']=$_POST['refid'];       
        $data['credit']=$_POST['credit'];
        $this->model->payagain_new($data);
      }

    public function check4approval(){
        $data=array();
        $data['email']=$_POST['email'];       
        $data['orderno']=$_POST['orderno'];
        $this->model->check4approval($data);
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