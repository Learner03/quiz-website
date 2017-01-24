<?php
error_reporting(E_ALL);
ini_set('display_errors',TRUE);
//session_start();
if(isset($_POST['submit'])){
	echo "hi";
/* $conn= mysqli_connect("localhost", "root", "", "mydb");
if(!empty($_POST['check_list'])) {
foreach($_POST['check_list'] as $selected) {
	$id= substr($selected, -1);
	if($id== 's'){
		$id= 'js';
	}
	$table= $id . "ques";
	$query= "DELETE FROM $table WHERE quesid= $selected";
	$query1= "DELETE FROM answers WHERE ansId= $selected";
	$result= mysqli_query($conn, $query);
	$result1= mysqli_query($conn, $query1);
	if(!$result)
		$msg .= "cant delete ques";
	else if(!$result1)
		$msg .= "cant delete answers";
	else
		$msg .= "Question deleted successfully.";
}
}
} 
 echo $msg;  */}?>