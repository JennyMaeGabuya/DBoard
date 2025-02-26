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
  <title>Certificates | ERMS</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="img/mk-logo.ico" />
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


  <style>
    .clickable-container {
      display: block;
      text-decoration: none;
      color: inherit;
    }

    .courses-title {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 10px;
      border-radius: 10px;
      color: white;
      font-weight: bold;
      transition: background 0.3s ease, transform 0.2s ease;
      cursor: pointer;
    }

    /* Hover effect */
    .courses-title:hover {
      background-color: rgb(244, 244, 244);
      transform: scale(1.03);
    }

    .fixed-img {
      width: 180px;
      height: 120px;
      object-fit: cover;
      border-radius: 5px;
    }
  </style>

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
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="dashboard.php">
    <i class="fas fa-home"></i> <strong>Home</strong>
</a>
<span class="bread-slash"> / </span>
<a href="certificates.php">
    <i class="fas fa-certificate"></i> <strong>Certificates</strong>
</a>
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
            <div class="courses-inner">
              <a href="#" class="clickable-container">
                <div class="courses-title">
                  <img src="img/certificate/appointed.png" alt="" class="fixed-img" />
                  <h2>Appointed Certification</h2>
                </div>
              </a>

              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
              </div>
              <div class="buttons">
                <button type="button" class="btn btn-warning">
                  Select
                </button>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner">
              <a href="#" class="clickable-container">
                <div class="courses-title">
                  <img src="img/certificate/elected.png" alt="" class="fixed-img" />
                  <h2>Elected Certification</h2>
                </div>
              </a>

              <div class="course-des">
                <p>
                  <span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6
                  Months
                </p>
                <p>
                  <span><i class="fa fa-clock"></i></span>
                  <b>Professor:</b> Jane Doe
                </p>
              </div>
              <div class="buttons">
                <button type="button" class="btn btn-warning">
                  Select
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>