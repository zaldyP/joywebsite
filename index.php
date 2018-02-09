
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
	@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700);
@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:400,700);

*, *::before, *::after { box-sizing: border-box; -webkit-box-sizing: border-box; }
.cf::after, .cf::before { content: ' '; display: table; }
.cf::after { clear: both; }

body, html {
	height: 100%;

}

body {
	background: #fff;
	font-family: 'Roboto', sans-serif;
	font-weight: 400;
	font-style: normal;
	color: #484848;
}

a {
	text-decoration: none;
	outline: none;
}

.genrecolor {
	color: #29b6f6!important;
}


.



.full-width {
	position: relative;
	max-width: 906px;
	margin: 20px auto;
}

.col-md-3 {
	width: 100%;
	margin-top: 10px;
}

/* ---- Switch button ---- */
/*.icon-switch {
	width: 100%;
}

.card2 {
	float: right;
	font-size: 20px;
	margin-right: 20px;
	display: inline-block;
}

.list {
	float: right;
	font-size: 20px;
	display: inline-block;
	margin-right: 5px;
}

.active {
	color: #0990aa;
}*/
.Switch {
	position: relative;
	float: right;
	font-weight: bold;
	color: #fff;
	width: 60px;
	height: 30px;
	border-radius: 15px;
	background: #0990aa;
	cursor: pointer;
	-webkit-transition: background-color 0.3s ease-in-out;
	-moz-transition   : background-color 0.3s ease-in-out;
	-o-transition     : background-color 0.3s ease-in-out;
	-ms-transition    : background-color 0.3s ease-in-out;
}

.Switch.list {
	background: #fd7117;
}

.Switch span { 
	position: relative;
	display: inline-block; 
	width: 25px; 
	top: 6px;
}

.Switch span.on {
	left: 9px;
}

.Switch span.off {
	left: 6px;
}

.Switch .Toggle {
	position: absolute;
	right: 0;
	top: 2px;
	width: 26px;
	height: 26px;
	border-radius: 13px;
	background: #fff;
	z-index: 999;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition   : all 0.3s ease-in-out;
	-o-transition     : all 0.3s ease-in-out;
	-ms-transition    : all 0.3s ease-in-out;
}

.Switch.list .Toggle { left: 1px; }
.Switch.card2 .Toggle { left: 33px; }

/* ---- card2 View ---- */
.card2-view {
	background: #fff;
	-webkit-box-shadow: 0px 1px 1px 0px rgba(204,204,204,0.2);
	-moz-box-shadow   : 0px 1px 1px 0px rgba(204,204,204,0.2);
	box-shadow        : 0px 1px 1px 0px rgba(204,204,204,0.2);
	float: left;
	width: 210px;
	margin: 5px;
}

.container2 {
	border: 1px solid #efefef;
	padding: 15px;

}

.bg {
	display: block;
	overflow: hidden;
	max-height: 170px;
	max-width: 100%;
	background: #000;
	
}

.bg img {
	-webkit-transform: translate3d(0,-5px,0);
	transform: translate3d(0,-5px,0);
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transition: opacity 0.35s, transform 0.35s;	
	

	
}

.bg:hover img {
	opacity: 0.7;
	transform: translate3d(0,0,0);
	-webkit-transform: translate3d(0,0,0);
}

.tag_name {
	font-family: 'Roboto Slab', serif;	
	font-size  : 12px;
	font-weight: 700;
	letter-spacing: 0.05em;
	margin-bottom: 15px;
	text-transform: uppercase;
}

/* COMPANY INFO ------------------------ */
.c_logo {
	display: table-cell;
}

.c_logo img {
	display: inline-block;
	outline: none;
	border-radius: 3px;
	-webkit-border-radius: 3px;
}

.c_info {
	display: table-cell;
	vertical-align: middle;
	padding-top: 5px;
	padding-left: 10px;
	line-height: 18px;
}

.c_name {
	font-size: 15px;
	font-weight: 500;
	color: #3c3c3c;
}

.c_industry {
	font-weight: 400;
	font-size: 12px;
	letter-spacing: 0.05em;
	color: #7e8890;
}

.card2-view #c_stars, #c_stars span { /* white star bottom */
	display: inline-block;
	background: url('https://s15.postimg.org/igu2opvh3/stars.png') 0 -12px repeat-x;
	width: 60px;
	height: 12px;
}

.card2-view #c_stars span { /* orange stars overlay  - set width by JS code */
	background-position: 0 0;
	vertical-align: super;
}

.c_num {
	display: inline-block;
	font-size: 14px;
	font-weight: 500;
	vertical-align: super;
}

.c_content {
	margin-top: -10px;
}

.c_content p {
	line-height: 21px;
}

.c_content .title {
	color: #484848!important;
	font-weight: 600!important;
	font-size: 16px!important;
	letter-spacing: 0.02em;
}

.c_content .review {
	font-weight: 300;
	font-size: 14px;
	letter-spacing: 0.05em;
	margin-top: -10px;
}

 /* USER INFO ------------------------ */
.user .user_avatar img {
	width: 15px;
	height: 15px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
}

.user .user_avatar {
	display: table-cell;
	vertical-align: middle;
}

.user .user_info {
	display: table-cell;
	vertical-align: middle;
	color: rgba(0,0,0,0.35);
	font-size: 14px;
	line-height: 1.4;
	padding-left: 10px;
}

.user .user_name {
	font-weight: 500;
}

/* ---- List View ---- */
.list-view {
	background: #fff;
	-webkit-box-shadow: 0px 1px 1px 0px rgba(204,204,204,0.2);
	-moz-box-shadow   : 0px 1px 1px 0px rgba(204,204,204,0.2);
	box-shadow        : 0px 1px 1px 0px rgba(204,204,204,0.2);
	float: left;
	margin: 5px;
}

.list-view:last-child {
	margin-bottom: 20px;
}

.list-view .container2 {
	border: 1px solid #efefef;
	padding: 15px;
}

.list-view .bg {
	display: none;
}

.list-view .bg img {
	-webkit-transform: translate3d(0,-5px,0);
	transform: translate3d(0,-5px,0);
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transition: opacity 0.35s, transform 0.35s;
}

.list-view .bg:hover img {
	opacity: 0.7;
	transform: translate3d(0,0,0);
	-webkit-transform: translate3d(0,0,0);
}

.list-view .tag_name {
	font-family: 'Roboto Slab', serif;	
	font-size  : 12px;
	font-weight: 700;
	letter-spacing: 0.05em;
	margin-bottom: 10px;
	text-transform: uppercase;
}

/* COMPANY INFO ------------------------ */
.list-view .c_logo {
	display: none;
}

.list-view .c_logo img {
	display: none;
}

.list-view .c_info {
	display: table-cell;
	vertical-align: middle;
	padding-top: 5px;
	padding-left: 0;
	line-height: 18px;
}

.list-view .c_name {
	font-size: 20px;
	font-weight: 500;
	color: #3c3c3c;
}

.list-view .c_industry {
	font-weight: 400;
	font-size: 12px;
	letter-spacing: 0.05em;
	color: #7e8890;
}

.list-view #c_stars, #c_stars span { /* white star bottom */
	display: inline-block;
	background: url('https://s15.postimg.org/igu2opvh3/stars.png') 0 -12px repeat-x;
	width: 60px;
	height: 12px;
}

.list-view #c_stars span { /* orange stars overlay  - set width by JS code */
	background-position: 0 0;
	vertical-align: super;
}

.list-view .c_num {
	display: inline-block;
	font-size: 14px;
	font-weight: 500;
	vertical-align: super;
}

.list-view .c_content {
	margin-top: -15px;
}

.list-view .c_content p {
	line-height: 21px;
}

.list-view .c_content .title {
	color: #484848;
	font-weight: 500;
	font-size: 16px;
	letter-spacing: 0.02em;
}

.list-view .c_content .review {
	font-weight: 300;
	font-size: 14px;
	letter-spacing: 0.05em;
	margin-top: -10px;
}

 /* USER INFO ------------------------ */
.list-view .user .user_avatar img {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
}

.user .user_avatar {
	display: table-cell;
	vertical-align: middle;
}

.list-view .user .user_info {
	display: table-cell;
	vertical-align: middle;
	color: rgba(0,0,0,0.35);
	font-size: 14px;
	line-height: 1.4;
	padding-left: 10px;
}

.list-view .user .user_name {
	font-weight: 500;
}

@media screen and (max-width: 920px) and (min-width: 621px) {
	.full-width {
		max-width: 604px;
		margin-left: auto;
		margin-right: auto;
	}
}

@media screen and (max-width: 620px){
	.full-width {
		max-width: 302px;
		margin-left: auto;
		margin-right: auto;
	}


	.card2-view {
	background: #fff;
	-webkit-box-shadow: 0px 1px 1px 0px rgba(204,204,204,0.2);
	-moz-box-shadow   : 0px 1px 1px 0px rgba(204,204,204,0.2);
	box-shadow        : 0px 1px 1px 0px rgba(204,204,204,0.2);
	float: left;
	width: 292px;
	margin: 5px;

	}


}






div.pagination {
padding: 3px;
margin: 3px;
text-align:center;
}
 
div.pagination a {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #AAAADD;
 
text-decoration: none; /* no underline */
color: #000099;
}
div.pagination a:hover, div.digg a:active {
border: 1px solid #000099;
 
color: #000;
}
div.pagination span.current {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #000099;
 
font-weight: bold;
background-color: #000099;
color: #FFF;
}
div.pagination span.disabled {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #EEE;
 
color: #DDD;
}
 

/*profile*/

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
  border-radius: 50%;
  bottom: -50px;
  box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2), 1px 1px 4px rgba(0,0,0,0.3);
  height: 148px;
  /*left: 150px;*/
  position: absolute;
  width: 148px;
  z-index: 3;
  
}

div.profile-stats {
  bottom: 0;
  border-top: 1px solid rgba(0,0,0,0.5);
  left: 0;
  padding: 15px 15px 15px 220px;
  position: absolute;
  right: 0;
  z-index: 2;
  
  

  /* Generated Gradient */
  background: -moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(0,0,0,0.51) 3%, rgba(0,0,0,0.75) 61%, rgba(0,0,0,0.5) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(3%,rgba(0,0,0,0.51)), color-stop(61%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.5)));
  background: -webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
 background: -o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: -ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: linear-gradient(to bottom,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80ffffff', endColorstr='#80000000',GradientType=0 );

}

div.profile-stats ul {
  list-style: none;
  margin: 0;
  padding: 0;
  position: relative;
}

div.profile-stats ul li {
  color: #efefef;
  display: block;
  float: left;
  font-size: 24px;
  font-weight: bold;
  margin-right: 50px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.7)
}

div.profile-stats li span {
  display: block;
  font-size: 16px;
  font-weight: normal;

}

div.profile-stats a.follow {
  display: block;
  float: right;color: #ffffff;
  margin-top: 5px;
  text-decoration: none;
  
  /* This is a copy and paste from Bootstrap */
  background-color: #49afcd;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #49afcd;
  background-image: -moz-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5bc0de), to(#2f96b4));
  background-image: -webkit-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -o-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);
  background-repeat: repeat-x;
  border-color: #2f96b4 #2f96b4 #1f6377;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff2f96b4', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  display: inline-block;
  padding: 4px 12px;
  margin-bottom: 0;
  font-size: 14px;
  line-height: 20px;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  border-radius: 4px;
}

div.profile-stats a.follow.followed {
  
  /* Once again copied from Boostrap */
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #5bb75b;
  background-image: -moz-linear-gradient(top, #62c462, #51a351);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
  background-image: -webkit-linear-gradient(top, #62c462, #51a351);
  background-image: -o-linear-gradient(top, #62c462, #51a351);
  background-image: linear-gradient(to bottom, #62c462, #51a351);
  background-repeat: repeat-x;
  border-color: #51a351 #51a351 #387038;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff51a351', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}




.writer-name {
	padding-top: 15px;
	letter-spacing: 1px;
	padding-right: 60px;
}

.name-writer {
	font-size: 24px!important;
  font-weight: bold!important;

}

.caret2 {
	position: absolute;
	z-index: 5000;
	    top: 414px;
    left: 385px;
    
}

@media screen and (max-width: 1013px){
	
	div.profile-stats {
	  bottom: 0;
	  border-top:none!important;
	  left: 0;
	  padding: 0px!important;
	  position: absolute;
	  right: 0;
	  z-index: 2;
	  width: 100%;
	  height: 400px;
	  /* Generated Gradient */
	  background: -moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(0,0,0,0.51) 3%, rgba(0,0,0,0.75) 61%, rgba(0,0,0,0.5) 100%);
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(3%,rgba(0,0,0,0.51)), color-stop(61%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.5)));
	  background: -webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
	 background: -o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
	  background: -ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
	  background: linear-gradient(to bottom,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80ffffff', endColorstr='#80000000',GradientType=0 );

	}


	

	.writer-name {
		padding-top: 200px;
		
	}

	.name-writer {
		font-size: 24px!important;
  		font-weight: bold!important;
  		position: absolute;
  		margin-top: 50px;
  		text-align: center;
  		width: 100%;
  		

	}

	

	.profile-picture{
		left: 52%; transform: translate(-50%,0); position: absolute; z-index: 1;		
		top:20%;
		bottom: 0;
		text-align: center;		
		
		
	} 

	figure{
		margin:0px!important;
	}
		

	.stats {
		position: relative;
		top:300px;
		text-align: center;
		
		left:-15px;
		right:0;
		
		
		
	}

	div.profile-stats li span.count-stats {
   font-size: 15px!important;
   



	}
  
	div.profile-stats li span.count-title {
 
  font-size: 15px!important;
  border-right: 1px solid #ccc;
  padding-right: 5px;
  color:#29b6f6;
  letter-spacing: 2px;
  


}

li:last-child span.count-title{
	border-right: none !important;
}


div.profile-stats ul li {
	margin-right: 5px!important;
}

div.profile-stats li span {

display: inline!important;

}
	
.caret2 {
    position: absolute;
    left: 82%;
   /* //text-align: center;*/
    top: 315px;
 	



}

	
}/*media*/


	

	





</style>

<?php  
 
$sqlpic = "SELECT * FROM `users` WHERE id = 1";
$sqlpicres = mysqli_query($connection, $sqlpic) or die(mysqli_error($connection));
$sqlpicq = mysqli_fetch_assoc($sqlpicres);	
 
//VIP

$sqlvip = "SELECT count(id) as vc FROM `users` WHERE role = 'vip'";
$sqlvipres = mysqli_query($connection, $sqlvip) or die(mysqli_error($connection));
$sqlvipq = mysqli_fetch_assoc($sqlvipres);



 //works count
$workscount = "SELECT count(id) as wc FROM `stories`";
$workscountres = mysqli_query($connection, $workscount) or die(mysqli_error($connection));
$workscountq = mysqli_fetch_assoc($workscountres); 




//comments
$commentcount = "SELECT count(id) as ccount FROM `comments`";
$commentcountres = mysqli_query($connection, $commentcount) or die(mysqli_error($connection));
$commentcountq = mysqli_fetch_assoc($commentcountres);


//likes
$likescount = "SELECT count(likeid) as clikes FROM `likes`";
$likescountres = mysqli_query($connection, $likescount) or die(mysqli_error($connection));
$likescountq = mysqli_fetch_assoc($likescountres);

//views
$viewscount = "SELECT sum(views) as cviews FROM `viewcounter`";
$viewscountres = mysqli_query($connection, $viewscount) or die(mysqli_error($connection));
$viewscountq = mysqli_fetch_assoc($viewscountres);





 ?>



<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	<?php  
			  		
	$allstories = " SELECT * FROM `stories`";
	$allstoriesres = mysqli_query($connection,$allstories) or die(mysqli_error($connection));
	?>
				

	<a href="#" data-jq-dropdown="#jq-dropdown-1"  class="caret2"><i class="fa fa-chevron-down"></i></a>
				    
				    <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip jq-dropdown-anchor-right">
    <ul class="jq-dropdown-menu">

    	<?php 
    	while($test = mysqli_fetch_assoc($allstoriesres) ){
     	?>
        <li><a href="<?php echo 'book.php?story='.$test['id'].''?>" style=""><?php echo $test['title'] ?></a></li>
        <?php }?>
    
    
    </ul>
</div>
				    
				
	<div class="row">
		<div class="col s12 m12" style="padding: 0px;">

			<header>
			
				<figure class="profile-picture" 
			    style="background-image: url('<?php echo $sqlpicq['profilepic']; ?>')">
			  </figure>
			  <div class="profile-stats">
			  	



			    <ul>
			    <li class="writer-name"><span class="name-writer"><?php echo $sqlpicq['firstname'] .' ' .$sqlpicq['lastname']; ; ?></span></li>
			      
			       	

			       <li class="stats"><span class="count-stats"><?php echo format($workscountq['wc']); ?></span><span class="count-title"  data-jq-dropdown="#jq-dropdown-1" ><a href="" style=" color:#fff"> Stories</a></span></li> 
			       
			      <li class="stats"><span class="count-stats"><?php echo format($viewscountq['cviews']) ?><span class="count-title"> Views</span></li>
			      <li class="stats"><span class="count-stats"><?php echo format($commentcountq['ccount']) ?></span><span class="count-title"> Comments</span></li>
			      <li class="stats"><span class="count-stats"><?php echo format($likescountq['clikes']) ?></span><span class="count-title"> Voted</span></li>
			      <li class="stats"><span class="count-stats"><?php echo format($sqlvipq['vc']) ; ?></span><span class="count-title"> VIP</span></li>
	
			    </ul>

			    <!-- <a href="javascript:void(0);" class="follow" 
			      Follow Nick
			    </a> -->
			  </div>
 			</header>	
		</div>
	</div>

<div class="container">
	<div class="row">
			<div class="col s12 m9">
				<div class="full-width"></div>		
			</div>
			<div class="s12 m3">
				
					aaasa
			</div>
		</div>
</div>
		


		
	

	




		


	    
     
   

     














<?php include 'inc/footer.php'; ?>

<script type="text/javascript">
	
	

      $(document).ready(function(){ 
		$(document).on('click', '.like', function(){
			var id=$(this).attr("id");
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				
			} else {
				//$this.text('Unlike');
				 $(this).find('i.fa-heart').css('color', '#f7296a');
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
				 $(this).find('i.fa-heart').css('color', '#000');
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




</script>

 <script type="text/javascript">
$(document).ready(function(){
changePagination('0');	
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html
                ('Loading <img src="ajax-loader.gif" />');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "loadData.php",
           data: dataString,
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $(".full-width").html(result);
           }
      });
}

</script>

<script type="text/javascript">
	


</script>