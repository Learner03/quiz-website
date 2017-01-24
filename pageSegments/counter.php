<!DOCTYPE html>
<html lang= "en">
<head>
<meta charset= "UTF-8">
<title> timer </title>
<script>  
var seconds = 60;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('min').innerHTML = minutes;
	document.getElementById('sec').innerHTML = remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
<style>
#clockdiv{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
}

#clockdiv > div{
    padding: 10px;
    border-radius: 3px;
    background: #00BF96;
    display: inline-block;
}

#clockdiv div > span{
    padding: 15px;
    border-radius: 3px;
    background: #00816A;
    display: inline-block;
}

.smalltext{
    padding-top: 5px;
    font-size: 16px;
}

</style>
</head>
<body>
<div id="clockdiv">
  <div>
    <span class="minutes" id= "min"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds" id= "sec"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>

</div>
</body>
</html>