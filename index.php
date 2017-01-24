<?php 
session_start();
include("pageSegments/head.php");
?>
<script src= "js/modal.js"></script>
<script src= "js/tictactoe.js"></script>
<link rel= "stylesheet" href= "css/modal.css">
<link rel= "stylesheet" href= "css/navBar.css">  
<link rel= "stylesheet" href= "css/carousal.css">
<link rel= "stylesheet" href= "css/sideNav.css">
<link rel= "stylesheet" href= "css/main.css">
<style>
#msg{
	color:red;
}
</style>
</head>
<body id= "myPage">
<div id= "navigationBar">
<?php
include("pageSegments/modal.php");

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
<div>
<div class= "jumbotron">
<h2> QuizGames .com <span class="glyphicon glyphicon-globe"></span></h2>
<input type="text" name="search" id= "inp" placeholder="Search....">
<span id= "tagline">PLAY LEARN EXPLORE</span>
</div>
<div class= "container-fluid">
<div class= "row" id= "mid">
<div class= "col-sm-2" id= "sideNav"><?php include("pageSegments/sideNav.php")?></div>
<div class= "col-sm-6" id= "midtext">
<p> It’s time to input some data and bring magic to the computer screen. We need you to come up with the perfect
 answering code for our programming quiz. Are you up for the challenge? Think you know your code lines and 
 these very popular programming language? Let’s heat up the place with a few sample questions.<br><br>
 These quiz provides Multiple Choice Questions (MCQs) related to the popular languages. You will have to read all the given 
 answers and click over the correct answer. If you are not sure about the answer then you can check the answer 
 using Show Answer button. You can use Next Quiz button to check new set of questions in the quiz.</p><br>
 <div class= "row">
 <div class= "col-sm-6">  <h3><br> Warm up with a quick tic tac toe game?</h3></div>
<div id= "tictactoe" class= "col-sm-6">
<div class= "jumbotron text-center" id= "tictactoe"><?php include("pageSegments/tictactoe.php"); ?> </div>
</div></div></div>
<div class= "col-sm-4"  id= "form"><?php include("pageSegments/signinForm.php"); ?></div>
</div></div>
<div id= "pics">
<?php include("pageSegments/quizPortfolio.php"); ?>
</div>
<div id= "carousal"><?php include("pageSegments/carousal.php"); ?> </div>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</div>
</body>
</html>