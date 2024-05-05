

<?php
session_start();
error_reporting(0);
require_once('include/config.php');
$msg = ""; 
if(isset($_POST['submit'])) {
  $email = trim($_POST['email']);
  $password = md5(($_POST['password']));
  if($email != "" && $password != "") {
    try {
      $query = "select id, fname, lname, email, mobile, password, address, create_date from tbluser where email=:email and password=:password";
      $stmt = $dbh->prepare($query);
      $stmt->bindParam('email', $email, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['uid']   = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['fname'];
       header("location: index.php");
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css/Login.css">
    <title>Sign in & Sign up Form</title>
    <style>
        
        #togglePassword {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <temp class="reg_logo">
        <img src="img/logo_gym.png" alt="about-image-one" width="550" height="400" />
    </temp>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
            		<?php if($error){?><div class="errorWrap" style="color:red;"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap" style="color:red;"><strong>Error</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form class="sign-in-form" method="post">
                    <h2 class="title">Log in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="pswd" required />
                        <i class="fas fa-eye" id="togglePassword" onclick="passvis()"></i>
                    </div>

                    <input type="submit" id="submit" name="submit" value="Login" class="btn solid" />
                    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
                    Do you haven't Account ? <div><a href="registration.php">Register</a></div>
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
    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });

        // Redirect to index.php after 5 seconds
        setTimeout(function() {
            window.location.href = "index.php";
        }, 5000);
    </script>
    <script>
        var pass_vis;

function passvis(){
    if (pass_vis) {
        document.getElementById("pswd").type = "password";
        document.getElementById("togglePassword").classList.remove("fa-eye");
        document.getElementById("togglePassword").classList.add("fa-eye-slash");
        pass_vis = false;
    } else {
        document.getElementById("pswd").type = "text";
        document.getElementById("togglePassword").classList.remove("fa-eye-slash");
        document.getElementById("togglePassword").classList.add("fa-eye");
        pass_vis = true;
    }
}
    </script>
</body>

</html>
