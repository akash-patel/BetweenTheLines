<?php

	// Initialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>

	<div align="center">

		<?php

			$vehiclesize = $_POST['vehiclesize'];
			$starttime = $_POST['starttime'];
			$endtime = $_POST['endtime'];

			echo "You have selected to create reservation for a(n) " . $vehiclesize . " vehicle is between " . $starttime . " and " . $endtime . ".";

		?>

		<form method="POST" action="reservation3.php">

			<br><br>Please enter the license plate of your vehicle: <input type="text" name="licenseplate" size="10">

			<br><br>Please enter your credit card information: <input type="text" name="creditcard" size="16">

			<br><br>Please enter your CVV/CVV2 code: <input type="text" name="cvv" size="4">

			<br><br><input type="submit" value="Next">

		</form>

	</div>

	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
