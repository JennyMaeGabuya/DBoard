<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Add Courses | ERMS</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/owl.theme.css" />
  <link rel="stylesheet" href="css/owl.transitions.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/meanmenu.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/educate-custon-icon.css" />
  <link rel="stylesheet" href="css/morrisjs/morris.css" />
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css" />
  <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css" />
  <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css" />
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <!--Sidebar-part-->
  <?php include 'includes/sidebar.php'; ?>

  <!--Header-part-->
  <?php include 'includes/header.php'; ?>

  <!-- Mobile Menu end -->
  <div class="breadcome-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcome-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcome-heading">
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                        <li>
                          <a href="dashboard.php">
                            <i class="fa fa-home"></i> Home
                          </a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Courses</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="courses-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner res-mg-b-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/1.jpg" alt="" /></a>
                <h2>Apps Development</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner">
              <div class="courses-title">
                <a href="#"><img src="img/courses/2.jpg" alt="" /></a>
                <h2>Illustrator CC 2018</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner res-mg-t-30 dk-res-t-pro-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/3.jpg" alt="" /></a>
                <h2>Indesign cs6 2018</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner res-mg-t-30 dk-res-t-pro-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/1.jpg" alt="" /></a>
                <h2>Web Development</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mg-b-15">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner mg-t-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/1.jpg" alt="" /></a>
                <h2>Apps Development</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner mg-t-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/2.jpg" alt="" /></a>
                <h2>Illustrator CC 2018</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner mg-t-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/3.jpg" alt="" /></a>
                <h2>Indesign cs6 2018</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner mg-t-30">
              <div class="courses-title">
                <a href="#"><img src="img/courses/1.jpg" alt="" /></a>
                <h2>Web Development</h2>
              </div>
              <div class="courses-alaltic">
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span>
                  1 Year</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span>
                  50</span>
                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span>
                  500</span>
              </div>
              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Students:</b> 100+
                </p>
              </div>
              <div class="product-buttons">
                <button type="button" class="button-default cart-btn">
                  Read More
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>