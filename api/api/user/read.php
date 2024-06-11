<?php
	//Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../model/user.php';

	//Instantiate DB & Connect
	$database = new Database();
	$db= $database->connect();

	//instantiate user object
    $users= new User($db);

    //users list query
    $result=$users->read();

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
                'username' =>$username,
                'pwd' =>$pwd,
                'usertype' =>$usertype,
                'branch' =>$branch,
                'mobile' =>$mobile,
                'loginstatus'=>$loginstatus,
                'fullname' =>$fullname        
                );
            //push to the array
        array_push($user_arr, $user_list);
        }
        //Turn it to JSON and OUTPUT
        echo json_encode($user_arr);

    }else{
        // No Cooperatives
        echo json_encode(
            array('message' =>'No user Record found')
            );
    }
