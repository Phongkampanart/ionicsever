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
    $productid = $data["productid"];
    $productname = $data["productname"];
    $productprice = $data["productprice"];
    $productdetail = $data["productdetail"];

    $sql = "insert into product
            (productid, productname, productprice, productdetail)
        values
            ('$productid', '$productname', '$productprice', '$productdetail')
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