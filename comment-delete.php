


<?php 
require_once('config/connect.php');


$deleteid = $_GET['delete'];
$storyid = $_GET['story'];
$partid = $_GET['part'];

$sqlcom = "DELETE FROM `comments` WHERE id = $deleteid";
$sqldel = mysqli_query($connection, $sqlcom) or die(mysqli_error($connection));

if($sqldel == 1){
	header('Location: single.php?story='.$storyid.'&part='.$partid);

} 

?>