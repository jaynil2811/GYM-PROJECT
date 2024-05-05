<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];


    $sql = "INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Package has been booked.');</script>";
    echo "<script>window.location.href='booking-history.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Gym Management System</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ahana Yoga HTML Template">
    <meta name="keywords" content="yoga, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/animate.css" />



    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/css/font-awesome.css">

    <link rel="stylesheet" href="css/css/index.css">

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        #logo_chatbot {
            width: 60px;
            height: auto;
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #logo_chatbot:hover {
            transform: scale(1.4);
        }

        #logo_ws {
            width: 60px;
            height: auto;
            position: fixed;
            bottom: 100px;
            right: 20px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #logo_ws:hover {
            transform: scale(1.4);
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->


    <!-- Header Section -->
    <?php include 'include/header.php'; ?>
    <!-- Header Section end -->

    <!-- Whatsapp -->
    <a href="https://api.whatsapp.com/send/?phone=+919574701397&text=I%27m+interested+in+your+car+for+sale&type=phone_number&app_absent=0" id="ws">
        <img src="img/ws_logo.png" id="logo_ws" alt="ws Logo">
    </a>
    <!-- chat-Bot -->
    <a href="chatbot.html" id="chatbot-link">
        <img src="img/chatbot.png" id="logo_chatbot" alt="Chatbot Logo">
    </a>

    <div id="chatbot-container"></div>



    <!--vedio-->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="images/gym-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>work harder, get stronger</h6>
                <h2>easy with our <em>gym</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="Login.php">Become a member</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Welcome to <em>Our GYM</em></h2>
                        <img src="images/line-dec.png" alt="waves">
                        <p>Training Studio is free CSS template for gyms and fitness centers. You are allowed to use this layout for your business website.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>Please do not re-distribute this template ZIP file on any template collection website. This is not allowed.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>New Gym Training</h4>
                                <p>If you wish to support TemplateMo website via PayPal, please feel free to contact us. We appreciate it a lot.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>Credit goes to <a rel="nofollow" href="https://www.pexels.com" target="_blank">Pexels website</a> for images and video background used in this HTML template.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>Advanced Muscle Course</h4>
                                <p>You may want to browse through <a rel="nofollow" href="https://templatemo.com/tag/digital-marketing" target="_parent">Digital Marketing</a> or <a href="https://templatemo.com/tag/corporate">Corporate</a> HTML CSS templates on our website.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>This template is built on Bootstrap v4.3.1 framework. It is easy to adapt the columns and sections.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="images/features-first-icon.png" alt="gym training">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>Suspendisse fringilla et nisi et mattis. Curabitur sed finibus nisi. Integer nibh sapien, vehicula et auctor.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action" style="background-image: url('images/cta-bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p>"Join our gym today and embark on a transformative journey towards a stronger, healthier, and more empowered version of yourself. Together, let's sculpt your dreams into reality, one workout at a time."</p>
                        <div class="main-button scroll-to-section">
                            <a href="#our-classes">Become a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->



    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Classes</em></h2>
                        <img src="images/line-dec.png" alt="">
                        <p>Fitness classes at the gym can significantly boost motivation and adherence to exercise routines? Research shows that the camaraderie, accountability, and friendly competition fostered in group settings can lead to greater commitment and enjoyment of workouts. So, joining a gym class not only enhances physical fitness but also creates a supportive environment for achieving your health goals!</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><img src="images/tabs-first-icon.png" alt="">First Training Class</a></li>
                        <li><a href='#tabs-2'><img src="images/tabs-first-icon.png" alt="">Second Training Class</a></a></li>
                        <li><a href='#tabs-3'><img src="images/tabs-first-icon.png" alt="">Third Training Class</a></a></li>
                        <li><a href='#tabs-4'><img src="images/tabs-first-icon.png" alt="">Fourth Training Class</a></a></li>
                        <div class="main-rounded-button"><a href="#schedule">View All Schedules</a></div>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="images/training-image-01.jpg" alt="First Class">
                            <h4>First Training Class</h4>
                            <p>For our first training class, let's start strong by focusing on fundamental movements, proper form, and building a solid fitness foundation. Together, we'll lay the groundwork for your journey, ensuring you feel confident, empowered, and ready to take on new challenges ahead.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <img src="images/training-image-02.jpg" alt="Second Training">
                            <h4>Second Training Class</h4>
                            <p>In our second training class, we'll push boundaries, break through plateaus, and unlock the next level of your fitness potential. Get ready to elevate your journey and redefine what's possible.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <img src="images/training-image-03.jpg" alt="Third Class">
                            <h4>Third Training Class</h4>
                            <p>In our third training class, we'll delve into advanced techniques, refine your form, and amplify your results. Prepare to challenge yourself, embrace the process, and emerge stronger than ever before.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <img src="images/training-image-04.jpg" alt="Fourth Training">
                            <h4>Fourth Training Class</h4>
                            <p>In our fourth training class, we'll focus on optimizing your performance, fine-tuning your skills, and pushing past limitations. Get ready to harness your full potential, conquer new milestones, and set the stage for lasting success.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->


    <section class="section" id="schedule" style="background-image: url('images/cta-bg.jpg');">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Classes <em>Schedule</em></h2>
                        <img src="images/line-dec.png" alt="">
                        <p>Fitness classes at the gym can significantly boost motivation and adherence to exercise routines? Research shows that the camaraderie, accountability, and friendly competition fostered in group settings can lead to greater commitment and enjoyment of workouts. So, joining a gym class not only enhances physical fitness but also creates a supportive environment for achieving your health goals!</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="filters">

                        <ul class="schedule-filter">
                            <li class="active" data-tsfilter="monday">Monday</li>
                            <li data-tsfilter="tuesday">Tuesday</li>
                            <li data-tsfilter="wednesday">Wednesday</li>
                            <li data-tsfilter="thursday">Thursday</li>
                            <li data-tsfilter="friday">Friday</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <?php
                                include  'include/config.php';
                                $sql = "SELECT * FROM schedule";
                                $query = $dbh->prepare($sql);

                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {
                                ?>
                                        <tr>

                                            <td class="day-time"><?php echo $result->class ?></td>
                                            <td class="<?php echo $result->day ?> ts-item show" data-tsmeta="<?php echo $result->day ?>"><?php echo $result->time ?>--<?php echo $result->to_time ?></td>
                                            <td><?php echo $result->trainer_name ?></td>
                                        </tr>
                                <?php $cnt = $cnt + 1;
                                    }
                                } ?>
                                <!-- <tr>
                                    <td class="day-time">Muscle Training</td>
                                    <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Paul D. Newman</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Body Building</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                    <td>Boyd C. Harris</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga Training Class</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Hector T. Daigle</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Advanced Training</td>
                                    <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                    <td>Bret D. Bowers</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ***** Testimonials Starts ***** -->

    <section class="section" id="trainers">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading" id="red_zp">
                        <h2>Expert <em>Trainers</em></h2>
                        <img src="images/line-dec.png" alt="">
                        <p>Fitness classes at the gym can significantly boost motivation and adherence to exercise routines? Research shows that the camaraderie, accountability, and friendly competition fostered in group settings can lead to greater commitment and enjoyment of workouts. So, joining a gym class not only enhances physical fitness but also creates a supportive environment for achieving your health goals!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php

                $sql = "SELECT * from trainer";
                $query = $dbh->prepare($sql);
                //$query->bindParam(':uid',$uid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {                ?>
                        <div class="col-lg-4">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="img/trainer_logo.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span>Strength Trainer</span>
                                    <h4><?php echo $result->trainer_name; ?></h4>
                                    <p>Trainer Provided by THE ICONIC MUSCLE GYM with 3+ Years of Experience</p>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
                <!--  <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="images/second-trainer.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Muscle Trainer</span>
                            <h4>Hector T. Daigl</h4>
                            <p>Trainer Provided by THE ICONIC MUSCLE GYM with 3+  Years off Experience</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="images/third-trainer.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Power Trainer</span>
                            <h4>Paul D. Newman</h4>
                            <p>Trainer Provided by THE ICONIC MUSCLE GYM with 3+  Years off Experience</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>

    </section>

    <!-- ***** Testimonials Ends ***** -->


    <!-- Pricing Section -->
    <section class="pricing-section spad" id="plan">
        <div class="container">
            <div class="section-title text-center">
                <img src="img/icons/logo-icon.png" alt="">
                <h2>Pricing plans</h2>
                <p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
            </div>
            <div class="row">
                <?php

                $sql = "SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date from tbladdpackage";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="pricing-item begginer">
                                <div class="pi-top">
                                    <h4><?php echo $result->titlename; ?></h4>
                                </div>
                                <div class="pi-price">
                                    <h3><?php echo htmlentities($result->Price); ?></h3>
                                    <p> <?php echo $result->PackageDuratiobn; ?></p>
                                </div>
                                <ul>
                                    <?php echo $result->Description; ?>

                                </ul>
                                <?php if (strlen($_SESSION['uid']) == 0) : ?>
                                    <a href="login.php" class="site-btn sb-line-gradient">Booking Now</a><br><br>
                                    <a href="https://pages.razorpay.com/pl_Nu9R78Zq9Xqcc2/view" class="site-btn sb-line-gradient"> payment</a>
                                <?php else : ?>
                                    
                                
                                    <!-- <a href="#" class="site-btn sb-line-gradient">Booking Now</a> -->
                                    <form method='post'>
                                        <input type='hidden' name='pid' value='<?php echo htmlentities($result->id); ?>'>

                                        <input class='site-btn sb-line-gradient' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');">
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php $cnt = $cnt + 1;
                    }
                } ?>
            </div>
        </div>
    </section>
    <!-- Pricing Section Ends-->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="background-image: url('images/cta-bg.jpg');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14689.71185458193!2d72.5605171!3d23.0080536!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e85dd19c66e45%3A0x3a63f4cee0e7d3a1!2sTHE%20ICONIC%20MUSCLE!5e0!3m2!1sen!2sin!4v1714362208144!5m2!1sen!2sin" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text" id="subject" placeholder="Subject">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

    <!-- Footer Section -->
    <?php include 'include/footer.php'; ?>
    <!-- Footer Section end -->

    <div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

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






    <script src="js/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/waypoints.min.js"></script>
    <script src="js/js/jquery.counterup.min.js"></script>
    <script src="js/js/imgfix.min.js"></script>
    <script src="js/js/mixitup.js"></script>
    <script src="js/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="js/js/custom.js"></script>

</body>

</html>