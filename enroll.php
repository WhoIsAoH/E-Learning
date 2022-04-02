<?php include 'conn.php';?>
<?php



//creating variables to store del from view.php

$enroll_record=$_GET['en'];

// query to delete

$query="INSERT into `record` WHERE `record_id` = '$enroll_record'";

// creating deleted variable to display message

if(mysqli_query($conn,$query)){

	echo "<script>window.open('news.php?deleted=Record has been deleted successfully','_self')</script>";

}
?>