<?php
session_start();
if(!isset($_SESSION['loggedinAsAdmin']) || $_SESSION['loggedinAsAdmin']!=true){
    header("location: login.php");
    exit;
}
?>