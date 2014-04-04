<HTML>
<title>Simulation: Elevator</title>
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
<br>
<input name="continue" id="continue" type="button" value="Exit Elevator" onclick="window.open('photosensor.php', '_parent')"/>
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

</HTML>
