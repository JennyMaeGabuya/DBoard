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
  <title>Issue Certificate | ERMS</title>
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
    .selection-btn {
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-left: 5px;
      padding: 10px 20px;
      border-radius: 30px;
      font-size: 14px;
      font-weight: bold;
      background: rgb(251, 251, 251);
      border: 2px solid #ddd;
      color: #333;
      transition: all 0.3s ease-in-out;
    }

    .selection-btn i {
      font-size: 16px;
      transition: color 0.3s ease-in-out;
    }

    .selection-btn:hover {
      background: #f5f5f5;
    }

    /* Selected styles for each button */
    #appointed-btn.selected {
      background: #b3d1ff !important;
      border-color: #6ea8fe;
      color: #0047ab !important;
      box-shadow: 0px 4px 10px rgba(179, 209, 255, 0.7);
    }

    #appointed-btn.selected i {
      color: #0047ab !important;
    }

    #elected-btn.selected {
      background: #b6e2a1 !important;
      border-color: #6ecb63;
      color: #2b7300 !important;
      box-shadow: 0px 4px 10px rgba(182, 226, 161, 0.7);
    }

    #elected-btn.selected i {
      color: #2b7300 !important;
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
          <div class="breadcome-list single-page-breadcome">
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
                          <a href="certifications.php">Certificates</a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Issue Certificate</span>
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

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
              <div class="container text-center mt-4">
                <!-- Appointed Button -->
                <button class="selection-btn" id="appointed-btn" onclick="selectRole('appointed')">
                  Appointed
                </button>

                <!-- Elected Button -->
                <button class="selection-btn" id="elected-btn" onclick="selectRole('elected')">
                  Elected
                </button>
              </div>


              <!-- JavaScript to Handle Selection -->
              <script>
                function selectRole(role) {
                  // Remove 'selected' class from all buttons
                  document.querySelectorAll('.selection-btn').forEach(btn => {
                    btn.classList.remove('selected');
                  });

                  // Add 'selected' class to the clicked button
                  document.getElementById(role + '-btn').classList.add('selected');
                }
              </script>

              <ul id="myTab4" class="tab-review-design">
                <li class="active"><a href="#description">Information</a></li>
              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div
                  class="product-tab-list tab-pane fade active in"
                  id="description">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="demo-container">
                          <div class="card-wrapper"></div>
                          <form class="payment-form mg-t-30">
                            <div class="form-group">
                              <input
                                name="number"
                                type="tel"
                                class="form-control"
                                placeholder="Card Number" />
                            </div>
                            <div class="form-group">
                              <input
                                name="name"
                                type="text"
                                class="form-control"
                                placeholder="Full Name" />
                            </div>
                            <div class="form-group">
                              <input
                                name="expiry"
                                type="tel"
                                class="form-control"
                                placeholder="MM/YY" />
                            </div>
                            <div class="form-group">
                              <input
                                name="cvc"
                                type="number"
                                class="form-control"
                                placeholder="CVC" />
                            </div>
                            <div class="text-center credit-card-custom">
                              <a
                                href="#!"
                                class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>