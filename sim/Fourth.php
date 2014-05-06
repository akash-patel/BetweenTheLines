<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulation: Elevator</title>
    <link rel="stylesheet" href="../../css/foundation.css" />
    <script src="../../js/vendor/modernizr.js"></script>
  </head>

<div align="center">
<h1>Welcome to the Elevator</h1>
<P> Please wait while we take you to the next available floor.</P>
<?php 
	session_start();
?>
<br>
<script type="text/javascript">

(function () {
    var currentfloor = 1,cinterval;
	var a = <?=$_SESSION['floor']?>;

    var timeDec = function (){
        
        document.getElementById('countdown').innerHTML = currentfloor;
        if(currentfloor === a){
            clearInterval(cinterval);
        }
        currentfloor++;
    };

    cinterval = setInterval(timeDec, 1000);
})();

</script>

<b><font color="green">Current floor <span id="countdown">1</span>.</font></b>
<br><br>
<input name="continue" id="continue" class="button" value="Exit Elevator" onclick="window.open('photosensor.php', '_parent')"/>
<script type="text/javascript">
var a = <?=$_SESSION['floor']?>;
var b = a*1000;

document.getElementById('continue').disabled = true;
document.getElementById('continue').value = "Please wait...";
setTimeout

(function(){
	
	
	document.getElementById('continue').disabled = false;
	document.getElementById('continue').value = "Continue";
}, b);
</script>
</div>

        <script src="../../js/vendor/jquery.js"></script>
    <script src="../../js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</HTML>

