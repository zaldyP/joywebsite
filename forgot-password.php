<?php 
 
 require 'config/connect.php';



 if(isset($_POST) && !empty($_POST)){

    $input = $_POST['input'];
    $newpass = rand(999, 99999);

    $sql = "SELECT * FROM `users` WHERE ";

    if(filter_var($input,FILTER_VALIDATE_EMAIL)) {

      $sql .= "email = '$input'";
    }else {
      $sql.= "username ='$input'";
    }

    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $count = mysqli_num_rows($res);

    if($count == 1 ) {

      $r = mysqli_fetch_assoc($res);
      $email = $r['email'];
      $username = $r['username'];


      $usql = "UPDATE `users` SET password = '".md5($newpass)."', forgot_status=0 WHERE username='$username'";
      $result = mysqli_query($connection, $usql) or die(mysqli_error($connection));

      if($result){

        $smsg = "User Created Successfully.";

        require 'config/gmailcredentials.php';
          require 'PHPMailer/class.phpmailer.php';
          require 'PHPMailer/class.smtp.php'; 
          require 'PHPMailer/PHPMailerAutoload.php';
          //require 'PHPMailer/src/Exception.php';
          // require 'PHPMailer/src/PHPMailer.php';
          // require 'PHPMailer/src/SMTP.php';
          

          $mail = new PHPMailer();                              // Passing `true` enables ex
          try {
              //Server settings
              $mail->SMTPDebug = 2;                                 // Enable verbose debug output
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = $host;  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = $username;                 // SMTP username
              $mail->Password = $pass;                           // SMTP password
              $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 465;                                    // TCP port to connect to

              //Recipients
              $mail->setFrom('mechaniclady2017@gmail.com', 'mechanic_lady');
              $mail->addAddress($email, $username);     // Add a recipient
          

              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Your New Password is';
              $mail->Body    = "Your Password is $newpass";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              $mail->send();
              echo 'Message has been sent';
          } catch (Exception $e) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          }



      }



    }else{
      
      $fmsg = 'Email or Username not exist';
    
    }

 }



 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

 
  
  <link rel="stylesheet" href="css/login.css" >
  <!-- Latest compiled and minified JavaScript -->
  
</head>
<body class="login">
<div class="container">
      <div class="row main">
        <div class="panel-heading">
                 <div class="panel-title text-center">
                    
                  </div>
              </div> 
        <div class="main-login main-center">
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
          <form class="form-horizontal" method="post" action="#">

            <div class="form-group">
             
              <div class="cols-sm-12">
               
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="input" id="inputEmail" placeholder="Enter your Username or Email" required=""  />
                </div>
                
              </div>
            </div>
            

                      
           
            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Reset Password</button>
            </div>
          </form>
        </div>
      </div>

    </div>




     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      
</body>
</html>