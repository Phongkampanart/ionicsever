<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ionicapp';

$connect = new mysqli($servername, $username, $password, $dbname);
$connect->set_charset('utf8');

if ($connect->connect_error) {
    die("การเชื่อมต่อผิดพลาด : " . $connect->connect_error);
}

$id = $_GET["id"];

$sql = "delete from customers where id = $id";

// $result = $connect->query($sql);

if ($connect->query($sql) === true) {
    $connect->close();
    return true;

} else {
    $connect->close();
    return $connect->error;

    $connect->close();

}