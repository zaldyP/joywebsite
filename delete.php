<?php
session_start();
  require_once('config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }

$email = $_SESSION['email'];
$sql = "SELECT * FROM `users` WHERE email ='$email'";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);

$profilepic = $r['profilepic'];

if(file_exists($profilepic)){
	if(unlink($profilepic)){
		$query = "UPDATE `users` SET profilepic='' WHERE email='$email'";
		$result = mysqli_query($connection,$query);
		if($result){
			header('Location: settings.php');
		}
	}

	
}else{
	$query = "UPDATE `users` SET profilepic='' WHERE email='$email'";
	$result = mysqli_query($connection,$query);
	if($result){
		header('Location: settings.php');
	}
}


$coverpic = $r['coverpic'];

if(file_exists($coverpic)){
	if(unlink($coverpic)){
		$querycover = "UPDATE `users` SET coverpic='' WHERE email='$email'";
		$resultcover = mysqli_query($connection,$querycover);
		if($resultcover){
			header('Location: settings.php');
		}
	}

	
}else{
	$querycover = "UPDATE `users` SET coverpic='' WHERE email='$email'";
	$resultcover = mysqli_query($connection,$querycover);
	if($resultcover){
		header('Location: settings.php');
	}
}




?>