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

        public function allocate(){
            $data=array();
            $data['pid']=$_POST['pid'];
            $data['orderno']=$_POST['allocation_orderno'];
            $data['mobile']=$_POST["mobile"];
            $data['qty']=$_POST['qty'];
            $data['blocks_list']=$_POST['blocks_list'];
            $data['plot_list']=$_POST['plot_list'];
            $data['allocatedcount']=$_POST['allocatedcount'];
            if($data['allocatedcount'] < $data['qty']){
            $this->model->allocate($data);
            header('location: '. URL . 'admcustomeraccount/managedetails/'.$data['orderno']);
           // $this->view->render('admcustomeraccount/managedetails/'.$data['orderno']);
            }else{
                $newurl= URL.'admcustomeraccount/managedetails/'.$data['orderno'];
                echo '<script type="text/javascript">';
			            echo 'alert("You can not allocate more than number of plot acquired");
			            window.location.href = "'.$newurl.'"';
			          echo "</script>";

            }
            
            
        }
        public function managedetails($orderno){
            
            //echo $orderno;
            
            $this->view->dailyhistory=$this->model->dailyhistory($orderno);
            $this->view->orderdetails=$this->model->orderdetails($orderno);
            $this->view->attributedpayments=$this->model->attributedpayments($orderno);
            $this->view->nameofclient=$this->model->nameofclient($orderno);
            $this->view->numofmonthlengthforaproduct=$this->model->numofmonthlengthforaproduct($orderno);
            $this->view->blocks_list=$this->model->blocks_list($orderno);
            $this->view->plot_list=$this->model->plot_list($orderno);
            $this->view->pastallocated=$this->model->pastallocated($orderno);
            $this->view->allocated=$this->model->allocated($orderno);
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

