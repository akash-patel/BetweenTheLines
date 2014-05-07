<!DOCTYPE html>
<html>
	<link rel="icon" href="btl_fav.ico">
	<table>
		<tr>
			<td><a href="securedpage.php"><img src="BetweenTheLines.gif"></a></td>
			<?php if (isset( $_SESSION['username'] )){ ?>
				<td><form display:"inline" method="POST" action="logout.php"><input type="submit" value="Logout"></form></td>
			<?php } ?>
		</tr>
	</table>

	<hr>
	<body style= "background-color: #F0F0F0 "></body>
</html>
