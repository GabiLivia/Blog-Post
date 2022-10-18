<?php

//setez variabilele pt baza de date
$host='localhost';
$username="root";
$password="admin1205gZE";
$db_name="kitchenDB";

$conn=new mysqli($host,$username,$password,$db_name);

if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);
}// echo 'connection succesful';
?>