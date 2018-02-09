<?php 
	require_once('config/connect.php');


	$username = $_POST['username'];

	$usql = "SELECT * FROM `users` WHERE username ='$username'";
	$ures = mysqli_query($connection,$usql) or die(mysqli_error($connection));
	$ucount = mysqli_num_rows($ures);

	if($ucount == 1){
		echo "<span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'> Username not available</span>";
	}else{
		echo "<span class='glyphicon glyphicon-ok text-success' aria-hidden='true'> Username available</span>";
	}


	


 ?>

