<?php 
session_start();
include("pageSegments/head.php");
?>

<link rel= "stylesheet" href= "css/navBar.css">
<style>
.panel{
	height:450px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.panel-body{
	height:290px;
}
.panel-footer .btn {
	width:200px;
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

<br><br><br>
<div class= "container" id= "body">
<div class= "row">
<div class= "col-sm-3">
<div class= "panel panel-info text-justify">
<div class= "panel-heading"><h3> C++ </h3></div>
<div class= "panel-body">
<p>C++ is a general-purpose programming language. It has imperative, object-oriented and generic programming
 features, while also providing facilities for low-level memory manipulation. Many other programming languages
 have been influenced by C++, including C#, Java, and newer versions of C (after 1998).</p></div>
 <div class= "panel-footer">
<a href= "cppInstruction.php"><button type= "button" class= "btn btn-primary btn-lg" value= "cpp">Select</button></a>
</div></div></div>

<div class= "col-sm-3">
<div class= "panel panel-info text-justify">
<div class= "panel-heading"><h3> Java </h3></div>
<div class= "panel-body">
<p> Java is a set of computer software and specifications developed by Sun Microsystems, which was later 
acquired by the Oracle Corporation, that provides a system for developing application software and deploying 
it in a cross-platform computing environment. Java is used in a wide variety of computing platforms from embedded
 devices and mobile phones to enterprise servers and supercomputers. </p></div>
<div class= "panel-footer">
<a href= "javaInstruction.php"><button type= "button" class= "btn btn-primary btn-lg" value= "java">Select</button></a>
</div></div></div>

<div class= "col-sm-3">
<div class= "panel panel-info text-justify">
<div class= "panel-heading"><h3> PHP </h3></div>
<div class= "panel-body">
<p> PHP is a server-side scripting language designed for web development but also used as a general-purpose
 programming language. Originally created by Rasmus Lerdorf in 1994, the PHP reference implementation is now
 produced by The PHP Group. </p></div>
<div class= "panel-footer">
<a href= "phpInstruction.php"><button type= "button" class= "btn btn-primary btn-lg" value= "php">Select</button></a>
</div></div></div>

<div class= "col-sm-3">
<div class= "panel panel-info text-justify">
<div class= "panel-heading"><h3> JavaScript </h3></div>
<div class= "panel-body">
<p> JavaScript is a high-level, dynamic, untyped, and interpreted programming language. It has been standardized
 in the ECMAScript language specification. Alongside HTML and CSS, it is one of the three core technologies
 of World Wide Web content production; the majority of websites employ it and it is supported by all modern 
 Web browsers without plug-ins. </p></div>
<div class= "panel-footer">
<a href= "jsInstruction.php"><button type= "button" class= "btn btn-primary btn-lg" value= "js">Select</button></a>
</div></div></div>
</div>
</div>
<br><br>

<div class= "footer" id= "footer">
<?php include("pageSegments/footer.php"); ?>
</div>

</body>
</html>