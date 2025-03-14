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
  <title>Edit Organization | ERMS</title>
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
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                        <li>
                          <a href="dashboard.php">
                            <i class="fa fa-home"></i> Home
                          </a>
                          <span class="bread-slash">/</span>
                          <a href="organization.php"> Organization </a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Edit Organization</span>
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
              <ul id="myTabedu1" class="tab-review-design">
                <li class="active">
                  <a href="#description">Edit Department</a>
                </li>
                <li><a href="#reviews"> Account Information</a></li>
                <li><a href="#INFORMATION">Social Information</a></li>
              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div
                  class="product-tab-list tab-pane fade active in"
                  id="description">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input
                                  name="number"
                                  type="text"
                                  class="form-control"
                                  placeholder="Name"
                                  value="CSE" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Head"
                                  value="John Alva" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Email"
                                  value="john@gmail.com" />
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input
                                  type="number"
                                  class="form-control"
                                  placeholder="Phone"
                                  value="01962067309" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="No. of Students"
                                  value="1500" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Status"
                                  value="Active" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="payment-adress">
                              <button
                                type="submit"
                                class="btn btn-primary waves-effect waves-light">
                                Submit
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="reviews">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div
                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Email" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="number"
                                  class="form-control"
                                  placeholder="Phone" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="password"
                                  class="form-control"
                                  placeholder="Password" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="password"
                                  class="form-control"
                                  placeholder="Confirm Password" />
                              </div>
                              <a
                                href="#!"
                                class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input
                                  type="url"
                                  class="form-control"
                                  placeholder="Facebook URL" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="url"
                                  class="form-control"
                                  placeholder="Twitter URL" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="url"
                                  class="form-control"
                                  placeholder="Google Plus" />
                              </div>
                              <div class="form-group">
                                <input
                                  type="url"
                                  class="form-control"
                                  placeholder="Linkedin URL" />
                              </div>
                              <button
                                type="submit"
                                class="btn btn-primary waves-effect waves-light">
                                Submit
                              </button>
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
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>