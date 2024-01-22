<?php
class Admcustomeraccount extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('admcustomeraccount/js/default.js');
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
            $this->view->listofclients=$this->model->listofclients();
            $this->view->render('admcustomeraccount/index');
        }

        public function manage($phone){
            $this->view->personalorders=$this->model->personalorders($phone);
            $this->view->render('admcustomeraccount/manage'); 
        }


        public function managedetails($orderno){
            
            //echo $orderno;
            $this->view->dailyhistory=$this->model->dailyhistory($orderno);
            $this->view->orderdetails=$this->model->orderdetails($orderno);
            $this->view->attributedpayments=$this->model->attributedpayments($orderno);
            $this->view->numofmonthlengthforaproduct=$this->model->numofmonthlengthforaproduct($orderno);
            $this->view->render('admcustomeraccount/account'); 
        }

        public function transactiondailyreport(){
            $data=array();
            $data['balance']=$_POST["balance"];
            $data['uptodate']=$_POST['paymentstatus'];
            $data['comment']=$_POST['comment'];
            $data['comment2']=$_POST['comment2'];
            $data['mobile']=$_POST['mobile'];
            $data['orderno']=$_POST['orderno'];
            $data['reportedby']=session::get("currentuser");
            $data['branchid']=session::get("branch");
            //echo "<pre>";
            //print_r($data);
            $this->model->transactiondailyreport($data);
            $this->view->render("admcustomeraccount/index");

        }

        public function unblockreport(){
            $data=array();
            $data['mobile']=$_POST['mobile'];
            $data['qty']=$_POST['qty'];
            $data['orderno']=$_POST['orderno'];
            $data['lngorderno']=$_POST['lngorderno'];
            $data['oldprice']=$_POST['oldprice'];
            $data['newprice']=$_POST['newprice'];
            
            $data['startdate']=$_POST['startdate'];
            $data['enddate']=$_POST['enddate'];
            $data['newstartdate']=$_POST['newstartdate'];

            $data['sms']=$_POST['sms'];
            $data['reportedby']=session::get("currentuser");
            $data['branchid']=session::get("branch");
            $data['comment']=$_POST['comment'];
            
           
            
           // echo "<pre>";
           // print_r($data); 
            $this->model->unblockreport($data);
            $this->view->render("admcustomeraccount/index"); 
        }


    }

