<?php
session_start();
if(!isset($_SESSION["quiz"])){
	echo "Session finished. Start quiz again from quiz menu.";
	echo "<br><br><a href= 'main.php'>Click here to continue </a>";
}
else{
	include("pageSegments/head.php");
?>
<link rel= "stylesheet" href= "css/quizNavbar.css">
<link rel= "stylesheet" href= "css/quizQuestions.css">
<script src= "js/jquery-3.0.0.min.js"></script>
<script src= "js/quizQues.js"></script>
<style>
.w1{
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#page{
background-color:#E0E0E0;
}
</style>
</head>

<!--<body data-spy= "scroll" data-target= ".navbar"> -->
<body data-spy= "scroll" data-target= "#myScrollspy" id= "myPage">
<br><br>
<div class= "container" id= "page">
<div id= "quiznav">
<?php require("pageSegments/quizNavbar.php"); ?>
</div>
<div id= "quesBody">
<div id= "ques">
<form role= "form" name= "myForm" id= "myForm" method="post" action= "result.php">

<?php
$exp= $msg="";
if($_SESSION["quiz"]=="c")
	$lang= "c";
else if($_SESSION["quiz"]=="j")
	$lang= "j";
else if($_SESSION["quiz"]=="js")
	$lang= "js";
else
	$lang= "p";
unset($_SESSION["quiz"]);
$conn= mysqli_connect("localhost", "root", "", "mydb");
$table= $lang . "ques";
for($i=1; $i<11; $i++){
	$id= $i . $lang;
	$query= "SELECT quesbody, explanation FROM $table WHERE quesid= '$id'";
	$query1= "SELECT ansBody, value FROM answers WHERE ansId= '$id'";
	$result= mysqli_query($conn, $query);
	if(!$result){
		$msg = "Can't fetch question.";
	}
	else{
		while($row= mysqli_fetch_assoc($result)){
		$qid= "d" . $i;
		echo "<div class= 'ques' id= " . $qid . ">";
		echo "<div class= 'well w1'>";
		echo "<p> Q. " .$i . "- " . $row["quesbody"] . "</p><br>";
		$exp= $row["explanation"];
		}
		$result1= mysqli_query($conn, $query1);
		if(!$result1)
			$msg += "Can't fetch answers.";
		else{
			if(mysqli_num_rows($result1)>0){
			while($row1= mysqli_fetch_assoc($result1)){
				$ans= "ans" . $i;
				$val= $row1["value"];
				$body= $row1["ansBody"];
				echo "<div class='radio'><label><input type='radio' name='" . $ans . "' value= '" . $val . "'> " . $body . "</label></div>";
			}
			}
			else{
				$msg += "No matching records in answers.";  
			}
		}
		$btnId= "b" . $i;
		$expId= "e" . $i;
		echo "<br><br><br><button class= 'btn btn-warning bexp' id= '" . $btnId . "' type= 'button'> Hint </button><br><br>";
		echo "<div id= " . $expId . " class= 'well aexp'>" . $exp . "</div>";
		echo "</div></div>";
	}
}
?>

<br><br>
<div id= "submit1">
<button type= "submit" value= "submit" class= "btn btn-success" name="submit" id="submit"> Submit Quiz </button>
<p> <?php echo $msg; ?> </p>
</div>
</form>
</div>

<div id= "counter">
<?php require("pageSegments/counter.php"); ?>
</div>
</div>
</div>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>

<?php } ?>