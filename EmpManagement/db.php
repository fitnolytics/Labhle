<?php 

function connect_db(){
	$connetionStatus = mysqli_connect("localhost", "u484679595_try", "rohitguptalabhle", "u484679595_try");
	if(mysqli_connect_error()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			"(" . mysqli_connect_error() . ")"
		);
	}
	return $connetionStatus;
}

function loggedin()
{
	if(isset($_SESSION["id"])&&!empty($_SESSION["id"]))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function find_user($connectionStatus, $username, $password){
	$query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_num_rows($result) == 1){
		return mysqli_fetch_assoc($result);
	}
	return false;
}

function signup_user($connectionStatus, $fname, $lname, $email, $mphone, $gender, $dob, $username, $password, $address, $emphone, $type, $intern_time, $join_date, $work_field, $work_pos, $team_id, $salary){
	$query = "INSERT INTO `users`(`username`, `password`, `type`, `email`, `fname`, `lname`, `gender`, `dob`, `address`, `mphone`, `emphone`, `intern_time`, `join_date`, `work_field`, `work_pos`, `salary`, `team_id`) VALUE('$username', '$password', '$type', '$email', '$fname', '$lname', '$gender', '$dob', '$address', '$mphone', '$emphone', '$intern_time', '$join_date', '$work_field', '$work_pos', '$salary', '$team_id')";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_affected_rows($connectionStatus) == 1){
		return true;
	}
	return false;
}

function update_user($connectionStatus, $id, $fname, $lname, $email, $mphone, $gender, $dob, $username_n, $address, $emphone){
	$query = "UPDATE `users` SET `username`='$username_n', `email`='$email',`fname`='$fname',`lname`='$lname',`gender`='$gender',`dob`='$dob',`address`='$address',`mphone`='$mphone',`emphone`='$emphone' WHERE `id`='$id'";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_affected_rows($connectionStatus) == 1){
		return true;
	}
	return false;
}

function is_member($connectionStatus, $username){
	$query = "SELECT * FROM `users` WHERE `username`='$username'";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_num_rows($result) == 1){
		return true;
	}
	return false;
}

/*function edit($connectionStatus, $fname, $lname, $email, $mphone, $gender, $dob, $username, $password, $address, $emphone, $type, $intern_time, $join_date, $work_field, $work_pos, $team_id, $salary){
	$query = "INSERT INTO `users`(`username`, `password`, `type`, `email`, `fname`, `lname`, `gender`, `dob`, `address`, `mphone`, `emphone`, `intern_time`, `join_date`, `work_field`, `work_pos`, `salary`, `team_id`) VALUE('$username', '$password', '$type', '$email', '$fname', '$lname', '$gender', '$dob', '$address', '$mphone', '$emphone', '$intern_time', '$join_date', '$work_field', '$work_pos', '$salary', '$team_id')";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_affected_rows($connectionStatus) == 1){
		return true;
	}
	return false;
}*/

function is_correct_password($connectionStatus, $username, $password){
	$query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_num_rows($result) == 1){
		return true;
	}
	return false;
}

function change_password($connectionStatus, $username, $nPassword){
	$query = "UPDATE `users` SET `password`='$nPassword' WHERE `username`='$username'";
	$result = mysqli_query($connectionStatus, $query);
	if(mysqli_affected_rows($connectionStatus) == 1){
		return true;
	}
	return false;
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>