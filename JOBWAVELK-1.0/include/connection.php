<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'jobwavelk';

$con = mysqli_connect($host, $user, $password, $database);

if(!$con){
    echo "Connection error ". mysqli_connect_error();
}

?>