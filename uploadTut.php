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
$ok= 1;
if($_SESSION["admin"]=="yes"){
	require "adminNav.php" ;
	
if(isset($_POST["submit"])){
    $upfile= $_SERVER["DOCUMENT_ROOT"] . "./pages/project/uploads/" . $_FILES["book"]["name"];
    if($_FILES["book"]["type"]!= "application/pdf"){
		$msg= "Invalid type. Choose a PDF file. ";
	    $ok=0;
	}
	if(file_exists($upfile)) {
		$msg= "Sorry, file already exists.";
		$ok=0;
	} 
	if($_FILES["book"]["size"] > 500000) {
		$msg= "Sorry, your file is too large.";
		$ok=0;
	}
	if(is_uploaded_file($_FILES["book"]["tmp_name"])){
		if($ok==1){
			if(move_uploaded_file($_FILES["book"]["tmp_name"], $upfile)){
				$msg= "file uploaded successfully.";
			}
			else{
				$msg= "Error in moving file to destination";
			}
		}
	}
}
}
?>

<div class= "container" id= "body"> 
<br><br>
<div id= "heading"><h2> ADMIN PANEL upload tutorial </h2></div><br>
<br><br><br><br>
<div class= "well">
<form role= "form" action= "" method= "post" enctype= "multipart/form-data">
<div class= "row">
<div class= "col-sm-4"><div class= "control-label text-right"> Select PDF Book: </div></div>
<div class= "col-sm-4"><input type= "file" class= "form-control" name= "book"></div>
<div class= "col-sm-4"><button type= "submit" name="submit" value= "submit" class= "btn btn-primary">
Upload</button></div>
</div>
</form><br><br>
<?php echo $msg; ?>
</div>
</div>

