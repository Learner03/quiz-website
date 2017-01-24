<ul>
  <li><a class="active" href="#">Home</a></li>
  <li><a href="selectQuiz.php">Quizzes</a></li>
  <li><a href="contactUs.php">Contact</a></li>
</ul>
<br>
<div class= "panel panel-info">
<div class= "panel-heading"> Tutorials </div> 
<div class= "panel-body"> 
<?php
$dir = $_SERVER["DOCUMENT_ROOT"] . '/pages/project/uploads/';
$files = scandir($dir, 0);
for($i=2; $i<count($files); $i++){
    $file1= "/uploads/" . $files[$i];
	echo "<a href='" . "/pages/project" . $file1 . "'>" . $files[$i] . "</a><br>";
}
?>
</div>
</div>
