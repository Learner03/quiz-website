<?php
session_start();
include("pageSegments/head.php");
?>
<link rel="stylesheet" href="css/navBar.css">
<script src= "js/footerScrolling.js"></script>
<style>
#heading{
	text-align:center;
	padding-top:10px;
	padding-bottom:20px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	background-color:#00A5C6;
}
#body{
	padding-bottom:90px;
}
.well{
	background-color:#BFBFBF;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>
<body id= "myPage">
<?php
$msg= "";
if($_SESSION["admin"]=="yes"){
	require "adminNav.php" ;
	if(isset($_POST["submit"])){
		if((empty($_POST["question"]))||(empty($_POST["ans1"]))||(empty($_POST["ans2"]))||(empty($_POST["ans3"]))||(empty($_POST["ans4"]))){
			$msg= "Fill all fields. ";
		}
		else{
			if((!empty($_POST["a1"]))||(!empty($_POST["a2"]))||(!empty($_POST["a3"]))||(!empty($_POST["a4"]))){
				$lang= $_POST["language"];
				$pos= $_POST["questionNo"];
				$ques= $_POST["question"];
				$exp= $_POST["exp"];
				$id= $pos . $lang;  
				$conn= mysqli_connect("localhost","root","","mydb");
				if(!$conn){
					echo "connection failed.";
				}
				else{
					$table= $lang . "ques";
					$q= "SELECT quesbody FROM $table WHERE quesid= '$id'";
					$r= (mysqli_query($conn, $q));
					if($r){
						if(mysqli_num_rows($r)>0){
							$query= "UPDATE $table SET quesbody= '$ques', explanation= '$exp' WHERE quesid= '$id'";
						}
						else{
							$query= "INSERT INTO $table (quesid, quesbody, explanation) VALUES ('$id', '$ques', '$exp')";
						}
					}
					$result= mysqli_query($conn, $query);
					if(!$result){
						$msg= "Failed to insert question";
					}
					else{
						$msg= "Question inserted successfully.";
						$q1= "SELECT ansBody FROM answers WHERE ansId= '$id'";
						$r1= (mysqli_query($conn, $q1));
						if($r1){
							if(mysqli_num_rows($r1)>0){
								$q2= "DELETE FROM answers WHERE ansId= '$id'";
								$r2= mysqli_query($conn, $q2);
								if(!$r2){
									$msg= "Failed to delete old answers.";
								}
							}
						}
						for($i=1; $i<5; $i++){
							$ans= $_POST["ans$i"];
							if(isset($_POST["a$i"])){
								$value= "right";
							}
							else{
								$value= "wrong";
							}
							$query1= "INSERT INTO answers (ansId, ansBody, value) VALUES ('$id', '$ans', '$value')";
							$result1= mysqli_query($conn, $query1);
							if(!$result1){
								$msg= "Failed to insert answers.";
							}
							else{
								$msg= "Everything inserted successfully.";
							}
						}	
					}
				}
			} 
			else{
				$msg= "Check at least 1 answer.";
			} 
		}
	}
}
?>
<div class= "container" id= "body"> 
<div id= "heading"> <h2> ADMIN PANEL insert question</h2></div><br>
<div class= "row"><br>
<h4 class= "text-center"><?php echo $msg; ?></h4><br>
<div class= "col-sm-2"></div>
<div class= "col-sm-8">
<div class= "well">
<form role= "form" action= "" method= "post">
<div class= "row">
<div class= "col-sm-4"><div class= "control-label text-right"> Select language: </div></div>
<div class= "col-sm-8">
<select name="language">
<option value="c">C++</option>
<option value="j">Java</option>
<option value="js">JavaScript</option>
<option value="p">PHP</option>
</select>
</div>
</div><br>

<div class= "row">
<div class= "col-sm-4"><div class= "control-label text-right"> Select question position: </div></div>
<div class= "col-sm-8">
<select name="questionNo">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</div>
</div><br>

<div class= "row">
<div class= "control-label col-sm-4 text-right"> Enter your question</div>
<div class= "col-sm-8">
<textarea class= "form-control" name= "question" id= "question" rows="5" placeholder= "question"></textarea> 
</div></div><br>

<div class= "row">
<div class= "control-label col-sm-4 text-right"> Enter explanation of right answer</div>
<div class= "col-sm-8">
<textarea class= "form-control" name= "exp" id= "exp" rows="5" placeholder= "explanation"></textarea> 
</div></div><br>

<div class= "row">
<div class= "control-label col-sm-12"><p> Enter answer options and check the right answer. </p></div>
</div><br>

<div class= "row">
<div class= "col-sm-1"><input type="checkbox" name= "a1" value="checked"></div>
<div class= "col-sm-11"><textarea class= "form-control" name= "ans1" id= "ans1" rows="2" placeholder= "Option 1"></textarea> </div>
</div><br>

<div class= "row">
<div class= "col-sm-1"><input type="checkbox" name= "a2" value="checked"></div>
<div class= "col-sm-11"><textarea class= "form-control" name= "ans2" id= "ans2" rows="2" placeholder= "Option 2"></textarea> </div>
</div><br>

<div class= "row">
<div class= "col-sm-1"><input type="checkbox" name= "a3" value="checked"></div>
<div class= "col-sm-11"><textarea class= "form-control" name= "ans3" id= "ans3" rows="2" placeholder= "Option 3"></textarea> </div>
</div><br>

<div class= "row">
<div class= "col-sm-1"><input type="checkbox" name= "a4" value="checked"></div>
<div class= "col-sm-11"><textarea class= "form-control" name= "ans4" id= "ans4" rows="2" placeholder= "Option 4"></textarea> </div>
</div><br>

<button class= "btn btn-primary btn-block" value= "submit" name= "submit" type= "submit"> SUBMIT </button><br>
</form>
</div>
<div class= "col-sm-2"></div>
</div>
</div></div>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>



