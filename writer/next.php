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


$storyid = $_GET['story'];
$partid = $_GET['part'];

$getstoriesname = "SELECT * FROM `stories` WHERE id=$storyid";
$getstoriesres = mysqli_query($connection, $getstoriesname) or die(mysqli_error($connection));
$getname = mysqli_fetch_assoc($getstoriesres);

 $namestory = $getname['title'];


 $sql = "SELECT * FROM `parts` WHERE id=$partid AND story_id =$storyid";
 $sqlres = mysqli_query($connection, $sql) or die(mysqli_error($connection));
 $r = mysqli_fetch_assoc($sqlres);


switch (isset($_POST['save']) && !empty($_POST['save'])) {
	case 'Save':
		
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$bg = mysqli_real_escape_string($connection, $_POST['bg']);

		$updateparts = "UPDATE `parts` SET title='$title', description='$description',bg = '$bg'  WHERE id = $partid ";
		$updatepartsres = mysqli_query($connection,$updateparts) or die(mysqli_error($connection)); 
		if($updatepartsres){

			
			header('Location: next.php?story='.$storyid .'&part='.$partid.'');


		}

		break;
		
	
	default:
		echo '';
		break;
}


switch (isset($_POST['publish']) && !empty($_POST['publish'])) {
	case 'Publish':
		
		$publishparts = "UPDATE `parts` SET status = 'published' WHERE id = $partid";
		$publishpartsres = mysqli_query($connection,$publishparts) or die(mysqli_error($connection));
		if($publishpartsres){
			$publishstories = "UPDATE `stories` SET published = 1 WHERE id = $storyid";
			$publishstoriesres = mysqli_query($connection,$publishstories) or die(mysqli_error($connection));
			header('Location: edit.php?story='.$storyid.'');
		}


		break;
	
	default:
		# code...
		break;
}





?>
<style type="text/css">
	body {
		background-color: #ebebeb;
	}



</style>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
tinymce.init({
  selector: 'textarea',
  branding: false,
  height: 500,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks emoticons visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  fontsizeselect | numlist bullist outdent indent  | removeformat emoticons' ,
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ],

    file_picker_callback: function(callback, value, meta) {
    // Provide file and text for the link dialog
    if (meta.filetype == 'file') {
      callback('mypage.html', {text: 'My text'});
    }

    // Provide image and alt text for the image dialog
    if (meta.filetype == 'image') {
      callback('myimage.jpg', {alt: 'My alt text'});
    }

    // Provide alternative source and posted for the media dialog
    if (meta.filetype == 'media') {
      callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    }
  }
  
 });

  </script>
<?php include 'inc/header.php' ?>

<form action="" method="post" enctype="multipart/form-data" >
	<nav>
	    <div class="nav-wrapper">
	      <div class="left">
	      	<a onclick="goBack()"><span><i class="fa  fa-angle-left fa-lg" style="color: #555;"></i></span></a>
	      </div>
	      <div class="left" style="margin-left: 10px; padding:10px;">	
	      
	      	<?php 

	      	if($getname['title'] == empty($namestory)){
	      		echo '<p class="small">Add Story Part Info</p>';
	      	}else {
	      		echo '<p class="small">'.$getname['title'].'</p>'; 
	      	}

	      	 ?>

	      	
	      	<span class="h4"><?php echo $r['title'] ?></span>
	      </div>
	      <div class="right" style="margin-right: 10px; ">
	      		
	         		
   				<input class="btn btn-blue" type="submit" name="publish" value="Publish">
	      		<input class="btn btn-grey" type="submit" name="save" value="Save">
	      		<input class="btn btn-grey" type="submit" name="submit" value="Preview">
		      </div>
	    </div>
	  </nav>
	  <div class="container" style="margin-top: 120px;">
	  	
	  <div class="row">
	  		<div col s12 m12>
	  			<input  type="text" id="titlepart" name="title" value="<?php echo $r['title'] ?>">
	  		</div>
	  </div>		

	  	
	  <div class="row">
	  		<div col s12 m12>
	  			<textarea class="selected inline-preview" name="description" height="800"><?php echo $r['description']; ?></textarea>

	  		</div>
			
	  </div>
	  <div class="row">
	  		<div col s12 m12>
	  			<input  style="width:600px;" type="text" name="bg" value="<?php echo $r['bg'] ?>" placeholder="Cover Url">
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

// function countWords(){
// 	s = document.getElementById("description").value;
// 	s = s.replace(/(^\s*)|(\s*$)/gi,"");
// 	s = s.replace(/[ ]{2,}/gi," ");
// 	s = s.replace(/\n /,"\n");
// 	document.getElementById("wordcount").value = s.split(' ').length;
// }
    
    

</script>

<?php include 'inc/footer.php' ?>




