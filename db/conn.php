<?php

$server = '192.168.15.5';
$user = 'root';
$pass = 'root';
$db = 'controle';

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error){
    die('Connection failed:'. $conn->connect_error);
}else{
}