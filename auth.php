<?php    
session_start();
if(!isset($_SESSION['logedin'])||$_SESSION['logedin']!=true){
    header("location : login.php");
    exit;
}
?>