<?php
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




if(isset($_POST['submit']) && !empty($_POST['submit'])){	
	




	$userid = $r['id'];
	$title = $_POST['title'];
	
	$description = $_POST['description'];
	$genre = $_POST['genre'];
	$status = $_POST['status'];
	

	$insstories = "INSERT INTO `stories` (user_id,title) VALUES('$userid', 'Untitle Story')";
	$insres = mysqli_query($connection,$insstories) or die(mysqli_error($connection));

	if($insres){
	$last_id = mysqli_insert_id($connection);

	$insertstoriesid = "INSERT INTO `parts` (title,story_id,user_id,status) VALUES('Untitled Part', $last_id,$userid,'draft')";

	$resstoriesid =  mysqli_query($connection,$insertstoriesid) or die(mysqli_error($connection));
	

	$lastpart_id = mysqli_insert_id($connection);	
	
	$insertview = "INSERT INTO `viewcounter` (story_id,part_id,linkname) VALUES($last_id,$lastpart_id ,'single')";
	$insertviewres = mysqli_query($connection,$insertview) or die(mysqli_error($connection));
	
	$lastview_id = mysqli_insert_id($connection);

		if($insertviewres){
			$updateviewid  = "UPDATE `parts` SET view_id = $lastview_id WHERE id = $lastpart_id";
			$updateviewidres = mysqli_query($connection,$updateviewid) or die(mysqli_error($connection));

		}

	

	if(isset($_FILES) && !empty($_FILES)){


		$name = $_FILES['bookcover']['name'];
  		$size = $_FILES['bookcover']['size'];
   		$type = $_FILES['bookcover']['type'];
   		$tmp_name = $_FILES['bookcover']['tmp_name'];
  		$extension = substr($name, strpos($name, '.') + 1);
   		$maxsize = 500000;

   		if(isset($name) && !empty($name)){
 	      if(($extension == "jpeg" || $extension = "jpg" || $extension == "png") && $type == "image/jpeg" && $size <= $maxsize  || $type == "image/png" && $size <= $maxsize  ){
 	          $location = "../uploadimage/";
 	          if(move_uploaded_file($tmp_name, $location.$name)){
  	
 	  //    	 $selstories = "SELECT id FROM `stories` ORDER BY id DESC LIMIT 1";
 	  //    	 $selres =  mysqli_query($connection, $selstories) or die(mysqli_error($connection));
 	  //    	 $resquery = mysqli_fetch_assoc($selres);
			 // $lastid = $resquery['id']; 	     	 

 	   //   	  $insstories = "INSERT INTO `stories` (user_id,title,description,genre,status,bookcover) VALUES('$userid', '$title','$description','$genre','status','$location$id.jpg')";
			  // $insres = mysqli_query($connection,$insstories) or die(mysqli_error($connection));

				 //  if($insres){
				 //  	$last_id = mysqli_insert_id($connection);

				 //  	$insertstoriesid = "INSERT INTO `parts` (title,story_id,user_id) VALUES('Untitled Parts', $last_id,$userid)";

				 //  	$resstoriesid =  mysqli_query($connection,$insertstoriesid) or die(mysqli_error($connection));



					// }

 	         



 	         $selstories = "SELECT id FROM `stories` ORDER BY id DESC LIMIT 1";
 	      	 $selres =  mysqli_query($connection, $selstories) or die(mysqli_error($connection));
 	      	 $resquery = mysqli_fetch_assoc($selres);
			$laststoryid = $resquery['id'];

			 $selparts = "SELECT id FROM `parts` ORDER BY id DESC LIMIT 1";
 	      	 $partsres =  mysqli_query($connection, $selparts) or die(mysqli_error($connection));
 	      	 $partquery = mysqli_fetch_assoc($partsres);
			$lastpartid = $partquery['id'];

				if(isset($_POST['title']) && !empty($_POST['title'])){
					
 	         		$updatestory = "UPDATE `stories` SET user_id= '$userid', title ='$title', description='$description', genre = '$genre' , status= '$status', bookcover='$location$name' WHERE id = $laststoryid";

 	         		$updatestoryres = mysqli_query($connection,$updatestory) or die(mysql_error($connection));

 	         		header('Location: next.php?story='.$resquery['id'].'&part='.$partquery['id'].'');


				}else{
					$updatestory = "UPDATE `stories` SET user_id= '$userid', title ='Untitled Story', description='$description', genre = '$genre' , status= '$status', bookcover='$location$name' WHERE id = $laststoryid";

 	         		$updatestoryres = mysqli_query($connection,$updatestory) or die(mysql_error($connection));

 	         		header('Location: next.php?story='.$resquery['id'].'&part='.$partquery['id'].'');

				}	

 	         

 	     		}    	            
 	 
 	    	}  

		}else {

			$selstories = "SELECT id FROM `stories` ORDER BY id DESC LIMIT 1";
 	      	 $selres =  mysqli_query($connection, $selstories) or die(mysqli_error($connection));
 	      	 $resquery = mysqli_fetch_assoc($selres);
			 $laststoryid = $resquery['id'];

			 $selparts = "SELECT id FROM `parts` ORDER BY id DESC LIMIT 1";
 	      	 $partsres =  mysqli_query($connection, $selparts) or die(mysqli_error($connection));
 	      	 $partquery = mysqli_fetch_assoc($partsres);
			 $lastpartid = $partquery['id'];

 	          	if(isset($_POST['title']) && !empty($_POST['title'])){
					
 	         		$updatestory = "UPDATE `stories` SET user_id= '$userid', title ='$title', description='$description', genre = '$genre' , status= '$status', bookcover='' WHERE id = $laststoryid";

 	         		$updatestoryres = mysqli_query($connection,$updatestory) or die(mysql_error($connection));

 	         		header('Location: next.php?story='.$resquery['id'].'&part='.$partquery['id'].'');

				}else{
					$updatestory = "UPDATE `stories` SET user_id= '$userid', title ='Untitled Story', description='$description', genre = '$genre' , status= '$status', bookcover='' WHERE id = $laststoryid";

 	         		$updatestoryres = mysqli_query($connection,$updatestory) or die(mysql_error($connection));

 	         		header('Location: next.php?story='.$resquery['id'].'&part='.$partquery['id'].'');

				}	

 	         			
		}

	}

}

}




?>





<style type="text/css">
	body {
		background: #ebebeb;
		
	}

</style>


<?php include 'inc/header.php' ?>


<form action="" method="post" enctype="multipart/form-data" >
	<nav>
	    <div class="nav-wrapper">
	      <div class="left">
	      	<a onclick="goBack()"><span><i class="fa  fa-angle-left fa-lg" style="color: #555;"></i></span></a>
	      </div>
	      <div class="left" style="margin-left: 10px; padding:10px;">	
	      	<p class="small">Add Story Info</p>
	      	<span class="h4">Untitled Story</span>
	      </div>
	      <div class="right" style="margin-right: 10px;">
	      		
	      		<button onclick="goBack()" class="btn btn-grey">Cancel</button>
	      		<input class=" btn btn-blue" type="submit" name="submit" id="next" value="Skip">
	      </div>
	    </div>
	  </nav>



	<div class="container" style="margin-top: 100px;">
	
		<div class="row">
	      	<div class="col s12 m4">
	      		<div style="width: 256px;" class="card">
	      			<input type="file" class="dropify"  data-show-errors="false" data-height="400" data-default-file="" name="bookcover" />
	      		</div>
	 		</div>
		     <div class="col s12 m8">
		      	<div class="card">
			      	<div class="row">
					    <div class="col s12">
					      <ul class="tabs left" style="height: 60px;">
					        <li class="tab s12 title" style="height: 60px; padding-top: 6px; letter-spacing: normal;"><a href="#test1">Story Details</a></li>
					        
					      </ul>
					    </div>

					    <div style="padding: 0px 30px;" id="test1" class="col s12 ">
					    	<p class="field">Title</p>
					      	<input type="text" name="title" placeholder="Untitled Story">
					      	<p class="field2">Description</p>
					      	<textarea name="description"></textarea>
					      	<p class="field2">Genre</p>
					      	<select class=" field2 browser-default" name ="genre" id="genre">
					      		<option value="" selected>Select Genre</option>
					      		<option value="Action">Action</option>
					      		<option value="Adventure">Adventure</option>
					      		<option value="Chicklit">Chicklit</option>
					      		<option value="Fan Fiction">Fan Fiction</option>
					      		<option value="Fantasy">Fantasy</option>
					      		<option value="General Fiction">General Fiction</option>
					      		<option value="Historical Fiction">Historical Fiction</option>
					      		<option value="Horror">Horror</option>
					      		<option value="Humor">Humor</option>
					      		<option value="Mystery/Thriller">Mystery/Thriller</option>
					      		<option value="Paronarmal">Paronarmal</option>
					      		<option value="Poetry">Poetry</option>
					      		<option value="Random">Random</option>
					      		<option value="Romance">Romance</option>
					      		<option value="Science Fiction">Science Fiction</option>
					      		<option value="Short Story">Short Story</option>
					      		<option value="Spiritual">Spiritual</option>
					      		<option value="Teen Fiction">Teen Fiction</option>
					      		<option value="Vampire">Vampire</option>
					      		<option value="Warewolf">Warewolf</option>
					      	</select>
					      	<p class="field2">Status</p>
					      	<select class=" field2 browser-default" name="status">
					      		<option value="on-going">On-going</option>
					      		<option value="Completed">Completed</option>
					      	</select>
					      	
					      	
					    </div>
					  </div>	
		      	</div>
		     </div>
    	</div>
	</div>


</form>

<script>
function goBack() {
    window.history.back();
}
</script>

<?php include 'inc/footer.php' ?>
