<?php
ob_start();
session_start();
  require_once('../config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:../login.php');
  }

$email = $_SESSION['email'];
//$role = array('writer','admin','vip','webmaster');
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);
$r = mysqli_fetch_assoc($res);

if($count == 1 && $r['role'] == 'admin' || $r['role'] == 'vip'){
  header('Location: ../index.php');
}


if(isset($_GET['part'])){
	echo $partid = $_GET['part'];	
}


$sql = "SELECT * FROM `parts` WHERE id = $partid";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$query = mysqli_fetch_assoc($res);
$count = mysqli_num_rows($res);

$storyid = $query['story_id'];



if($count == 1){
	$psql = "UPDATE `parts` SET public='' WHERE id=$partid";
	$pres = mysqli_query($connection,$psql);
	if($pres == 1){
		header('location:edit.php?story='.$storyid.'');
	}

}







?>


