<?php
session_start();
if(!isset($_SESSION['loggedinAsStudent']) || $_SESSION['loggedinAsStudent']!=true){
    header("location: login.php");
    exit;
}
?>