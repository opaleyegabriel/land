<?php

class Dashboard extends Controller{
    function __construct()
    {
         parent::__construct();
        Session::init();
        $this->view->js=array('dashboard/js/default.js');
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
          $this->view->checkforunsettledpayments=$this->model->checkforunsettledpayments();
          $this->view->dateofcontractactivation=$this->model->dateofcontractactivation(); 

            $this->view->allitems=$this->model->allitems();
            $this->view->myrewards=$this->model->myrewards();
            $this->view->allmyproducts=$this->model->all_ind_products(); 
                       
            $this->view->render('dashboard/index');

        }

        public function renewnow(){
          $data=array();
          $data['orderno']=$_POST['orderno'];
          $data['newstartdate']=$_POST['newstartdate'];  
           print_r($data);
           exit();
          //$this->model->renewnow($data);
           //$this->view->render('dashboard/index');
        }

        public function prconfirm(){        
        session::set('fresh',true);
         header('location: '. URL . 'hoogpay');
        }
       
       public function paynow(){
         $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['amount']=$_POST['amount'];       
        $data['credit']=$_POST['credit'];
       // print_r($data);
       // exit();

        if(isset($_POST['usepaystack2'])){
          Session::set('mmb',$data['mobile']);
          Session::set('orderno',$data['orderno']);
          Session::set('amount',$data['amount']);
          //echo Session::get('orderno');
          header('location: '. URL . 'subcheckout');

        }else{
          Session::set('mmb',$data['mobile']);
          Session::set('orderno',$data['orderno']);
          Session::set('amount',$data['amount']);        
          header('location: '. URL . 'hoogpay2');
        }

        
        //echo "<pre>";
        //print_r($data);
       }

       public function payagain(){
        $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['refid']=$_POST['refid'];       
        $data['credit']=$_POST['credit'];
        $this->model->payagain($data);

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
        public function saveorder(){
          $data=array();

           for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNumber .= mt_rand(0, 10);
              }
              for ($randomNum = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNum .= mt_rand(0, 4);
              }
          if(isset($_POST["pid"])){
            //check if paystack is selected
            if(isset($_POST['usepaystack'])){
              $data["pid"]=$_POST["pid"];           
            $data["price"]=$_POST["price"];
            $data["pqty"]=$_POST["qty"];
            $data["deposit"]=($_POST["deposit"]) * ($_POST["qty"]);
            $data['orderno']=$randomNumber.$randomNum;
            $data['mobile']=session::get('lphone');
           // $this->view->allparas=$data;
            $this->model->saveorder($data);
           //  header('location: '. URL . 'hoogpay/firstcheckout');   
            //$this->view->render('firstcheckout/index');
            header('location: '. URL . 'firstcheckout');   

          }else{
            //use normal system
            $data["pid"]=$_POST["pid"];           
            $data["price"]=$_POST["price"];
            $data["pqty"]=$_POST["qty"];
            $data["deposit"]=($_POST["deposit"]) * ($_POST["qty"]);
            $data['orderno']=$randomNumber.$randomNum;
            $data['mobile']=session::get('lphone');
           // $this->view->allparas=$data;
            $this->model->saveorder($data);
             header('location: '. URL . 'hoogpay');    
          }
            
           //echo "<pre>";
           //print_r($data);
          }

        }
        
        public function withdraw(){
          $data=array();
          $data['sevenpcent']=$_POST['sevenpcent'];
          $data['bank']=$_POST['bank'];
          $this->model->withdraw($data);
        }
        public function offset(){
          $data=array();
          $data['sevenpcent']=$_POST['sevenpcent'];
          $data['orderno']=$_POST['orderno'];          
          $this->model->offset($data);
        }

        
       
        public function logout(){
          Session::destroy();
          header('location: '. URL . 'index');
          exit;
        }
}
