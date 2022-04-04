<?php
session_start();
if(!isset($_SESSION['loggedinAsStudent']) || $_SESSION['loggedinAsStudent']!=true){
    header("location: login.php");
    exit;
}
?>

<?php include 'conn.php';?>
<?php


//creating variables to store del from view.php

$enroll_record=$_GET['enroll'];
$e_id = $_SESSION['user_id'];
$query="INSERT INTO `record` (`user_ids`, `resource_ids`) VALUES ('$e_id', '$enroll_record')";

// creating deleted variable to display message

if(mysqli_query($conn,$query)){

	echo "<script>window.open('record.php','_self')</script>";
}
?>
