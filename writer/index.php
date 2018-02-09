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


$storiesql = "SELECT * FROM stories";
$storieres = mysqli_query($connection, $storiesql) or die(mysqli_error($connection));


$pubsql = "SELECT  * FROM stories WHERE published = 1 ";
$pubres = mysqli_query($connection, $pubsql) or die(mysqli_error($connection));



?>

<style type="text/css">
	body {
		background-color: #ebebeb;
	}	
</style>

<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>


	



<div class="container" style="margin-top:50px;">
<div class="row">
	<div class=" col s12 m12" style="margin-bottom: -20px;">
	<div>
	<header>
		<h2><strong style="margin-left: 15px;">My Works</strong>
			<a href="new.php" class="btn btn-blue right" style="margin-right:15px;"> + New Story</a>
		</h2>
		
	</header>
	</div>
		 
	</div>
	
				
	
</div>

	<div class="row">
		<div class="col s12 m12">
			<div class="card">
				<div class="row">
				    <div class="col s12">
				      <ul class="tabs">
				        <li class="tab s3"><a class="active" href="#published">Published</a></li>
				        <li class="tab s3"><a  href="#allstories">All Stories</a></li>
				      </ul>
				    </div>
				    <div id="published" class="col s12">
				    	<section class="row marginrow">
							
						<?php 

						while($pubr = mysqli_fetch_assoc($pubres)){

						 $array = array($pubr['id']);


						$arraypublish = "SELECT  count(id) as pubcount FROM parts WHERE story_id  IN  (".implode(',',$array).")  AND status='published'";

						$pubarres = mysqli_query($connection, $arraypublish) or die(mysqli_error($connection));


						while($pbcrows =  mysqli_fetch_assoc($pubarres)){

								$pubcount = $pbcrows['pubcount'];
							

												 
								 



						 ?>						 
							    		


							<div class="col s12 m12">


								<div class="row">

									<div class="vcenter text-center" style="margin: 0px 10px 0 20px">
										<span class="fa fa-bars " style="font-size: 24px"></span>
									</div>
									

									<div class="story-wrapper vcenter">
										<div class="pull-left story-image">

											<img src="<?php echo $pubr['bookcover']; ?>"  width="78" height="123">	
										</div>
										<div class="pull-left story-info">
											<h3 class="story-title"><a href="<?php echo 'edit.php?story='.$pubr['id'].''; ?>"><strong><?php echo $pubr['title'] ?></strong></a></h3>
											<div class="counts">
											<?php

												if($pubcount == 1   ){

													echo '<span class="publish-count"><strong>'.$pubcount. ' Published Part </strong></span>';
													 


												}else if($pubcount > 1  ){

												echo '<span class="publish-count"><strong>'.$pubcount. ' Published Parts </strong></span>';

												}else {

													echo '';
												}
													
												  ?>
												 

											<?php  

						

									$arraydr = "SELECT  count(id) as pubcountdraft FROM parts WHERE story_id  IN  (".implode(',',$array).")  AND status='draft'";

									$drres = mysqli_query($connection, $arraydr) or die(mysqli_error($connection));


									while($dbcrows =  mysqli_fetch_assoc($drres)){

											$draftcount = $dbcrows['pubcountdraft'];					  
												

												?>



												<span class="draft-count">
											
												<?php

												if($draftcount == 1   ){

													echo '<span class="draft-count"><strong>'.$draftcount. ' Draft </strong></span>';
													 


												}else if($draftcount > 1  ){

												echo '<span class="draft-count"><strong>'.$draftcount. '  Drafts </strong></span>';

												}else {

													echo '';
												}

												?>
												</span>



													<?php } ?>


											</div>
											<div class="updated-date">Updated <?php echo $pubr['created'] ?></div>
											<div class="category"><?php echo $pubr['genre'] ?></div>
										</div>
										
									</div>
								</div>
							</div>
							<hr style="margin:0 10px 16px 10px; color: #ddd;background-color: #ddd;
height: 1px; border-top:none; border-bottom: none">
							<?php } ?> 
						 	
							<?php } 


							?>
							
								
							
						
					
					

						
										
						</section>
						

					</div>	
				    <div id="allstories" class="col s12">
				    	<section class="row marginrow">
						<?php while($srows = mysqli_fetch_assoc($storieres)){
						
							$array = array($srows['id']);	

							$arraystories = "SELECT  count(id) as pcountp FROM parts WHERE story_id  IN  (".implode(',',$array).")  AND status='published'";


							$arrayres = mysqli_query($connection, $arraystories) or die(mysqli_error($connection));


							while($trows =  mysqli_fetch_assoc($arrayres)){

								$pcountp = $trows['pcountp'];
							

								?>


							 




							 



							<div class="col s12 m12">
								<div class="row">

									<div class="vcenter text-center" style="margin: 0px 10px 0 20px">
										<span class="fa fa-bars " style="font-size: 24px"></span>
									</div>
									

									<div class="story-wrapper vcenter">
										<div class="pull-left story-image">

											<img src="<?php echo $srows['bookcover']; ?>"  width="78" height="123">	
										</div>
										<div class="pull-left story-info">
											<h3 class="story-title"><a href="<?php echo 'edit.php?story='.$srows['id'].''; ?>"><strong><?php echo $srows['title'] ?></strong></a></h3>
											<div class="counts">
												<?php

												if($pcountp == 1   ){

													echo '<span class="publish-count"><strong>'.$pcountp. ' Published Part </strong></span>';
													 


												}else if($pcountp > 1  ){

												echo '<span class="publish-count"><strong>'.$pcountp. ' Published Parts </strong></span>';

												}else {

													echo '';
												}
													
												  ?>
												  <?php

							$arraydraft = "SELECT  count(id) as countd FROM parts WHERE story_id  IN  (".implode(',',$array).")  AND status='draft'";


							$arraydraft = mysqli_query($connection, $arraydraft) or die(mysqli_error($connection));

							while($drows = mysqli_fetch_assoc($arraydraft)){

								$dcount = $drows['countd'];

																

												
										?>			  
												<span class="draft-count">
											
												<?php

												if($dcount == 1   ){

													echo '<span class="draft-count"><strong>'.$dcount. ' Draft </strong></span>';
													 


												}else if($dcount > 1  ){

												echo '<span class="draft-count"><strong>'.$dcount. '  Drafts </strong></span>';

												}else {

													echo '';
												}

												?>
												</span>


								<?php } ?>				
											</div>
											<div class="updated-date">Updated <?php echo $srows['created'] ?></div>
											<div class="category"><?php echo $srows['genre'] ?></div>
										</div>
										
									</div>
								</div>
							</div>
							<hr style="margin:0 10px 16px 10px; color: #ddd;background-color: #ddd;
height: 1px; border-top:none; border-bottom: none">
						 

							 <?php  }
								 
							 }


														 
							?>

						</section>

				    </div>
				  </div>
			</div>
		</div>
	</div>

</div>





<?php include 'inc/footer.php' ?>








