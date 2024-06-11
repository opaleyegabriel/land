<?php
	//Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../model/user.php';

	//Instantiate DB & Connect
	$database = new Database();
	$db= $database->connect();

	//instantiate users list object
	$user= new User($db);

	//GET username and pwd from URL
	$user->username=isset($_GET['username']) ? $_GET['username'] :die();
	$user->pwd=isset($_GET['pwd']) ? $_GET['pwd'] :die();

	
	//GET user single
	$user->read_single();

	//Create Array
	$user_arr=array();
	$user_list=array(
                'id'=>$user->id,
                'username'=>$user->username,
                'pwd'=>$user->pwd,
                'usertype'=>$user->usertype,
                'branch'=>$user->branch,
                'mobile'=>$user->mobile,
				'loginstatus'=>$user->loginstatus,
                'fullname'=>$user->fullname    

		);
 array_push($user_arr, $user_list);
	//make Json
	echo json_encode($user_arr);
