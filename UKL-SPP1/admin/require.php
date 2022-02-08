<?php 
session_start();
require_once("koneksi.php");

if(!isset($_SESSION['username'])){
    header("location: ../index.html");
}else{
    $username = $_SESSION['username'];
}
?>