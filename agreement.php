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


?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<style type="text/css">
	body {
		background: #ebebeb;
	}
</style>
<div class="container" style="margin-top: 30px">
<div class="row">
        <div class="col s12  m9 push-m2">
          <div class="card">
            <div class="card-content">
              
            <p>Confendiality Agreement</p><br><br><br>

				 <p class="center-align"><b>VIP MEMBERSHIP</b></p> 
				 <p class="center-align"><b>PLEDGE OF CONFIDENTIALITY</b></p><br><br>

				 <p style="text-align: justify;
    text-justify: inter-word;">This is certify that I, 


				<?php  
				 	if(empty($u['username'] == '') AND !empty($u['firstname'] == '') AND !empty($u['lastname'] == '')){
				 		 		echo '<span class="agreement">'.$u['username'].' </span>,'; 
				 	}else if(empty($u['username'] == '') AND empty($u['firstname'] == '') AND empty($u['lastname'] == '')){

						echo '<span class="agreement">'.$u['firstname'].' ' . $u['lastname'].'</span>';
				 	}
				 		 
				 		
					 
					
						
					


				 		
				 			
				 		 
				 ?>


				 a legitimate member of Mechanics Lady's VIP  perfectly understand that any information posted within the organization(verbal, written or either in forms) from the date it was created will remain confidential to the members of the organization. This includes all the writings of Joy Natividad as mechanic_lady, who has full ownership of all her claimed works in Wattpad, personal information of all members of the organization and post made by the members within the organization.</p><br>

				 <p style="text-align: justify;
    text-justify: inter-word;">I understand that any auhtorized release of information but not limited to,
				 as stated above is form of breach of this pledge of confidentiality. And thus, breach of this contract is ground of dismisal of membership of the said organization.</p><br>


				 <p style="text-align: justify;
    text-justify: inter-word;"><b>MEMBERSHIP TERMS AND AGREEMENT</b>. The members accepted in this group hereby undertake no to distribute, copy, dissiminate or share any information, and post published herein. All of the information contained within the group page belongs to exclusively to the group and not for public consumption or non members enjoyment. Any violation of this agreement will be penalized and punished by under by prevailing law.</p><br><br>


				 <p><b>Creator/Author:</b></p>

				 <p><em><b>Joy Natividad</b></em></p>
		

            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>
      </div>



 







<?php include 'inc/footer.php'; ?>