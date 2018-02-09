<?php 
	
require_once('config/connect.php');

$key = $_GET['key'];
$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id=$id AND verification_key= '$key' AND active = 0";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);

if($count == 1){
	$usql = "UPDATE `users` SET active=1 WHERE id=$id";
	$ures = mysqli_query($connection,$usql);
	if($ures == 1){
		$smsg = "Account activated succesfully";
	}else {
		$fmsg = "Account activation failed";
	}

}else{
	//header('Location: login.php');
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>VIP Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

	<link rel="stylesheet" href="styles.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
	   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>
  
</body>
</html>