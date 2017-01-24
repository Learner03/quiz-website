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
require("navigationBar.php");	
?>
</div>

<br><br><br><br> 
<div class= "row">
<div class= "col-sm-3"></div>
<div class= "col-sm-6">
<div id= "form"><?php require("pageSegments/loginForm.php"); ?></div>
</div>
<div class= "col-sm-3"></div>
</div>
<br><br><br><br><br>
<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>
</body>
</html>