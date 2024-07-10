<?php
header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

	include_once '../../config/database.php';
	include_once '../../model/client.php';

	//Instantiate DB & Connect
	$database = new Database();
	$db= $database->connect();

	//instantiate client list object
	$client= new Client($db);

	//get Raw Posted Data
	$data=json_decode(file_get_contents("php://input"),true);
	$client->name=$data->name;
	$client->phone=$data->phone;
	$client->email=$data->email;
	$client->agentcode=$data->agentcode;
    $client->accountofficer=$data->accountofficer;
		
	//Create the record
	if($client->create()){
		echo json_encode(
			array('message' => 'Record Saved Succesfully','savestatus'=>'YES')

			);
	}else{
		echo json_encode(
			array('message' => 'Record Not Created','savestatus'=>'NO')

			);
	}
