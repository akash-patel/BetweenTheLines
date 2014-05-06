<?php

// Initialize session
session_start();

// Include database connection settings
include('../config.inc');

$_SESSION['error'] = NULL;
$lc=$_POST['lname'];
$state = $_POST['state'];
$date = $_POST['day'];
$time = $_POST['usr_time'];
$fulltime = strtotime($date . $time);
//$level=$_POST['floor'];
// Retrieve row from database according to user's input

$query = "SELECT * FROM reservations  WHERE licenseplate = '$lc' AND state = '$state' AND completed = '0' ORDER BY enddatetimesec ASC";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());

$endtime = mysql_result($result, 0, 'enddatetimesec');
if ($fulltime>$endtime)	{
	$timedifference=$fulltime-$endtime;
	$totalMoney=round($timedifference*0.004167,2);
	$money=1;	//get charged money
}
else {
	$timedifference=$endtime-$fulltime;
	$totalMoney=round($timedifference*0.001389,2);
	$money=0; //get refund
}
	$hour=floor($timedifference/3600);
	$minute=floor(($timedifference-$hour*3600)/60);

if (mysql_num_rows($result) >= 1) {
$query = "SELECT SUBSTRING(psensorid,1,1) FROM occupancy WHERE istaken='0' LIMIT 1";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());

$_SESSION['floor']=mysql_result($result, 0);
	if ($money==1)
		$_SESSION['cost'] = "You stayed ".$hour." hour(s) and ".$minute." minute(s) past your reservation. Please pay an additional $".$totalMoney;//Extra you pay
	else
		$_SESSION['cost']= "You left ".$hour." hour(s) and ".$minute." minute(s) before your reservation ended. Your refund is $".$totalMoney; //Refund you get


	$query = "UPDATE reservations SET completed='1' WHERE licenseplate = '$lc' AND state = '$state' AND completed='0' ORDER BY enddatetimesec ASC LIMIT 1";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

header('Location: Final.php');

}
else {
// Jump to ExitElevator page
$_SESSION['error'] = "Error: Incorrect License Scanned. Please try again.";
header('Location: ExitElevator.php');
}

?>