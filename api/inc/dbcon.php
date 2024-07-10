<?php
//DB Params
$host='localhost';

//private $db_name='cfrmtsjr_land';
$db_name='dreamcit_land';

//private $db_name='yeasaorg_power2pay_coop';
//private $username='cfrmtsjr_land';
 $username='dreamcit_root';
//private $username='yeasaorg_root';

//private $password ='Olabode@01';
$password ='Olabode@001';

$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}


?>