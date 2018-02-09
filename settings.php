<?php
session_start();
  require_once('config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }

$email = $_SESSION['email'];

 $sql = "SELECT * FROM `users` WHERE email ='$email'";
 $res = mysqli_query($connection, $sql);
 $ucount = mysqli_num_rows($res);
 $u =  mysqli_fetch_assoc($res);



// Username Changed
switch(isset($_POST['userSubmit']) && !empty($_POST['userSubmit'])){
case 'editusername';
  
  $username = mysqli_real_escape_string($connection, $_POST['username']);

   $usql  =  "SELECT * FROM `users` WHERE email = '$email'";
   $ures = mysqli_query($connection,$usql) or die(mysqli_error($connection));
   $uq = mysqli_fetch_assoc($ures);
   
   	
   	if($uq['username'] != $username AND !empty($_POST['username'])){
   			$usel = "SELECT * FROM `users` WHERE username = '$username'";
 		   	$uselres= mysqli_query($connection,$usel) or die(mysqli_error($connection));	
 		   	$r = mysqli_fetch_assoc($uselres);
 		   	$ucount = mysqli_num_rows($uselres);
 		   	if($ucount == 0){
				$userupdate = "UPDATE IGNORE `users` SET  username ='$username' WHERE email ='$email'";
 				$userupdateres = mysqli_query($connection,$userupdate) or die(mysqli_error($connection));
	 			if($userupdateres){
	 			 	$smsg = "Username changed!";
	 			 }
 						 					
 			}else{
 				$fmsg = "Username Exist";
 			}
 				
   	}else{
			$fmsg = "Please change the username field to update your username.";   			
   	}

	break;
	default: {
		echo "";
	}   

}



//Password changed
switch(isset($_POST['passSubmit']) && !empty($_POST['passSubmit'])){
case 'editpassword';

	    $curpass = md5(mysqli_real_escape_string($connection, $_POST['curpass']));
		$newpass = md5(mysqli_real_escape_string($connection, $_POST['newpass']));
		$repass = md5(mysqli_real_escape_string($connection, $_POST['repass']));

		$upasssql = "SELECT * FROM `users` WHERE  email = '$email' ";
		$upassres = mysqli_query($connection, $upasssql) or die (mysqli_error($connection));
		$upassresquery = mysqli_fetch_assoc($upassres);
		
						
			if($curpass == $upassresquery['password']){
			
				if($newpass == $repass ){

					$upasssqlupdate = "UPDATE  `users` SET password ='$newpass' WHERE email ='$email'";

					$upassupdateres = mysqli_query($connection, $upasssqlupdate) or die(mysqli_error($connection));

					if($upassupdateres ==  1){
						$smsg = "Password Changed";
					}


				}else{
						$fmsg = "New password not matched";
				}	
			
				
			}else{
				$fmsg = "Current password not Matched";
			}
			
		
		break;
		default: {
			echo "";
		}

		break;
}	

//single uploads
// switch(isset($_FILES) && !empty($_FILES)){
// case 'editprofilepic';
// 	$name = $_FILES['profilepic']['name'];
//   	$size = $_FILES['profilepic']['size'];
//   	$type = $_FILES['profilepic']['type'];
//   	$tmp_name = $_FILES['profilepic']['tmp_name'];
  	
//   	$extension = substr($name, strpos($name, '.') + 1);
//   	$maxsize = 500000;
//   	$username = $u['username'];


//   	  if(isset($name) && !empty($name)){
// 	      if(($extension == "jpeg" || $extension = "jpg") && $type == "image/jpeg" && $size <= $maxsize ){
// 	          $location = "uploadprofile/";
// 	          if(move_uploaded_file($tmp_name, $location.$username.".jpg")){
// 	          $ufsql = "UPDATE `users` SET profilepic='$location$username.jpg' WHERE email='$email'";
// 	          $ufres = mysqli_query($connection,$ufsql);
	            
// 	      } 
	    
// 	    }else{
// 	      echo "Please upload only JPEG files & should below 500kb";
// 	    }
	  
// 	  }else{
// 	  echo "Please select a file";
// 	  }

// 	break;

// }

//multiple uploads
switch(isset($_FILES['pic']) && !empty($_FILES['pic'])) {
case 'editprofilepic';


       
        $name = $_FILES['pic']['name'];
        $size = $_FILES['pic']['size'];
  		$type = $_FILES['pic']['type'];
  		$tmp_name = $_FILES['pic']['tmp_name'];

  		$extension = substr($name, strpos($name, '.') + 1);
  		$maxsize = 500000;
  		$username = $u['username'];

  		$profilepic = $u['profilepic'];

  		if(isset($name) && !empty($name)){
	      if(($extension == "jpeg" || $extension = "jpg") && $type == "image/jpeg" && $size <= $maxsize ){
	          $location = "uploadprofile/";

	          if(file_exists($profilepic)) unlink($profilepic);
	          
	          if(move_uploaded_file($tmp_name, $location.$name)){
	          $ufsql = "UPDATE `users` SET profilepic='$location$name' WHERE email='$email'";
	          $ufres = mysqli_query($connection,$ufsql);
	      	
	      	$smsg = "Profile picture updated";      
	      } 
	    
	    }else{
	      $fmsg = "Please upload only JPEG files & should below 500kb";
	    }
	  
	  }else{
	  $fmsg = "Please select a file";
	  }	

	  
	 

		

	

	break;
	default: {
		echo "";
	}

}




switch(isset($_POST['updateprofile']) && !empty($_POST['updateprofile'])){
case 'update';
  
   //$username = mysqli_real_escape_string($connection, $_POST['username']);
  	//$email = mysqli_real_escape_string($connection, $_POST['email']);
  	//$password = md5(mysqli_real_escape_string($connection, $_POST['password']));
  	$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
  	$lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
  	$birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
  	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
  	$location = mysqli_real_escape_string($connection, $_POST['location']);
  	$aboutme = mysqli_real_escape_string($connection, $_POST['aboutme']);

  	$updateprofile = "SELECT * FROM `users` WHERE email = '$email'";
  	$updateprofileres = mysqli_query($connection,$updateprofile) or die(mysqli_error($connection));
  	$updateprofilecount = mysqli_num_rows($updateprofileres);

  	if($updateprofilecount == 1){
  		$updateusql = "UPDATE `users` SET firstname='$firstname', lastname ='$lastname', birthday='$birthday', gender='$gender', location='$location', aboutme='$aboutme' WHERE email ='$email'";
  		$updateusres =mysqli_query($connection,$updateusql) or die(mysqli_error($connection));
  		if($updateusres){
  			$smsg =  "Successfully Updated";
  		} 

  	} 

  

	break;
	default:{
		echo "";
	}   

}	





?>


<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<style type="text/css">
	body {
		background: #ebebeb;
	}

	
	.fade.in {
    opacity: 1;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.fade {
    opacity: 0;
    -webkit-transition: opacity .15s linear;
    -o-transition: opacity .15s linear;
    transition: opacity .15s linear;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
}
a {
    color: #337ab7;
    text-decoration: none;
}
a {
    background-color: transparent;
}

.select-wrapper input.select-dropdown{
	display: none!important;
}

.select-wrapper span.caret {
	display: none;
}



</style>
<div class="container" style="margin-top: 12px">
	<div class="row">
    	<div class="col s12 m8">

	       <div class="card">
            <div class="card-image">
            </div>
            <div class="card-content">
             <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?>  </div><?php } ?>
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            <h4>Account</h4>
            <p>Change your account information and privacy settings</p>	
              <div class="row">
			    <form class="col s12" method="post" action="">
			      <div class="row">
			        <div class="input-field col s10 m8">
			          <i class="material-icons prefix">verified_user</i>
			          <input id="icon_prefix" disabled="" name="username" type="text" class="validate"  value="<?php echo $u['username']; ?>">
			         
			        </div>
			        <div class="input-field col s2 m4">
			          <a class="modal-trigger" href="#modal1" data-modal="modal"><span class="new badge"  data-badge-caption="">
			          change</span></a>
			 
			         
			        </div>
			      </div>
			     
			      <div class="row">
			        <div class="input-field col s12 m8">
			          <i class="material-icons prefix">email</i>
			          <input id="icon_prefix" name="email" type="email" class="validate" disabled="" value="<?php echo $u['email'] ; ?>">
			        
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s10 m8">
			          <i class="material-icons prefix">lock</i>
			          <input id="icon_prefix" name="password" type="password" class="validate" value="<?php echo md5($u['password']) ?>">
			        
			        </div>
			        <div class="input-field col s2 m4">
			          <a href="#modal2" class="modal-trigger" data-modal="modal2"><span class="new badge"  data-badge-caption="">
			          change</span></a>
			        </div>
			      </div>
			       <div class="row">
			        <div class="input-field col s12 m8">
			          <i class="material-icons prefix">account_circle</i>
			          <input id="icon_prefix" type="text" placeholder="First Name" name = "firstname" class="validate" value="<?php echo $u['firstname'] ?>" >
			         
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12 m8">
			          <i class="material-icons prefix">account_circle</i>
			          <input id="icon_prefix" placeholder="Last Name" type="text" name="lastname" class="validate" value="<?php echo $u['lastname'] ?>">
			         
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12 m8">
			          <i class="material-icons prefix">date_range</i>
			          <input id="icon_prefix" placeholder="Birthday" value="<?php echo $u['birthday'];?>" name="birthday" type="text" class="datepicker">
			        
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s12 m8">
			      		<i class="material-icons prefix">wc</i>
					    <select name="gender" > 
					    <option value="<?php echo $u['gender']; ?>"><?php echo $u['gender'] ?></option>	
					      <option value="Female">Female</option>
					      <option value="Male">Male</option>
					    </select>
					  
					  </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s12 m8">
			      		<i class="material-icons prefix">add_location</i>
					    	<select name="location">
					    				<option value="<?php echo $u['location'] ?>"><?php echo $u['location'] ?></option>
									    <option value="Afghanistan">Afghanistan</option>
									    <option value="Albania">Albania</option>
									    <option value="Algeria">Algeria</option>
									    <option value="American Samoa">American Samoa</option>
									    <option value="Andorra">Andorra</option>
									    <option value="Angola">Angola</option>
									    <option value="Anguilla">Anguilla</option>
									    <option value="Antartica">Antarctica</option>
									    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
									    <option value="Argentina">Argentina</option>
									    <option value="Armenia">Armenia</option>
									    <option value="Aruba">Aruba</option>
									    <option value="Australia">Australia</option>
									    <option value="Austria">Austria</option>
									    <option value="Azerbaijan">Azerbaijan</option>
									    <option value="Bahamas">Bahamas</option>
									    <option value="Bahrain">Bahrain</option>
									    <option value="Bangladesh">Bangladesh</option>
									    <option value="Barbados">Barbados</option>
									    <option value="Belarus">Belarus</option>
									    <option value="Belgium">Belgium</option>
									    <option value="Belize">Belize</option>
									    <option value="Benin">Benin</option>
									    <option value="Bermuda">Bermuda</option>
									    <option value="Bhutan">Bhutan</option>
									    <option value="Bolivia">Bolivia</option>
									    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
									    <option value="Botswana">Botswana</option>
									    <option value="Bouvet Island">Bouvet Island</option>
									    <option value="Brazil">Brazil</option>
									    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
									    <option value="Brunei Darussalam">Brunei Darussalam</option>
									    <option value="Bulgaria">Bulgaria</option>
									    <option value="Burkina Faso">Burkina Faso</option>
									    <option value="Burundi">Burundi</option>
									    <option value="Cambodia">Cambodia</option>
									    <option value="Cameroon">Cameroon</option>
									    <option value="Canada">Canada</option>
									    <option value="Cape Verde">Cape Verde</option>
									    <option value="Cayman Islands">Cayman Islands</option>
									    <option value="Central African Republic">Central African Republic</option>
									    <option value="Chad">Chad</option>
									    <option value="Chile">Chile</option>
									    <option value="China">China</option>
									    <option value="Christmas Island">Christmas Island</option>
									    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
									    <option value="Colombia">Colombia</option>
									    <option value="Comoros">Comoros</option>
									    <option value="Congo">Congo</option>
									    <option value="Congo">Congo, the Democratic Republic of the</option>
									    <option value="Cook Islands">Cook Islands</option>
									    <option value="Costa Rica">Costa Rica</option>
									    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
									    <option value="Croatia">Croatia (Hrvatska)</option>
									    <option value="Cuba">Cuba</option>
									    <option value="Cyprus">Cyprus</option>
									    <option value="Czech Republic">Czech Republic</option>
									    <option value="Denmark">Denmark</option>
									    <option value="Djibouti">Djibouti</option>
									    <option value="Dominica">Dominica</option>
									    <option value="Dominican Republic">Dominican Republic</option>
									    <option value="East Timor">East Timor</option>
									    <option value="Ecuador">Ecuador</option>
									    <option value="Egypt">Egypt</option>
									    <option value="El Salvador">El Salvador</option>
									    <option value="Equatorial Guinea">Equatorial Guinea</option>
									    <option value="Eritrea">Eritrea</option>
									    <option value="Estonia">Estonia</option>
									    <option value="Ethiopia">Ethiopia</option>
									    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
									    <option value="Faroe Islands">Faroe Islands</option>
									    <option value="Fiji">Fiji</option>
									    <option value="Finland">Finland</option>
									    <option value="France">France</option>
									    <option value="France Metropolitan">France, Metropolitan</option>
									    <option value="French Guiana">French Guiana</option>
									    <option value="French Polynesia">French Polynesia</option>
									    <option value="French Southern Territories">French Southern Territories</option>
									    <option value="Gabon">Gabon</option>
									    <option value="Gambia">Gambia</option>
									    <option value="Georgia">Georgia</option>
									    <option value="Germany">Germany</option>
									    <option value="Ghana">Ghana</option>
									    <option value="Gibraltar">Gibraltar</option>
									    <option value="Greece">Greece</option>
									    <option value="Greenland">Greenland</option>
									    <option value="Grenada">Grenada</option>
									    <option value="Guadeloupe">Guadeloupe</option>
									    <option value="Guam">Guam</option>
									    <option value="Guatemala">Guatemala</option>
									    <option value="Guinea">Guinea</option>
									    <option value="Guinea-Bissau">Guinea-Bissau</option>
									    <option value="Guyana">Guyana</option>
									    <option value="Haiti">Haiti</option>
									    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
									    <option value="Holy See">Holy See (Vatican City State)</option>
									    <option value="Honduras">Honduras</option>
									    <option value="Hong Kong">Hong Kong</option>
									    <option value="Hungary">Hungary</option>
									    <option value="Iceland">Iceland</option>
									    <option value="India">India</option>
									    <option value="Indonesia">Indonesia</option>
									    <option value="Iran">Iran (Islamic Republic of)</option>
									    <option value="Iraq">Iraq</option>
									    <option value="Ireland">Ireland</option>
									    <option value="Israel">Israel</option>
									    <option value="Italy">Italy</option>
									    <option value="Jamaica">Jamaica</option>
									    <option value="Japan">Japan</option>
									    <option value="Jordan">Jordan</option>
									    <option value="Kazakhstan">Kazakhstan</option>
									    <option value="Kenya">Kenya</option>
									    <option value="Kiribati">Kiribati</option>
									    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
									    <option value="Korea">Korea, Republic of</option>
									    <option value="Kuwait">Kuwait</option>
									    <option value="Kyrgyzstan">Kyrgyzstan</option>
									    <option value="Lao">Lao People's Democratic Republic</option>
									    <option value="Latvia">Latvia</option>
									    <option value="Lebanon">Lebanon</option>
									    <option value="Lesotho">Lesotho</option>
									    <option value="Liberia">Liberia</option>
									    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
									    <option value="Liechtenstein">Liechtenstein</option>
									    <option value="Lithuania">Lithuania</option>
									    <option value="Luxembourg">Luxembourg</option>
									    <option value="Macau">Macau</option>
									    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
									    <option value="Madagascar">Madagascar</option>
									    <option value="Malawi">Malawi</option>
									    <option value="Malaysia">Malaysia</option>
									    <option value="Maldives">Maldives</option>
									    <option value="Mali">Mali</option>
									    <option value="Malta">Malta</option>
									    <option value="Marshall Islands">Marshall Islands</option>
									    <option value="Martinique">Martinique</option>
									    <option value="Mauritania">Mauritania</option>
									    <option value="Mauritius">Mauritius</option>
									    <option value="Mayotte">Mayotte</option>
									    <option value="Mexico">Mexico</option>
									    <option value="Micronesia">Micronesia, Federated States of</option>
									    <option value="Moldova">Moldova, Republic of</option>
									    <option value="Monaco">Monaco</option>
									    <option value="Mongolia">Mongolia</option>
									    <option value="Montserrat">Montserrat</option>
									    <option value="Morocco">Morocco</option>
									    <option value="Mozambique">Mozambique</option>
									    <option value="Myanmar">Myanmar</option>
									    <option value="Namibia">Namibia</option>
									    <option value="Nauru">Nauru</option>
									    <option value="Nepal">Nepal</option>
									    <option value="Netherlands">Netherlands</option>
									    <option value="Netherlands Antilles">Netherlands Antilles</option>
									    <option value="New Caledonia">New Caledonia</option>
									    <option value="New Zealand">New Zealand</option>
									    <option value="Nicaragua">Nicaragua</option>
									    <option value="Niger">Niger</option>
									    <option value="Nigeria">Nigeria</option>
									    <option value="Niue">Niue</option>
									    <option value="Norfolk Island">Norfolk Island</option>
									    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
									    <option value="Norway">Norway</option>
									    <option value="Oman">Oman</option>
									    <option value="Pakistan">Pakistan</option>
									    <option value="Palau">Palau</option>
									    <option value="Panama">Panama</option>
									    <option value="Papua New Guinea">Papua New Guinea</option>
									    <option value="Paraguay">Paraguay</option>
									    <option value="Peru">Peru</option>
									    <option value="Philippines">Philippines</option>
									    <option value="Pitcairn">Pitcairn</option>
									    <option value="Poland">Poland</option>
									    <option value="Portugal">Portugal</option>
									    <option value="Puerto Rico">Puerto Rico</option>
									    <option value="Qatar">Qatar</option>
									    <option value="Reunion">Reunion</option>
									    <option value="Romania">Romania</option>
									    <option value="Russia">Russian Federation</option>
									    <option value="Rwanda">Rwanda</option>
									    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
									    <option value="Saint LUCIA">Saint LUCIA</option>
									    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
									    <option value="Samoa">Samoa</option>
									    <option value="San Marino">San Marino</option>
									    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
									    <option value="Saudi Arabia">Saudi Arabia</option>
									    <option value="Senegal">Senegal</option>
									    <option value="Seychelles">Seychelles</option>
									    <option value="Sierra">Sierra Leone</option>
									    <option value="Singapore">Singapore</option>
									    <option value="Slovakia">Slovakia (Slovak Republic)</option>
									    <option value="Slovenia">Slovenia</option>
									    <option value="Solomon Islands">Solomon Islands</option>
									    <option value="Somalia">Somalia</option>
									    <option value="South Africa">South Africa</option>
									    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
									    <option value="Span">Spain</option>
									    <option value="SriLanka">Sri Lanka</option>
									    <option value="St. Helena">St. Helena</option>
									    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
									    <option value="Sudan">Sudan</option>
									    <option value="Suriname">Suriname</option>
									    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
									    <option value="Swaziland">Swaziland</option>
									    <option value="Sweden">Sweden</option>
									    <option value="Switzerland">Switzerland</option>
									    <option value="Syria">Syrian Arab Republic</option>
									    <option value="Taiwan">Taiwan, Province of China</option>
									    <option value="Tajikistan">Tajikistan</option>
									    <option value="Tanzania">Tanzania, United Republic of</option>
									    <option value="Thailand">Thailand</option>
									    <option value="Togo">Togo</option>
									    <option value="Tokelau">Tokelau</option>
									    <option value="Tonga">Tonga</option>
									    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
									    <option value="Tunisia">Tunisia</option>
									    <option value="Turkey">Turkey</option>
									    <option value="Turkmenistan">Turkmenistan</option>
									    <option value="Turks and Caicos">Turks and Caicos Islands</option>
									    <option value="Tuvalu">Tuvalu</option>
									    <option value="Uganda">Uganda</option>
									    <option value="Ukraine">Ukraine</option>
									    <option value="United Arab Emirates">United Arab Emirates</option>
									    <option value="United Kingdom">United Kingdom</option>
									    <option value="United States">United States</option>
									    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									    <option value="Uruguay">Uruguay</option>
									    <option value="Uzbekistan">Uzbekistan</option>
									    <option value="Vanuatu">Vanuatu</option>
									    <option value="Venezuela">Venezuela</option>
									    <option value="Vietnam">Viet Nam</option>
									    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
									    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
									    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
									    <option value="Western Sahara">Western Sahara</option>
									    <option value="Yemen">Yemen</option>
									    <option value="Yugoslavia">Yugoslavia</option>
									    <option value="Zambia">Zambia</option>
									    <option value="Zimbabwe">Zimbabwe</option>
							</select>
					   
					  </div>
			      </div>
			       <div class="row">
			          <div class="input-field col s12">
			          	<i class="material-icons prefix">person_pin</i>
			            <textarea id="textarea1" placeholder="About Me"  name="aboutme" class="materialize-textarea" data-length="120"><?php echo $u['aboutme']; ?></textarea>
			           
			          </div>
			       </div>
			       <button class="btn right" type="submit" name="updateprofile" value="update">Save</button>

			    </form>
			  </div>
            </div>
          </div>
     	</div>
     	<div class="col s12 m4">
	      
     	<div class="card">
		        
		        <form method="post" action="" enctype="multipart/form-data">
		        	<input type="file" class="dropify" name="pic" data-default-file="<?php if(isset($u['profilepic']) & !empty($u['profilepic'])){ echo $u['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" data-min-width="300" data-min-height="300" multiple="">

		   
		     	<div class="card-action">
              		<button class="btn" type="submit" name="profileSubmit" value="editprofilepic">Save</button>
          			<a href="delete.php" class="btn red">Delete</a>
            	</div>
		     	
		        </form> 
     	</div>


 


    </div>
</div>
	

<?php include 'inc/editusername.php'; ?>
<?php include 'inc/editpassword.php'; ?>


 





  


	




 







<?php include 'inc/footer.php'; ?>


