<?php
	include('config/connect.php');
	session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM `users` WHERE email = '$email'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);
$r = mysqli_fetch_assoc($res);



	if (isset($_POST['like'])){		
 
		$id = $_POST['id'];

		$getid = "SELECT * FROM `parts` WHERE id = $id";
			$getidres = mysqli_query($connection,$getid);
			$getidq = mysqli_fetch_assoc($getidres);
			
			$storyid = $getidq['story_id'];

		
		$query=mysqli_query($connection,"select * from `likes` where partid='$id' and userid='".$r['id']."'") or die(mysqli_error());
 
		if(mysqli_num_rows($query)>0){
			mysqli_query($connection,"delete from `likes` where userid='".$r['id']."' and partid='$id'");
		}
		else{

		


			mysqli_query($connection,"insert into `likes` (userid,partid,storyid) values ('".$r['id']."', '$id','$storyid')");

			

		}
	}		
?>