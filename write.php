 
<?php 

require_once('config/connect.php');
include 'function.php';



$storyid = $_GET['storyid'];

$story = "SELECT * FROM `stories` WHERE id = $storyid";
$storyq = mysqli_query($connection, $story) or die(mysqli_error($connection));


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<?php  
  $story2 = "SELECT * FROM `stories` WHERE id = $storyid";	
  $storyq2 = mysqli_query($connection, $story2) or die(mysqli_error($connection));
    $storycc = mysqli_fetch_assoc($storyq2);	 
  ?>
  <title><?php echo $storycc['title'];  ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="dropify/dist/css/dropify.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/jquery.dropdown.css" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  
</head>
<body>

<style type="text/css">
	


	.grey {
		background: url(https://unsplash.it/<?php echo rand(1, 3000) ?>/456);
		background-size: cover;
  		background-position: center center;
  		position: relative;
  		 height:   270px;



	}

	.profile-stats {
		bottom: 0;
  /*border-top: 1px solid rgba(0,0,0,0.5);*/
  left: 0;
  padding: 20px 15px 15px 15px;
  position: absolute;
  right: 0;
  
  height:100%;
  
  

  /* Generated Gradient */
  background: -moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(0,0,0,0.51) 3%, rgba(0,0,0,0.75) 61%, rgba(0,0,0,0.5) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(3%,rgba(0,0,0,0.51)), color-stop(61%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.5)));
  background: -webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
 background: -o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: -ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: linear-gradient(to bottom, rgba(2, 2, 2, 0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80ffffff', endColorstr='#80000000',GradientType=0 );

}
	}



.profile-picture {
  background-position: center center;
  background-size: cover;
  border: 5px #efefef solid;
 /* border-radius: 50%;*/
  /*bottom: -50px;*/
  box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2), 1px 1px 4px rgba(0,0,0,0.3);
  height: 230px;
  /*left: 150px;*/
  /*position: absolute;*/
  width: 150px;
  z-index: 3;
 } 


/**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
 * {
 	margin: 0;
 	padding: 0;
 	-webkit-box-sizing: border-box;
 	-moz-box-sizing: border-box;
 	box-sizing: border-box;
 }

 a {
 	color: #03658c;
 	text-decoration: none;
 }

ul {
	list-style-type: none;
}

body {
	

	font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;

  background: linear-gradient(rgba(30, 27, 38, 0.9), rgba(30, 27, 38, 0.9)), url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/07/92/07597952a600884.jpg');
  background-size: cover;
   background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;

}

/** ====================
 * Lista de Comentarios
 =======================*/
.comments-container {
	margin: 60px auto 15px;
	width: 768px;
}

.comments-container h1 {
	font-size: 36px;
	color: #283035;
	font-weight: 400;
}

.comments-container h1 a {
	font-size: 18px;
	font-weight: 700;
}

.comments-list {
	margin-top: 30px;
	position: relative;
}

/**
 * Lineas / Detalles
 -----------------------*/
.comments-list:before {
	content: '';
	width: 2px;
	height: 100%;
	background: #c7cacb;
	position: absolute;
	left: 32px;
	top: 0;
}

.comments-list:after {
	content: '';
	position: absolute;
	background: #c7cacb;
	bottom: 0;
	left: 27px;
	width: 7px;
	height: 7px;
	border: 3px solid #dee1e3;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.reply-list:before, .reply-list:after {display: none;}
.reply-list li:before {
	content: '';
	width: 60px;
	height: 2px;
	background: #c7cacb;
	position: absolute;
	top: 25px;
	left: -55px;
}


.comments-list li {
	margin-bottom: 15px;
	display: block;
	position: relative;
}

.comments-list li:after {
	content: '';
	display: block;
	clear: both;
	height: 0;
	width: 0;
}

.reply-list {
	padding-left: 88px;
	clear: both;
	margin-top: 15px;
}
/**
 * Avatar
 ---------------------------*/
.comments-list .comment-avatar {
	width: 65px;
	height: 65px;
	position: relative;
	z-index: 99;
	float: left;
	border: 3px solid #FFF;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	overflow: hidden;
}

.comments-list .comment-avatar img {
	width: 100%;
	height: 100%;
}

.reply-list .comment-avatar {
	width: 50px;
	height: 50px;
}

.comment-main-level:after {
	content: '';
	width: 0;
	height: 0;
	display: block;
	clear: both;
}
/**
 * Caja del Comentario
 ---------------------------*/
.comments-list .comment-box {
	width: 600px;
	float: left;
	position: relative;
	margin-left: 10px;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
	content: '';
	height: 0;
	width: 0;
	position: absolute;
	display: block;
	border-width: 10px 12px 10px 0;
	border-style: solid;
	border-color: transparent #FCFCFC;
	top: 8px;
	left: -11px;
}

.comments-list .comment-box:before {
	border-width: 11px 13px 11px 0;
	border-color: transparent rgba(0,0,0,0.05);
	left: -12px;
}

.reply-list .comment-box {
	width: 610px;
}
.comment-box .comment-head {
	background: #FCFCFC;
	padding: 10px 12px;
	border-bottom: 1px solid #E5E5E5;
	overflow: hidden;
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
	float: right;
	margin-left: 14px;
	position: relative;
	top: 2px;
	color: #A6A6A6;
	cursor: pointer;
	-webkit-transition: color 0.3s ease;
	-o-transition: color 0.3s ease;
	transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
	color: #03658c;
}

.comment-box .comment-name {
	color: #283035;
	font-size: 14px;
	font-weight: 700;
	float: left;
	margin-right: 10px;
}

.comment-box .comment-name a {
	color: #283035;
}

.comment-box .comment-head span {
	float: left;
	color: #999;
	font-size: 13px;
	position: relative;
	top: 1px;
}

.comment-box .comment-content {
	background: #FFF;
	padding: 12px;
	font-size: 15px;
	color: #595959;
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

/*.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
.comment-box .comment-name.by-author:after {
	

	
	content: '';
	background: #03658c;
	color: #FFF;
	font-size: 12px;
	padding: 3px 5px;
	font-weight: 700;
	margin-left: 10px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}*/

/** =====================
 * Responsive
 ========================*/
@media only screen and (max-width: 766px) {
	.comments-container {
		width: 360px;
	}

	.comments-list .comment-box {
		width: 220px;
	}

	.reply-list .comment-box {
		width: 320px;
	}
}


</style>




  <nav class="light-blue lighten-1" role="navigation" style="background-color: #D4AF37!important">
    <div class="nav-wrapper margin"><a id="logo-container" href="#" class="brand-logo">Logo</a>
    </div>
  </nav>


 	<div class="row">

    <div class="col s12 m12" style="padding: 0px">
    <?php while($storyr = mysqli_fetch_assoc($storyq)){?>	
      <div class="card grey " style="margin-top: 0px;">
        <div class="card-content white-text">
        	<div class="profile-stats center-align" >
        		
        			<img class="profile-picture" src="apps/<?php echo $storyr['bookcover']; ?>" width='100' height='150'>  
        		  <div>   	
			          <span class="card-title center-align" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7)"><h5><b><?php echo $storyr['title'] ?></b></h5></span>
			          <p class="center-align" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7)">
			          	<?php  

			          		$reads = "SELECT sum(views) as vc FROM `viewcounter` WHERE story_id = $storyid"; 
			          		$readsq = mysqli_query($connection,$reads) or die(mysqli_error($connection));
			          		$readsc = mysqli_fetch_assoc($readsq);

			          		if($readsc == 0 || $readsc == 1 ) {
			          			?>
			          			<span><?php echo format($readsc['vc']); ?> <b>Read</b></span> |
			          			<?php  

			          		}else {
			          			?>
			          			<span><?php echo format($readsc['vc']); ?> <b>Reads</b></span> |
			          			<?php
			          		}

			          	?>
			          	 
			          	<?php 

			          		$comments = "SELECT count(id) as cc FROM `comments` WHERE story_id = $storyid"; 
			          		$commentsq = mysqli_query($connection,$comments) or die(mysqli_error($connection));
			          		$commentsc = mysqli_fetch_assoc($commentsq);
			          		$commentscc = mysqli_num_rows($commentsq);
			          		?>
			          		
			          			<span><?php echo $commentsc['cc']; ?> <b>Comments
			          		</b></span> |
			          			



			          	

			          	 <?php 

			          	 	$votes = "SELECT count(likeid) as lc FROM `likes` WHERE storyid = $storyid"; ; 
			          		$votesq = mysqli_query($connection,$votes) or die(mysqli_error($connection));
			          		$votesc = mysqli_fetch_assoc($votesq);
			          		$votescc = mysqli_num_rows($votesq);

			           
			          			?>
			          			<span><?php echo $votesc['lc']; ?> <b>Votes</b></span> |
			          			
			          		

			          	 <?php 

			          	 	$parts = "SELECT count(id) as pc FROM `parts` WHERE story_id = $storyid AND status='published'"; ; 
			          		$partsq = mysqli_query($connection,$parts) or die(mysqli_error($connection));
			          		$partsc = mysqli_fetch_assoc($partsq);
			          		

			           
			          			?> 


			          	  
			          	
			          	<span><?php  echo $partsc['pc'] ?><b>Parts</b></span>
			          </p>
			      	</div>		        
		    </div>
		
        </div>
      </div>
    
<!-- sypnosis -->

    </div>
  </div>
  <div class="container " style="margin-bottom: 300px;">
  	
  	<div class="row">

  		<div class="col s12 m9 ">
  		<h5 style=" color: #D4AF37; padding: 10px 0px 5px 0px; font-size: 15px; border-radius: 3px; height: 35px; "><b>Sypnosis</b></h5>	<p>
	  		<span style="color: #D4AF37; font-size:12px;"><?php echo $storyr['status'] ?> /
	  		</span><span style="color: #D4AF37; font-size:12px; "><?php echo $storyr['genre'] ?> / </span> 
	  		<span style="color: #D4AF37; font-size:12px;"> Joy Natividad</span>
  		</p>	
  		<p  style="text-align: justify; text-justify: inter-word; padding: 5px; color: #ccc; "><?php echo $storyr['description'] ?></p>
  		
  		 <div class="addthis_inline_share_toolbox_alcu" style="margin: 40px  0 40px  0; "></div>
  		 <div class="col s12 m12">
	      <ul class="tabs">
	        <li class="tab  s3"><a class="active" href="#test1" style="font-size:16px"><b>Table of Contents</b></a></li>
	        <li class="tab  s3"><a  href="#test2" style="font-size:16px" ><b>Comments(<?php echo $commentsc['cc']; ?>)</b></a></li>
	      </ul>
	    </div>
	    <div id="test1" class="col s12">

	    	    <ul class="collection">	
		    	<?php  

		    		$parts = "SELECT * FROM `parts` WHERE story_id = $storyid";
		    		$partsq = mysqli_query($connection,$parts) or die(mysqli_error($connection));
		    		while ($partr = mysqli_fetch_assoc($partsq)){
		    			$title = $partr['title'] ;
		    			$part_id = $partr['id'];
		    			$public = $partr['public'];
		    			?>

		    			<?php 

		    				$viewstitle = "SELECT *  FROM `viewcounter` WHERE part_id = $part_id";
		    				$viewstitleq = mysqli_query($connection,$viewstitle) or die(mysqli_error($connection));
		    			 	$viewstitlec = mysqli_fetch_assoc($viewstitleq);
		    			 ?>


		    			<a href='<?php echo 'public.php?storyid='.$storyid.'&part_id='.$part_id.'' ?>' class="collection-item" style="color: #0990aa;"><?php echo $title; ?>
		    				
		    				<?php 

		    					if($public == 'free'){

		    						echo '<span><img src="http://gifimage.net/wp-content/uploads/2017/11/for-free-gif-5.gif" width="30"></span>';	

		    					}


		    				 ?>

		    				

		    				<i  class="fa fa-eye pull-right" ></i><span class="pull-right"><?php echo $viewstitlec['views']; ?> </span></a>
		    		
		    		<?php } ?>
	    	
	    </ul>

	    </div>
	   
	    <div id="test2" class="col s12">
		
				<!-- Contenedor Principal -->
	<?php  

		$comments  = "SELECT * FROM `comments` WHERE story_id = $storyid ORDER by id DESC";
		$commentsq = mysqli_query($connection,$comments) or die(mysqli_error($connection));

		while($commentsr = mysqli_fetch_assoc($commentsq)){

		$creator_id = $commentsr['creator_id']; 	

	?>
	<div class="comments-container" style="margin-top:-20px;">

		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					
				<?php 

					$users = "SELECT * FROM `users` WHERE id = $creator_id";
					$usersq = mysqli_query($connection,$users) or die(mysqli_error($connection));
					$usersc = mysqli_fetch_assoc($usersq);
 
				 ?>

					<div class="comment-avatar"><img src="<?php if(isset($usersc['profilepic']) & !empty($usersc['profilepic'])){ echo $usersc['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><a href="#"><?php echo $usersc['username'] ?></a></h6>
							<span style="color: #fff; background:#0990aa; font-size: 8px;padding: 2px 8px;font-weight: 700;margin-left: 10px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px; text-transform: uppercase; margin-left:-5px; margin-top:5px;"><?php echo $usersc['role']; ?></span> &nbsp;<span style="margin-left:10px; margin-top:5px;"> <?php echo time_ago($commentsr['date_created']); ?></span>
							<br><p style="font-size: 12px; color:#0990aa; margin-left: -200px;"><?php echo $usersc['location']; ?></p>
							
						</div>
						<div class="comment-content">
							<?php  echo $commentsr['content']; ?>
						</div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->
				
				
			</li>

			
		</ul>
	</div>	
	<?php } ?>

	    </div>

  		</div>

 <?php } ?>
		<div class="col s12 m3">
			<div class="row">
				<div col s12 m12>
					<h5 style="background:  #D4AF37; color: #fff; padding: 10px 10px 10px 10px; font-size: 15px; border-radius: 3px;"><b>Most View</b></h5>
				</div>
			</div>
		</div>


  	</div>
  </div>

  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a630af2afcc1a70"></script>

<?php include 'inc/footer.php'; ?>





 