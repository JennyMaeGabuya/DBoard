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
  <title>Course Information | ERMS</title>
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
          <div class="breadcome-list single-page-breadcome">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcome-heading">
                  <form role="search" class="sr-input-func">
                    <input
                      type="text"
                      placeholder="Search..."
                      class="search-int form-control" />
                    <a href="#"><i class="fa fa-search"></i></a>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="breadcome-menu">
                  <li>
                    <a href="#">Home</a>
                    <span class="bread-slash">/</span>
                  </li>
                  <li><span class="bread-blod">Course Info</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="blog-details-area mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="blog-details-inner">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="latest-blog-single blog-single-full-view">
                  <div class="blog-image">
                    <a href="#"><img src="img/blog-details/1.jpg" alt="" />
                    </a>
                    <div class="blog-date">
                      <p><span class="blog-day">20</span> May</p>
                    </div>
                  </div>
                  <div class="blog-details blog-sig-details">
                    <div
                      class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                      <span><a href="#"><i class="fa fa-user"></i>
                          <b>Course Name:</b> Web Development</a></span>
                      <span><a href="#"><i class="fa fa-heart"></i>
                          <b>Course Price:</b> $3000</a></span>
                      <span><a href="#"><i class="fa fa-comments-o"></i>
                          <b>Professor Name:</b> Alva Adition</a></span>
                    </div>
                    <h1>
                      <a class="blog-ht" href="#">Courses Info Dummy Title</a>
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed do eiusmod tempor incididunt ut labore et
                      dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi ut aliquip
                      ex ea commodo consequat. Duis aute irure dolor in
                      reprehenderit in voluptate velit esse cillum dolore eu
                      fugiat nulla pariatur.
                    </p>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed do eiusmod tempor incididunt ut labore et
                      dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi ut aliquip
                      ex ea commodo consequat. Duis aute irure dolor in
                      reprehenderit in voluptate velit esse cillum dolore eu
                      fugiat nulla pariatur. Excepteur sint occaecat
                      cupidatat non proident, sunt in culpa qui officia
                      deserunt mollit anim id est laborum. Sed ut
                      perspiciatis unde omnis iste natus error sit
                      voluptatem accusantium doloremque laudantium, totam
                      rem aperiam, eaque ipsa quae ab illo inventore
                      veritatis et quasi architecto beatae vitae dicta sunt
                      explicabo.
                    </p>
                    <p>
                      Nemo enim ipsam voluptatem quia voluptas sit
                      aspernatur aut odit aut fugit, sed quia consequuntur
                      magni dolores eos qui ratione voluptatem sequi
                      nesciunt. Neque porro quisquam est, qui dolorem ipsum
                      quia dolor sit amet, consectetur, adipisci velit, sed
                      quia non numquam eius modi tempora incidunt ut labore
                      et dolore magnam aliquam quaerat voluptatem.
                    </p>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed do eiusmod tempor incididunt ut labore et
                      dolore magna aliqua. Ut enim ad im veniam, quis
                      nostrud exercitation ullamco laboris nisi ut aliquip
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="comment-head">
                  <h3>Comments</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="user-comment">
                  <img src="img/contact/1.jpg" alt="" />
                  <div class="comment-details">
                    <h4>
                      Jonathan Doe 2015 15 July
                      <span class="comment-replay">Replay</span>
                    </h4>
                    <p>
                      Shabby chic selfies pickled Tumblr letterpress iPhone.
                      Wolf vegan retro selvage literally
                      <span class="mobile-sm-d-n">Wes Anderson ethical four loko. Meggings blog
                        chambray tofu pour-over. Pour-over Tumblr keffiyeh,
                        cornhole whatever cardigan Tonx lomo.Shabby.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="user-comment admin-comment">
                  <img src="img/contact/2.jpg" alt="" />
                  <div class="comment-details">
                    <h4>
                      Jonathan Doe 2015 15 July
                      <span class="comment-replay">Replay</span>
                    </h4>
                    <p>
                      Shabby chic selfies pickled Tumblr letterpress iPhone.
                      Wolf vegan retro selvage literally
                      <span class="mobile-sm-d-n">Wes Anderson ethical four loko. Meggings blog
                        chambray tofu pour-over. Pour-over Tumblr keffiyeh,
                        cornhole whatever cardigan Tonx lomo.Shabby.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="user-comment user-coment2">
                  <img src="img/contact/3.jpg" alt="" />
                  <div class="comment-details">
                    <h4>
                      Jonathan Doe 2015 15 July
                      <span class="comment-replay">Replay</span>
                    </h4>
                    <p>
                      Shabby chic selfies pickled Tumblr letterpress iPhone.
                      Wolf vegan retro selvage literally Wes Anderson
                      <span class="mobile-sm-d-n">ethical four loko. Meggings blog chambray tofu
                        pour-over. Pour-over Tumblr keffiyeh, cornhole
                        whatever cardigan Tonx lomo.Shabby.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="lead-head">
                  <h3>Leave A Comment</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="coment-area">
                <form id="comment" action="#" class="comment">
                  <div
                    class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-res-mg-bt">
                    <div class="form-group">
                      <input
                        name="name"
                        class="responsive-mg-b-10"
                        type="text"
                        placeholder="Name" />
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input name="email" type="text" placeholder="Email" />
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <textarea
                        name="message"
                        cols="30"
                        rows="10"
                        placeholder="Message"></textarea>
                    </div>
                    <div class="payment-adress comment-stn">
                      <button
                        type="submit"
                        class="btn btn-primary waves-effect waves-light">
                        Send
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>