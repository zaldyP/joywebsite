<?php
session_start();
  require_once('config/connect.php');
  include 'function.php';

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }


 $email = $_SESSION['email'];

//user
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);
$r = mysqli_fetch_assoc($res);

$creator_id = $r['id'];



 $partid = $_GET['part'];
 $storyid = $_GET['story'];


 //stories
 $getviewstories = "SELECT * FROM `stories` WHERE id =$storyid";
 $getviewstoriesres = mysqli_query($connection, $getviewstories) or die(mysqli_error($connection));
 $storyviewquery = mysqli_fetch_assoc($getviewstoriesres); 


//part
 $getpartviewid = "SELECT * FROM `parts` WHERE id = $partid";
 $getpartviewidres = mysqli_query($connection,$getpartviewid) or die(mysqli_error($connection));
 $partviewidquery = mysqli_fetch_assoc($getpartviewidres);

 $viewid = $partviewidquery['view_id'];  

//view

  $views = "UPDATE viewcounter SET  `views` = `views` + 1  WHERE id = $viewid ";
  $viewsres = mysqli_query($connection, $views) or die(mysqli_error($connection));


  $commentcount  ="SELECT count(id) as c FROM `comments` WHERE story_id = $storyid AND part_id = $partid";
         $countres = mysqli_query($connection, $commentcount) or die(mysqli_error($connection));

         while ($countrows = mysqli_fetch_assoc($countres)){

           $comcount = $countrows['c'];  
         
    }


  $viewcount = "SELECT * FROM `viewcounter` WHERE story_id =  $storyid AND part_id = $partid";
  $viewcountres = mysqli_query($connection, $viewcount) or die(mysqli_error($connection));  
  $viewcountq = mysqli_fetch_assoc($viewcountres);

  $viewcount = $viewcountq['views']; 

//part counter 
  $partcounter = "SELECT *, count(id) as p FROM `parts` WHERE status ='published' AND  story_id = $storyid ";
  $partcountres = mysqli_query($connection, $partcounter) or die(mysqli_error($connection));
  while ($partrows = mysqli_fetch_assoc($partcountres)){
           $partcount = $partrows['p'];
}


$partcounterss = "SELECT * FROM `parts` WHERE status ='published' AND  story_id = $storyid ";
  $partcountress = mysqli_query($connection, $partcounterss) or die(mysqli_error($connection));
      
?>



<?php include 'inc/header.php';  ?>
<?php include 'inc/nav.php';  ?>


<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic);
body {
  background: linear-gradient(rgba(30, 27, 38, 0.9), rgba(30, 27, 38, 0.9)), url("<?php echo $partviewidquery['bg'] ?>");
  background-size: cover;
   background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
   
}


.container {
  width: 100%;
  height: 100%;
}

.cellphone-container {
  width: 100%;
  height: 667px;
  background-color: #1e1b26;
  margin: 90px auto 0 auto;
  box-shadow: 5px 5px 115px -14px black;
}

.movie-img {
  width: 100%;
  height: 380px;
  background: url("<?php echo $partviewidquery['bg']; ?>");
  /*background-size: contain;*/
  background-size: cover;
  z-index: 111 !important;
  -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, black), color-stop(0.35, black), color-stop(0.5, black), color-stop(0.65, black), color-stop(0.85, rgba(0, 0, 0, 0.6)), color-stop(1, transparent));
  position: relative;
}

.movie {
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+39,1e1b26+53&0+38,1+55 */
  background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* FF3.6-15 */
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#1e1b26',GradientType=0 );
  /* IE6-9 */
  /*position: absolute;*/
  background-size: contain;
  background-size: cover;
  z-index: 1 !important;
  width: 100%;
  height: 667px;
  display: block;
}

.text-movie-cont {
  padding: 0px 12px;
  text-align: justify;
}

.action-btn {
  text-align: right;
}
.action-btn i {
  color: #fe4141;
  font-size: 28px;
  text-align: right;
}

.watch-btn {
  display: block;
  border: 1px solid #fe4141;
  border-radius: 5px;
  padding: 4px;
  width: 140px;
}
.watch-btn h3 i {
  font-size: 14px;
  margin-right: 2px;
  position: relative;
  float: left;
  line-height: 130%;
}

.action-row {
  margin-top: 12px;
}

.summary-row {
  margin-top: 6px;
}

/* TYPOGRAPHY STARTS */
/* Fonts */
h1, h2, h3, h4, h5 {
  font-family: "Montserrat", sans-serif;
  color: #e7e7e7;
  margin: 0px;
}

h1 {
  font-size: 36px;
  font-weight: 400;
}

h3 {
  font-size: 14px;
  font-weight: 400;
  color: #fe4141;
}

h5 {
  font-size: 12px;
  font-weight: 400;
}

.movie-gen, .movie-likes {
  margin: 0px;
  padding: 0px;
}
.movie-gen li, .movie-likes li {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  color: #818181;
  width: auto;
  display: block;
  float: left;
  margin-right: 6px;
  font-weight: 600;
}

.movie-likes {
  float: right;
}
.movie-likes li {
  color: #fe4141;
}
.movie-likes li:last-child {
  margin-right: 0px;
}
.movie-likes li i {
  font-size: 14px;
  margin-right: 4px;
  position: relative;
  float: left;
  line-height: 1;
}

.movie-details {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #b4b4b4;
}

.movie-description {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 400;
  color: #9b9b9b;
}

.movie-actors {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #e7e7e7;
  font-style: italic;
}

/* TYPOGRAPHY ENDS */
/** GRID STARTS **/
.thegrid {
  margin: 0 auto;
}

.elements-distance, .movie-details, .movie-description, .movie-actors {
  margin: 0px;
}

.mr-grid {
  width: 100%;
}

.mr-grid:before, .mr-grid:after {
  content: "";
  display: table;
}

.mr-grid:after {
  clear: both;
}

.mr-grid {
  *zoom: 1;
}

.col1, .col2, .col3, .col3rest, .col4, .col4rest, .col5, .col5rest, .col6, .col6rest {
  margin: 0% 0.5% 0.5% 0.5%;
  padding: 1%;
  float: left;
  display: block;
}

/* Columns match, minus margin sum. E.G. margin-left+margin-right=1%, col2=50%-1% - added padding:1%*/
.col1 {
  width: 98%;
}

.col2 {
  width: 47%;
}

.col3 {
  width: 30.3333333333%;
}

.col4 {
  width: 22%;
}

.col5 {
  width: 17%;
}

.col6 {
  width: 13.6666666667%;
}

/* Columns match with their individual number. E.G. col3+col3rest=full width row */
.col3rest {
  width: 63.6666666667%;
}

.col4rest {
  width: 72%;
}

.col5rest {
  width: 77%;
}

.col6rest {
  width: 80.3333333333%;
}


.comment-section{
    list-style: none;
    max-width: 800px;
    width: 100%;
    margin: 50px auto;
    padding: 10px;
}

.comment{
    display: flex;
    border-radius: 3px;
    margin-bottom: 45px;
    flex-wrap: wrap;
}

.comment.user-comment{
    color:  #808080;
}

.comment.author-comment{
    color:  #60686d;
    justify-content: flex-end;
}

/* User and time info */

.comment .info{
    width: 17%;
}

.comment.user-comment .info{
    text-align: right;
}

.comment.author-comment .info{
    order: 3;
}


.comment .info a{ /* User name */
    display: block;
    text-decoration: none;
    color: #656c71;
    font-weight: bold;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    padding: 10px 0 3px 0;
}

.comment .info span{  /* Time */
    font-size: 11px;
    color:  #9ca7af;
}


/* The user avatar */

.comment .avatar{
    width: 8%;
}

.comment.user-comment .avatar{
    padding: 10px 18px 0 3px;
}

.comment.author-comment .avatar{
    order: 2;
    padding: 10px 3px 0 18px;
}

.comment .avatar img{
    display: block;
    border-radius: 50%;
}

.comment.user-comment .avatar img{
    float: right;
}





/* The comment text */

.comment p{
    line-height: 1.5;
    padding: 18px 22px;
    width: 70%;
    position: relative;
    word-wrap: break-word;
}

.comment.user-comment p{
    background-color:  #f3f3f3;
}

.comment.author-comment p{
    background-color:  #e2f8ff;
    order: 1;
}

.user-comment p:after{
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid #f3f3f3;
    left: -8px;
    top: 18px;
}

.author-comment p:after{
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid #e2f8ff;
    right: -8px;
    top: 18px;
}




/* Comment form */

.write-new{
    margin: 80px auto 0;
    width: 100%;
}

.write-new textarea{
    color:  #444;
    font: inherit;

    outline: 0;
    border-radius: 3px;
    border: 1px solid #cecece;
    background-color:  #fefefe;
    box-shadow: 1px 2px 1px 0 rgba(0, 0, 0, 0.06);
    overflow: auto;

    width:100%;
    min-height: 80px;
    padding: 15px 20px;
}

.write-new img{
    border-radius: 50%;
    margin-top: 15px;
}

.write-new button{
    float:right;
    background-color:  #87bae1;
    box-shadow: 1px 2px 1px 0 rgba(0, 0, 0, 0.12);
    border-radius: 2px;
    border: 0;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;

    padding: 10px 25px;
    margin-top: 18px;
}



/* Responsive styles */

@media (max-width: 800px){
    /* Make the paragraph in the comments take up the whole width,
    forcing the avatar and user info to wrap to the next line*/
    .comment p{
        width: 100%;
        margin-left: 10px;
      
    }

    /* Reverse the order of elements in the user comments,
    so that the avatar and info appear after the text. */
    .comment.user-comment .info{
        order: 3;
        text-align: left;
    }

    .comment.user-comment .avatar{
        order: 2;
    }

    .comment.user-comment p{
        order: 1;
    }


    /* Align toward the beginning of the container (to the left)
    all the elements inside the author comments. */
    .comment.author-comment{
        justify-content: flex-start;
    }


    .comment-section{
        margin-top: 10px;
    }

    .comment .info{
        width: auto;
    }

    .comment .info a{
        padding-top: 15px;
    }

    .comment.user-comment .avatar,
    .comment.author-comment .avatar{
        padding: 15px 10px 0 18px;
        width: auto;
    }

    .comment.user-comment p:after,
    .comment.author-comment p:after{
        width: 12px;
        height: 12px;
        top: initial;
        left: 28px;
        bottom: -6px;
    }

    .write-new{
        width: 100%;
        margin-left: 5px;
     
    }
}




/*.light-blue.lighten-1 {
  background-color: transparent!important;
}

.light-blue.lighten-1 {
  box-shadow: none;
}*/

</style>

<div class="container" style="margin-top: 30px;">
      <div class="row">
          <div class="col s12 m4"> 
             <div class="cellphone-container" style="margin-top:0px">
                <div class="movie">
                    <img class="movie-img" src="<?php echo $partviewidquery['bg']; ?>">
                    <div class="col s12 m12">
                        <div class="row">
                          <div class="col s12 m12">
                            <h1><a href="" style="color:#fff"><?php echo $storyviewquery['title'] ?></a></h1>
                            <ul class="movie-gen">
                              <li><?php echo $storyviewquery['genre'] ?></li>
                              <?php  
                              $cvsql = "SELECT sum(views) as vc FROM `viewcounter` WHERE story_id =$storyid";
                              $cvsqlres = mysqli_query($connection,$cvsql) or die(mysqli_error($connection));

                                $cvsqlresq = mysqli_fetch_assoc($cvsqlres);

                                $vc = $cvsqlresq['vc']



                              ?>

                              <li><i class="fa fa-eye" > <?php echo format($vc); ?></i></li>

                              <?php 

                                
                              $clsql = "SELECT count(likeid) as lc FROM likes WHERE
                                storyid = $storyid";
                                $clsqlres = mysqli_query($connection, $clsql) or die(mysqli_error($connection));

                                $clsqlresq = mysqli_fetch_assoc($clsqlres);

                                $lc = $clsqlresq['lc']


                               ?>



                              <li><i class="fa fa-star" > <?php echo format($lc); ?></i></li>
                              <?php  
                                $ccsql = "SELECT count(id) as cc FROM `comments` WHERE story_id = $storyid";
                                $ccsqlres = mysqli_query($connection, $ccsql) or die(mysqli_error($connection));

                                $ccsqlresq = mysqli_fetch_assoc($ccsqlres);

                                $cc = $ccsqlresq['cc']

                              ?>  
                              <li><i class="fa fa-comment"></i> <?php echo format($cc); ?></li>
                              <li><i class="fa fa-bars"> <?php echo format($partcount); ?></i></li>
                              <li>by <span style="color: #fe4141">Joy Natividad</span> </i></li>  
                            </ul>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col s12 m12">
                            <h5>DESCRIPTION</h5>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col s12 m12">
                            <p class="movie-description" style="text-align: justify"> <?php echo $storyviewquery['description'] ?></p>
                          </div>
                        </div>
                     </div><!--text-movie-cont--> 
                </div><!--movie-->


             </div>

          </div><!--col s12 m6-->
          <div class="col s12 m8">
          <h1 style="color: #fe4141; margin-bottom: 15px;:  "><?php echo $partviewidquery['title'] ?></h1>
          <p>
          <span style="color:#ccc "><i class="fa fa-eye "> <?php echo format($viewcount) ?></i> </span>
          <span style="color:#ccc "><i class="fa fa-comment "> <?php echo format($comcount); ?></i></span>
          

          <span style="color:#ccc " data-jq-dropdown="#jq-dropdown-1" >

          <i class="fa fa-list-ul " > <?php echo format($partcount); ?></i>
          
          </span>
          <span style="color: #ccc"><i class="fa fa-star" style="color:#f2b01e"> </i> 2</span>
          <span style="color:#ccc "><img src="icons/like.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          <span style="color:#ccc "><img src="icons/love.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          <span style="color:#ccc "><img src="icons/haha.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          <span style="color:#ccc "><img src="icons/wow.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          <span style="color:#ccc "><img src="icons/crying.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          <span style="color:#ccc "><img src="icons/angry.gif" width="15" height="15" style="border-radius: 50%"> 0</span>
          
          <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
              <ul class="jq-dropdown-menu">  
                     <?php 
                       while ($partrowss = mysqli_fetch_assoc($partcountress)){
                             
                            if($partrowss['id'] ==  $partid){
                              ?>
                              <li class="activepart"><a href='<?php echo 'single.php?story='.$partrowss['story_id'].'&part='.$partrowss['id'].''?>' ><?php echo $partrowss['title'] ; ?></a></li>
                              <?php  
                            }else {
                              ?>
                              <li><a href='<?php echo 'single.php?story='.$partrowss['story_id'].'&part='.$partrowss['id'].''?>' ><?php echo $partrowss['title'] ; ?></a></li>
                            
                  <?php }} ?>

          
            </ul>
        </div>
          </div>
          <div class="col s12 m8 scrollbar " id="style-3" style="color: #fff; text-align: justify;
    text-justify: inter-word; font-family: Open Sans, sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #fff; "> 
              <?php echo $partviewidquery['description']; ?>
              <br><br>
            

              <p class="center-align">
              <span data-jq-dropdown="#jq-dropdown-1"><button class="btn-icon"><i class=" fa fa-chevron-down" style="font-size:15px;"></i></button></span>
              
          <?php  

          $currentid = $_GET['part'];
         
          $nextquery= "SELECT * FROM `parts` WHERE id > $currentid AND story_id = $storyid AND status='published'  ORDER BY id ASC LIMIT 1"; 
          $nextresult = mysqli_query($connection,$nextquery) or die(mysqli_error());
          while($nextrow = mysqli_fetch_array($nextresult))
          {
          $nextid  = $nextrow['id'];
         
          }

          ?>  

           <?php
            
            $lastidq = "SELECT id FROM `parts` WHERE story_id = $storyid AND status='published'  ORDER BY id DESC LIMIT 1"; 
           
           $lastidqres = mysqli_query($connection,$lastidq);
           $lastidqrq = mysqli_fetch_assoc($lastidqres);
           $lastid = $lastidqrq['id'];
  

           if($currentid != $lastid  ){
            ?>
              <a href="<?php echo 'single.php?story='.$storyid.'&part='.$nextid.'' ?>" type="submit" class="btn-continue ">Continue Reading</a>
            <?php  
           }else {
            ?>
             <a href="<?php echo 'single.php?story='.$storyid.'&part='.$lastid.'' ?>" type="submit" class="btn-continue ">End</a>
           <?php } ?>                       
                 
              </p>
                 <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
      <ul class="jq-dropdown-menu">  
             <?php 
     while ($partrowss = mysqli_fetch_assoc($partcountress)){
           
          if($partrowss['id'] ==  $partid){
            ?>
            <li class="activepart"><a href='<?php echo 'single.php?story='.$partrowss['story_id'].'&part='.$partrowss['id'].''?>' ><?php echo $partrowss['title'] ; ?></a></li>
            <?php  
          }else {
            ?>
            <li><a href='<?php echo 'single.php?story='.$partrowss['story_id'].'&part='.$partrowss['id'].''?>' ><?php echo $partrowss['title'] ; ?></a></li>
          

<?php }} ?>

  
    </ul>
</div>
          </div><!--col s12 m6-->
          <div class="col s12 m3">
              
          </div>

         <div class="col s12 m8">
          <span>
            
              <link rel="stylesheet" type="text/css" href="css/reaction.css" />
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- jQuery for Reaction system -->
    <script type="text/javascript" src="js/reaction.js"></script>
            <!-- Reaction system start -->
            <!-- container div for reaction system -->
              
              <span class="like-btn" style="margin-left: 10px;"> <!-- Default like button -->
                <span class="like-btn-emo like-btn-default"></span> <!-- Default like button emotion-->
                <span class="like-btn-text">Like</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
                  <ul class="reactions-box"> <!-- Reaction buttons container-->
                    <li class="reaction reaction-like" data-reaction="Like"></li>
                    <li class="reaction reaction-love" data-reaction="Love"></li>
                    <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                    <li class="reaction reaction-wow" data-reaction="Wow"></li>
                    <li class="reaction reaction-sad" data-reaction="Sad"></li>
                    <li class="reaction reaction-angry" data-reaction="Angry"></li>
                  </ul>
              </span>
              <span>
                <?php 
          
         if($comcount ==  1 ) {

          echo '<span style="color:#7f7f7f; margin-bottom: 15px; font-weight:bold;  "> '. $comcount .'  Comment</span>';

         }elseif ($comcount > 1) {
           echo '<span style="color:#7f7f7f; margin-bottom: 15px;font-weight:bold;  "> '. $comcount .'   Comments</span>';
         }elseif ($comcount < 1) {
           echo '<span style="color:#7f7f7f; margin-bottom: 15px; font-weight:bold; ">  No Comment</span>';
         }

        
          // <h2 style="color:#fe4141; margin-bottom: 15px;:  ">No Comments</h2>
         ?>

              </span> &nbsp; &nbsp;&nbsp;&nbsp; 
              
              <?php 
        
        $likequery = "SELECT * FROM `likes` WHERE partid = '".$partviewidquery['id']."' AND 
        userid = '".$r['id']."'";
        $likequeryres = mysqli_query($connection,$likequery) or die(mysqli_error($connection));
        $likequerycount = mysqli_num_rows($likequeryres);
        if($likequerycount > 0 ){?>

        
        <span id="<?php echo $partviewidquery['id'];?>" class="unlike "><i class="fa fa-star" style="color:#f2b01e"></i></span>
          <?php 

        }else {?>

        <span id="<?php echo $partviewidquery['id'];?>" class="like change"><i class="fa fa-star" style="color: #7f7f7f"></i></span>  
          
          <?php 
        } 
        ?>
        &nbsp;&nbsp;&nbsp;
        <span id="show_like<?php echo $partviewidquery['id'];?>" style="color:#7f7f7f; font-weight: 700">  
        <?php 
          $query3 = "SELECT * FROM `likes` WHERE partid = '".$partviewidquery['id']."'";
          $query3res =  mysqli_query($connection,$query3) or die(mysqli_error($connection));
          $likecount =  mysqli_num_rows($query3res);
          echo $likecount;
         ?>

      </span><span style="color:#7f7f7f;"><b> Vote</b></span>
          
              <div class="like-stat"> <!-- Like statistic container-->
                <span class="like-emo"> <!-- like emotions container -->
                  <span class="like-btn-like"></span> <!-- given emotions like, wow, sad (default:Like) -->
                </span>
                <span class="like-details">zaldy and 10 others</span>
              </div>
             

          </span>
         


          </div>
          
    
      </div><!--row-->

          
   </div><!--container-->
   

   <div class="container">

      <div class="row">
            
          <div class="col s12 m12">
             <ul class="comment-section">
    <?php 
    
    $sqlcomv = "SELECT * FROM `comments` WHERE story_id = $storyid AND part_id = $partid";

    $sqlcomvres  = mysqli_query($connection,$sqlcomv) or die(mysqli_error($connection));

     while ($crows = mysqli_fetch_assoc($sqlcomvres)){?>        


            

            <?php 

              $sqluser = "SELECT * FROM `users` WHERE id = '".$crows['creator_id']."'";
              $sqluserres = mysqli_query($connection,$sqluser) or die(mysqli_error($connection));
              $sqluserq = mysqli_fetch_assoc($sqluserres)

             ?>


                <li class="<?php if($sqluserq['role'] == 'writer') {

                  echo "comment author-comment"; 
                  }else {
                      echo "comment user-comment";
                    
                  
                  } ?>">
                    <div class="info">
                        <a href="#"><?php echo $sqluserq['username']; ?></a>
                        <span><?php echo time_ago($crows['date_created']) ?></span>
                    </div>
                    <a class="avatar" href="#">
                        <img src="<?php if(isset($sqluserq['profilepic']) & !empty($sqluserq['profilepic'])){ echo $sqluserq['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" width="35" height="35" alt="Profile Avatar" title="Anie Silverston" />
                    </a>
                    <p>
                    <?php  echo $crows['content']?>

                    <?php  
                      if($crows['creator_id'] == $r['id'] ){
                    
                      echo ' <span style="float:right"><a href="comment-delete.php?story='.$storyid.'&part='.$partid.'&delete='.$crows['id'].'"><i class="fa fa-close"></i></a></span>';
                    }
                    ?>

                    </p>
                    
                </li> 

                           
                <!-- More comments -->
                <?php }?>


                <li class="write-new">

                <?php 

                if(isset($_POST['submit']) OR !empty($_POST['submit'])){

                  $content = $_POST['comment'];
                    
                    $sqlcom = "INSERT INTO comments  
                    (story_id,part_id,content,creator_id,date_created) VALUES
                    ('$storyid','$partid','$content',$creator_id,now())";  
                    $sqlcomres = mysqli_query($connection,$sqlcom) or die(mysqli_error($connection));

                    if($sqlcomres){
                      echo "<meta http-equiv='refresh' content='0'>";

                    }
                }

                 ?>

                    <form action="" method="post">
                        <textarea placeholder="Write your comment here" name="comment" ></textarea>
                        <div> 
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </form>

                </li>

            </ul>
          </div>
      </div>
   </div>





			
<?php include 'inc/footer.php' ?>






?>




 



<!-- https://app.viima.com/static/media/user_profiles/user-icon.png -->

<script type="text/javascript">
  

 
</script>




<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script type = "text/javascript">
	$(document).ready(function(){ 
		    $(document).on('click', '.like', function(){
      var id=$(this).attr("id");
      var $this = $(this);
      $this.toggleClass('like');
      if($this.hasClass('like')){
        
      } else {
        //$this.text('Unlike');
         $(this).find('i.fa-star').css('color', '#f2b01e');
        $this.addClass("unlike"); 
      }
        $.ajax({
          type: "POST",
          url: "like.php",
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
      $this.toggleClass('unlike');
      if($this.hasClass('unlike')){
        //$this.addClass('fa-fa-heart-o'); 
      } else {
        //$this.text('Like');
        $this.addClass("like");
         $(this).find('i.fa-star').css('color', '#7f7f7f');
      }
        $.ajax({
          type: "POST",
          url: "like.php",
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
      url: 'show_like.php',
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



$(document).ready(function() {
    $("#style-3").on("contextmenu",function(e){
       return false;
    }); 
}); 


</script>