<?php
session_start();
include("pageSegments/head.php");
?>

<link rel="stylesheet" href="css/navBar.css">
<style>
#heading{
	text-align:center;
	padding-top:10px;
	padding-bottom:20px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	background-color:#00A5C6;
}
.panel{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>
<body>

<?php
$msg= "";
if(isset($_SESSION["admin"])){
require "adminNav.php" ;
$conn= mysqli_connect("localhost", "root", "", "mydb");
if(!$conn){
	$msg= "connection failed.";
}
else{
	$query= "SELECT * FROM cques";
	$query1= "SELECT * FROM jques";
	$query2= "SELECT * FROM jsques";
	$query3= "SELECT * FROM pques";
    $result= mysqli_query($conn, $query);
	$result1= mysqli_query($conn, $query1);
	$result2= mysqli_query($conn, $query2);
	$result3= mysqli_query($conn, $query3);
?>
	<div class= 'container'>
	<div id= "heading"> <h2> ADMIN PANEL delete question</h2></div><br>
	<form role= 'form' action='admin/deletesqlcode.php'>
	<div class= 'panel panel-info'><div class= 'panel-heading'> C++ </div>
    <div class= 'panel-body'>
<?php
	if(mysqli_num_rows($result)>0){
		while($row= mysqli_fetch_assoc($result)){
			echo "<div class= 'row'><div class= 'col-sm-1'><input type= 'checkbox' name= 'check_list[]' value= " . $row['quesid'] . "></div>";
			echo "<div class= 'col-sm-11'>" . $row['quesbody'] . "</div></div>";
		}
	}
	else{
		echo "<div class= 'panel-body'> No questions </div></div>";
	}
?>
	</div></div><br>
	<div class= 'panel panel-info'><div class= 'panel-heading'> Java </div>
	<div class= 'panel-body'>
	
<?php
	if(mysqli_num_rows($result)>0){
		while($row= mysqli_fetch_assoc($result1)){
			echo "<div class= 'row'><div class= 'col-sm-1'><input type= 'checkbox' name= 'check_list[]' value= " . $row['quesid'] . "></div>";
			echo "<div class= 'col-sm-11'>" . $row['quesbody'] . "</div></div>";
		}
	}
	else{
		echo "<div class= 'panel-body'> No questions </div></div>";
	}
?>
	</div></div><br>
		<div class= 'panel panel-info'><div class= 'panel-heading'> JavaScript </div>
	<div class= 'panel-body'>
<?php
	if(mysqli_num_rows($result)>0){
		while($row= mysqli_fetch_assoc($result2)){
			echo "<div class= 'row'><div class= 'col-sm-1'><input type= 'checkbox' name= 'check_list[]' value= " . $row['quesid'] . "></div>";
			echo "<div class= 'col-sm-11'>" . $row['quesbody'] . "</div></div>";
		}
	}
	else{
		echo "<div class= 'panel-body'> No questions </div></div>";
	}
?>
	</div></div><br>
		<div class= 'panel panel-info'><div class= 'panel-heading'> PHP </div>
	<div class= 'panel-body'>
<?php
	if(mysqli_num_rows($result)>0){
		while($row= mysqli_fetch_assoc($result3)){
			echo "<div class= 'row'><div class= 'col-sm-1'><input type= 'checkbox' name= 'check_list[]' value= " . $row['quesid'] . "></div>";
			echo "<div class= 'col-sm-11'>" . $row['quesbody'] . "</div></div>";
		}
	}
	else{
		echo "<div class= 'panel-body'> No questions </div></div>";
	}
}
}
?>
</div></div>
<br>
<button type= "submit" class= "btn btn-primary btn-block" value= "submit" name= "submit"> Remove selected items </button>
</form><br><br>
</div>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>