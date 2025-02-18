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
  <title>Add Employee | ERMS</title>
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
                  <li><span class="bread-blod">Add New Employee</span></li>
                </ul>
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
                <a href="#description">Basic Information</a>
              </li>
              <li><a href="#reviews"> Service Records</a></li>
              <li><a href="#INFORMATION">Compensation</a></li>
            </ul>
            <div id="myTabContent" class="tab-content custom-product-edit">
              <div
                class="product-tab-list tab-pane fade active in"
                id="description">
                <div class="row">
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                      <div id="dropzone1" class="pro-ad">
                        
                          <div class="row">
                            <div
                              class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              
                              <div class="form-group">
                                <input
                                  name="firstname"
                                  type="text"
                                  class="form-control"
                                  placeholder="Firstname" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="middlename"
                                  type="text"
                                  class="form-control"
                                  placeholder="Middlename" />
                              </div>
                             
                              <div class="form-group">
                                <input
                                  name="laststname"
                                  type="text"
                                  class="form-control"
                                  placeholder="Lastname" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="name_extension"
                                  type="text"
                                  class="form-control"
                                  placeholder="Extension Name" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="email_address"
                                  type="text"
                                  class="form-control"
                                  placeholder="Email Address" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="mobileno"
                                  type="tel"
                                  class="form-control"
                                  placeholder="Mobile no." />
                              </div>
                              <div class="form-group">
                                <input
                                  name="dob"
                                  id="finish"
                                  type="date"
                                  class="form-control"
                                  placeholder="Date of Birth" />
                              </div>
   
                            
                            </div>
                            <div
                              class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="address"
                                  type="text"
                                  class="form-control"
                                  placeholder="Address" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="department"
                                  type="text"
                                  class="form-control"
                                  placeholder="Place of Birth" />
                              </div>
                             
                              <div class="form-group">
                                <select name="gender" class="form-control">
                                  <option
                                    value="none"
                                    selected=""
                                    disabled="">
                                    Civil Status
                                  </option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Widowed">Widowed</option>
                                  <option value="Separated">Separated</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="gender" class="form-control">
                                  <option
                                    value="none"
                                    selected=""
                                    disabled="">
                                    Sex
                                  </option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                               <div class="form-group">
                                <input
                                  name="website"
                                  type="text"
                                  class="form-control"
                                  placeholder="Blood Type" />
                              </div>
                              <div class="form-group">
  <label for="formFile" class="form-label">Upload profile picture</label>
  <input class="form-control" type="file" id="formFile">
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
                  </form>
                </div>
              </div>
              <div class="product-tab-list tab-pane fade" id="reviews">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                      <div class="row">
                        <div
                          class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <form
                            id="acount-infor"
                            action="#"
                            class="acount-infor">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="email"
                                  placeholder="Email" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="phoneno"
                                  type="number"
                                  class="form-control"
                                  placeholder="Phone" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="password"
                                  type="password"
                                  class="form-control"
                                  placeholder="Password" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="confarmpassword"
                                  type="password"
                                  class="form-control"
                                  placeholder="Confirm Password" />
                              </div>
                              <a
                                href="#"
                                class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                          </form>
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