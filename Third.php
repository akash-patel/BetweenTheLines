<HTML>
<div align="center">
	<P> Simulate License Plate Scanner</P>
<form method="POST" action="LicenseProc.php">
	Enter License Plate: <input type="text" name="lname"><br>
	<input name="newThread2" type="submit" value="Submit"/>
		
</form>
			<font color="red">
				<?php 
					session_start();
					if (isset($_SESSION['error']))
					{
						echo $_SESSION['error'] . '<br /><br />';
						$_SESSION['error'] = NULL;
					}
				?>
			</font>
</div>
</HTML>