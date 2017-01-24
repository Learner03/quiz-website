<nav class= "navbar navbar-default" data-spy="affix" data-offset-top="150">
<div class= "container-fluid">
<div class= "navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
 <span class= "icon-bar"></span>
<span class= "icon-bar"></span>
<span class= "icon-bar"></span>
</button>
</div>

<div class= "collpase navbar-collapse" id= "myNav">
<ul class= "nav navbar-nav">
<li><a href= "index.php">Home</a></li>
<li> <a href= "selectQuiz.php">Quizzes </a></li>
<li><a href= "contactUs.php">Contact us </a></li>
</ul>

<ul class= "nav navbar-nav navbar-right">
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
<span class= "glyphicon glyphicon-user"> <?php echo $_SESSION["user"]; ?> </span>
<span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a href="addQues.php" style= "padding:10px;">Insert Question</a></li>
<li><a href="uploadTut.php" style= "padding:10px;">Upload tutorial</a></li>
<li><a href="changePassword.php" style= "padding:10px;">Change Password</a></li>
<li><a href="logout.php" style= "padding:10px;">Log Out</a></li>
</ul>
</li>
</ul>
</div>
</div>
</nav>