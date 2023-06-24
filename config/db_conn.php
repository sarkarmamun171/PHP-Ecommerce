<?php 
$host = "localhost";
$username ="root";
$password = "";
$database ="phpecom";

$conn =mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    die("Connected failed".mysqli_connect_error());
}


?>