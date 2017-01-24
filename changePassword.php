<?php
session_start();
include("pageSegments/head.php");
?>

<link rel= "stylesheet" href= "css/navBar.css"> 
<style>
#form{
	height:450px;
}
.panel{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>
<body id= "myPage">
<?php
$res= $err= $old= $new= $new1= $email= "";
if(isset($_POST["submit"]))
{
//$old= $_POST["old"];
$new= $_POST["new"];
$new1= $_POST["new1"];
$email= $_SESSION["email"];
$name= $_SESSION["user"];
if($new!=$new1){
	$err= "Passwords don't match.";
}
else{
	$conn= mysqli_connect("localhost", "root", "", "mydb");
	if(!$conn){
		echo "Connection failed!!!";
	}
	else{
		if(isset($_SESSION["admin"])){
			$query= "UPDATE admin SET pwd= '$new' WHERE email= '$email' AND fname= '$name'";
		}
		else{
			$query= "UPDATE signin SET pwd= '$new' WHERE email= '$email' AND firstname= '$name'";
		}
		$result= mysqli_query($conn, $query);
		if(!$result){
			$res= "Can't run query!";
		}
		else{
			$res= "Password Changed Successfully!";
		}
	}
}
}	
?>

<div id= "navigationBar">
<?php
if(isset($_SESSION["admin"])){
	require("adminNav.php");
}
else{
	require("navigationBar1.php");
}		
?>
</div><br>

<div class= "row">
<div class= "col-sm-3"></div>
<div class= "col-sm-6">
<div class= "panel panel-info">
<div class= "panel-heading text-center"><h3> CHANGE PASSWORD </h3></div>
<div class= "panel-body">
<form class= "form-horizontal" role= "form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method= "post">
<div class= "form-group">
<label class= "control-label col-sm-4">New Password:</label>
<div class= "col-sm-8">
<input type= "password" id= "new" class= "form-control input-sm" name= "new" required/>
</div>
</div>
<div class= "form-group">
<label class= "control-label col-sm-4">Confirm New Password:</label>
<div class= "col-sm-8">
<input type= "password" id= "new1" class= "form-control input-sm" name= "new1" required/>
</div>
</div>
<div class= "form-group">
<div class= "col-sm-offset-4 col-sm-3">
<button type= "submit" class= "btn btn-default" name="submit"> Save </button> 
</div>
<div class= "col-sm-5"><span style= "color:red;"><?php echo $err; ?></span></div>
</div> 
</form>
</div>
<div class= "panel-footer"><p> <?php echo $res; ?> </p></div>
</div>
</div>
<div class= "col-sm-3"></div>
</div>
<br>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>