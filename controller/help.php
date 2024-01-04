<?php
class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('help/index');
    }
    public function other($arg = false){
        require 'models/help_model.php';
        $model=new Help_Model();
        $this->view->blah = $model->blah();
    }

    public function testy(){

            $qty=6;
            $actual=2000;
            $taken=3;
            $left=$actual - $taken;

            for ($i=0; $i <= $qty; $i++) { 
                $allocate=+ "Plot". $taken++ ;
            }
            return $allocate;
    }
}