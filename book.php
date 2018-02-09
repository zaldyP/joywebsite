<?php
 //error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
  require_once('config/connect.php');
  include 'function.php';

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }


?>

<style type="text/css">

body {
	background: #e1e1e1;
}

/*HERo*/
header {
  box-shadow: 1px 1px 4px rgba(0,0,0,0.5);
  margin:   0px auto 50px;
  height:   400px;
  position: relative;
  width:    100%;
  background: url(https://unsplash.it/<?php echo rand(1, 3000) ?>/456);
  padding: 0px;
  background-size: cover;
  background-position: center center;
  
}

figure.profile-picture {
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

div.profile-stats {
  bottom: 0;
  /*border-top: 1px solid rgba(0,0,0,0.5);*/
  left: 0;
  padding: 50px 15px 15px 15px;
  position: absolute;
  right: 0;
  z-index: 2;
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

 ul.adjust {
  list-style: none;
  margin: 0;
  padding: 0;
  position: relative;
}
 ul.adjust li {
  color: #efefef;
  display: block;
  float: left;
  font-size: 24px;
  font-weight: bold;
  margin-right: 50px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.7)
}

 ul.adjust li span {
  /*display: block;*/
  font-size: 16px;
  font-weight: normal;

}

.h3 {
	color: #efefef;

  font-weight: bold;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
  letter-spacing: 2px;
  font-family: Niconne;

}

/* Base flexbox gallery *//*
.container {
  width: 80vw;
  margin: auto;
}

.content {
  margin: 2em 1%;
}

.content h1 {
  font-size: 5em;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0;
  line-height: 1;
  margin: 0 0 0.25em 0;
}

.content p {
  font-weight: 400;
  font-size: 1.9em;
  line-height: 1.6;
}
*/
.gallery {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
}

.gallery--item {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
 height: 200px;
  
  width: 130px!important;
  
  


}

.gallery--item:before {
  content: "";
  padding-top: 100%;
}

.gallery--image {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: 100%;
  height: 100%;
 /* background-size: cover;
  background-position: center center;*/

-webkit-filter: blur(.50px); /* Safari 6.0 - 9.0 */
    filter: blur(.50px);



}


@media(max-width: 750px){

	 figure.profile-picture {

  	top:10%;
  	text-align: center;
  	left: 52%; transform: translate(-50%,0); position: absolute; z-index: 1;

  	

  }


  figure{
		margin:0px!important;
	}


	

	.stats{
		margin-top: 200px;


	}

	.stats h3 {

		font-size: 20px;
		text-align: center;


		
	}


	.adjust {
		text-align: center;
	}

  ul.adjust li {
  color: #efefef;
  display:inline-block;
  float: none!important;
  font-size: 12px;
  font-weight: bold;
  margin-right: 10px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
  /*width: 100%;*/
 
  
	}

	 ul.adjust li span {
	  /*display: block;*/
	  font-size: 12px;
	  font-weight: normal;

	}


	.gallery {
 	position: absolute;
 	
    left:20px;
 	

	}

	

}





@media (min-width: 330px) {
  .gallery--item {
    width: 47%;

  }


}

@media (min-width: 630px) {
  .gallery--item {
    width: 31%;
  }
}

@media (min-width: 960px) {
  .gallery--item {
    width: 23%;
  }
}

/* Just some basic styling */


/*.container {
  width: 80vw;
  margin: auto;
}

.content {
  margin: 2em 1%;
}

.content h1 {
  font-size: 5em;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0;
  line-height: 1;
  margin: 0 0 0.25em 0;
}

.content p {
  font-weight: 400;
  font-size: 1.9em;
  line-height: 1.6;
}*/

/*.content .highlight {
  background-color: #bcfffb;
  padding: 0 0.2em;
}
*/
@media (min-width: 960px) {
	  .content {
	    width: 40vw;
	  }
	  .content h1 {
	    font-size: 8em;
	  }
}

.gallery {
  margin: 2em auto;

}

.gallery--item {
  margin: 1%;
  background-color: #e1e1e1;
 
  opacity: .85;
  -webkit-transition: 0.2s all ease-in;
  transition: 0.2s all ease-in;
  /*box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2), 1px 1px 4px rgba(0,0,0,0.3);*/


}

.gallery--item:hover {
  background-color: #eee;
  opacity: 1;
  
}
     
}




</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >

<?php

	$story = $_GET['story'];

	$storysql = "SELECT * FROM `stories` WHERE id = $story";
	$storysqlres = mysqli_query($connection,$storysql) or die(mysqli_error($connection));
	$storysqlq = mysqli_fetch_assoc($storysqlres);

?> 


<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>

<div class="row">
	<div class=" col s12 m12 " style="padding: 0px; ">
		<header ">
  		

		  
		  <div class="profile-stats">
		  <div class="container" style="margin-top: 20px;"> 
			  <div class="row">
			  	<div class="col s12 m4">
			  		<figure class="profile-picture" 
					    style="background-image: url('apps/<?php echo $storysqlq['bookcover'] ?>')">
					 </figure>	 
			  	</div>
			  	<div class="col s12 m8 stats">
			  		<h3 class="h3"><?php echo $storysqlq['title'] ?></h3>
					<ul class="adjust">
					<?php  
					 $sviews = "SELECT sum(views) as v FROM `viewcounter` WHERE story_id = $story";
					 $sviewsr = mysqli_query($connection,$sviews) or die(mysqli_error($connection));
					 while($sviewsq = mysqli_fetch_assoc($sviewsr)){
					 	$v = $sviewsq['v'];
					 }
					 
					 ?>	
					 
				      <li><?php echo format($v); ?><span>
				      
				      <?php 
				      	$sv = "SELECT `id` FROM `viewcounter`";
					 	$svr = mysqli_query($connection,$sv) or die(mysqli_error($connection));
					 	$countv = mysqli_num_rows($svr);
					 	if($countv > 1){
					 		echo 'Reads';
					 	}else {
					 		echo 'Read';
					 	}

					  ?>
				      </span></li>

				     <?php  
					 $cviews = "SELECT count(id) as c FROM `comments` WHERE story_id = $story";
					 $cviewsr = mysqli_query($connection,$cviews) or die(mysqli_error($connection));
					 while($cviewsq = mysqli_fetch_assoc($cviewsr)){
					 	$c = $cviewsq['c'];
					 }
				      ?>
				      <li><?php echo format($c); ?>
				       <span>

				       	 <?php 
				      	$sc = "SELECT `id` FROM `comments` WHERE story_id = $story";
					 	$scr = mysqli_query($connection,$sc) or die(mysqli_error($connection));
					 	$countc = mysqli_num_rows($scr);
					 	if($countc > 1){
					 		echo 'Comments';
					 	}else {
					 		echo 'Comment';
					 	}

					  ?>
				       </span></li>
				      <?php  
						 $clikes = "SELECT count(likeid) as l FROM `likes` WHERE storyid = $story";
						 $clikesr = mysqli_query($connection,$clikes) or die(mysqli_error($connection));
						 while($clikesq = mysqli_fetch_assoc($clikesr)){
						 	$l = $clikesq['l'];
						 }
				      ?>

				      <li><?php echo format($l); ?>    
				      <span>
				      <?php 
				      	$lc = "SELECT `likeid` FROM `likes` WHERE storyid = $story";
					 	$lcr = mysqli_query($connection,$lc) or die(mysqli_error($connection));
					 	$countl = mysqli_num_rows($lcr);
					 	if($countl > 0){
					 		echo 'Voted';
					 	}else {
					 		echo 'Vote';
					 	}

					  ?>     

				      </span></li>
				      	<?php  
						 $cparts = "SELECT count(id) as p FROM `parts` WHERE story_id = $story";
						 $cpartsr = mysqli_query($connection,$cparts) or die(mysqli_error($connection));
						 while($cpartsq = mysqli_fetch_assoc($cpartsr)){
						 	$p = $cpartsq['p'];
						 }
				      ?>

				      <li><?php echo format($p); ?>   
				      <span>
				      	<?php 
				      	$pc = "SELECT `id` FROM `parts` WHERE story_id = $story";
					 	$pcr = mysqli_query($connection,$pc) or die(mysqli_error($connection));
					 	$countp = mysqli_num_rows($pcr);
					 	if($countp > 1){
					 		echo 'Parts';
					 	}else {
					 		echo 'Part';
					 	}

					  ?>	      
				      </span><span><i class="fa  fa-angle-down" data-vertical-offset="-55" data-horizontal-offset="-10" data-jq-dropdown="#jq-dropdown-1"></i></span></li>

				    </ul>
				    <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
					    <ul class="jq-dropdown-menu">
				        <h5 style="font-size: 15px; margin-left: 12px; font-weight: bold; color:#0990aa;">Table of Contents</h5>
				        <?php  
				        $partlist = "SELECT * FROM `parts` WHERE story_id = $story";
				        $partlistr = mysqli_query($connection,$partlist) or die(mysqli_error($connection));
				        while($partlistq = mysqli_fetch_assoc($partlistr)){
				        	$array =  array($partlistq['view_id']);
				        ?>

					     <li><a href=('<?php echo 'single.php?story='.$story.'&part='.$partlistq['id'].''?>'><?php echo trim_text($partlistq['title'],25) ?></a></li>
					     <?php } ?>
					    </ul>
					</div>  			
			  	</div>
			  </div>
		  	</div>	    
		  </div>
		</header>

	</div>
</div>


<!-- body -->
<?php 

	$sqlparts = "SELECT * FROM `parts` WHERE story_id = $story";
	$sqlpartr = mysqli_query($connection,$sqlparts);

 ?>

	
			  	
	
	</div> 
<div class="container">
	<div class="row"> 
		<div class="col s12 m10">
		<div class="gallery">
			<?php 
			while ($sqlpartsq = mysqli_fetch_assoc($sqlpartr)){
				$array =  array($sqlpartsq['view_id']);
				$array2 =  array($sqlpartsq['id']);


		    ?>
		    <div class="gallery--item"><a href="<?php echo 'single.php?story='.$story.'&part='.$sqlpartsq['id'].''?>"><img style ="width:100%" class="gallery--image" src="<?php echo $sqlpartsq['bg'] ?>"/></a>
		    	
		 
			<span style="z-index: 1; overflow: hidden; text-align:center;" ><a href="<?php echo 'single.php?story='.$story.'&part='.$sqlpartsq['id'].''?>" style="color:#fff; width:100%; text-align: center; position: absolute; left:0;  text-shadow: 1px 1px 2px rgba(0,0,0,0.7); "><?php echo $sqlpartsq['title']?></a> 
			</span>
			<p style="font-size: 12px; z-index:2; width:100%; text-align: center; position: absolute; left:0; bottom:0;  color:#fff; text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
				<?php 
					$countp = "SELECT * FROM  `viewcounter` WHERE id IN  (".implode(',',$array).")";
					$countpr = mysqli_query($connection,$countp) or die(mysqli_error($connection));
					while($countpq = mysqli_fetch_assoc($countpr)){
						$pv = $countpq['views'];
						?>
						<span><i class="fa fa-eye"> <?php echo format($pv); ?></i></span>		
					<?php } ?>
						
				<?php 
					$countpc = "SELECT count(id) as pc FROM `comments` WHERE part_id IN  (".implode(',',$array2).")";
					$countpcr = mysqli_query($connection,$countpc) or die(mysqli_error($connection));
					while($countpcq = mysqli_fetch_assoc($countpcr)){
						$pc = $countpcq['pc']
						?>
						<span><i class="fa fa-comment"> <?php echo format($pc); ?></i></span>
				 <?php } ?>
				 
				<?php 

				$countpl = "SELECT count(likeid) as pl FROM `likes` WHERE partid IN  (".implode(',',$array2).")";
					$countplr = mysqli_query($connection,$countpl) or die(mysqli_error($connection));
					while($countplq = mysqli_fetch_assoc($countplr)){
						$pl = $countplq['pl']
					?>

				 
				<span><i class="fa fa-heart"> <?php echo $pl ?></i></span>
				<?php } ?>
			</p>

		
		    </div>
		   <?php } ?>
		 </div>
	</div>
	<div class="col s12 m2">
		
	</div>
	</div>

	
</div>




<?php include 'inc/footer.php' ?>

