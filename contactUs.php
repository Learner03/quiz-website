<?php
session_start();
include("pageSegments/head.php");
if(isset($_SESSION["user"])){
	$name= $_SESSION["user"];
}
else{
	$name= "";
}
?>
<link rel= "stylesheet" href= "css/navBar.css">
<style>
#body{
	height:450px;
}
</style>
</head>
<body id= "myPage">

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

$msg= "";
/* if(isset($_POST["submit"])){
	$name= $from= $comment= "";
	$to= "aditig0111@gmail.com";
	$name= $_POST["name"];
	$subject= "Visitor " . $name . "'s comment";
	$from= $_POST["email"];
	$comment= $_POST["comment"];
	$headers= "MIME Version: 1.0" . "\r\n";
//	$headers .= "content-type=text/html;charset=UTF-8;" . "\r\n";
	$headers .= "From: " . $from;
	$result= mail($to, $subject, $comment, $headers);
	$result ? $msg="Mail sent." : $msg="Mail sending failed.";
} */

if(isset($_POST["submit"])){
	if(!isset($_SESSION["user"])){
		$msg= "You need to log in to post your comment.";
	}
	else{
		$comm= $_POST["comment"];
		$conn= mysqli_connect("localhost", "root", "", "mydb");
		if(!$conn){
			$msg= "connection failed.";
		}
		else{
			$query= "INSERT INTO comments (name, comment) VALUES ('$name', '$comm')";
			$result= mysqli_query($conn, $query);
			if(!$result){
				$msg= "Can't store your comment.";
			}
			else{
				$msg= "Comment posted.";
			}
		}
	}
}

?> 

<br><br><br>

<div class= "container" id= "body">
<h2 class= "text-center"> CONTACT US </h2>
<br><br><br>
<div class= "row">
<div class= "col-sm-5">
<p> Contact us and we'll get back to you within 24 hours.</p>
<span class= "glyphicon glyphicon-envelope"> myemail@something.com </span>
</div>
<div class= "col-sm-7">
<form role= "form" action= "" method= "post">
<div class= "row">
<div class= "col-sm-6">
<input type="text" class= "form-control" name= "name" id= "name" value= "<?php echo $name; ?>"placeholder= "Name" required/>
</div>
<div class= "col-sm-6"></div>
</div>
<br>
<textarea class= "form-control" name= "comment" id= "comment" rows="5" placeholder= "comment"></textarea><br>
<div class= "row">
<div class= "col-sm-12 form-group">
<button class= "btn btn-default pull-right" type= "submit" name= "submit" value="submit"> Send </button>
</div>
</div>
</form>
</div>
</div>
<div class= "well"><span><?php echo $msg; ?></span></div><br>
</div>
<br><br><br>

<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>

</body>
</html>