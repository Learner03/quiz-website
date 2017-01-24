<?php
$res= $email= $password= "";
if(isset($_POST["submit"]))
{	if(isset($_SESSION["user"])){
		$_SESSION[]= array();
		session_destroy();
		session_start();
	}
	$email= $_POST["email"];
    $password= $_POST["pwd"];
	
    $conn= mysqli_connect("localhost","root","","mydb");
	if(!$conn){
		echo "connection failed.";
	}
    else{
		$query= "SELECT * FROM signin WHERE email='$email' AND pwd='$password'";
		$result= mysqli_query($conn,$query);
		if(!$result){
			$res= "Can't log in!";
	    }
	    else{
			if(mysqli_num_rows($result)>0){
				$row= mysqli_fetch_array($result);
				$_SESSION["user"]= $row[1];
				$_SESSION["email"]= $row[4];
				$_SESSION["pwd"]= $row[5];
				$res= "Successful login. <a href= 'index.php'>Click here to continue!</a>";
				
	        }
			else{
				$res= "Wrong id or password.";
			}
		}
	}
}
?>
<div class= "panel panel-info">
<div class= "panel-heading text-center"><h3> LOG IN </h3></div>
<div class= "panel-body">
<br><br>
<form class= "form-horizontal" role= "form" action= "" method= "post">
<div class= "form-group">
<label class= "control-label col-sm-3">Email </label>
<div class= "col-sm-4">
<input class= "form-control input-sm" type= "email" id= "email" name= "email" value= "<?php echo $email; ?>"required/>
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
<div class= "row">
<div class= "col-sm-offset-3 col-sm-9">
<a href= "adminLogin.php">Admin login </a> 
</div>
</div>
</div>
<div class= "panel-footer" id= "msg">
<p><?php echo $res; ?> </p>
</div>
</div>