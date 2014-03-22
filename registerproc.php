<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;

	$username = $_POST[username];
	$password = md5($_POST[password]);
	$password2 = md5($_POST[password2]);
	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
	$email = $_POST[email];

	$query = "SELECT * FROM users  WHERE username = '$username'";
	$result = mysql_query($query);

	if (!$result) die ("Database access failed: " . mysql_error());

	$rows = mysql_num_rows($result);

	if ($rows > 0){
		$_SESSION['error'] = "Error: This username has already been taken!";
		header('Location: register.php');
		exit;
	}

	if ($password != $password2){
		$_SESSION['error'] = "Error: The two passwords you entered do not match!";
		header('Location: register.php');
		exit;
	}

	if ($username != "" and $password != md5("") and $firstname != "" and $lastname != "" and $email != ""){

		$query = "INSERT INTO users (username, password, firstname, lastname, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";
		$result = mysql_query($query);

		if (!$result) die ("Database access failed: " . mysql_error());

		$_SESSION['username'] = $username;

		header('Location: securedpage.php');
	}
	else{
		$_SESSION['error'] = "Error: Please make sure you fill out all of the fields!";
		header('Location: register.php');
	}

?>