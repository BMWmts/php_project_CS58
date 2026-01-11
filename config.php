<?php 
$host="localhost";
$user="root";
$pass="";
$db="myDatabase";

$conn = new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    die("myDatabase connection failed:".$conn->connect_error);
}
?>