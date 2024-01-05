<?php

class Billings extends Controller{
    function __construct()
            {
                parent::__construct();
                Session::init();
                $this->view->js=array('billings/js/default.js');
                $logged=Session::get('loggedIn');
                        if ($logged==false)
                        {
                            Session::destroy();
                            header('location: '. URL . 'index');
                            exit;
                        }

        }
    function index(){    
        $this->view->allmyproducts=$this->model->allmyproducts();
        $this->view->render('billings/index');
    }
    
    public function checkout(){
        $data=array();
        if(isset($_POST["totalamt"])){
            $data["totalamt"]=$_POST["totalamt"];
            $data["paidamt"]=$_POST["paidamt"];
            $data["balance"]=$_POST["balance"];
            $data["due"]=$_POST["due"];
            $data["amt"]=$_POST["amt"];
            $this->view->allparas=$data;
           $this->view->render("billings/checkout");
        }

    }
    public function payAgain(){
        $data=array();
        $data['mobile']=$_POST['mobile'];
        $data['orderno']=$_POST['orderno'];
        $data['refid']=$_POST['refid'];       
        $data['credit']=$_POST['credit'];
        $this->model->payAgain($data);

    }


}
