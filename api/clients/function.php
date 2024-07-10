<?php

require '../inc/dbcon.php';

function getClientList(){
    global $conn;
    $query = "SELECT * FROM tbl_profile";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            
            $data = 
                
                $res
            ;
            header("HTTP/1.0 200 OK");
            return json_encode($data); 
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Customer Found',
            ];
            header("HTTP/1.0 404 No Customer Found");
            return json_encode($data); 
        }
    }
    else
    {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);

    }
}



function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 unprocessible Entity");
    echo json_encode($data);
    exit();
}

function storeClient($customerInput){
    global $conn;

    $name = mysqli_real_escape_string($conn,$customerInput['name']);
    $phone = mysqli_real_escape_string($conn,$customerInput['phone']);
    $email = mysqli_real_escape_string($conn,$customerInput['email']);
    $agentcode = mysqli_real_escape_string($conn,$customerInput['agentcode']);
    $accountofficer = mysqli_real_escape_string($conn,$customerInput['accountofficer']);

    if(empty(trim($name))){
        return error422('Enter name');
    }
    elseif(empty(trim($phone))){

        return error422('Enter Phone Number');
    }elseif(empty(trim($email)))
    {
        return error422('Enter Email');
    }elseif(empty(trim($agentcode))){

        return error422('Enter Agent Mobile Number');
    }elseif(empty(trim($accountofficer))){

        return error422('Enter Account Office Number');

    }else{
        $query = "INSERT INTO tbl_profile (name,phone,email,agentcode,accountofficer) VALUES ('$name','$phone','$email','$agentcode','$accountofficer')";
        $result = mysqli_query($conn,$query);

        if($result){
            $data = [
                'status' => 201,
                'message' => 'Client Created Successfully',
            ];
            header("HTTP/1.0 201 Created");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
    }

}


function getAClient($clientParams){
    global $conn;
    if($clientParams['phone'] == null){
        return error422('Enter your Client Phone Number');
    }

    $clientPhone = mysqli_real_escape_string($conn,$clientParams['phone']);
    $query = "SELECT * FROM tbl_profile WHERE phone='$clientPhone' LIMIT 1";
    $result = mysqli_query($conn,$query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);
            
            $data = 
                
            $res;
            header("HTTP/1.0 200 OK");
            return json_encode($data); 

        }else{
            $data = [
                'status' => 404,
                'message' => 'No Client Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}




function  updateClient($customerInput, $params){
    global $conn;

    if(!isset($params['phone'])){
        return error422('Client Phone number not found in the URL');
    }
    elseif($params['phone'] == null){
        return error422('Enter Client Phone Number');
    }

    $clientphone = mysqli_real_escape_string($conn,$params['phone']);

    $name = mysqli_real_escape_string($conn,$customerInput['name']);
    $email = mysqli_real_escape_string($conn,$customerInput['email']);
    $agentcode = mysqli_real_escape_string($conn,$customerInput['agentcode']);
    $accountofficer = mysqli_real_escape_string($conn,$customerInput['accountofficer']);

    if(empty(trim($name))){
        return error422('Enter name');
    }
    elseif(empty(trim($email)))
    {
        return error422('Enter Email');
    }elseif(empty(trim($agentcode))){

        return error422('Enter Agent Mobile Number');
    }elseif(empty(trim($accountofficer))){

        return error422('Enter Account Office Number');

    }else{
        $query = "UPDATE tbl_profile SET name='$name',email='$email',agentcode='$agentcode',accountofficer='$accountofficer' WHERE phone='$clientphone' LIMIT 1";
        $result = mysqli_query($conn,$query);

         if($result){
            $data = [
                'status' => 200,
                'message' => 'Client Updated Successfully',
            ];
            header("HTTP/1.0 200 Created");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
    }

}


function deleteClient($params){
    global $conn;
    
    if(!isset($params['phone'])){
        return error422('Client Phone number not found in the URL');
    }
    elseif($params['phone'] == null){
        return error422('Enter Client Phone Number');
    }

    $clientPhone = mysqli_real_escape_string($conn,$params['phone']);

    $query = "DELETE FROM tbl_profile WHERE phone='$clientPhone' LIMIT 1";
    $result =  mysqli_query($conn,$query);

    if($result){
       
        $data = [
            'status' => 204,
            'message' => 'Client Successfully Deleted',
        ];
        header("HTTP/1.0 204 Deleted");
        echo json_encode($data);

    }
    else
    {

        $data = [
            'status' => 404,
            'message' => 'Client Not Found',
        ];
        header("HTTP/1.0 404 Not Found");
        echo json_encode($data);
    }


}

?>