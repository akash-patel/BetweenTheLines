<HTML>
<title>Simulation: Photosensor</title>
<div align="center">
<h1>Photosensor simulation</h1>

Occupancy for floor 
<?php 
	session_start();	
	include('../config.inc');
	
	echo $_SESSION['floor'];
	$query = "SELECT psensorid FROM occupancy";
	$query2= "SELECT istaken FROM occupancy";
	$result = mysql_query($query);
	$result2 = mysql_query($query2);
	$array = Array();
	$array2 = Array();
	$array3 = Array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $array[] =  $row['psensorid'];  
	}
	while ($row = mysql_fetch_array($result2, MYSQL_ASSOC)) {
    $array2[] =  $row['istaken'];  
	}
	$title='Available Spots';
function print_array($title,$array){

        if(is_array($array)){

            echo $title."<br/>".
            "||---------------------------------||<br/>".
            "<pre>";
            print_r($array); 
            echo "</pre>".
            "END ".$title."<br/>".
            "||---------------------------------||<br/>";

        }else{
             echo $title." is not an array.";
        }
}
for ($i=0; $i <44; $i++)
{
if (($array[$i]-($_SESSION['floor']*100) <10) && ($array[$i]-($_SESSION['floor']*100) >=0))
{
	if ($array2[$i] == 0)
	{
		$array3[]= ($array[$i]-($_SESSION['floor']*100)-1);
	}
}
}
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
$array3[]=100;
//prints all the available spots
//print_array($title,$array3);
?>



<script type="text/javascript" >


function btnClick(checkedValue) {
		if (checkedValue==100){
		return;
		}
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
    </style><br>  
	Green Spots are available. Red Spots are taken.

	
  <body onload="btnClick(<?php echo $array3[0]; ?>);btnClick(<?php echo $array3[1]; ?>);btnClick(<?php echo $array3[2];?>);btnClick(<?php echo $array3[3]; ?>);btnClick(<?php echo $array3[4]; ?>);btnClick(<?php echo $array3[5]; ?>);btnClick(<?php echo $array3[6]; ?>);btnClick(<?php echo $array3[7]; ?>);btnClick(<?php echo $array3[8]; ?>);">

  


  <div>  

	<form method="POST" action="updateoccupancy.php">
    <table id = "mytable" width="100%" border="1" cellpadding="3" cellspacing="2" style="background-color: #ffffff;">
      <tr valign="top">
      <td class = "td" ><input type="submit" name="spot" value="1" /><br />  </td>
      <td class = "td" ><input type="submit" name="spot" value="2" /><br />  </td>
	  <td class = "td" ><input type="submit" name="spot" value="3" /><br />  </td>
      </tr>
      <tr valign="top">
      <td class = "td" ><input type="submit" name="spot" value="4" /><br />  </td>
      <td class = "td" ><input type="submit" name="spot" value="5" /><br />  </td>
	  <td class = "td" ><input type="submit" name="spot" value="6" /><br />  </td>
      </tr>
	  <tr valign="top">
      <td class = "td" ><input type="submit" name="spot" value="7" /><br />  </td>
      <td class = "td" ><input type="submit" name="spot" value="8" /><br />  </td>
	  <td class = "td" ><input type="submit" name="spot" value="9" /><br />  </td>
      </tr>
    </table>
	</form>

	<form action="Third.php">
	<input name="return" type="submit" value="Return to License Scanner"/>
	</form>

	<b>ADMIN ACTIONS: <br/></b>
	<form method="POST" action="adminProc.php">
	  Choose a floor: <select name = "floor">
	    <option value="1">1</option>
	    <option value="2">2</option>
	    <option value="3">3</option>
	    <option value="4">4</option>
	    <option value="5">5</option>
	  </select>
	  
	  <input name="changeFloor" type="submit" value="Submit"/>
 </div>
</tr>
<br>
<?php 

					if (isset($_SESSION['update']))
					{
						echo $_SESSION['update'] . '<br /><br />';
						$_SESSION['update'] = NULL;
					}
?>
  </body>
</html>
</div>
</HTML>
