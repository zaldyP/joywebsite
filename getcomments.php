<?php
session_start();
  require_once('config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }


 $email = $_SESSION['email'];

//user
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);
$r = mysqli_fetch_assoc($res);







if(isset($_POST['id'])){

$result = "SELECT * FROM comments WHERE part_id = '".$_POST['id']."'";
$resultq = mysqli_query($connection,$result) or die(mysqli_error($connection));
$results = mysqli_num_rows($resultq);
if($results > 0){
  
  while ($row = mysqli_fetch_assoc($resultq)){
   
    $data['id'] = $row['id'];
    $data['content'] = $row['content'];

  }

echo json_encode($data);

}







}




