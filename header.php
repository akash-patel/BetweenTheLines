<!DOCTYPE html>
<html>
	<link rel="icon" href="fav.gif">
	<table>
		<tr>
			<td><a href="securedpage.php"><img src="BetweenTheLines.gif"></a></td>
			<?php if (isset( $_SESSION['username'] )){ ?>
				<td><form method="POST" action="logout.php"><input type="submit" value="Logout"></form></td>
			<?php } ?>
		</tr>
	</table>

	<hr>
	<body style= "background-color: #F0F0F0 "></body>
</html>
