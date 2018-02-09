<?php 


require_once('config/connect.php');
include 'function.php';


$story_id = $_GET['storyid'];
$part_id = $_GET['part_id'];


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="dropify/dist/css/dropify.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/jquery.dropdown.css" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  
</head>
<body>

<nav class="light-blue lighten-1" role="navigation" style="background-color: #D4AF37!important">
    <div class="nav-wrapper margin"><a id="logo-container" href="#" class="brand-logo">Logo</a>
    </div>
</nav>

<?php 

$parts = "SELECT *  FROM `parts` WHERE id = '$part_id' AND story_id ='$story_id'";
$partsq = mysqli_query($connection, $parts) or die(mysqli_error($connection));



 ?>

<style type="text/css">
	body {
  font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;

  background: linear-gradient(rgba(30, 27, 38, 0.9), rgba(30, 27, 38, 0.9)), url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/07/92/07597952a600884.jpg');
  background-size: cover;
   background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
}
	.description {
		 
		margin-top:20px;
	}

	p {
		text-align: justify; 
		text-justify: inter-word; 
		color: #fff!important;
	}


.fa {
	color: #D4AF37;
}



</style>

<?php  

while($partsr = mysqli_fetch_assoc($partsq)){?>

<div class="container" style="margin-top: 50px;">



	<div class="row">
		<div class="col s12 m9">
			<h4 class="center-align" style="font-size: 30px; color: #D4AF37"><?php echo $partsr['title']; ?></h4>
			<p class="center-align" style="color: #fff;">
			<?php 
				$views = "SELECT * FROM `viewcounter` WHERE part_id='$part_id'";
				$viewsq = mysqli_query($connection, $views) or die(mysqli_error($connection));
				$viewsc =	mysqli_fetch_assoc($viewsq);			
			 ?>	
			<span><i class="fa fa-eye"> <?php echo $viewsc['views']; ?></i></span>

			<?php 

				$comments = "SELECT count(id) as cc FROM `comments` WHERE part_id='$part_id'";
				$commentsq = mysqli_query($connection, $comments) or die(mysqli_error($connection));
				$commentsc =	mysqli_fetch_assoc($commentsq);

			 ?>
			<span><i class="fa fa-comments"> <?php echo $commentsc['cc'] ?></i></span>

			<?php 

				$votes = "SELECT count(likeid) as lc FROM `likes` WHERE partid='$part_id'";
				$votesq = mysqli_query($connection, $votes) or die(mysqli_error($connection));
				$votesc =	mysqli_fetch_assoc($votesq);

			 ?>

			<span><i class="fa fa-heart"> <?php echo $votesc['lc']; ?></i></span>
			
			<?php 

				$chapters = "SELECT count(id) as pc FROM `parts` WHERE story_id='$story_id' AND status='published'";
				$chaptersq = mysqli_query($connection, $chapters) or die(mysqli_error($connection));
				$chaptersc =	mysqli_fetch_assoc($chaptersq);

			 ?>			

			<span ><i class="fa fa-bars"> <?php echo $chaptersc['pc']; ?> </i></span>
			</p>
			<?php 

				if ($partsr['public'] == 'free'){

				echo '

					<p class="description">'.$partsr['description'].'</p>';                                   


			 	}else {

			 		echo '<p class="center-align">Exclusive to VIP members only. Please Log in to your account!</p>';
			 	}



			 ?>

			
			
			<div class="addthis_inline_share_toolbox_alcu" style="margin: 40px  auto 40px  auto; "></div>
		</div>

	</div>


</div>
<?php } ?>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a630af2afcc1a70"></script>
<?php include 'inc/footer.php'; ?>	