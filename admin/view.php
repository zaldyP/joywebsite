<?php
session_start();
  require_once('../config/connect.php');
  require_once('../function.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:../login.php');
  }


$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id=$id ";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$ur  = mysqli_fetch_assoc($res);


if(isset($_POST['update']) && !empty($_POST['update'])){

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$active = mysqli_real_escape_string($connection, $_POST['active']);

	$update = "UPDATE `users` SET email = '$email' , active = '$active' WHERE id = $id";
	$updateq = mysqli_query($connection,$update) or die(mysqli_error($connection));
	if($updateq){
		header('Location: view.php?id='.$id.'');
		

	}else {
		echo "Error";
	}

}


?>




<h2>Edit VIP Credentials</h2>
<br>
<form action="#" method="post">
	
	<input type="text" name="email" value="<?php echo $ur['email'];?>"> <br><br>
	<input type="text" name="active" value="<?php echo $ur['active'];?>"><br><br>
	<input type="submit" name="update" >
	<p><?php echo getUserIpAddr(); ?></p>
	<a href="index.php">Back</a>

</form>





  

