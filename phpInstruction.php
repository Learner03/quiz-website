<?php 
session_start();
$_SESSION["quiz"]= "p";
include("pageSegments/head.php");
?>
<link rel= "stylesheet" href= "css/navBar.css">
</head>
<body id= "myPage">
<div id= "navigationBar">
<?php
if(isset($_SESSION["admin"])){
	require("adminNav.php");
}
else if((isset($_SESSION["user"])) && (!isset($_SESSION["admin"]))){
	require("navigationBar1.php");
}
else{
	require("navigationBar.php");
}		
?>
</div> 

<br><br><br>

<div class= "container">
<div class= "text-center">
<h4>PHP </h4>
<p>Good choice!!! </p>
<p>Before proceding to quiz read the rules carefully </p>
</div>

<div id= "instruction">
<?php require("pageSegments/quizInstruction.php"); ?>
</div> 

<br><br>

<a href= "quizPage.php"><button type= "button" class= "btn btn-primary btn-block" value= "start"> Proceed to quiz </button></a>
<br><br>
<p> All the best. :) </p>
</div>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>

</body>
</html>