<?php
 //error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
  require_once('config/connect.php');
  include 'function.php';

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }





?>
 
<?php  
$query="SELECT id from parts WHERE status = 'published' ORDER BY id DESC";
$res    = mysqli_query($connection,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 15;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";

$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     

            }
        }   

        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   

           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";

        $pagination.= "</div>";       
    }

if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}
 
?>



<?php  

?>
 <div class="col-md-3">
<?php  

$email = $_SESSION['email'];

$sqlu = "SELECT * FROM `users` WHERE email = '$email'";
$resu = mysqli_query($connection,$sqlu) or die(mysqli_error($connection));
$countu = mysqli_num_rows($resu);
$ru = mysqli_fetch_assoc($resu);



$sqlp = "SELECT * FROM `parts` WHERE status = 'published' ORDER BY id DESC limit ".mysqli_real_escape_string($connection,$start).",$recordsPerPage";
		$sqlpr = mysqli_query($connection,$sqlp ) or die(mysqli_error($connection));
		$count  =   mysqli_num_rows($res);
		$HTML ='';

if($count > 0){

			while($pl = mysqli_fetch_assoc($sqlpr)){	
	 

				$array =  array($pl['story_id']);
				$array2 = array($pl['user_id']);
				$array3 = array($pl['view_id']);
				$array4 = array($pl['id']);

				$arraystories = "SELECT  * FROM stories WHERE id  IN  (".implode(',',$array).")";	
				$arraystoriesres = mysqli_query($connection,$arraystories);
				$sl = mysqli_fetch_assoc($arraystoriesres);

				$arrayuser = "SELECT  * FROM users WHERE id  IN  (".implode(',',$array2).")";	
				$arrayuserres = mysqli_query($connection,$arrayuser);
				$ul = mysqli_fetch_assoc($arrayuserres);				

		   ?> 
		   		<?php
		   	
	

		   	?>		
		      <div class="card2-view">
		          <div class='bg'>
		            	
		            <img src="<?php echo $pl['bg'];?>" height="175" width="100%">
		          </div>
		        <div class="container2">
		          <a href='#'><div class="tag_name genrecolor"><?php echo $sl['genre'];?></div></a>
		          <div class="company">
		            <div class="c_logo">
		              <a href="#"><img src="apps/<?php echo $sl['bookcover']; ?>" width="40" height="65" alt="Focus Lab"></a>
		            </div>
		            <div class="c_info">
		              <a href="<?php echo 'single.php?story='.$sl['id'].'&part='.$pl['id'].'' ?> " class="c_name"><?php echo $pl['title']; ?></a><br>
		              <span class="c_industry"><a href="<?php echo 'book.php?story='.$sl['id'].'' ?>"><?php echo $sl['title'] ?></a></span><br>
		              <?php 	
						$viewcounter = "SELECT * FROM `viewcounter` WHERE id IN  (".implode(',',$array3).")";
						$viewcounterres = mysqli_query($connection,$viewcounter) or die(mysqli_error($connection));
						$viewcount = mysqli_fetch_assoc($viewcounterres);

					  ?>
					  <span id=""><i class="fa fa-eye"> <?php echo format($viewcount['views'])?></i></span>
		              
					  <?php

						$likequery = "SELECT * FROM `likes` WHERE partid IN (".implode(',',$array4).") AND userid = '".$ru['id']."'";

						$likequeryres = mysqli_query($connection,$likequery) or die(mysqli_error($connection));
						$likequerycount = mysqli_num_rows($likequeryres);


			    		if($likequerycount > 0 ){?>

							<span id="<?php echo $pl['id'];?>" class="unlike "><i class="fa fa-heart" style="color:#f7296a"></i></span>
							<?php 

						}else {?>

							<span id="<?php echo $pl['id'];?>" class="like change"><i class="fa fa-heart"></i></span>	
							
							<?php 
						}
					

						?>
			    		
			    			<span id="show_like<?php echo $pl['id'];?>">  
								<?php 
									$query3 = "SELECT * FROM `likes` WHERE partid IN (".implode(',',$array4).")";
									$query3res =  mysqli_query($connection,$query3) or die(mysqli_error($connection));
									$likecount =  mysqli_num_rows($query3res);
									echo format($likecount);
								 ?>

							</span>

							
						
						<?php 

						 $commentsqlc = "SELECT * FROM `comments` WHERE part_id IN (".implode(',',$array4).")";
						 $commentsqlcres = mysqli_query($connection,$commentsqlc) or die(mysqli_error($connection));
						 $commentcount =  mysqli_num_rows($commentsqlcres);


						 ?>							
		               <span id=""><i class="fa fa-comment"> <?php echo $commentcount;?></i></span>
		            	
<!-- 
		               <?php 


						$arrayparts = "SELECT title as t ,count(id) as partcount FROM parts WHERE story_id  IN  (".	implode(',',$array).")  AND status='published'";

						$arraypartres = mysqli_query($connection, $arrayparts) or die(mysqli_error($connection));

						while($pcount = mysqli_fetch_assoc($arraypartres)){
							
							$partcount = $pcount['partcount'];
					
						 }


						?>		
						<span id="" data-jq-dropdown="#jq-dropdown-1">
							<i class="fa fa-bars"> <?php echo $partcount; ?></i>
						</span>	
 -->
						
		            </div>
		             


		      
		            <div class="c_content">

		              <br>
		              <p class="review"><?php echo trim_text($pl['description'],150) ?></p>
		            </div>
		           
		          </div> <!-- end .company -->


		          <div class="user">
		            <div class="user_avatar">
		              <!-- <img src="<?php echo $ul['profilepic'] ?>"> -->
		            </div>
		            <div class="user_info">
		              <a href="#" class="user_name genrecolor"><?php echo $ul['firstname'] . ' ' . $ul['lastname'] ?></a> • <?php echo time_ago($pl['created'])  ?><br>
		            </div>
		          </div> <!-- end .user -->
		        </div> <!-- end .container2 -->
		    
		      </div> <!-- end card2 -->
		     
		   
		   	
		      <?php } ?>
		 	 


		
			
			<?php 

			 $HTML.='<div style= "clear:both">';
        
        	 $HTML.='</div><br/>';
    
        	 ?>
    

    </div>
        	 <?php  
} else {
	
	$HTML='No Data Found';	
}

echo $HTML;	
echo $pagination;

 
?>
 	


<script type="text/javascript">
	
var $container = $(".col-md-3");
    $container.imagesLoaded(function() {
      $container.masonry({
        itemSelector: '.card2-view',
        columnWidth: 10,
        gutter:10
      });

    });

</script>


  