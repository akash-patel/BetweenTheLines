<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

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

		function is_valid_luhn($number) {
			settype($number, 'string');
			$sumTable = array(array(0,1,2,3,4,5,6,7,8,9), array(0,2,4,6,8,1,3,5,7,9));
			$sum = 0;
			$flip = 0;
			for ($i = strlen($number) - 1; $i >= 0; $i--)
				$sum += $sumTable[$flip++ & 0x1][$number[$i]];
			
			return $sum % 10 === 0;
		}

		function is_cc_expired($date) {
			/*Returns 1 if expired*/
			if (strtotime($date) < strtotime("now"))
				return 1;
			else
				return 0;
		}

		function cc_type($cc){
			$first_digit = substr($cc, 0, 1);

			if ($first_digit == 4)
				return "Visa ";
			else if ($first_digit == 5){
				
				$second_digit = substr($cc, 1, 1);

				if ($second_digit >= 1 and $second_digit <= 5)
					return "Mastercard ";
				else
					return 0;
			}else if ($first_digit == 6){
				$second_to_fourth_digits = substr($cc, 1, 3);

				if($second_to_fourth_digits == 011 or ($second_to_fourth_digits >= 440 and $second_to_fourth_digits <= 449) or ($second_to_fourth_digits >= 500 and $second_to_fourth_digits <= 599))
					return "Discover ";
				else
					return 0;
			}else if  ($first_digit == 3){
				$second_digit = substr($cc, 1, 1);

				if($second_digit == 4 or $second_digit == 7)
					return "American Express ";
				else
					return 0;
			}else
				return 0;

		}

		$cc = $_POST['creditcard'];

		if (is_valid_luhn($cc) == 0 or strlen($cc) != 16){
			$_SESSION['error'] = 'You have entered an invalid credit card number.';
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

	<font color="red">Your reservation was successful!</font>
	<br>Here are the details of your reservation:

	<br>Start: <?php echo $startdatetime;?>
	<br>End: <?php echo $enddatetime;?>
	<br>Credit Card: <?php echo cc_type($cc) .  "xxxxxxxxxxxx" . $last_4_digits;?>
	<br>Cost: <?php echo '$' . $cost;?>

	<br><input type="button" onClick="window.print()" value="Print This Page"/>

	<p>Click <a href="securedpage.php">here</a> to return your portal.</p>
	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
