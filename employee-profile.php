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
  <title>Employee Profile | ERMS</title>
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
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                        <li>
                          <a href="dashboard.php">
                            <i class="fa fa-home"></i> Home
                          </a>
                          <span class="bread-slash">/</span>
                          <a href="all-employees.php"> Employees </a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Employee Profile</span>
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
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="profile-info-inner">
              <div class="profile-img">
                <img src="img/profile/1.jpg" alt="" />
              </div>
              <div class="profile-details-hr">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                      <p>
                        <b>Name</b><br />
                        Fly Zend
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Designation</b><br />
                        Head of Dept.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                      <p>
                        <b>Email ID</b><br />
                        fly@gmail.com
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Phone</b><br />
                        +01962067309
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="address-hr">
                      <p>
                        <b>Address</b><br />
                        E104, catn-2, Chandlodia Ahmedabad Gujarat, UK.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <h3>500</h3>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <h3>900</h3>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <h3>600</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div
              class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
              <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Activity</a></li>
                <li><a href="#reviews"> Biography</a></li>
                <li><a href="#INFORMATION">Update Details</a></li>
              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div
                  class="product-tab-list tab-pane fade active in"
                  id="description">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="chat-discussion" style="height: auto">
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/1.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Michael Smith
                              </a>
                              <span class="message-date">
                                Mon Jan 26 2015 - 18:39:23
                              </span>
                              <span class="message-content">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-success"><i class="fa fa-heart"></i> Love</a>
                              </div>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/2.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Karl Jordan
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                Many desktop publishing packages and web page
                                editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum'
                                will uncover.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                              </div>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/3.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Michael Smith
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                There are many variations of passages of Lorem
                                Ipsum available, but the majority have
                                suffered alteration.
                              </span>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/4.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Alice Jordan
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                All the Lorem Ipsum generators on the Internet
                                tend to repeat predefined chunks as necessary,
                                making this the first true generator on the
                                Internet. It uses a dictionary of over 200
                                Latin words.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Nudge</a>
                              </div>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/1.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Mark Smith
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                All the Lorem Ipsum generators on the Internet
                                tend to repeat predefined chunks as necessary,
                                making this the first true generator on the
                                Internet. It uses a dictionary of over 200
                                Latin words.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-success"><i class="fa fa-heart"></i> Love</a>
                              </div>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/2.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Karl Jordan
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                Many desktop publishing packages and web page
                                editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum'
                                will uncover.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                              </div>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/3.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Michael Smith
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                There are many variations of passages of Lorem
                                Ipsum available, but the majority have
                                suffered alteration.
                              </span>
                            </div>
                          </div>
                          <div class="chat-message">
                            <div class="profile-hdtc">
                              <img
                                class="message-avatar"
                                src="img/contact/4.jpg"
                                alt="" />
                            </div>
                            <div class="message">
                              <a class="message-author" href="#">
                                Alice Jordan
                              </a>
                              <span class="message-date">
                                Fri Jan 25 2015 - 11:12:36
                              </span>
                              <span class="message-content">
                                All the Lorem Ipsum generators on the Internet
                                tend to repeat predefined chunks as necessary,
                                making this the first true generator on the
                                Internet. It uses a dictionary of over 200
                                Latin words.
                              </span>
                              <div class="m-t-md mg-t-10">
                                <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like
                                </a>
                                <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                              </div>
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
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Full Name</b><br />
                                Fly Zend
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Mobile</b><br />
                                01962067309
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Email</b><br />
                                fly@gmail.com
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Location</b><br />
                                UK
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="content-profile">
                              <p>
                                Donec pede justo, fringilla vel, aliquet nec,
                                vulputate eget, arcu. In enim justo, rhoncus
                                ut, imperdiet a, venenatis vitae, justo.
                                Nullam dictum felis eu pede mollis pretium.
                                Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate
                                eleifend tellus. Aenean leo ligula, porttitor
                                eu, consequat vitae, eleifend ac, enim.
                              </p>
                              <p>
                                Donec pede justo, fringilla vel, aliquet nec,
                                vulputate eget, arcu. In enim justo, rhoncus
                                ut, imperdiet a, venenatis vitae, justo.
                                Nullam dictum felis eu pede mollis pretium.
                                Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate
                                eleifend tellus. Aenean leo ligula, porttitor
                                eu, consequat vitae, eleifend ac, enim.
                              </p>
                              <p>
                                Donec pede justo, fringilla vel, aliquet nec,
                                vulputate eget, arcu. In enim justo, rhoncus
                                ut, imperdiet a, venenatis vitae, justo.
                                Nullam dictum felis eu pede mollis pretium.
                                Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate
                                eleifend tellus. Aenean leo ligula, porttitor
                                eu, consequat vitae, eleifend ac, enim.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Skill Set</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Java</h2>
                              <div class="progress progress-mini">
                                <div
                                  style="width: 90%"
                                  class="progress-bar progress-yellow"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Php</h2>
                              <div class="progress progress-mini">
                                <div
                                  style="width: 80%"
                                  class="progress-bar progress-green"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Apps</h2>
                              <div class="progress progress-mini">
                                <div
                                  style="width: 70%"
                                  class="progress-bar progress-blue"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>C#</h2>
                              <div class="progress progress-mini">
                                <div
                                  style="width: 60%"
                                  class="progress-bar progress-red"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Education</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Experience</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Subjects</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem
                                  ipsum dolor sit amet, consectetur adipiscing
                                  elit.
                                </li>
                              </ul>
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
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input
                                name="number"
                                type="text"
                                class="form-control"
                                placeholder="First Name" />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Address" />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Date of Birth" />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Department" />
                            </div>
                            <div class="form-group">
                              <input
                                type="number"
                                class="form-control"
                                placeholder="Pincode" />
                            </div>
                            <div class="file-upload-inner ts-forms">
                              <div class="input prepend-big-btn">
                                <label
                                  class="icon-right"
                                  for="prepend-big-btn">
                                  <i class="fa fa-download"></i>
                                </label>
                                <div class="file-button">
                                  Browse
                                  <input
                                    type="file"
                                    onchange="document.getElementById('prepend-big-btn').value = this.value;" />
                                </div>
                                <input
                                  type="text"
                                  id="prepend-big-btn"
                                  placeholder="no file selected" />
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div
                              class="form-group sm-res-mg-15 tbpf-res-mg-15">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Description" />
                            </div>
                            <div class="form-group">
                              <select class="form-control">
                                <option>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <select class="form-control">
                                <option>Select country</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Amerika</option>
                                <option>China</option>
                                <option>Dubai</option>
                                <option>Nepal</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <select class="form-control">
                                <option>Select state</option>
                                <option>Gujarat</option>
                                <option>Maharastra</option>
                                <option>Rajastan</option>
                                <option>Maharastra</option>
                                <option>Rajastan</option>
                                <option>Gujarat</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <select class="form-control">
                                <option>Select city</option>
                                <option>Surat</option>
                                <option>Baroda</option>
                                <option>Navsari</option>
                                <option>Baroda</option>
                                <option>Surat</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Website URL" />
                            </div>
                            <input
                              type="number"
                              class="form-control"
                              placeholder="Mobile no." />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="payment-adress mg-t-15">
                              <button
                                type="submit"
                                class="btn btn-primary waves-effect waves-light mg-b-15">
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