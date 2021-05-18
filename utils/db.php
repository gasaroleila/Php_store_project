<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'store_managment';

$connection = mysqli_connect($host,$user,$password,$db);

if(!$connection) {
    echo "ERROR". mysqli_connect_error();
}

?>