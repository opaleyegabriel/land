<?php

class Apsitevisit extends Controller{
    function __construct(){
                parent::__construct();
                Session::init();
                $this->view->js=array('apsitevisit/js/default.js');
                $logged=Session::get('adminuser');
                $usertype=Session::get('usertype');
                if ($logged==false)
                {
                    Session::destroy();
                    header('location: '. URL . 'admlogin');
                    exit;
                }elseif ($usertype != 1) //super admin is 1 other admin is 0
                {
                    # code...
                    header('location: '. URL . 'admdashboard');

                } 
                

        }
              function index(){
                   $this->view->listofsitevisit2approve=$this->model->listofsitevisit2approve(); 
                  $this->view->render('apsitevisit/index');

            }

            public function approvesitevisit($id){
            	$this->view->getapprovallist=$this->model->approvesitevisit($id);
            	$this->view->render('apsitevisit/checkdetails');
            	 //header('location: '. URL . 'apsitevisit/checkdetails');
            }

            public function effectsiteapproval(){
              $data=array();
              $data['amount']=$_POST['amount'];
              $data['decision']=$_POST['decision'];
              $data['comment']=$_POST['comment'];
              $data['id']=$_POST['id'];
              $data['userrequest']=$_POST['userrequest'];
              $data['branchid']=$_POST['requestby'];
              $data['descr']="Being amount for site visit by  ".$data['userrequest'];
              //echo "<pre>";
              //print_r($data);
              $this->model->effectsiteapproval($data);
              $this->view->render('apsitevisit/index');

            }
}