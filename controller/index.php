<?php

class Index extends Controller
{
  function __construct()
  {
      parent::__construct();
      Session::init();
      $this->view->js=array('index/js/default.js');  
        
  }
  //https://demo.w3layouts.com/demos_new/template_demo/27-05-2019/land-demo_Free/568639772/web/register.html
  function index(){
  //echo 'INSIDE INDEX INDEX';
    $this->view->render('index/index');
  }
  public function user(){
    header('location: '. URL . 'index');
    exit;
  }
public function phone(){
  $data=array();
  $data['phone']=$_POST['phone'];
  //echo "<pre>";
  //print_r($data);
  $this->model->phone($data);
}
public function email(){
  $data=array();
  $data['email']=$_POST['email'];
  //echo "<pre>";
  //print_r($data);
  $this->model->email($data);
}

    public function createaccount()
    {
      if($_POST["agentcode"]){
        $data=array();
        $data['name']=$_POST['name'];
        $data['phone']=$_POST['phone'];
        $data['email']=$_POST['email'];
        $data['password']=$_POST['password'];
        $data['confirmpassword']=$_POST['confirmpassword'];
        $data['agentcode']=$_POST['agentcode'];
         
      }else
      {
        $data=array();
        $data['name']=$_POST['name'];
        $data['phone']=$_POST['phone'];
        $data['email']=$_POST['email'];
        $data['password']=$_POST['password'];
        $data['confirmpassword']=$_POST['confirmpassword'];  
        $data['agentcode']="08034453549";    
        


      }
     // echo "<pre>";
      //print_r($data);
      //exit();
      $this->model->createaccount($data);
      
    }
                  public function lphone(){
                  $data=array();
                  $data['lphone']=$_POST['lphone'];
                  //echo "<pre>";
                  //print_r($data);
                  $this->model->lphone($data);
                  }

                  public function login(){
                  $data=array();
                    $data['lphone']=$_POST['lphone'];
                  $data['lpassword']=$_POST['lpassword'];
                  //echo "<pre>";
                  //print_r($data);
                  $this->model->login($data);

                  }
                  public function createagentaccount(){
                    for ($randomNumber1 = mt_rand(1, 6), $i = 1; $i < 6; $i++) {
                $randomNumber1 .= mt_rand(0, 6);
              }
              



          $data=array();
          $data['agentid']=$randomNumber1;
          $data['path']="public/profileimages/";
$data['tdate']=date('d-m-Y H:i:s');
          $data['name']=$_POST['name'];
          $data['agentphone']=$_POST['agentphone'];
          $data['address']=$_POST['address'];
          $data['agentemail']=$_POST['agentemail'];
         $data['password']=$_POST['password'];
         $data['confirmpassword']=$_POST['confirmpassword'];
          for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
    $randomNumber .= mt_rand(0, 10);
}
$data['igmname']=addslashes($_FILES['file']['name']);
$data['rand']=$randomNumber;
$string0=$data['rand'].(addslashes($_FILES['file']['name']));
$data['paymentimage'] = str_replace(' ','',$string0);
$data['urlid']=$data['path'].$data['paymentimage'];
         // echo "<pre>";
          //print_r($data);
          $this->model->createagentaccount($data);

        }
                                    public function agentphone(){
                          $data=array();
                          $data['phone']=$_POST['phone'];
                         //echo "<pre>";
                          //print_r($data);
                         $this->model->agentphone($data);
                        }
                        public function agentemail(){
                      $data=array();
                      $data['email']=$_POST['email'];
                     //echo "<pre>";
                      //print_r($data);
                     $this->model->agentemail($data);
                    }
                  }
