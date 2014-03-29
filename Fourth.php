<HTML>
<div align="center">
<h1>Welcome to the Elevator</h1>
<P> Please wait while we take you to the next available floor.</P>


<script type="text/javascript">

(function () {
    var currentfloor = 1,cinterval;

    var timeDec = function (){
        currentfloor++;
        document.getElementById('countdown').innerHTML = currentfloor;
        if(currentfloor === 5){
            clearInterval(cinterval);
        }
    };

    cinterval = setInterval(timeDec, 1000);
})();

</script>

Current floor <span id="countdown">1</span>.
<br>
<input name="continue" id="continue" type="button" value="Exit Elevator" onclick="window.open('Third.php', '_parent')"/>
<script type="text/javascript">
document.getElementById('continue').disabled = true;
document.getElementById('continue').value = "Please wait...";
setTimeout(function(){
  document.getElementById('continue').disabled = false;
  document.getElementById('continue').value = "Continue";
}, 4000);
</script>
</div>

</HTML>