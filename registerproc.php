<?php

	// Inialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	
	if ( md5($_POST['password']) == md5($_POST['password2']) ){
		$value = mysql_query("INSERT INTO users (username, password, firstname, lastname, email) VALUES ('$_POST[username]', md5('$_POST[password]'), '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]')");
		$_SESSION['username'] = $_POST['username'];
		header('Location: securedpage.php');
	}
	else{
		header('Location: register.php');
	}

?>