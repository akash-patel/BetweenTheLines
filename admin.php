<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	include('header.php');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}
?>

<html>
	<head>
		<title>Admin Controls</title>
	</head>
	<h3>
		Administrative Controls
	</h3>
	<br>

	<form method="POST" action="adminAdd.php">
		Create
		<input type="number" name="number" min="1" max="45">

		reservation(s) between the following dates and times:
		<br>Start:<input type="date" name="startdate">
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

		<br>End:<input type="date" name="enddate">
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
		<br>License Plate:<input type="text" name="licenseplate" size="10" maxlength="7">
		<br>State: <select name = "state">
			<option value="Alabama">Alabama</option>
			<option value="Alaska">Alaska</option>
			<option value="Arizona">Arizona</option>
			<option value="Arkansas">Arkansas</option>
			<option value="California">California</option>
			<option value="Colorado">Colorado</option>				
			<option value="Connecticut">Connecticut</option>
			<option value="District of Columbia">District of Columbia</option>
			<option value="Delaware">Delaware</option>
			<option value="Florida">Florida</option>
			<option value="Georgia">Georgia</option>
			<option value="Hawaii">Hawaii</option>
			<option value="Idaho">Idaho</option>
			<option value="Illinois">Illinois</option>
			<option value="Indiana">Indiana</option>
			<option value="Iowa">Iowa</option>
			<option value="Kansas">Kansas</option>
			<option value="Kentucky">Kentucky</option>
			<option value="Louisiana">Louisiana</option>
			<option value="Maine">Maine</option>
			<option value="Maryland">Maryland</option>
			<option value="Massachusetts">Massachusetts</option>
			<option value="Michigan">Michigan</option>
			<option value="Minnesota">Minnesota</option>
			<option value="Mississippi">Mississippi</option>
			<option value="Missouri">Missouri</option>
			<option value="Montana">Montana</option>
			<option value="Nebraska">Nebraska</option>
			<option value="Nevada">Nevada</option>
			<option value="New Hampshire">New Hampshire</option>
			<option value="New Jersey">New Jersey</option>
			<option value="New Mexico">New Mexico</option>
			<option value="New York">New York</option>
			<option value="North Carolina">North Carolina</option>
			<option value="North Dakota">North Dakota</option>
			<option value="Ohio">Ohio</option>
			<option value="Oklahoma">Oklahoma</option>
			<option value="Oregon">Oregon</option>
			<option value="Pennsylvania">Pennsylvania</option>
			<option value="Rhode Island">Rhode Island</option>
			<option value="South Carolina">South Carolina</option>
			<option value="South Dakota">South Dakota</option>
			<option value="Tennessee">Tennessee</option>
			<option value="Texas">Texas</option>
			<option value="Utah">Utah</option>
			<option value="Vermont">Vermont</option>
			<option value="Virginia">Virginia</option>
			<option value="Washington">Washington</option>
			<option value="West Virginia">West Virginia</option>
			<option value="Wisconsin">Wisconsin</option>
			<option value="Wyoming">Wyoming</option>						
		</select>
		<br>
		<input type="submit" value="Submit">
	</form>



	<p><a href="logout.php">Logout</a></p>
</html>

<?php include('footer.php');?>