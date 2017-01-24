<?php 
session_start();
include("pageSegments/head.php");
?>

<link rel= "stylesheet" href= "css/navBar.css">
<style>
.panel{
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#msg{
	color:red;
}
</style>
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
<?php
$err= $res= "";
if(isset($_POST["submit"])){
	if(isset($_SESSION["user"])){
		$_SESSION[]= array();
		session_destroy();
		session_start();
	}
	$email= $_POST["email"];
    $password= $_POST["pwd"];
	
    $conn= mysqli_connect("localhost","root","","mydb");
	if(!$conn){
		$res= "connection failed.";
	}
    else{
		$query= "SELECT * FROM admin WHERE email='$email' AND pwd='$password'";
		$result= mysqli_query($conn,$query);
		if(!$result){
			$res = "Can't log in!";
	    }
	    else{
			if(mysqli_num_rows($result)>0){
				$row= mysqli_fetch_array($result);
				$_SESSION["user"]= $row[0];
				$_SESSION["email"]= $row[2];
				$_SESSION["pwd"]= $row[3];
				$_SESSION["admin"]= "yes";
				$res .= "<p>Successfully logged in. </p><br>";
				$res .= "<p>Click link below to </p><br><a href='addQues.php'> Change questions </a> ";
				$res .= "<br><a href= 'uploadTut.php'>Upload Tutorial E-Books.</a> </p>";
	        }
			else{
				$res= "Wrong id or password.";
			}
		}
	}
}
?>

<br><br><br><br>
<div class= "row">
<div class= "col-sm-3"></div>
<div class= "col-sm-6"> 
<div id= "form">
<div class= "panel panel-info">
<div class= "panel-heading text-center"><h3> LOG IN </h3></div>
<div class= "panel-body">
<br><br>
<form class= "form-horizontal" role= "form" action= "" method= "post">
<div class= "form-group">
<label class= "control-label col-sm-3">Email </label>
<div class= "col-sm-4">
<input class= "form-control input-sm" type= "email" id= "email" name= "email" required/>
</div>
<div class= "col-sm-5"></div>
</div>
<div class= "form-group">
<label class= "control-label col-sm-3">Password </label>
<div class= "col-sm-4">
<input type= "password" id= "pwd" class= "form-control input-sm" name= "pwd" required/>
</div>
<div class= "col-sm-5"></div>
</div>
<div class= "form-group">
<div class= "col-sm-offset-3 col-sm-1">
<button type= "submit" class= "btn btn-primary" name="submit"> Log in </button> 
</div>
<div class= "col-sm-8"></div>
</div> 
</form>
<br><br><br>
</div>
<div class= "panel-footer" id= "msg">
<p><?php echo $res; ?> </p>
</div>
</div>
</div>
</div></div>
<div class= "col-sm-3"></div>
</div>
<br><br><br><br><br>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>


</body>
</html>