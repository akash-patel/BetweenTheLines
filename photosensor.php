<HTML>
<div align="center">
<h1>Photosensor Simulation</h1>

Occupancy for floor 

<?php session_start(); echo $_SESSION['floor']; ?>

<script type="text/javascript" >

	function btnClick(checkedValue) 
	{
		var x = document.getElementById("mytable").getElementsByTagName("td");

		if (x[checkedValue].style.backgroundColor == "green")
		{
			x[checkedValue].style.backgroundColor = "red";
		}
		else
		{
			x[checkedValue].style.backgroundColor = "green";          
		}		
	}
</script>

<style>
div
{
	text-align: center; 
	text-indent: 0px; 
	padding: 0px 0px 0px 0px; 
	margin: 0px 0px 0px 0px;
}

td.td
{
	border-width : 1px;
	background-color: #FF0000;
	text-align:center;
}
</style>  

<body>
	<div>  

	<?php

		// Include database connection settings
		include('../config.inc');
		$_SESSION['error'] = NULL;
		
		echo "<table id = \"mytable\" width=\"100%\" border=\"1\" cellpadding=\"3\" cellspacing=\"2\" style=\"background-color:#ffffff;\">";
		echo "<tr valign=\"top\">";

		$floor = $_SESSION['floor'];

		for($i = 1; $i <= 3; $i++)
		{
			$sensorid = $floor . "0" . $i;

			$query = "SELECT istaken FROM occupancy WHERE psensorid='$sensorid'";
			$result = mysql_query($query);
			if (!$result) die ("Database access failed: " . mysql_error());

			$ans = mysql_result($result, 0,'istaken');
				
			switch($ans)
			{
				case "0":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:green\'><br /> Spot '.$i.' </td>';
					break;
				case "1":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:red\'><br /> Spot '.$i.' </td>';
					break;
				default:
					echo "fail";
					break;
			}
		}

		echo "</tr>";
		echo "<tr valign=\"top\">";

		for($i = 4; $i <= 6; $i++)
		{
			$sensorid = $floor . "0" . $i;

			$query = "SELECT istaken FROM occupancy WHERE psensorid='$sensorid'";
			$result = mysql_query($query);
			if (!$result) die ("Database access failed: " . mysql_error());

			$ans = mysql_result($result, 0,'istaken');

			switch($ans)
			{
				case "0":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:green\'><br /> Spot '.$i.' </td>';
					break;
				case "1":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:red\'><br /> Spot '.$i.' </td>';
					break;
				default:
					echo "fail";
					break;			}
		}

		echo "</tr>";
		echo "<tr valign=\"top\">";

		for($i = 7; $i <= 9; $i++)
		{
			$sensorid = $floor . "0" . $i;

			$query = "SELECT istaken FROM occupancy WHERE psensorid='$sensorid'";
			$result = mysql_query($query);
			if (!$result) die ("Database access failed: " . mysql_error());

			$ans = mysql_result($result, 0,'istaken');

			switch($ans)
			{
				case "0":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:green\'><br /> Spot '.$i.' </td>';
					break;
				case "1":
					echo '<td class = \'td\' OnClick = \'btnClick(' . ($i-1) . ')\'  style=\'background-color:red\'><br /> Spot '.$i.' </td>';
					break;
				default:
					echo "fail";
					break;
			}
		}

		echo "</tr>";
		echo "</table";


	?>
	</div>
	<br>

	</body>
</div>
</HTML>
