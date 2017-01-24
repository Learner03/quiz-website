<style>
footer{
background-color:black;
color:white;
padding-top:30px;
padding-bottom:50px;
}
footer .glyphicon {
font-size: 20px;
}
</style>
<footer class= "container-fluid text-center">
<a href="#myPage" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a><br><br><br>
<p> &copy Created by Aditi Gupta</p>
<p>Site under construction </p>
<div class= "row">
<div class= "col-sm-3"><span><b>Recent users comments:</b></span></div>
<div class= "col-sm-9"></div>
</div>
<div class= "row">
<div class= "col-sm-3 text-left">
<?php
$msg= "";
 $conn= mysqli_connect("localhost", "root", "", "mydb");
		if(!$conn){
			$msg= "connection failed.";
		}
		else{
			$query= "SELECT * FROM comments";
            $result= mysqli_query($conn, $query);
			if(!$result){
				$msg= "Failed to retreive comments. ";
			}
			else{
				if(mysqli_num_rows($result)>0){
					while($row= mysqli_fetch_assoc($result)){
						$msg= $row['name'] . "-  " . $row['comment'];
						echo "<div class= 'row'><div class= 'col-sm-12'>" . $msg . "</div></div>";
					}
				}
				else{
					$msg= "No comments to display.";
				}
			}
		}

?> 
</div>
<div class= "col-sm-9">  </div>
</div>
</footer>