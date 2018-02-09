<?php
session_start();
  require_once('../config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:../login.php');
  }

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id=$id ";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);

if($count == 1){
	$usql = "UPDATE `users` SET role='vip' WHERE id=$id";
	$ures = mysqli_query($connection,$usql);
	if($ures == 1){
		header('location:index.php');
	}
}

?>
