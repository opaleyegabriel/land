<?php

class Adminproduct extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
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
                  $this->view->render('adminproduct/index');

                                }
                        public function user(){
                        header('location: '. URL . 'adminproduct');
                        exit;
                        }
                            
    function products(){
      $data=array();
      $data['path']="public/productimages/";
      $data['tdate']=date('d-m-Y H:i:s');
      $data['productname']=$_POST['productname'];
      $data['description']=$_POST['description'];
      $data['quantity']=$_POST['quantity'];
      $data['price']=$_POST['price'];
      $data['deposit']=$_POST['deposit'];
      $data['daily']=$_POST['daily'];

                              for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                              $randomNumber .= mt_rand(0, 10);
                          }

                              $data['rand']=$randomNumber;
                              $string0=$data['rand'].(addslashes($_FILES['file1']['name']));
                              $data['itemimage'] = str_replace(' ','',$string0);
                              $data['urlid']=$data['path'].$data['itemimage'];

                              echo "<pre>";
                              print_r($data);
                           $this->model->products($data);
                              
    }


}
