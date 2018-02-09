<?php
ob_start();
session_start();
  require_once('../config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:../login.php');
  }

$email = $_SESSION['email'];
$role = array('writer','admin','vip','webmaster');
$sql = "SELECT * FROM `users` WHERE email = '$email' AND role = '".$role[2]."'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);

if($count == 1){
  header('Location: ../index.php');
}


$allmember  = "SELECT * FROM `users`";
$allresults = mysqli_query($connection,$allmember) or die(mysqli_error($connection));
$acount = mysqli_num_rows($allresults);
$acounter = 1;

$vipmember  = "SELECT * FROM `users` WHERE role='vip'";
$vresults = mysqli_query($connection,$vipmember) or die(mysqli_error($connection));
$vcount = mysqli_num_rows($vresults);
$vcounter = 1;

$newmember  = "SELECT * FROM `users` WHERE role='new'";
$nresults = mysqli_query($connection,$newmember) or die(mysqli_error($connection));
$ncount = mysqli_num_rows($nresults);
$ncounter = 1;

$bmember  = "SELECT * FROM `users` WHERE role='banned'";
$bresults = mysqli_query($connection,$bmember) or die(mysqli_error($connection));
$bcount = mysqli_num_rows($bresults);
$bcounter = 1;






?> 
<?php include 'inc/header.php';?>

<?php include 'inc/nav.php'; ?>
<style type="text/css">
	body {
		background: #ebebeb;
	}

</style>

<div class="container" style="margin-top: 150px">
  <div class="row">
  
    <div class="col s12 ">
      <ul class="tabs">
        <li class="tab  s3 "><a  href="#all">All Users</a></li>
        <li class="tab  s3 "><a class="active" href="#vip">VIP</a></li>
        <li class="tab  s3 "><a href="#new">New Users</a></li>
        <li class="tab  s3 "><a href="#ban">Banned</a></li>
      </ul>
    </div>
    <div id="all" class="col s12 ">
    	<table class="highlight">
	        <thead>
	          <tr>
	          	  <th>No</th>
	              <th>Name</th>
	              <th>Username</th>
	              <th>Email</th>
	              <th>IP</th>
	              <th>Role</th>
	              <th>Active</th>
	              <th>Location</th>
	              <th>Action</th>
	          </tr>
	        </thead>
	        <tbody>
	    	<?php  
		    if($acount > 0){
		    	while($row = mysqli_fetch_assoc($allresults)){
				 
					     
						    		
		         echo '<tr>';
		         echo  '<td>'.$acounter++.'</td>';
		         if(!empty($row['firstname']) == '' && !empty($row['lastname'] == '') ){
		         echo '<td>'.$row['username'].'</td>'; 
		     	 }else{
		     	 	echo'<td>'.$row['firstname'].' '.$row['lastname'].'</td>';
		     	 }
		         echo  '<td>'.$row['username'].'</td>';
		         echo  '<td>'.$row['email'].'</td>';
		         echo  '<td>'.$row['ip'].'</td>';

		         echo  '<td>'.$row['role'].'</td>';
		         echo  '<td>'.$row['active'].'</td>';
		         echo  '<td>'.$row['location'].'</td>';
		        
		         
		         if($row['role'] != 'writer' ){


		         	if($row['role'] == 'banned'){
			         	
		         		
		         		echo '<td>
		         			
				         		<a href="unbanned.php?id='.$row['id'].'" style="color:#555 "><i class="fa fa-ban"></i></a>
				         		<a href="view.php?id='.$row['id'].'"><i class="fa fa-eye"></i></a>
				         		<a href="delete.php?id='.$row['id'].'"><i class="fa fa-trash"></i></a>
													    
			         		</td>';
		         	
		         	}else{
		         		echo  '<td>
		         	
		         		<a href="banned.php?id='.$row['id'].'"><i class="fa fa-ban"></i></a>
		         		<a href="view.php?id='.$row['id'].'"><i class="fa fa-eye"></i></a>
		         		<a href="delete.php?id='.$row['id'].'"><i class="fa fa-trash"></i></a>
		         											    
		         		</td>';
		         	}

		         
		         
		      	}else{

		      		echo  '<td>
		         		
		         		<a href="view.php?id='.$row['id'].'"><i class="fa fa-eye"></i></a>									    
		         		</td>';
		      	}


		         echo '</tr>';
		    
		 	  	}

	 		}

			?>
	        </tbody>
	    </table>
    </div>
    <div id="vip" class="col s12 ">
	    <table class="highlight">
	        <thead>
	          <tr>
	          	  <th>No</th>
	              <th>Name</th>
	              <th>Username</th>
	              <th>Email</th>
	              <th>Role</th>
	              <th>Active</th>
	              <th>Location</th>
	              <th>Action</th>
	          </tr>
	        </thead>
	        <tbody>
	    	<?php  
		    if($vcount > 0){
		    	while($vrow = mysqli_fetch_assoc($vresults)){
		         echo '<tr>';
		         echo  '<td>'.$vcounter++.'</td>';
		         if(!empty($vrow['firstname']) == '' && !empty($vrow['lastname'] == '') ){
		         echo '<td>'.$vrow['username'].'</td>'; 
		     	 }else{
		     	 	echo'<td>'.$vrow['firstname'].' '.$vrow['lastname'].'</td>';
		     	 }
		     	 echo  '<td>'.$vrow['username'].'</td>';
		         echo  '<td>'.$vrow['email'].'</td>';
		         echo  '<td>'.$vrow['role'].'</td>';
		         echo  '<td>'.$vrow['active'].'</td>';
		         echo  '<td>'.$vrow['location'].'</td>';
		         if($vrow['role'] != 'banned'){
		         
		         echo  '<td>
		         		<a href="banned.php?id='.$vrow['id'].'"><i class="fa fa-ban"></i></a>
		         		<a href="view.php?id='.$vrow['id'].'"><i class="fa fa-eye"></i></a>
		         		<a href="delete.php?id='.$vrow['id'].'"><i class="fa fa-trash"></i></a>
												    
		         		</td>';
		         		
		       
				 }else{
		         			
		         		echo '<td>
				         		<a href="unbanned.php?id='.$vrow['id'].'" style="color:#555 "><i class="fa fa-ban"></i></a>
				         		<a href="view.php?id='.$vrow['id'].'"><i class="fa fa-eye"></i></a>
				         		<a href="delete.php?id='.$vrow['id'].'"><i class="fa fa-trash"></i></a>
													    
			         		</td>';
		         	}

		         echo '</tr>';
		    
		 	  	}

	 		}

			?>
	        </tbody>
	    </table>	<!-- VIP -->
    </div>
    <div id="new" class="col s12 ">
    	<table class="highlight">
	        <thead>
	          <tr>
	          	  <th>No</th>
	              <th>Name</th>
	              <th>Username</th>
	              <th>Email</th>
	              <th>Role</th>
	              <th>Active</th>
	              <th>Location</th>
	              <th>Action</th>
	          </tr>
	        </thead>
	        <tbody>
	    	<?php  
		    if($ncount > 0){
		    	while($nrow = mysqli_fetch_assoc($nresults)){
		         echo '<tr>';
		         echo  '<td>'.$ncounter++.'</td>';
		         if(!empty($nrow['firstname']) == '' && !empty($nrow['lastname'] == '') ){
		         echo '<td>'.$nrow['username'].'</td>'; 
		     	 }else{
		     	 	echo'<td>'.$nrow['firstname'].' '.$nrow['lastname'].'</td>';
		     	 }
		          echo  '<td>'.$nrow['username'].'</td>';
		         echo  '<td>'.$nrow['email'].'</td>';
		         echo  '<td>'.$nrow['role'].'</td>';
		         echo  '<td>'.$nrow['active'].'</td>';
		         echo  '<td>'.$nrow['location'].'</td>';
		        if($nrow['role'] != 'banned'){
		         
		         echo  '<td>
		         		<a href="addvip.php?id='.$nrow['id'].'"><i class="fa fa-user-plus"></i></a>
		         		<a href="banned.php?id='.$nrow['id'].'"><i class="fa fa-ban"></i></a>
		         		<a href="view.php?id='.$nrow['id'].'"><i class="fa fa-eye"></i></a>
		         		<a href="delete.php?id='.$nrow['id'].'"><i class="fa fa-trash"></i></a>
												    
		         		</td>';
		         		
		       
				 }else{
		         			
		         		echo '<td>
				         		<a href="unbanned.php?id='.$nrow['id'].'" style="color:#555 "><i class="fa fa-ban"></i></a>
				         		<a href="view.php?id='.$nrow['id'].'"><i class="fa fa-eye"></i></a>
				         		<a href="delete.php?id='.$nrow['id'].'"><i class="fa fa-trash"></i></a>
													    
			         		</td>';
		         	}	
		         				
		         


		         echo '</tr>';
		    
		 	  	}

	 		}

			?>
	        </tbody>
	    </table>	<!-- VIP -->
    </div>
    <div id="ban" class="col s12">
    	<table class="highlight">
	        <thead>
	          <tr>
	          	  <th>No</th>
	              <th>Name</th>
	              <th>Username</th>
	              <th>Email</th>
	              <th>Role</th>
	              <th>Active</th>
	              <th>Location</th>
	              <th>Action</th>
	          </tr>
	        </thead>
	        <tbody>
	    	<?php  
		    if($bcount > 0){
		    	while($brow = mysqli_fetch_assoc($bresults)){
		         echo '<tr>';
		         echo  '<td>'.$bcounter++.'</td>';
		         if(!empty($brow['firstname']) == '' && !empty($brow['lastname'] == '') ){
		         echo '<td>'.$brow['username'].'</td>'; 
		     	 }else{
		     	 	echo'<td>'.$brow['firstname'].' '.$brow['lastname'].'</td>';
		     	 }
		         echo  '<td>'.$brow['username'].'</td>';
		         echo  '<td>'.$brow['email'].'</td>';
		         echo  '<td>'.$brow['role'].'</td>';
		         echo  '<td>'.$brow['active'].'</td>';
		         echo  '<td>'.$brow['location'].'</td>';
		         if($brow['role'] != 'banned'){
		         
		         echo  '<td>
		         		<a href="banned.php?id='.$brow['id'].'"><i class="fa fa-user-plus"></i></a>
		         		<a href="view.php?id='.$brow['id'].'"><i class="fa fa-eye"></i></a>
		         		<a href="delete.php?id='.$brow['id'].'"><i class="fa fa-trash"></i></a>
												    
		         		</td>';
		         		
		       
				 }else{
		         			
		         		echo '<td>
				         		<a href="unbanned.php?id='.$brow['id'].'" style="color:#555 "><i class="fa fa-ban"></i></a>
				         		<a href="view.php?id='.$brow['id'].'"><i class="fa fa-eye"></i></a>
				         		<a href="delete.php?id='.$brow['id'].'"><i class="fa fa-trash"></i></a>
													    
			         		</td>';
		         	}
		         echo '</tr>';
		    
		 	  	}

	 		}

			?>
	        </tbody>
	    </table>	<!-- VIP -->
    </div>
  
  </div>
 </div>






<?php include 'inc/footer.php'; ?>













