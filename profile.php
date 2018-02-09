<?php
session_start();
  require_once('config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }

	$email = $_SESSION['email'];

	$sql = "SELECT * FROM `users` WHERE email ='$email'";
 	$res = mysqli_query($connection, $sql);
 	$ucount = mysqli_num_rows($res);
 	$u =  mysqli_fetch_assoc($res);


?>

<?php include 'inc/header.php'; ?>

<?php include 'inc/nav.php'; ?>

profile




<?php include 'inc/footer.php'; ?>


