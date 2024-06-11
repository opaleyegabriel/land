<?php
	//Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../model/client.php';

	//Instantiate DB & Connect
	$database = new Database();
	$db = $database->connect();

	//instantiate users list object
	$client= new Client($db);

	//GET clientname and pwd from URL
	$client->phone=isset($_GET['phone']) ? $_GET['phone'] :die();
		
	//GET client single
	$client->read_single();

	//Create Array
	$client_arr=array();
	$client_list=array(
                'id'=>$client->id,
                'name'=>$client->name,
                'phone'=>$client->phone,
                'email'=>$client->email,
                'agentcode'=>$client->agentcode,
                'accountofficer'=>$client->accountofficer
				

		);
       array_push($client_arr, $client_list);
	   //make Json
	   echo json_encode($client_arr);
