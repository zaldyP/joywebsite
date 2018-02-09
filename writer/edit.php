<?php
session_start();
  require_once('../config/connect.php');
  include '../function.php';

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


$story = $_GET['story'];


$stsql = "SELECT * FROM `stories` WHERE id = $story";
$stsqlres = mysqli_query($connection,$stsql) or die(mysqli_error($connection));
$sq = mysqli_fetch_assoc($stsqlres);

$pasql = "SELECT * FROM `parts` WHERE story_id = $story";
$pasqlres = mysqli_query($connection,$pasql) or die(mysqli_error($connection));



switch (isset($_POST['save']) && !empty($_POST['save'])) {
	case 'Save':
		
		

		$userid = $r['id'];
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$genre = mysqli_real_escape_string($connection, $_POST['genre']);
		$status = mysqli_real_escape_string($connection, $_POST['status']);

		$bookcover = $sq['bookcover'];



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

	   					if(file_exists($bookcover)) unlink($bookcover);
	   					
	   					if(move_uploaded_file($tmp_name, $location.$name)){

	   						$updatestory = "UPDATE `stories` SET user_id = '$userid', title ='$title', description='$description', genre = '$genre' , status= '$status', bookcover='$location$name' WHERE id = $story";

	   						$updatesres = mysqli_query($connection, $updatestory) or die(mysqli_error($connection));

	   						header('Location: edit.php?story='.$story.'');

	   					}

	   				}

	   			}else {
		   				
					$updatestory = "UPDATE `stories` SET user_id = '$userid', title ='$title', description='$description', genre = '$genre' , status= '$status' WHERE id = $story";

	   				$updatesres = mysqli_query($connection, $updatestory) or die(mysqli_error($connection));

	   				header('Location: edit.php?story='.$story.'');
						
	   			}

		}
		
   					

		break;
	
	default:
		echo "";
		break;
}



switch (isset($_POST['parts']) && !empty($_POST['parts'])) {
	case 'New Part':
		

			$userid = $r['id'];

			$inspart = "INSERT INTO `parts` (user_id,story_id,title,status) VALUES ($userid,$story,'Untitled Part','draft')";
			$inspartres = mysqli_query($connection,$inspart) or die(mysqli_error($connection));
	
			$last_id = mysqli_insert_id($connection);

			$insertview = "INSERT INTO `viewcounter` (story_id,part_id,linkname) VALUES($story,$last_id ,'single')";
			$insertviewres = mysqli_query($connection,$insertview) or die(mysqli_error($connection));
	
			$lastview_id = mysqli_insert_id($connection);

		if($insertviewres){
			$updateviewid  = "UPDATE `parts` SET view_id = $lastview_id WHERE id = $last_id";
			$updateviewidres = mysqli_query($connection,$updateviewid) or die(mysqli_error($connection));
			header('Location: next.php?story='.$story .'&part='.$last_id.'');

		}




				


		
			
			

		break;
	
	default:
		echo "";
		break;
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
	      	<p class="small">Edit Story Details</p>
	      	<span class="h4"><?php echo $sq['title'] ?></span>
	      </div>
	      <div class="right" style="margin-right: 10px;">
	      		
	      		<button onclick="goBack()" class="btn btn-grey">Cancel</button>
	      		<input class=" btn btn-blue" type="submit" name="save" value="Save">
	      </div>
	    </div>
	  </nav>



	<div class="container" style="margin-top: 100px;">
	
		<div class="row">
	      	<div class="col s12 m4">
	      		<div style="width: 256px;" class="card">
	      			<input type="file" class="dropify"  data-show-errors="" data-height="400" data-default-file="<?php echo $sq['bookcover']; ?>" name="bookcover"  />
	      		</div>
	 		</div>
		     <div class="col s12 m8">
		      	<div class="card">
			      	<div class="row">
					    <div class="col s12">
					      <ul class="tabs left" style="height: 60px;">
					        <li class="tab s12 title" style="height: 60px; padding-top: 6px; letter-spacing: normal;"><a href="#test1">Story Details</a></li>
					        <li class="tab s12 title" style="height: 60px; padding-top: 6px; letter-spacing: normal;"><a  class ="active" href="#test2">Table of Contents</a></li>

					        
					      </ul>
					    </div>

					    <div style="padding: 0px 30px;" id="test1" class="col s12 ">
					    	<p class="field">Title</p>
					      	<input type="text" name="title" placeholder="Untitled Story" value="<?php echo $sq['title'];?>">
					      	<p class="field2">Description</p>
					      	<textarea name="description"><?php echo $sq['description']; ?></textarea>
					      	<p class="field2">Genre</p>
					      	<select class=" field2 browser-default" name ="genre" id="genre">
					      		<option value="<?php echo $sq['genre']; ?>"><?php echo $sq['genre']; ?></option>
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
					      		<option value="<?php echo $sq['status'] ?>"><?php echo $sq['status'] ?></option>
					      		<option value="On-going">On-going</option>
					      		<option value="Completed">Completed</option>
					      	</select>
					      	
					      	
					    </div>
					    <div style="padding: 0px 30px;" id="test2" class="col s12 ">
					    <div id = "work-items">
					    	<input type="submit" class="btn btn-blue" name="parts" value="New Part">	
					    </div>
					    <?php 
					    while($pl = mysqli_fetch_assoc($pasqlres)){

					    	$part = $pl['id'];

					     ?>
					    <div class="party_list text-left ">
					    	<div class="story-part">
					    		<div class=" drag-handle vcenter">
					    			<span class="fa fa-bars" style="font-size: 28px;"></span>
					    		</div>
					    		<div  class="part-meta vcenter">
					    			<div clasa="part-name col-xs-12 ">
					    				<a href="" style="color: #444; font-size: 16px; font-weight: 600"><?php echo $pl['title'] ?></a>
					    			</div>
					    			<div class="part-details">
					    				<div>


					    					
					    					<?php  
					    					if($pl['status'] == 'published' ){
					    						echo ' <span class="publish-state">'.$pl['status'].'  - </span>';
					    					}else{

					    						echo ' <span class="publish-draft">'.$pl['status'].'  - </span>';
					    						
					    					}

					    					   

					    					 ?>

					    					
					    					

					    					<span><?php echo date('M d Y h:i A',strtotime($pl['created'])) ?></span>
					    					<span style="float: right;">

					    					<?php 

					    						if($pl['status'] == 'published'){

														echo '<a href= "draftpart.php?part='.$part.'" class="fa fa-cloud-upload" style="color:#999"></a>';

												}else if($pl['status'] == 'draft'){
													
													echo '<a href= "publishpart.php?part='.$part.'" class="fa fa-cloud-upload"></a>';
												}


					    						

					    					 ?>

					    						
					    						

					    						<a href="<?php echo 'next.php?story='.$story.'&part='.$part.'' ?>" class="fa fa-edit"></a>
					    						<a href="<?php echo ' ../single.php?story='.$story.'&part='.$part.'' ?>" class="fa fa-eye"></a>

					    						<?php 

					    							if(!empty($pl['public'] == '' )) {
					    								echo '<a  href="free.php?part='.$part.'" class="fa fa-share"></a>';
					    										
					    							}else if($pl['public'] == 'free'){

					    								echo '<a style="color:#999" href="unfree.php?part='.$part.'" class="fa fa-share"></a>';

					    							}

					    						 ?>

					    						
					    						


					    						<a href="<?php echo 'deletepart.php?part='.$part.''?>"  class="fa fa-trash-o"></a>
					    					</span>
					    				</div>
					    			
					    			</div>
					    			<div class="stats">
					    				<?php 
					    					$viewcounter = "SELECT * FROM `viewcounter` WHERE id = $part";
					    					$viewcounterres = mysqli_query($connection,$viewcounter) or die(mysqli_error($connection));
					    					$viewcount = mysqli_fetch_assoc($viewcounterres);

					    				 ?>
					    				<span><i class="fa fa fa-eye"> <?php echo format($viewcount['views']); ?></i></span>
					    				
					    		<?php

					    		$likequery = "SELECT * FROM `likes` WHERE partid = '".$pl['id']."' AND userid = '".$r['id']."'";
								$likequeryres = mysqli_query($connection,$likequery) or die(mysqli_error($connection));
								$likequerycount = mysqli_num_rows($likequeryres);

					    		 

					    		if($likequerycount > 0 ){?>
				
									<span id="<?php echo $pl['id'];?>" class="unlike fa fa-heart"></i></span>
									<?php 

								}else {?>

									<span id="<?php echo $pl['id'];?>" class="like fa fa-heart-o"></i></span>	
									
									<?php 
								}
							

								?>
					    		
					    			<span id="show_like<?php echo $pl['id'];?>">  
				
										<?php 
											$query3 = "SELECT * FROM `likes` WHERE partid = '".$pl['id']."'";
											$query3res =  mysqli_query($connection,$query3) or die(mysqli_error($connection));
											$likecount =  mysqli_num_rows($query3res);
											echo format($likecount);
										 ?>

									</span>		
					    				


					    			<span><i class="fa fa fa-comment"> 0</i></span>
					    			</div>
					    			
					    		</div>
					    	</div>
					    	
					    </div>

					    <?php } ?>	
					    
							


					    </div>
					  </div>	
		      	</div>
		     </div>
    	</div>
	</div>


</form>




<?php include 'inc/footer.php' ?>
<script type = "text/javascript">



	function goBack() {
    window.history.back();
	}
	
	$(document).ready(function(){ 
		$(document).on('click', '.like', function(){
			var id=$(this).attr("id");
			var $this = $(this);
			$this.toggleClass('unlike');
			if($this.hasClass('fa fa-heart')){
				//$this.text('Like'); 
			} else {
				//$this.text('Unlike');
				$this.addClass("fa fa-heart-o"); 
			}
				$.ajax({
					type: "POST",
					url: "../like.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
		$(document).on('click', '.unlike', function(){
			var id=$(this).attr("id");
			var $this = $(this);
			$this.toggleClass('fa fa-heart-o');
			if($this.hasClass('fa fa-heart-o')){
				//$this.text('Unlike'); 
			} else {
				//$this.text('Like');
				$this.addClass("fa fa-heart"); 
			}
				$.ajax({
					type: "POST",
					url: "../like.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
 
	});
 
	function showLike(id){
		$.ajax({
			url: '../show_like.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like'+id).html(response);
 
			}
		});
	}	




</script>
