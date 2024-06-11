<?php
	//Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../model/client.php';

	//Instantiate DB & Connect
	$database = new Database();
	$db= $database->connect();

	//instantiate user object
    $client= new Client($db);

    //client list query
    $result=$client->read();

    //Get Row Count
    $num = $result->rowCount();

    //Check if there any cooperatives
    if($num > 0){
        //record array
        $user_arr=array();
        while($row=$result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $user_list=array(
                'id'=>$id,
                'name' =>$name,
                'phone' =>$phone,
                'email' =>$email,
                'agentcode' =>$agentcode,
                'accountofficer' =>$accountofficer
                );
            //push to the array
        array_push($user_arr, $user_list);
        }
        //Turn it to JSON and OUTPUT
        echo json_encode($user_arr);

    }else{
        // No Cooperatives
        echo json_encode(
            array('message' =>'No client Record found')
            );
    }
