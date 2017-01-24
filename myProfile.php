<?php 
session_start();
include("pageSegments/head.php");
?>

<link rel="stylesheet" href="css/navBar.css">
<style>
.panel{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>
<body id= "myPage">
<div id= "navigationBar">
<?php require("navigationBar1.php"); ?>     
</div><br>

<div class= "container text-center">
<h3> PROFILE PAGE </h3>
</div><br>
<div class= "row">
<div class= "col-sm-1"></div>
<div class= "col-sm-10">

<?php
$msg= $score= $total= "";
$name= $_SESSION["user"];
$email= $_SESSION["email"];
$err= $fname= $lname= "";

$conn= mysqli_connect("localhost", "root", "", "mydb");
		if(!$conn){
			$msg= "connection failed.";
		}
		else{
			$query= "SELECT * FROM signin WHERE firstname= '$name' AND email= '$email'";
			$result= mysqli_query($conn, $query);
			if(mysqli_num_rows($result)>0){
			 	$row= mysqli_fetch_array($result);
				$sno= $row[0];
				$fname= $row[1];
				$lname= $row[2];
				$email= $row[4];
				$id= "a" . $sno;
				$query1= "SELECT * FROM records WHERE id= '$id'";
                $result1= mysqli_query($conn, $query1);
                if(!$result1){
					$msg= "can't extract records!";
				}	
  
?>
<div class= "panel panel-info">
<div class= "panel-heading"> Profile </div>
<div class= "panel-body">   
<div class= "row">  
<div class= "col-sm-2">First Name:</div>
<div class= "col-sm-10"> <span><?php echo $fname; ?></span></div>
</div>
<div class= "row">
<div class= "col-sm-2">Last Name:</div>
<div class= "col-sm-10"><?php echo $lname; ?></div>
</div>
<div class= "row">
<div class= "col-sm-2">Email:</div>
<div class= "col-sm-10"><span><?php echo $email; ?></span></div>
</div>
</div>
</div><br>           

<div class= "panel panel-info">
<div class= "panel-heading"> Games Summary: </div>
<div class= "panel-body">
<div class= "row">
<div class= "col-sm-4"> <b> Game Played on </b> </div>
<div class= "col-sm-8"> <b> Score Obtained </b> </div>
</div>
 
<?php				
				
					if(mysqli_num_rows($result1)>0){     
						while($row1= mysqli_fetch_assoc($result1)){
						echo "<div class= 'row'> <div class= 'col-sm-4'>" . $row1['date'] . "</div>";
                        echo "<div class= 'col-sm-8'>" . $row1['score'] . "</div> </div>";	
						}
						$query2= "SELECT MAX(score) FROM records1 WHERE id='$id'";
						$query3= "SELECT COUNT(*) FROM records1 WHERE ID= '$id'";
						$result2= mysqli_query($conn, $query2);
						$result3= mysqli_query($conn, $query3);
						if((!$result2)||(!$result3)){
							$msg= "can't find max score";
						}
						else{
							$sc= mysqli_fetch_array($result2);
							$tot= mysqli_fetch_array($result3);
				            $score= $sc[0];
							$total= $tot[0];
						}
						
					}
					else{
						$msg= "No records yet.";
					}
				
			}
			else{
				$msg= "Error in retrieving data.";
			}
		}
?>

</div>
</div><br>

<div class= "panel panel-info">
<div class= "panel-heading"> Overall Summary </div>
<div class= "panel-body">
<div class= "row">
<div class= "col-sm-4"> Total Games Played: </div>
<div class= "col-sm-8"> <?php echo $total; ?> </div>
</div>
<div class= "row">
<div class= "col-sm-4">Maximum Score Gained: </div>
<div class= "col-sm-8"> <?php echo $score; ?> </div>
</div>
</div>
</div><br>
<div><span style= "color:red;"><?php echo $msg; ?></span></div>
</div>
</div>
<div class= "col-sm-1"></div>
</div><br><br>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>  