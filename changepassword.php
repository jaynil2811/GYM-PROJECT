<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["uid"])==0)
    {   
header('location:login.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['email'];
$sql ="SELECT password FROM tbluser WHERE email=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set password=:newpassword where email=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";	
}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System | User Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css/Register.css">
    <title>Sign in & Sign up Form</title>
    <style>
        .content {
            position: fixed;
            top: 250px;
            left: 300px;
            transform: translateX(-50%);
        }

        #togglePassword {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    cursor: pointer;
}


        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .reg_logooo {
            position: absolute;
            padding: 30px;
            top: 300px;
            transform: translateY(-50%);
            z-index: 999;
        }
    </style>

</head>
<body>
	<!-- Page Preloder -->  
	
	<!-- Page top Section end -->
    
	<!-- Contact Section -->
    <temp class="reg_logooo">
        <img src="img/logo_gym.png" alt="about-image-one" width="550" height="400" />
    </temp>
	<div class="container">
        <div class="forms-container">
            <div class="signin-signup">
            	 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form class="sign-in-form" method="post">
                    <h2 class="title"> Change Password</h2>
                    
					
                    <div class="input-field">
                        <i class="fas fa-eye"></i>
                       <input type="password" name="password" id="password" placeholder="Old Password" autocomplete="off">
                    </div>
                    
                    <div class="input-field">
                        <i class="fas fa-eye"></i>
                        <input type="password" name="newpassword" id="newpassword" placeholder="New Password" autocomplete="off">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-eye"></i>
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" autocomplete="off">
                    </div>
                    
                   

                    <input type="submit" id="submit" name="submit" value="Submit" class="btn solid" />

                    
                    <div><a href="index.php">Home</a></div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->
	
	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
<script>
    function passvis(){
    if (pass_vis) {
        document.getElementById("password").type = "password";
        document.getElementById("togglePassword").classList.remove("fa-eye");
        document.getElementById("togglePassword").classList.add("fa-eye-slash");
        pass_vis = false;
    } else {
        document.getElementById("password").type = "text";
        document.getElementById("togglePassword").classList.remove("fa-eye-slash");
        document.getElementById("togglePassword").classList.add("fa-eye");
        pass_vis = true;
    }
}
</script>
	</body>
</html>
 <?php } ?>

  <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #dd3d36;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
