<?php
ob_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
?>

<?php

	if($username=="admin"){
		include "admin.php";
	}else{
		include "user.php";
	}
}else{
	header("Location: index.php");
}	
?>