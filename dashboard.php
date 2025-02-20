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
  <title>Dashboard | Employee Records Management System</title>
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

  <!-- Mobile Menu start -->
  <div class="mobile-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="mobile-menu">
            <nav id="dropdown">
              <ul class="mobile-menu-nav">
                <li>
                  <a data-toggle="collapse" data-target="#Charts" href="#">Home
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul class="collapse dropdown-header-top">
                    <li><a href="index.php">Dashboard v.1</a></li>
                    <li><a href="index-1.html">Dashboard v.2</a></li>
                    <li><a href="index-3.html">Dashboard v.3</a></li>
                    <li><a href="analytics.html">Analytics</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                  </ul>
                </li>
                <li><a href="events.html">Event</a></li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#demoevent"
                    href="#">Professors
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="demoevent" class="collapse dropdown-header-top">
                    <li>
                      <a href="all-professors.html">All Professors</a>
                    </li>
                    <li>
                      <a href="add-professor.html">Add Professor</a>
                    </li>
                    <li>
                      <a href="edit-professor.html">Edit Professor</a>
                    </li>
                    <li>
                      <a href="professor-profile.html">Professor Profile</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#demopro"
                    href="#">Students
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="demopro" class="collapse dropdown-header-top">
                    <li><a href="all-students.html">All Students</a></li>
                    <li><a href="add-student.html">Add Student</a></li>
                    <li><a href="edit-student.html">Edit Student</a></li>
                    <li>
                      <a href="student-profile.html">Student Profile</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#democrou"
                    href="#">Courses
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="democrou" class="collapse dropdown-header-top">
                    <li><a href="all-courses.html">All Courses</a></li>
                    <li><a href="add-course.html">Add Course</a></li>
                    <li><a href="edit-course.html">Edit Course</a></li>
                    <li>
                      <a href="course-profile.html">Courses Info</a>
                    </li>
                    <li>
                      <a href="course-payment.html">Courses Payment</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#demolibra"
                    href="#">Library
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="demolibra" class="collapse dropdown-header-top">
                    <li>
                      <a href="library-assets.html">Library Assets</a>
                    </li>
                    <li>
                      <a href="add-library-assets.html">Add Library Asset</a>
                    </li>
                    <li>
                      <a href="edit-library-assets.html">Edit Library Asset</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#demodepart"
                    href="#">Departments
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul
                    id="demodepart"
                    class="collapse dropdown-header-top">
                    <li>
                      <a href="departments.html">Departments List</a>
                    </li>
                    <li>
                      <a href="add-department.html">Add Departments</a>
                    </li>
                    <li>
                      <a href="edit-department.html">Edit Departments</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a data-toggle="collapse" data-target="#demo" href="#">Mailbox
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="demo" class="collapse dropdown-header-top">
                    <li><a href="mailbox.html">Inbox</a></li>
                    <li><a href="mailbox-view.html">View Mail</a></li>
                    <li>
                      <a href="mailbox-compose.html">Compose Mail</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#Miscellaneousmob"
                    href="#">Interface
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul
                    id="Miscellaneousmob"
                    class="collapse dropdown-header-top">
                    <li><a href="google-map.html">Google Map</a></li>
                    <li><a href="data-maps.html">Data Maps</a></li>
                    <li><a href="pdf-viewer.html">Pdf Viewer</a></li>
                    <li><a href="x-editable.html">X-Editable</a></li>
                    <li><a href="code-editor.html">Code Editor</a></li>
                    <li><a href="tree-view.html">Tree View</a></li>
                    <li><a href="preloader.html">Preloader</a></li>
                    <li>
                      <a href="images-cropper.html">Images Cropper</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#Chartsmob"
                    href="#">Charts
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="Chartsmob" class="collapse dropdown-header-top">
                    <li><a href="bar-charts.html">Bar Charts</a></li>
                    <li><a href="line-charts.html">Line Charts</a></li>
                    <li><a href="area-charts.html">Area Charts</a></li>
                    <li>
                      <a href="rounded-chart.html">Rounded Charts</a>
                    </li>
                    <li><a href="c3.html">C3 Charts</a></li>
                    <li><a href="sparkline.html">Sparkline Charts</a></li>
                    <li><a href="peity.html">Peity Charts</a></li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#Tablesmob"
                    href="#">Tables
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="Tablesmob" class="collapse dropdown-header-top">
                    <li><a href="static-table.html">Static Table</a></li>
                    <li><a href="data-table.html">Data Table</a></li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#formsmob"
                    href="#">Forms
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="formsmob" class="collapse dropdown-header-top">
                    <li>
                      <a href="basic-form-element.html">Basic Form Elements</a>
                    </li>
                    <li>
                      <a href="advance-form-element.html">Advanced Form Elements</a>
                    </li>
                    <li>
                      <a href="password-meter.html">Password Meter</a>
                    </li>
                    <li><a href="multi-upload.html">Multi Upload</a></li>
                    <li><a href="tinymc.html">Text Editor</a></li>
                    <li>
                      <a href="dual-list-box.html">Dual List Box</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#Appviewsmob"
                    href="#">App views
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul
                    id="Appviewsmob"
                    class="collapse dropdown-header-top">
                    <li>
                      <a href="basic-form-element.html">Basic Form Elements</a>
                    </li>
                    <li>
                      <a href="advance-form-element.html">Advanced Form Elements</a>
                    </li>
                    <li>
                      <a href="password-meter.html">Password Meter</a>
                    </li>
                    <li><a href="multi-upload.html">Multi Upload</a></li>
                    <li><a href="tinymc.html">Text Editor</a></li>
                    <li>
                      <a href="dual-list-box.html">Dual List Box</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    data-toggle="collapse"
                    data-target="#Pagemob"
                    href="#">Pages
                    <span
                      class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                  <ul id="Pagemob" class="collapse dropdown-header-top">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="lock.html">Lock</a></li>
                    <li>
                      <a href="password-recovery.html">Password Recovery</a>
                    </li>
                    <li><a href="404.html">404 Page</a></li>
                    <li><a href="500.html">500 Page</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    <div class="analytics-sparkle-area">
      <div class="container-fluid">
        <div class="row">

          <!-- HR Staffs Calculation / The Total Employees -->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">
                <h5>HRM Staffs</h5>
                <h2>
                  <span class="counter">
                    <?php
                    include 'actions/count-staff.php';
                    echo $totalCount;
                    ?>
                  </span>
                  <span class="tuition-fees">Total Staff</span>
                </h2>

                <?php include 'actions/count-employee.php'; ?>

                <span class="text-success"><?php echo $percentage; ?>%</span>
                <small><?php echo $totalHR; ?> out of <?php echo $totalEmployees; ?> employees</small>

                <div class="progress m-b-0">
                  <div class="progress-bar progress-bar-success"
                    role="progressbar"
                    aria-valuenow="<?php echo $percentage; ?>"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: <?php echo $percentage; ?>%;">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TO FOLLOW -->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">
                <h5>Accounting Technologies</h5>
                <h2>
                  $<span class="counter">3000</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-danger">30%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-danger"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 30%">
                    <span class="sr-only">230% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
              <div class="analytics-content">
                <h5>Electrical Engineering</h5>
                <h2>
                  $<span class="counter">2000</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-info">60%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-info"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 60%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
              <div class="analytics-content">
                <h5>Chemical Engineering</h5>
                <h2>
                  $<span class="counter">3500</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-inverse">80%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-inverse"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 80%">
                    <span class="sr-only">230% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-sales-area mg-tb-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-sales-chart">
              <div class="portlet-title">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="caption pro-sl-hd">
                      <span class="caption-subject"><b>University Earnings</b></span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="actions graph-rp graph-rp-dl">
                      <p>All Earnings are in million $</p>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-inline cus-product-sl-rp">
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #006df0"></i>CSE
                  </h5>
                </li>
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #933ec5"></i>Accounting
                  </h5>
                </li>
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #65b12d"></i>Electrical
                  </h5>
                </li>
              </ul>
              <div id="extra-area-chart" style="height: 356px"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="library-book-area mg-t-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="single-cards-item">
              <div class="single-product-image">
                <a href="#"><img src="img/product/profile-bg.jpg" alt="" /></a>
              </div>
              <div class="single-product-text">
                <img src="img/product/pro4.jpg" alt="" />
                <h4><a class="cards-hd-dn" href="#">Angela Dominic</a></h4>
                <h5>Web Designer & Developer</h5>
                <p class="ctn-cards">
                  Lorem ipsum dolor sit amet, this is a consectetur
                  adipisicing elit
                </p>
                <a class="follow-cards" href="#">Follow</a>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="cards-dtn">
                      <h3><span class="counter">199</span></h3>
                      <p>Articles</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="cards-dtn">
                      <h3><span class="counter">599</span></h3>
                      <p>Like</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="cards-dtn">
                      <h3><span class="counter">399</span></h3>
                      <p>Comment</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
              <div class="single-review-st-hd">
                <h2>Reviews</h2>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/1.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Sarah Graves</h3>
                  <p>Highly recommend</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/2.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Garbease sha</h3>
                  <p>Awesome Pro</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/3.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Gobetro pro</h3>
                  <p>Great Website</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/4.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Siam Graves</h3>
                  <p>That's Good</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/5.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Sarah Graves</h3>
                  <p>Highly recommend</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
              <div class="single-review-st-text">
                <img src="img/notification/6.jpg" alt="" />
                <div class="review-ctn-hf">
                  <h3>Julsha Grav</h3>
                  <p>Sei Hoise bro</p>
                </div>
                <div class="review-item-rating">
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star"></i>
                  <i class="educate-icon educate-star-half"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div
              class="single-product-item res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
              <div class="single-product-image">
                <a href="#"><img src="img/product/book-4.jpg" alt="" /></a>
              </div>
              <div class="single-product-text edu-pro-tx">
                <h4><a href="#">Title Demo Here</a></h4>
                <h5>
                  Lorem ipsum dolor sit amet, this is a consec tetur
                  adipisicing elit
                </h5>
                <div class="product-price">
                  <h3>$45</h3>
                  <div class="single-item-rating">
                    <i class="educate-icon educate-star"></i>
                    <i class="educate-icon educate-star"></i>
                    <i class="educate-icon educate-star"></i>
                    <i class="educate-icon educate-star"></i>
                    <i class="educate-icon educate-star-half"></i>
                  </div>
                </div>
                <div class="product-buttons">
                  <button type="button" class="button-default cart-btn">
                    Read More
                  </button>
                  <button type="button" class="button-default">
                    <i class="fa fa-heart"></i>
                  </button>
                  <button type="button" class="button-default">
                    <i class="fa fa-share"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-sales-area mg-tb-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-sales-chart">
              <div class="portlet-title">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="caption pro-sl-hd">
                      <span class="caption-subject"><b>Adminsion Statistic</b></span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="actions graph-rp actions-graph-rp">
                      <a
                        href="#"
                        class="btn btn-dark btn-circle active tip-top"
                        data-toggle="tooltip"
                        title="Refresh">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                      </a>
                      <a
                        href="#"
                        class="btn btn-blue-grey btn-circle active tip-top"
                        data-toggle="tooltip"
                        title="Delete">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-inline cus-product-sl-rp">
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #006df0"></i>Python
                  </h5>
                </li>
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #933ec5"></i>PHP
                  </h5>
                </li>
                <li>
                  <h5>
                    <i class="fa fa-circle" style="color: #65b12d"></i>Java
                  </h5>
                </li>
              </ul>
              <div id="morris-area-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sedules-area mg-b-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="analysis-progrebar">
              <div class="analysis-progrebar-content">
                <h5>Usage</h5>
                <h2 class="storage-right">
                  <span class="counter">90</span>%
                </h2>
                <div class="progress progress-mini ug-1">
                  <div style="width: 68%" class="progress-bar"></div>
                </div>
                <div class="m-t-sm small">
                  <p>Server down since 1:32 pm.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analysis-progrebar reso-mg-b-30 res-mg-t-30 table-mg-t-pro-n">
              <div class="analysis-progrebar-content">
                <h5>Memory</h5>
                <h2 class="storage-right">
                  <span class="counter">70</span>%
                </h2>
                <div class="progress progress-mini ug-2">
                  <div style="width: 78%" class="progress-bar"></div>
                </div>
                <div class="m-t-sm small">
                  <p>Server down since 12:32 pm.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analysis-progrebar reso-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
              <div class="analysis-progrebar-content">
                <h5>Data</h5>
                <h2 class="storage-right">
                  <span class="counter">50</span>%
                </h2>
                <div class="progress progress-mini ug-3">
                  <div
                    style="width: 38%"
                    class="progress-bar progress-bar-danger"></div>
                </div>
                <div class="m-t-sm small">
                  <p>Server down since 8:32 pm.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analysis-progrebar res-tablet-mg-t-30 dk-res-t-pro-30">
              <div class="analysis-progrebar-content">
                <h5>Space</h5>
                <h2 class="storage-right">
                  <span class="counter">40</span>%
                </h2>
                <div class="progress progress-mini ug-4">
                  <div
                    style="width: 28%"
                    class="progress-bar progress-bar-danger"></div>
                </div>
                <div class="m-t-sm small">
                  <p>Server down since 5:32 pm.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="courses-area mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="white-box">
              <h3 class="box-title">Browser Status</h3>
              <ul class="basic-list">
                <li>
                  Google Chrome
                  <span class="pull-right label-danger label-1 label">95.8%</span>
                </li>
                <li>
                  Mozila Firefox
                  <span class="pull-right label-purple label-2 label">85.8%</span>
                </li>
                <li>
                  Apple Safari
                  <span class="pull-right label-success label-3 label">23.8%</span>
                </li>
                <li>
                  Internet Explorer
                  <span class="pull-right label-info label-4 label">55.8%</span>
                </li>
                <li>
                  Opera mini
                  <span class="pull-right label-warning label-5 label">28.8%</span>
                </li>
                <li>
                  Mozila Firefox
                  <span class="pull-right label-purple label-6 label">26.8%</span>
                </li>
                <li>
                  Safari
                  <span class="pull-right label-purple label-7 label">31.8%</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="white-box res-mg-t-30 table-mg-t-pro-n">
              <h3 class="box-title">Visits from countries</h3>
              <ul class="country-state">
                <li>
                  <h2><span class="counter">1250</span></h2>
                  <small>From Australia</small>
                  <div class="pull-right">
                    75% <i class="fa fa-level-up text-danger ctn-ic-1"></i>
                  </div>
                  <div class="progress">
                    <div
                      class="progress-bar progress-bar-danger ctn-vs-1"
                      role="progressbar"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: 75%">
                      <span class="sr-only">75% Complete</span>
                    </div>
                  </div>
                </li>
                <li>
                  <h2><span class="counter">1050</span></h2>
                  <small>From USA</small>
                  <div class="pull-right">
                    48% <i class="fa fa-level-up text-success ctn-ic-2"></i>
                  </div>
                  <div class="progress">
                    <div
                      class="progress-bar progress-bar-info ctn-vs-2"
                      role="progressbar"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: 48%">
                      <span class="sr-only">48% Complete</span>
                    </div>
                  </div>
                </li>
                <li>
                  <h2><span class="counter">6350</span></h2>
                  <small>From Canada</small>
                  <div class="pull-right">
                    55% <i class="fa fa-level-up text-success ctn-ic-3"></i>
                  </div>
                  <div class="progress">
                    <div
                      class="progress-bar progress-bar-success ctn-vs-3"
                      role="progressbar"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: 55%">
                      <span class="sr-only">55% Complete</span>
                    </div>
                  </div>
                </li>
                <li>
                  <h2><span class="counter">950</span></h2>
                  <small>From India</small>
                  <div class="pull-right">
                    33% <i class="fa fa-level-down text-success ctn-ic-4"></i>
                  </div>
                  <div class="progress">
                    <div
                      class="progress-bar progress-bar-success ctn-vs-4"
                      role="progressbar"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: 33%">
                      <span class="sr-only">33% Complete</span>
                    </div>
                  </div>
                </li>
                <li>
                  <h2><span class="counter">3250</span></h2>
                  <small>From Bangladesh</small>
                  <div class="pull-right">
                    60% <i class="fa fa-level-up text-success ctn-ic-5"></i>
                  </div>
                  <div class="progress">
                    <div
                      class="progress-bar progress-bar-inverse ctn-vs-5"
                      role="progressbar"
                      aria-valuenow="50"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: 60%">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div
              class="courses-inner res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
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
        </div>
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>