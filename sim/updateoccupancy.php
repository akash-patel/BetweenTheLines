<?php
	session_start();
		include('../config.inc'); 
				$sid=$_SESSION['floor']*100+$_POST['spot'];
				$query2 = "SELECT * FROM occupancy WHERE psensorid ='$sid'";
				$result2 = mysql_query($query2);
				$row = mysql_fetch_array($result2);
				if ($row['istaken']==0)
				{
				$query = "UPDATE occupancy SET istaken='1' WHERE psensorid='$sid'";
				$result = mysql_query($query);
				}
				else
				{
				$query = "UPDATE occupancy SET istaken='0' WHERE psensorid='$sid'";
				$result = mysql_query($query);
				}
				

				$_SESSION['update'] = "Database has been updated";
				header('Location: photosensor.php');

?>