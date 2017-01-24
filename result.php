<?php
session_start();
include("pageSegments/head.php");
?>

<link rel="stylesheet" href="css/navBar.css">
<style> 
#heading{
	text-align:center;
	padding-top:20px;
	padding-bottom:20px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	background-color:#00A5C6;
}
#body{
	padding-top:0px;
	padding-bottom:90px;
}
.well{
	background-color:#BFBFBF;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>
<body id= "myPage">
<?php                         //------------------result calculation-------------------
$a[]= $b= $i= $msg="";
$count=0;
if(isset($_POST["submit"])){
	for($i=1; $i<11; $i++){
		$a[$i]= isset($_POST["ans$i"])?$_POST["ans$i"]:NULL;
		if($a[$i]=="right"){
				$b[$i]= "Right Answer.";
				$count+=10;
		}
		else if($a[$i]=="wrong"){
				$b[$i]="Wrong Answer.";
		}
		else{
			$b[$i]= "No Answer.";
		}	
	}
}
else{
	echo "Play again.";
}

//--------------------result updation in database----------------------------------------------
  
if((empty($_SESSION["user"]))||(empty($_SESSION["email"]))){
	$msg= "You are not logged in. Your profile can't be updated.";
	}
else{
$email= $_SESSION["email"];
$pwd= $_SESSION["pwd"];	
$conn= mysqli_connect("localhost","root","","mydb");
	if(!$conn){
		$msg= "connection failed.";
	}
    else{
		$query= "SELECT sno FROM signin WHERE email='$email' AND pwd='$pwd'";
		$result= mysqli_query($conn,$query);
		if(!$result){
			$msg= "Can't run query!";
	    }
	    else{
			if(mysqli_num_rows($result)>0){
				$row= mysqli_fetch_array($result);
				$id= "a" . $row[0];			
				date_default_timezone_set("Asia/Kolkata");
				$date= date("Y/m/d");
				$time= date("h:i:s");
				$dt= $date . " " . $time;
				$query1= "INSERT INTO records (id, date, score) VALUES ('$id', '$dt', '$count')";
				$result1= mysqli_query($conn, $query1);
				if(!$result1){
					$msg= "can't update profile!";
				}
				else{
					$msg= "Profile updated.";
				}	  
			}
			else{
				$msg= "You are not logged in. Your profile can't be updated.";
	        }			
		}
	}
}
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


<div class= "container" id= "body">
<h2 class="text-center" id= "heading"> RESULT </h2>
<div class= "well">
<p>1. <?php echo $b[1]; ?> </p>
<p>2. <?php echo $b[2]; ?> </p>
<p>3. <?php echo $b[3]; ?> </p>
<p>4. <?php echo $b[4]; ?> </p>
<p>5. <?php echo $b[5]; ?> </p>
<p>6. <?php echo $b[6]; ?> </p>
<p>7. <?php echo $b[7]; ?> </p>
<p>8. <?php echo $b[8]; ?> </p>
<p>9. <?php echo $b[9]; ?> </p>
<p>10. <?php echo $b[10]; ?> </p>
</div>

<div class= "well">
<p> Total= <?php echo $count; ?> </p>
<p> <?php echo $msg; ?></p>
</div>
<a href= "index.php"> <button type= "button" class= "btn btn-primary btn-block"> Go to Home Page </button></a>
</div>
<br>
<?php 
include("pageSegments/footer.php"); 
unset($_SESSION["quiz"]);
?>
</body>
</html>