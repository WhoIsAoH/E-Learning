<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eLearning";
$conn = new mysqli($servername, $username, $password,$dbname);
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
?>