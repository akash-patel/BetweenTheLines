<?php

	// Initialize session
	session_start();

	// Check, if user is already login, then jump to secured page
	if (isset($_SESSION['username'])) {
		header('Location: securedpage.php');
	}

?>

<html>
	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Between the Lines - Reserve, Pay, and Park!</title>
	</head>

	<body>
	<div align="center">

		<h1>Welcome to Between the Lines!</h1>

		<h3>User Registration</h3>

		<font color="red">
			<?php 
				if (isset($_SESSION['error']))
				{
					echo $_SESSION['error'] . '<br /><br />';
					$_SESSION['error'] = NULL;
				}
			?>
		</font>

		<table border="0">
			<form method="POST" action="registerproc.php">
			<tr><td>First Name:</td><td><input type="text" name="firstname" size="20"></td></tr>
			<tr><td>Last Name:</td><td><input type="text" name="lastname" size="20"></td></tr>
			<tr><td>Email Address:</td><td><input type="text" name="email" size="20"></td></tr>
			<tr><td>Username:</td><td><input type="text" name="username" size="20"></td></tr>
			<tr><td>Password:</td><td><input type="password" name="password" size="20"></td></tr>
			<tr><td>Confirm Password:</td><td><input type="password" name="password2" size="20"></td></tr>
			<tr><td>&nbsp;</td><td><input type="submit" value="Register"></td></tr>
			</form>
		</table>

		<a href="index.php">Back to Login</a>
	</div>


	</body>


</html>