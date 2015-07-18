<?php
ob_start();
session_start();

if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){
	header("Refresh: 2; URL=dashboard.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Success</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="wrapper">
		<div id="success-info">
			<h3>You are successfully authenticated!!</h3>
			<h4>Redirecting to your Profile...</h4>
		</div>
	</div>
</body>
</html><?php
}else{?>You are not logged-in.<?php
	header("Refresh: 3; URL=index.php");
}	
?>