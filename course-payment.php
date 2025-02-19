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
  <title>Course Payment | ERMS</title>
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
                          <a href="all-courses.php">Courses</a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Course Payment</span>
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
    <div class="payment-cart-pro mg-b-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card payment-card responsive-mg-b-30">
              <div class="payment-inner-pro">
                <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                <h5>**** **** **** 1234</h5>
                <div class="row m-t-10">
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6">
                    <strong class="m-r-5">Expiry Date :</strong><br />20/09/17
                  </div>
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6 text-right">
                    <strong class="m-r-5">Name :</strong>Selim sha<br />
                    <strong class="m-r-5">CSV :</strong>2345
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card payment-card responsive-mg-b-30">
              <div class="payment-inner-pro">
                <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                <h5>**** **** **** 2133</h5>
                <div class="row m-t-10">
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6">
                    <strong class="m-r-5">Expiry Date :</strong><br />21/09/2020
                  </div>
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6 text-right">
                    <strong class="m-r-5">Name :</strong>John Plam<br />
                    <strong class="m-r-5">CSV :</strong>3243
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card payment-card tb-sm-res-d-n dk-res-t-d-n">
              <div class="payment-inner-pro">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                <h5>**** **** **** 3454</h5>
                <div class="row m-t-10">
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6">
                    <strong class="m-r-5">Expiry Date :</strong><br />23/09/2020
                  </div>
                  <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6 text-right">
                    <strong class="m-r-5">Name :</strong>Kabir Khan<br />
                    <strong class="m-r-5">CSV :</strong>4565
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
              <ul id="myTab4" class="tab-review-design">
                <li class="active"><a href="#description">Credit Card</a></li>
                <li><a href="#reviews"> Debit Card</a></li>
                <li><a href="#INFORMATION">EMI</a></li>
                <li><a href="#netbanking">Banking</a></li>
                <li><a href="#cod">Address</a></li>
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
                                  placeholder="Type your Full Name" />
                              </div>
                              <div class="form-group CVV">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="cvv"
                                  placeholder="CVV" />
                              </div>
                              <div class="form-group" id="card-number-field">
                                <input
                                  type="text"
                                  name="name"
                                  class="form-control"
                                  id="cardNumber"
                                  placeholder="Card Number" />
                              </div>
                              <select class="form-control mg-b-15">
                                <option>Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                              <select class="form-control">
                                <option>Select Year</option>
                                <option value="16">2016</option>
                                <option value="17">2017</option>
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                              </select>
                              <div class="payment-method-ht">
                                <span><i
                                    class="fa fa-cc-paypal"
                                    aria-hidden="true"></i></span>
                                <span><i
                                    class="fa fa-cc-visa"
                                    aria-hidden="true"></i></span>
                                <span><i
                                    class="fa fa-credit-card"
                                    aria-hidden="true"></i></span>
                                <span><i
                                    class="fa fa-cc-mastercard"
                                    aria-hidden="true"></i></span>
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
                        <select class="form-control mg-b-15">
                          <option>Select Card</option>
                          <option>ICICI Credit Card</option>
                          <option>AXIS Credit Card</option>
                          <option>HSBC Credit Card</option>
                          <option>KOTAK Credit Card</option>
                          <option>INDUSIND Credit Card</option>
                          <option>HDFC Credit Card</option>
                          <option>ICICI Debit Card</option>
                          <option>SBI Credit Card</option>
                          <option>CITIBANK Credit Card</option>
                          <option>AXIS Credit Card</option>
                        </select>
                        <select class="form-control mg-b-15">
                          <option>Select Duration</option>
                          <option>1 month</option>
                          <option>2 year</option>
                          <option>5 month</option>
                          <option>3 week</option>
                          <option>5 year</option>
                          <option>7 month</option>
                        </select>
                        <button
                          type="submit"
                          class="btn btn-primary waves-effect waves-light">
                          Submit
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="netbanking">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="review-content-section">
                            <select class="form-control mg-b-15">
                              <option>Select Bank</option>
                              <option>State bank of india</option>
                              <option>Bank of baroda</option>
                              <option>Central bank of india</option>
                              <option>Punjab national bank</option>
                              <option>Yes bank</option>
                              <option>Kotak mahindra bank</option>
                            </select>
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
                <div class="product-tab-list tab-pane fade" id="cod">
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
                                type="number"
                                class="form-control"
                                placeholder="Pincode" />
                            </div>
                          </div>
                          <div class="col-lg-6">
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
                            <input
                              type="number"
                              class="form-control"
                              placeholder="Mobile no." />
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>