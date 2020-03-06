<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ionicapp';

$connect = new mysqli($servername, $username, $password, $dbname);
$connect->set_charset('utf8');

if($connect->connect_error){
    die("การเชื่อมต่อผิดพลาด  :".$connect->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if(count($data) > 0){
    $customerid = $data["customerid"];
    $customername = $data["customername"];
    $customerlastname = $data["customerlastname"];
    $customeraddress = $data["customeraddress"];
    $customertel = $data["customertel"];

    $sql = "insert into customers
            (customerid, customername, customerlastname, customeraddress, customertel )
        values
            ('$customerid', '$customername', '$customerlastname', '$customeraddress', '$customertel')
            ";

    if($connect->query($sql) === TRUE){
        $connect->close();
        return true;
    } else {
        $connect->close();
        return $connect->error;
    }
}

    $connect->close();

?>