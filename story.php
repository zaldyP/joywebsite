<?php 

require_once('config/connect.php');
include 'function.php';


$story = "SELECT * FROM `stories` WHERE published= '1' ORDER BY id DESC ";
$storyq = mysqli_query($connection, $story) or die(mysqli_error($connection));

?>



<?php include 'inc/header.php'; ?>

<style type="text/css">
  body {
  font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;

  background: linear-gradient(rgba(30, 27, 38, 0.9), rgba(30, 27, 38, 0.9)), url('https://png.pngtree.com/thumb_back/fw800/back_pic/05/07/92/07597952a600884.jpg');
  background-size: cover;
   background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat; 


</style>

  <nav class="light-blue lighten-1" role="navigation" style="background-color: #D4AF37!important">
    <div class="nav-wrapper margin"><a id="logo-container" href="#" class="brand-logo">Logo</a>
    </div>
  </nav>



<div class="container">
	<?php while ($row = mysqli_fetch_assoc($storyq)){

    $storyarray = $row['id'];
    
    ?>
	<div class="row">
		<div class="col s12 m8">
    <h2 class="header"><a style="color: #D4AF37!important" href='<?php echo 'write.php?storyid='.$storyarray.'' ?>'><?php echo $row['title']; ?></a></h2>
    <div class="card horizontal" style="padding:20px 0px 0px 10px; background-color: transparent; box-shadow: none;">
      <div class="card-image">
       <a href='<?php echo 'write.php?storyid='.$storyarray.'' ?>'> <img src="apps/<?php echo $row['bookcover']; ?>" width='100' height='150'></a>
      </div>
      <div class="card-stacked">
        <div class="card-content" style="padding-top: 0px; color: #fff; ">
        	<?php 


          $totalviews = "SELECT sum(views) as vc FROM `viewcounter` WHERE story_id = $storyarray"; 
          $totalviewsq = mysqli_query($connection, $totalviews) or die(mysqli_error($connection));
          $totalviewc = mysqli_fetch_assoc($totalviewsq);

          ?>

          <span><i class="fa fa-eye"> <?php echo format($totalviewc['vc']); ?></i></span> |
          
          <?php 

          $totalikes = "SELECT count(likeid) as lc FROM `likes` WHERE storyid = $storyarray"; 
          $totalikesq = mysqli_query($connection, $totalikes) or die(mysqli_error($connection));
          $totalikec = mysqli_fetch_assoc($totalikesq);  

           ?>

          <span><i class="fa fa-star"> <?php echo format($totalikec['lc']);?></i></span> |
          	
          <?php 

          $totacomments = "SELECT count(id) as cc FROM `comments` WHERE story_id = $storyarray"; 
          $totacommentsq = mysqli_query($connection, $totacomments) or die(mysqli_error($connection));
          $totacommentsc = mysqli_fetch_assoc($totacommentsq);  

           ?>
            <span><i class="fa fa-comment"> <?php echo format($totacommentsc['cc']); ?></i></span> |
          
          <?php 


          $totalparts = "SELECT  count(id) as pc FROM `parts` WHERE story_id = $storyarray AND status='published' "; 
          $totalpartsq = mysqli_query($connection, $totalparts) or die(mysqli_error($connection));
          $totalpartsc = mysqli_fetch_assoc($totalpartsq);

          ?>          	

            <span><i class="fa fa-bars"> <?php echo $totalpartsc['pc'] ?></i></span> 
            
             
          <p style="text-align: justify; text-justify: inter-word;"><?php echo trim_text($row['description'],200) ?>

            <a href='<?php echo 'write.php?storyid='.$storyarray.'' ?>' style='font-size: 10px; background: #e74c3c; color: #fff; padding: 3px; border-radius: 3px;'><b>Read More</b></a>
          </p>
          
           <div class="row">
          	<br>
          		<div class="col s12 m12 right-align">
          			<p class="left-align"><span style="background: #D4AF37; color:#fff; padding: 5px;"><?php echo $row['status']; ?></span> <span style=" background: #D4AF37; color:#fff;  padding:5px; "><?php echo $row['genre'] ; ?></span></p>
          			
          		</div>
          </div>         	
	     </div>
       	
      </div>
    </div>
  <hr>
	</div>
  </div>
  
<?php } ?>
</div>



<?php include 'inc/footer.php'; ?>