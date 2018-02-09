

<?php 

 $email = $_SESSION['email'];

 $sql = "SELECT * FROM `users` WHERE email ='$email'";
 $res = mysqli_query($connection, $sql);
 $ucount = mysqli_num_rows($res);
 $u =  mysqli_fetch_assoc($res);

 ?>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">One</a></li>
  <li class="divider"></li>
  <li><a href="#!">two</a></li>
  <li><a href="#!">three</a></li>

</ul>

<ul id="dropdown2" class="dropdown-content">
  <li><a href="profile.php">My Profile</a></li>
  <li class="divider"></li>
  <?php  
  
  if($ucount == 1 && $u['role'] == 'writer' ){
    echo '<li><a href="writer">Works</a></li>';  
  }
  
  
  ?>
  
  <?php  
  
  if($ucount == 1 && $u['role'] == 'writer' OR $u['role'] == 'admin' ){
    echo '<li><a href="admin">Members</a></li>';  
  }
  
  
  ?>
  


  <li><a href="agreement.php">Agreement</a></li>
  <li><a href="settings.php">Settings</a></li>
  <li><a href="logout.php">Log Out</a></li>



</style>
</ul>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper margin"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
      <!--35 35 pic  -->
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><img style="height: 35px; width: 35px;" id="pic1" class="circle" src="<?php if(isset($u['profilepic']) & !empty($u['profilepic'])){ echo $u['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>"  ><span style="    position: relative;
    top: -2px;
    right: -16px; font-weight: 600; font-size: 18px; font-family: 'Source Sans Pro', sans-serif;  "><?php echo $u['username']; ?></span><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
         <li><div class="user-view">
      <div class="background">
        <header>
            <div class="profile-stats">
              
            </div>
        </header>

      </div>
      <a href="#!user"><img class="circle" src="<?php if(isset($u['profilepic']) & !empty($u['profilepic'])){ echo $u['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>"></a>
      <a href="#!name"><span class="white-text name"><?php echo $u['username']; ?></span></a>
      <a href="#!email"><span class="white-text email"><?php echo $u['email']; ?></span></a>
      
    </div></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="settings.php">Account Settings</a></li>
        <li><a href="agreement.php">Agreement</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
 