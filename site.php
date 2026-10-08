<?php
include("./database.php");
include("./functions.php");
include("./header.php");

logout();

$user_id = null;
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
} elseif (isset($_SESSION["ID"])) {
    $user_id = $_SESSION["ID"];
} else {
    die("<div class='container mt-5 pt-5'><h3>User not found or ID not provided.</h3></div>");
}

$displaydata = display($conn, $user_id);
if ($displaydata && isset($displaydata[0])) {
    [$displayname, $displayage, $displayjob, $displayexperience, $displaycountry, $displaylocation, $displaynumber, $displayemail, $displayfacebook, $displaytwitter, $displayinstagram, $displaylinkedin, $displayproj_work, $displayproj_done, $displayawards, $displayclients] = $displaydata;
} else {
    $displayname = $displayage = $displayjob = $displayexperience = $displaycountry = $displaylocation = $displaynumber = $displayemail = $displayfacebook = $displaytwitter = $displayinstagram = $displaylinkedin = $displayproj_work = $displayproj_done = $displayawards = $displayclients = null;
}

$is_owner = (isset($_SESSION["ID"]) && $_SESSION["ID"] == $user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>CMS PROJECT</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css">
  <!-- Icon -->
  <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons.css">
  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
  <!-- Nivo Lightbox -->
  <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css">
  <!-- Animate -->
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>

<body>

  <!-- Header Area wrapper Starts -->
  <header id="header-wrap">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
            aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-menu"></span>
            <span class="icon-menu"></span>
            <span class="icon-menu"></span>
          </button>
          <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="onepage-nev navbar-nav mr-auto w-100 justify-content-end clearfix">
            <li class="nav-item active">
              <a class="nav-link" href="#hero-area">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">
                About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#resume">
                Resume
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolios">
                Work
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">
                Contact
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                  <?php if (isset($_SESSION["ID"])) {

                    echo '<button type="submit" class="btn btn-primary btn-block" name="logout">Log Out</button>';
                  } else {

                    echo '
    <button class="btn btn-primary btn-block">
      <a href="index.php">Login</a>
    </button>';
                  }
                  ;
                  ?>
                </form>
              </a>
            </li>
          </ul>
        </div>
      </div>


      <!-- Mobile Menu Start -->
      <ul class="onepage-nev mobile-menu">
        <li>
          <a href="#home">Home</a>
        </li>
        <li>
          <a href="#about">about</a>
        </li>
        <li>
          <a href="#services">Services</a>
        </li>
        <li>
          <a href="#resume">resume</a>
        </li>
        <li>
          <a href="#portfolio">Work</a>
        </li>
        <li>
          <a href="#contact">Contact</a>
        </li>
      </ul>
      <!-- Mobile Menu End -->
    </nav>
    <!-- Navbar End -->

    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <div class="contents">
              <h5 class="script-font wow fadeInUp" data-wow-delay="0.2s">Hi This is</h5>
              <h2 class="head-title wow fadeInUp" data-wow-delay="0.4s"><?php echo $displayname ?? "{add your name}"; ?>
              </h2>
              <p class="script-font wow fadeInUp" data-wow-delay="0.6s"><?php echo $displayjob ?? "{add your job}"; ?>
              </p>
              <ul class="social-icon wow fadeInUp" data-wow-delay="0.8s">
                <li>
                  <a class="facebook" href="<?php echo htmlspecialchars(!empty($displayfacebook) ? $displayfacebook : '#'); ?>"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                  <a class="twitter" href="<?php echo htmlspecialchars(!empty($displaytwitter) ? $displaytwitter : '#'); ?>"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                  <a class="instagram" href="<?php echo htmlspecialchars(!empty($displayinstagram) ? $displayinstagram : '#'); ?>"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                  <a class="linkedin" href="<?php echo htmlspecialchars(!empty($displaylinkedin) ? $displaylinkedin : '#'); ?>"><i class="icon-social-linkedin"></i></a>
                </li>
              </ul>
              <div class="header-button wow fadeInUp" data-wow-delay="1s">
                <a href="#" class="btn btn-common">Get a Free Quote</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Area End -->

  </header>
  <!-- Header Area wrapper End -->

  <!-- About Section Start -->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="img-thumb wow fadeInLeft" data-wow-delay="0.3s">
            <img class="img-fluid" src="assets/img/about/about-1.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="profile-wrapper wow fadeInRight" data-wow-delay="0.3s">
            <h3>Hi Guys!</h3>
            <p><?php echo $displayjob ?? "{add your jpb}"; ?></p>
            <div class="about-profile">
              <ul class="admin-profile">
                <li><span class="pro-title"> Name </span> <span
                    class="pro-detail"><?php echo $displayname ?? "{add your name}"; ?></span></li>
                <li><span class="pro-title"> Age </span> <span
                    class="pro-detail"><?php echo $displayage ?? "{add your age}"; ?></span></li>
                <li><span class="pro-title"> Experience </span> <span
                    class="pro-detail"><?php echo $displayexperience ?? "{add your experience}"; ?></span></li>
                <li><span class="pro-title"> Country </span> <span
                    class="pro-detail"><?php echo $displaycountry ?? "{add your country}"; ?></span></li>
                <li><span class="pro-title"> Location </span> <span
                    class="pro-detail"><?php echo $displaylocation ?? "{add your location}"; ?></span></li>
                <li><span class="pro-title"> e-mail </span> <span
                    class="pro-detail"><?php echo $displayemail ?? "{add your email}"; ?></span></li>
                <li><span class="pro-title"> Phone </span> <span
                    class="pro-detail"><?php echo $displaynumber ?? "{add your age}"; ?></span></li>
                <li><span class="pro-title"> Freelance </span> <span class="pro-detail">Available</span></li>
              </ul>
            </div>
            <a href="#" class="btn btn-common"><i class="icon-paper-clip"></i> Download Resume</a>
             

            <?php
            if($is_owner){
                if(isSet($displayname)){
                  echo '<a href="edit.php" class="btn btn-danger"><i class="icon-speech"></i>';
                  echo "Edit</a>";
                }else{
                  echo '<a href="adddata.php" class="btn btn-danger"><i class="icon-speech"></i>';
                  echo "Add</a>";
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Services Section Start -->
  <section id="services" class="services section-padding">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">What I do</h2>
    <div class="container">
      <div class="row">
        <!-- Services item -->
        <div class="col-md-6 col-lg-3 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.3s">
            <div class="icon">
              <i class="icon-grid"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Front-end Development</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condi.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-3 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon">
              <i class="icon-layers"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Graphic Design</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condi.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-3 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.9s">
            <div class="icon">
              <i class="icon-briefcase"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Business Branding</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condi.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-3 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
            <div class="icon">
              <i class="icon-bubbles"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Consultancy</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services Section End -->

  <!-- Resume Section Start -->
  <div id="resume" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="education wow fadeInRight" data-wow-delay="0.3s">
            <ul class="timeline">
              <li>
                <i class="icon-graduation"></i>
                <h2 class="timelin-title">Education</h2>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Bsc In CSE - Yale University</h3>
                  <span>2012 - 2016</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Higher Secondary School - San Francisco College</h3>
                  <span>2010 - 2012</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Secondary School - Labratory High School</h3>
                  <span>2005 - 2010</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="experience wow fadeInRight" data-wow-delay="0.6s">
            <ul class="timeline">
              <li>
                <i class="icon-briefcase"></i>
                <h2 class="timelin-title">Experience</h2>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Art Director - Tesla Inc.</h3>
                  <span>Jan 2018 - Present</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">UX/UI Designer - Samsung</h3>
                  <span>Nov 2016 - Dec 2017</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Intern UI Designer - UIdeck</h3>
                  <span>Mar 2015 - Oct 2016</span>
                  <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts
                    pronounce by unwilling listening. Thing do taste on we manor.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Resume Section End -->

  <!-- Portfolio Section -->
  <section id="portfolios" class="section-padding">
    <!-- Container Starts -->
    <div class="container">
      <h2 class="section-title wow flipInX" data-wow-delay="0.4s">My Remarkable Works</h2>
      <div class="row">
        <div class="col-md-12">
          <!-- Portfolio Controller/Buttons -->
          <div class="controls text-center">
            <a class="filter active btn btn-common" data-filter="all">
              All
            </a>
            <a class="filter btn btn-common" data-filter=".design">
              Design
            </a>
            <a class="filter btn btn-common" data-filter=".development">
              Development
            </a>
            <a class="filter btn btn-common" data-filter=".print">
              Print
            </a>
          </div>
          <!-- Portfolio Controller/Buttons Ends-->
        </div>

        <!-- Portfolio Recent Projects -->
        <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-1.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-1.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix design print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-2.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-2.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-3.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-3.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-4.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-4.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-5.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-5.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix print design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="assets/img/gallery/img-6.jpg" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="assets/img/gallery/img-6.jpg">
                      <i class="icon-eye"></i>
                    </a>
                    <a class="link" href="#">
                      <i class="icon-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container Ends -->
  </section>
  <!-- Portfolio Section Ends -->

  <!-- Counter Area Start-->
  <section class="counter-section section-padding">
    <div class="container">
      <div class="row">
        <!-- Counter Item -->
        <div class="col-md-3 col-sm-6 work-counter-widget text-center">
          <div class="counter wow fadeInDown" data-wow-delay="0.3s">
            <div class="icon"><i class="icon-briefcase"></i></div>
            <div class="counterUp"><?php echo htmlspecialchars($displayproj_work ?? 0); ?></div>
            <p>Project Working</p>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-3 col-sm-6 work-counter-widget text-center">
          <div class="counter wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon"><i class="icon-check"></i></div>
            <div class="counterUp"><?php echo htmlspecialchars($displayproj_done ?? 0); ?></div>
            <p>Project Done</p>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-3 col-sm-6 work-counter-widget text-center">
          <div class="counter wow fadeInDown" data-wow-delay="0.9s">
            <div class="icon"><i class="icon-diamond"></i></div>
            <div class="counterUp"><?php echo htmlspecialchars($displayawards ?? 0); ?></div>
            <p>Awards Received</p>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-3 col-sm-6 work-counter-widget text-center">
          <div class="counter wow fadeInDown" data-wow-delay="1.2s">
            <div class="icon"><i class="icon-heart"></i></div>
            <div class="counterUp"><?php echo htmlspecialchars($displayclients ?? 0); ?></div>
            <p>Happy Clients</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Counter Area End-->

  <!-- Contact Section Start -->
  <section id="contact" class="section-padding">
    <div class="contact-form">
      <div class="container">
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="contact-block">
              <h2>Contact Form</h2><br>
              <div class="text-center">
                <h2>You are using Free Version</h2>
                <h4>Please, purchase full version to get all features and pages</h4><br>
                <b>Including:</b>
                <p>- 2 Homepage Variations</p>
                <p>- All Elements and Features</p>
                <p>- Amazing Slider</p>
                <p>- Documentation File</p>
                <p>- Quick Support</p>
                <p>- Permission to Use in Commercial Projects</p>
                <p>- Footer Credit Removal</p>
                <p>- SASS Files</p>
                <br>
                <a href="http://rebrand.ly/meet-me-ud-purchase" target="_blank" class="btn btn-common btn-lg">Purchase
                  Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="footer-right-area wow fadeIn">
              <h2>Contact Address</h2>
              <div class="footer-right-contact">
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <p><?php echo htmlspecialchars(($displaylocation ?? '') . ', ' . ($displaycountry ?? '')); ?></p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <p><a href="mailto:<?php echo htmlspecialchars($displayemail ?? ''); ?>"><?php echo htmlspecialchars($displayemail ?? ''); ?></a></p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <p><a href="#"><?php echo htmlspecialchars($displaynumber ?? ''); ?></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->

  <!-- Footer Section Start -->
  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-text text-center wow fadeInDown" data-wow-delay="0.3s">
            <ul class="social-icon">
              <li>
                <a class="facebook" href="<?php echo htmlspecialchars(!empty($displayfacebook) ? $displayfacebook : '#'); ?>"><i class="icon-social-facebook"></i></a>
              </li>
              <li>
                <a class="twitter" href="<?php echo htmlspecialchars(!empty($displaytwitter) ? $displaytwitter : '#'); ?>"><i class="icon-social-twitter"></i></a>
              </li>
              <li>
                <a class="instagram" href="<?php echo htmlspecialchars(!empty($displayinstagram) ? $displayinstagram : '#'); ?>"><i class="icon-social-instagram"></i></a>
              </li>
              <li>
                <a class="linkedin" href="<?php echo htmlspecialchars(!empty($displaylinkedin) ? $displaylinkedin : '#'); ?>"><i class="icon-social-linkedin"></i></a>
              </li>
            </ul>
            <p>Copyright © 2018 <?php echo htmlspecialchars($displayname ?? 'UIdeck'); ?> All Right Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Go to Top Link -->
  <a href="#" class="back-to-top">
    <i class="icon-arrow-up"></i>
  </a>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/jquery-min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.mixitup.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/waypoints.min.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/jquery.nav.js"></script>
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/nivo-lightbox.js"></script>
  <script src="assets/js/jquery.slicknav.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>





<?php 
include("./footer.php");
?>