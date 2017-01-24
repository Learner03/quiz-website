<?php
$pErr= $pwd= $pwd1= $res= $pro= "";
$fname= $lname= $email= $gender= "";
if(isset($_POST["submit"])){
	$fname= $_POST["fname"];
	$lname= $_POST["lname"];
	$email= $_POST["email"];
	$gender= $_POST["gender"];
	$pwd= $_POST["pwd"];
	$pwd1= $_POST["pwd1"];
	if($pwd!=$pwd1){
		$pErr= "passwords don't match.";
	}
	else{
		$conn= mysqli_connect("localhost", "root", "", "mydb");
		if(!$conn){
			echo "connection failed.";
		}
		else{
			$q1= "SELECT * FROM signin WHERE email= '$email'";
			$r1= mysqli_query($conn, $q1);
			if(!$r1){
				$res= "can't execute email checking query!";
			}
			else{
				if(mysqli_num_rows($r1)>0){
					$pErr= 'There is already an ID with this email address. Please try another email address.';
				}
		    else{
				$query= "INSERT INTO signin (firstname, lastname, gender, email, pwd) VALUES ('$fname', '$lname', '$gender', '$email', '$pwd');";
				$result= mysqli_query($conn, $query);
			    if(!$result){
				    $res= "can't sign in!!! Try again.";
			    }
			    else{
					$_SESSION["user"]= $fname;
					$_SESSION["email"]= $email;
                    $_SESSION["pwd"]= $pwd;
					$res= 'Successful signup';
                }	
			}
		    
	    }
		mysqli_close($conn);
    }
}
}
?>
<div class= "panel panel-info">
<div class="panel-heading text-center">
<h4>Signup today to keep a record of your performance </h4>
</div>
 <div class="panel-body">
<br><br>
<form class= "form-horizontal" role= "form" name= "myform" id= "form" method= "post" action= "">
<div class= "form-group">
<label class= "control-label col-sm-5"> First Name: </label>
<div class= "col-sm-7">
<input type= "text" class= "form-control" name= "fname" id= "fname" value= "<?php echo $fname; ?>" autofocus required/>
</div>
</div>

<div class= "form-group">
<label class= "control-label col-sm-5"> Last Name: </label>
<div class= "col-sm-7">
<input type= "text" class= "form-control" name= "lname" id= "lname" value= "<?php echo $lname; ?>" required/>
</div>
</div>

<label class= "control-label col-sm-5"> Gender: </label>
<div class= "col-sm-7"> 
<label class= "radio-inline"><input type= "radio" name= "gender" <?php if (isset($gender) && $gender=="f") echo "checked";?> value= "f" checked>Female</input>
<label class= "radio-inline"><input type= "radio" name= "gender" <?php if (isset($gender) && $gender=="m") echo "checked";?> value= "m">Male</input>
</div>
<br>

<div class= "form-group">
<label class= "control-label col-sm-5"> Email: </label>
<div class= "col-sm-7">
<input type= "email" class= "form-control" name= "email" id= "email" value= "<?php echo $email; ?>" required/>
</div>
</div>

<div class= "form-group">
<label class= "control-label col-sm-5">Password: </label>
<div class= "col-sm-7">
<input type= "password" id= "pwd" name= "pwd" class= "form-control" required/>
</div>
</div>

<div class= "form-group">
<label class= "control-label col-sm-5">Confirm Password: </label>
<div class= "col-sm-7">
<input type= "password" id= "pwd1" name= "pwd1" class= "form-control" required/>
</div>
</div>
<div class= "col-sm-offset-3 col-sm-9"><span style= "color:red;"><?php echo $pErr; ?></span></div>

<div class= "form-group">
<div class= "col-sm-offset-5 col-sm-7">
<button type= "submit" class= "btn btn-primary" name="submit"> Sign in </button>
</div>
</div>
</form>
</div>
<div class="panel-footer" id= "msg">
<p><?php echo $res; ?></p>
</div>
</div>