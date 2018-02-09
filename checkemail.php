<?php  
require_once('config/connect.php');
$email = $_POST['email'];

	$esql = "SELECT * FROM `users` WHERE email ='$email'";
	$eres = mysqli_query($connection,$esql) or die(mysqli_error($connection));
	$ecount = mysqli_num_rows($eres);

	if($ecount == 1){
		echo "<span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'> Email not available</span>";
	}else{
		echo "<span class='glyphicon glyphicon-ok text-success' aria-hidden='true'> Email available</span>";
	}

?>	