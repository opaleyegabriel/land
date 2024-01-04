<?php

class Buymore extends Controller{
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
    $this->view->allmyproducts=$this->model->all_ind_products(); 
    $this->view->allitems=$this->model->allitems();
    $this->view->render('buymore/index');

    }
    public function reorder(){
        $data=array();
         for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNumber .= mt_rand(0, 10);
              }
              for ($randomNum = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNum .= mt_rand(0, 4);
              }
          if(isset($_POST["pid"])){
             $data['deposit']= $_POST["deposit1"] * $_POST["qty"];
             $data["price"]=$_POST["price"];
             $data['qty']=$_POST['qty'];
             $data['mobile']=$_POST['mobile'];
             $data['pid']=$_POST['pid'];
             $data['orderno']=$randomNumber.$randomNum;
             //echo "<pre>";
             //print_r($data);
             $this->model->reorder($data);
          }



        
    }
}