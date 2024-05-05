<?php
error_reporting(0);
require_once('include/config.php');
//require_once('include/header.php');
//include('include/header.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $Password = $_POST['password'];
    $pass = md5($Password);
    $RepeatPassword = $_POST['RepeatPassword'];

    // Email id Already Exit

    $usermatch = $dbh->prepare("SELECT mobile,email FROM tbluser WHERE (email=:usreml || mobile=:mblenmbr)");
    $usermatch->execute(array(':usreml' => $email, ':mblenmbr' => $mobile));
    while ($row = $usermatch->fetch(PDO::FETCH_ASSOC)) {
        $usrdbeml = $row['email'];
        $usrdbmble = $row['mobile'];
    }


    if (empty($fname)) {
        $nameerror = "Please Enter First Name";
    } else if (empty($mobile)) {
        $mobileerror = "Please Enter Mobile No";
    } else if (empty($email)) {
        $emailerror = "Please Enter Email";
    } else if ($email == $usrdbeml || $mobile == $usrdbmble) {
        $error = "Email Id or Mobile Number Already Exists!";
    } else if ($Password == "" || $RepeatPassword == "") {

        $error = "Password And Confirm Password Not Empty!";
    } else if ($_POST['password'] != $_POST['RepeatPassword']) {

        $error = "Password And Confirm Password Not Matched";
    } else {
        $sql = "INSERT INTO tbluser (fname,lname,email,mobile,state,city,address,password) Values(:fname,:lname,:email,:mobile,:state,:city,:address,:Password)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':lname', $lname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':Password', $pass, PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId > 0) {
            echo "<script>alert('Registration successfull. Please login');</script>";
            echo "<script> window.location.href='login.php';</script>";
        } else {
            $error = "Registration Not successfully";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Gym Management System</title>
    <meta charset="UTF-8">
    <!-- Stylesheets -->
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

        .reg_logo {
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


    <!-- Header Section -->

    <!-- Header Section end -->

    <!-- Page top Section -->


    <!-- Contact Section -->
    <!---<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($succmsg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($succmsg); ?> </div><?php } ?><br><br>
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $fname; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $lname; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $email; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="mobile" id="mobile" maxlength="10" placeholder="Mobile Number" autocomplete="off" value="<?php echo $mobile; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="state" id="state" placeholder="Your State" autocomplete="off" value="<?php echo $state; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="city" id="city" placeholder="Your City" autocomplete="off" value="<?php echo $city; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
							</div>
							<div class="col-md-6">
								<input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" autocomplete="off" required>
							</div>
							<div class="col-md-4">
						<input type="submit" id="submit" name="submit" value="Register Now" class="site-btn sb-gradient">
								
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
		</div>
	</section>-->

    <temp class="reg_logo">
        <img src="img/logo_gym.png" alt="about-image-one" width="550" height="400" />
    </temp>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($succmsg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($succmsg); ?> </div><?php } ?><br><br>
                <form class="sign-in-form" method="post">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $fname; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $lname; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="mobile" id="mobile" maxlength="10" placeholder="Mobile Number" autocomplete="off" value="<?php echo $mobile; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-globe"></i>
                        <input type="text" name="state" id="state" placeholder="Your State" autocomplete="off" value="<?php echo $state; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-home"></i>
                        <input type="text" name="city" id="city" placeholder="Your City" autocomplete="off" value="<?php echo $city; ?>" required>

                    </div>
                    <div class="input-field">
                        <i class="fas fa-home"></i>
                        <input type="text" name="address" id="address" placeholder="Your Address" autocomplete="off" value="<?php echo $address; ?>" required>

                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                        <i class="fas fa-eye" id="togglePassword" onclick="passvis()"></i>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" autocomplete="off" required>
                        <i class="fas fa-eye" id="togglePassword" onclick="passvis()"></i>
                    </div>
                    <input type="submit" id="submit" name="submit" value="Register Now" class="btn solid" />

                    <div>Already have an account? <a href="login.php">Login</a></div>
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href=" https://www.instagram.com/theiconicmuscle/" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href=" https://in.linkedin.com/in/fitness-boy-018a09255" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Trainers Section end -->



    <!-- Footer Section -->

    <!-- Footer Section end -->

    <div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

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
        var pass_vis;

        function passvis() {
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
        // function passvis(){
        //     if (pass_vis) { 
        //         document.getElementById("Repeat-Password").type = "password";
        //         document.getElementById("togglePassword").classList.remove("fa-eye");
        //         document.getElementById("togglePassword").classList.add("fa-eye-slash");
        //         pass_vis = false;
        //     } else {
        //         document.getElementById("Repea").type = "text";
        //         document.getElementById("togglePassword").classList.remove("fa-eye-slash");
        //         document.getElementById("togglePassword").classList.add("fa-eye");
        //         pass_vis = true;
        //     }
        //  }
    </script>
</body>

</html>
<style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #dd3d36;
        color: #fff;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #5cb85c;
        color: #fff;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
</style>