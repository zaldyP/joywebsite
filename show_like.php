<?php
	session_start();
	include('config/connect.php');
 
	if (isset($_POST['showlike'])){
		$id = $_POST['id'];
		$query2 = mysqli_query($connection,"select * from `likes` where partid=$id");
		echo mysqli_num_rows($query2);	
	}