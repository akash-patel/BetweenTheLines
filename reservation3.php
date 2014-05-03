<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	include('functions.php');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>


<!DOCTYPE html>
<html>
	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>

	<?php

		$cc = $_POST['creditcard'];

		if (is_valid_luhn($cc) == 0 or strlen($cc) != 16){
			$_SESSION['error'] = 'You have entered an invalid credit card number.';
			header('Location: reservation2.php');
			exit;
		}

		if (cc_type($cc) == "0"){
			$_SESSION['error'] = 'You have entered a credit card number from a provider which is not accepted. Please use Visa, Mastercard, Discover, or American Express. Thank you.';
			header('Location: reservation2.php');
			exit;
		}



		$month = $_POST['ccmm'];
		$year = $_POST['ccyy'];
		$ccexpdate = $year . '-' . $month . '-' . '31';


		if (is_cc_expired($ccexpdate)){
			$_SESSION['error'] = 'Your credit card is expired!';
			header('Location: reservation2.php');
			exit;
		}

		$last_4_digits = substr($cc, 12, 4);

		$username = $_SESSION['username'];
		$reservationid = strtotime("now");
		$licenseplate = $_POST['licenseplate'];
		$state = $_POST['state'];
		$startdatetime = $_SESSION['startdatetime'];
		$enddatetime = $_SESSION['enddatetime'];
		$startdatetimesec = $_SESSION['startdatetimesec'];
		$enddatetimesec = $_SESSION['enddatetimesec'];
		$cvv = $_POST['cvv'];
		$cost = $_SESSION['cost'];


		/*Code to insert reservation into the database*/
		$query = "INSERT INTO reservations(username, reservationid, licenseplate, state, startdatetime, enddatetime, startdatetimesec, enddatetimesec, cc, cvv, ccexpdate) VALUES ('$username', $reservationid, '$licenseplate', '$state' , '$startdatetime','$enddatetime', $startdatetimesec, $enddatetimesec , '$cc' , $cvv , '$ccexpdate' )";
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());

		$_SESSION['startdatetime'] = NULL;
		$_SESSION['startdatetimesec'] = NULL;
		$_SESSION['enddatetime'] = NULL;
		$_SESSION['enddatetimesec'] = NULL;
		$_SESSION['cost'] = NULL;
		
	?>

	<h3><font color="green">Your reservation was successful!</font></h3>
	Here are the details of your reservation:

	<br>ReservationID: <?php echo $reservationid;?>
	<br>Start: <?php echo $startdatetime;?>
	<br>End: <?php echo $enddatetime;?>
	<br>License Plate: <?php echo $licenseplate;?>
	<br>Credit Card: <?php echo cc_type($cc) .  "xxxxxxxxxxxx" . $last_4_digits;?>
	<br><b>Cost: <?php echo '$' . $cost;?></b>

	<br><br><input type="button" onClick="window.print()" value="Print This Page"/>

	<p>Click <a href="securedpage.php">here</a> to return your portal.</p>
	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
