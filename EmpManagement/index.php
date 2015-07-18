<?php
session_start();
if(isset($_SESSION["id"])){
	include 'dashboard.php';
}
else{
	include 'login.php';
}
?>