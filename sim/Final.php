<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulation: Final</title>
    <link rel="stylesheet" href="../../css/foundation.css" />
    <script src="../../js/vendor/modernizr.js"></script>
  </head>
<body style="background-color:#F0F0F0;">
<title>Simulation: Final</title>
<div align="center">
  <img src="exit.gif" alt="some_text"><br><br>
	<font color="blue">
        <?php 
          session_start();
          if (isset($_SESSION['cost']))
          {
            echo $_SESSION['cost'] . '<br /><br />';
            $_SESSION['cost'] = NULL;
          }
        ?>
      </font>
  <h3> This is the end of the simulation. </h3> <br><br>
  <form method="POST" action="../index.php"><input type="submit"class="button" value="Exit"></form>
</div>
</body>
	    <script src="../../js/vendor/jquery.js"></script>
    <script src="../../js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</HTML>