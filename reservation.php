<?php

	// Initialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

	include('header.php');

?>


<!DOCTYPE html>
<html>

	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>	

	<div align="center">

		<font color="red">
			<?php 
				if (isset($_SESSION['error']))
				{
					echo $_SESSION['error'] . '<br /><br />';
					$_SESSION['error'] = NULL;
				}
			?>
		</font>

		<form method="POST" action="reservation2.php">
	
			Please choose the type of vehicle you will be creating a reservation for:

			<select name = "vehiclesize">
				<option value='-1'>Size</option>
				<option value="Regular">Regular</option>
				<option value="Oversized">Oversized</option>
			</select>



			<br><br> Select a start date for your reservation:
			<input type="date" name="startdate">

			<br><br> Select a start time for your reservation:

			<select name = "starttime">
				<option value='-1'>Start Time</option>
				<option value="00:00:00">12:00 AM</option>
				<option value="00:15:00">12:15 AM</option>
				<option value="00:30:00">12:30 AM</option>
				<option value="00:45:00">12:45 AM</option>
				<option value="01:00:00">01:00 AM</option>
				<option value="01:15:00">01:15 AM</option>
				<option value="01:30:00">01:30 AM</option>
				<option value="01:45:00">01:45 AM</option>
				<option value="02:00:00">02:00 AM</option>
				<option value="02:15:00">02:15 AM</option>
				<option value="02:30:00">02:30 AM</option>
				<option value="02:45:00">02:45 AM</option>
				<option value="03:00:00">03:00 AM</option>
				<option value="03:15:00">03:15 AM</option>
				<option value="03:30:00">03:30 AM</option>
				<option value="03:45:00">03:45 AM</option>
				<option value="04:00:00">04:00 AM</option>
				<option value="04:15:00">04:15 AM</option>
				<option value="04:30:00">04:30 AM</option>
				<option value="04:45:00">04:45 AM</option>
				<option value="05:00:00">05:00 AM</option>
				<option value="05:15:00">05:15 AM</option>
				<option value="05:30:00">05:30 AM</option>
				<option value="05:45:00">05:45 AM</option>
				<option value="06:00:00">06:00 AM</option>
				<option value="06:15:00">06:15 AM</option>
				<option value="06:30:00">06:30 AM</option>
				<option value="06:45:00">06:45 AM</option>
				<option value="07:00:00">07:00 AM</option>
				<option value="07:15:00">07:15 AM</option>
				<option value="07:30:00">07:30 AM</option>
				<option value="07:45:00">07:45 AM</option>
				<option value="08:00:00">08:00 AM</option>
				<option value="08:15:00">08:15 AM</option>
				<option value="08:30:00">08:30 AM</option>
				<option value="08:45:00">08:45 AM</option>
				<option value="09:00:00">09:00 AM</option>
				<option value="09:15:00">09:15 AM</option>
				<option value="09:30:00">09:30 AM</option>
				<option value="09:45:00">09:45 AM</option>
				<option value="10:00:00">10:00 AM</option>
				<option value="10:15:00">10:15 AM</option>
				<option value="10:30:00">10:30 AM</option>
				<option value="10:45:00">10:45 AM</option>
				<option value="11:00:00">11:00 AM</option>
				<option value="11:15:00">11:15 AM</option>
				<option value="11:30:00">11:30 AM</option>
				<option value="11:45:00">11:45 AM</option>
				<option value="12:00:00">12:00 PM</option>
				<option value="12:15:00">12:15 PM</option>
				<option value="12:30:00">12:30 PM</option>
				<option value="12:45:00">12:45 PM</option>
				<option value="13:00:00">01:00 PM</option>
				<option value="13:15:00">01:15 PM</option>
				<option value="13:30:00">01:30 PM</option>
				<option value="13:45:00">01:45 PM</option>
				<option value="14:00:00">02:00 PM</option>
				<option value="14:15:00">02:15 PM</option>
				<option value="14:30:00">02:30 PM</option>
				<option value="14:45:00">02:45 PM</option>
				<option value="15:00:00">03:00 PM</option>
				<option value="15:15:00">03:15 PM</option>
				<option value="15:30:00">03:30 PM</option>
				<option value="15:45:00">03:45 PM</option>
				<option value="16:00:00">04:00 PM</option>
				<option value="16:15:00">04:15 PM</option>
				<option value="16:30:00">04:30 PM</option>
				<option value="16:45:00">04:45 PM</option>
				<option value="17:00:00">05:00 PM</option>
				<option value="17:15:00">05:15 PM</option>
				<option value="17:30:00">05:30 PM</option>
				<option value="17:45:00">05:45 PM</option>
				<option value="18:00:00">06:00 PM</option>
				<option value="18:15:00">06:15 PM</option>
				<option value="18:30:00">06:30 PM</option>
				<option value="18:45:00">06:45 PM</option>
				<option value="19:00:00">07:00 PM</option>
				<option value="19:15:00">07:15 PM</option>
				<option value="19:30:00">07:30 PM</option>
				<option value="19:45:00">07:45 PM</option>
				<option value="20:00:00">08:00 PM</option>
				<option value="20:15:00">08:15 PM</option>
				<option value="20:30:00">08:30 PM</option>
				<option value="20:45:00">08:45 PM</option>
				<option value="21:00:00">09:00 PM</option>
				<option value="21:15:00">09:15 PM</option>
				<option value="21:30:00">09:30 PM</option>
				<option value="21:45:00">09:45 PM</option>
				<option value="22:00:00">10:00 PM</option>
				<option value="22:15:00">10:15 PM</option>
				<option value="22:30:00">10:30 PM</option>
				<option value="22:45:00">10:45 PM</option>
				<option value="23:00:00">11:00 PM</option>
				<option value="23:15:00">11:15 PM</option>
				<option value="23:30:00">11:30 PM</option>
				<option value="23:45:00">11:45 PM</option>
			</select>

			<br><br> Select an end date for your reservation:
			<input type="date" name="enddate">
			
			<br><br> Select an end time for your reservation:

			<select name = "endtime">
				<option value='-1'>End Time</option>
				<option value="00:00:00">12:00 AM</option>
				<option value="00:15:00">12:15 AM</option>
				<option value="00:30:00">12:30 AM</option>
				<option value="00:45:00">12:45 AM</option>
				<option value="01:00:00">01:00 AM</option>
				<option value="01:15:00">01:15 AM</option>
				<option value="01:30:00">01:30 AM</option>
				<option value="01:45:00">01:45 AM</option>
				<option value="02:00:00">02:00 AM</option>
				<option value="02:15:00">02:15 AM</option>
				<option value="02:30:00">02:30 AM</option>
				<option value="02:45:00">02:45 AM</option>
				<option value="03:00:00">03:00 AM</option>
				<option value="03:15:00">03:15 AM</option>
				<option value="03:30:00">03:30 AM</option>
				<option value="03:45:00">03:45 AM</option>
				<option value="04:00:00">04:00 AM</option>
				<option value="04:15:00">04:15 AM</option>
				<option value="04:30:00">04:30 AM</option>
				<option value="04:45:00">04:45 AM</option>
				<option value="05:00:00">05:00 AM</option>
				<option value="05:15:00">05:15 AM</option>
				<option value="05:30:00">05:30 AM</option>
				<option value="05:45:00">05:45 AM</option>
				<option value="06:00:00">06:00 AM</option>
				<option value="06:15:00">06:15 AM</option>
				<option value="06:30:00">06:30 AM</option>
				<option value="06:45:00">06:45 AM</option>
				<option value="07:00:00">07:00 AM</option>
				<option value="07:15:00">07:15 AM</option>
				<option value="07:30:00">07:30 AM</option>
				<option value="07:45:00">07:45 AM</option>
				<option value="08:00:00">08:00 AM</option>
				<option value="08:15:00">08:15 AM</option>
				<option value="08:30:00">08:30 AM</option>
				<option value="08:45:00">08:45 AM</option>
				<option value="09:00:00">09:00 AM</option>
				<option value="09:15:00">09:15 AM</option>
				<option value="09:30:00">09:30 AM</option>
				<option value="09:45:00">09:45 AM</option>
				<option value="10:00:00">10:00 AM</option>
				<option value="10:15:00">10:15 AM</option>
				<option value="10:30:00">10:30 AM</option>
				<option value="10:45:00">10:45 AM</option>
				<option value="11:00:00">11:00 AM</option>
				<option value="11:15:00">11:15 AM</option>
				<option value="11:30:00">11:30 AM</option>
				<option value="11:45:00">11:45 AM</option>
				<option value="12:00:00">12:00 PM</option>
				<option value="12:15:00">12:15 PM</option>
				<option value="12:30:00">12:30 PM</option>
				<option value="12:45:00">12:45 PM</option>
				<option value="13:00:00">01:00 PM</option>
				<option value="13:15:00">01:15 PM</option>
				<option value="13:30:00">01:30 PM</option>
				<option value="13:45:00">01:45 PM</option>
				<option value="14:00:00">02:00 PM</option>
				<option value="14:15:00">02:15 PM</option>
				<option value="14:30:00">02:30 PM</option>
				<option value="14:45:00">02:45 PM</option>
				<option value="15:00:00">03:00 PM</option>
				<option value="15:15:00">03:15 PM</option>
				<option value="15:30:00">03:30 PM</option>
				<option value="15:45:00">03:45 PM</option>
				<option value="16:00:00">04:00 PM</option>
				<option value="16:15:00">04:15 PM</option>
				<option value="16:30:00">04:30 PM</option>
				<option value="16:45:00">04:45 PM</option>
				<option value="17:00:00">05:00 PM</option>
				<option value="17:15:00">05:15 PM</option>
				<option value="17:30:00">05:30 PM</option>
				<option value="17:45:00">05:45 PM</option>
				<option value="18:00:00">06:00 PM</option>
				<option value="18:15:00">06:15 PM</option>
				<option value="18:30:00">06:30 PM</option>
				<option value="18:45:00">06:45 PM</option>
				<option value="19:00:00">07:00 PM</option>
				<option value="19:15:00">07:15 PM</option>
				<option value="19:30:00">07:30 PM</option>
				<option value="19:45:00">07:45 PM</option>
				<option value="20:00:00">08:00 PM</option>
				<option value="20:15:00">08:15 PM</option>
				<option value="20:30:00">08:30 PM</option>
				<option value="20:45:00">08:45 PM</option>
				<option value="21:00:00">09:00 PM</option>
				<option value="21:15:00">09:15 PM</option>
				<option value="21:30:00">09:30 PM</option>
				<option value="21:45:00">09:45 PM</option>
				<option value="22:00:00">10:00 PM</option>
				<option value="22:15:00">10:15 PM</option>
				<option value="22:30:00">10:30 PM</option>
				<option value="22:45:00">10:45 PM</option>
				<option value="23:00:00">11:00 PM</option>
				<option value="23:15:00">11:15 PM</option>
				<option value="23:30:00">11:30 PM</option>
				<option value="23:45:00">11:45 PM</option>
			</select>

			<br> <br> <input type="submit" value="Next">

		</form>

	</div>

	<p><a href="logout.php">Logout</a></p>

	</body>
</html>

<?php include('footer.php');?>