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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
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
                          <a href="all-employees.php"> Employees</a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">Add New Employee</span>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <form id="add-department" action="basic-info.php" method="POST" enctype="multipart/form-data" class="add-department">
                          <div class="row">
                            <div
                              class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <select name="dept" class="form-control">
                                  <option
                                    value="none"
                                    selected=""
                                    disabled="">
                                    Department
                                  </option>
                                  <option value="HRM">Human Resource Management</option>
                                  <option value="IT">Information Technology</option>
                                  <option value="MKT">Marketing</option>
                                  <option value="ACT">Accounting</option>
                                </select>
                              </div>
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
                                  name="lastname"
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
                                  name="mobile_no" id="mobile"
                                  type="tel"
                                  class="form-control"
                                  placeholder="Mobile no." required pattern="\d{11}" />
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

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input
                                  name="emp_no"
                                  type="text"
                                  class="form-control"
                                  placeholder="Employee Number" />
                              </div> 
                            <div class="form-group">
                                <input
                                  name="address"
                                  type="text"
                                  class="form-control"
                                  placeholder="Address" />
                              </div>

                              <div class="form-group">
                                <input
                                  name="pob"
                                  type="text"
                                  class="form-control"
                                  placeholder="Place of Birth" />
                              </div>

                              <div class="form-group">
                                <select name="civil_status" class="form-control">
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
                                <select name="sex" class="form-control">
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
                                <select name="blood_type" class="form-control">
                                  <option
                                    value="none"
                                    selected=""
                                    disabled="">
                                    Blood_type
                                  </option>
                                  <option value="A+">A+</option>
                                  <option value="A-">A-</option>
                                  <option value="B+">B+</option>
                                  <option value="B-">B-</option>
                                  <option value="AB+">AB+</option>
                                  <option value="AB-">AB-</option>
                                  <option value="O+">O+</option>
                                  <option value="O-">O-</option>
                                  <option value="Unknown">Unknown</option>

                                </select>
                              </div>

                              <div class="form-group">
                                <label for="formFile" class="form-label">Upload profile picture</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="payment-adress">
                                <button
                                  type="submit" name="basic-infobtn"
                                  class="btn btn-primary waves-effect waves-light">
                                  Submit
                                </button>
                              </div>
                            </div>
                          </div>

                          <script>
                            document.getElementById('mobile').addEventListener('input', function(e) {
                              const value = e.target.value;
                              if (value.length > 11) {
                                e.target.value = value.slice(0, 11); // Limit input to 11 digits
                              }
                            });
                          </script>
                          <?php if (isset($_SESSION['display'])) : ?>
                            <script>
                              Swal.fire({
                                title: '<?php echo $_SESSION['title']; ?>',
                                text: '<?php echo $_SESSION['display']; ?>',
                                icon: '<?php echo $_SESSION['success']; ?>',
                                confirmButtonText: 'OK'
                              });
                            </script>
                            <?php unset($_SESSION['display']);
                            unset($_SESSION['success']); ?>
                          <?php endif; ?>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="reviews">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <form id="add-department" action=".php" method="POST" enctype="multipart/form-data" class="add-department">
                          <div class="row">
                            <div
                              class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                              <div class="form-group">
                                <input
                                  name="gsis"
                                  type="text"
                                  class="form-control"
                                  placeholder="GSIS number" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="pag-ibig"
                                  type="text"
                                  class="form-control"
                                  placeholder="PAGIBIG number" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="date_started"
                                  type="text"
                                  class="form-control"
                                  placeholder="Date started" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="salary"
                                  type="text"
                                  class="form-control"
                                  placeholder="Salary" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="abs_wo_pay"
                                  type="text"
                                  class="form-control"
                                  placeholder="Absent without Pay" />
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="philhealth"
                                  type="text"
                                  class="form-control"
                                  placeholder="PHILHEALTH number" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="sss"
                                  type="text"
                                  class="form-control"
                                  placeholder="SSS number" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="date_ended"
                                  type="text"
                                  class="form-control"
                                  placeholder="Date Ended" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="station_place"
                                  type="text"
                                  class="form-control"
                                  placeholder="Station Place" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="date_separated"
                                  type="text"
                                  class="form-control"
                                  placeholder="Date separated" />
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="tin"
                                  type="text"
                                  class="form-control"
                                  placeholder="TIN number" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="designation"
                                  type="text"
                                  class="form-control"
                                  placeholder="Designation" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="status"
                                  type="text"
                                  class="form-control"
                                  placeholder="Status" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="branch"
                                  type="text"
                                  class="form-control"
                                  placeholder="branch" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="separation"
                                  type="text"
                                  class="form-control"
                                  placeholder="Cause of separation" />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="payment-adress">
                                <button
                                  type="submit" name="servicerecordbtn"
                                  class="btn btn-primary waves-effect waves-light">
                                  Submit
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <form id="add-department" action=".php" method="POST" enctype="multipart/form-data" class="add-department">
                          <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="salary"
                                  type="text"
                                  class="form-control"
                                  placeholder="Salary" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="pera"
                                  type="text"
                                  class="form-control"
                                  placeholder="Pera" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="rt_allowance"
                                  type="text"
                                  class="form-control"
                                  placeholder="RT Allowance" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="allowance"
                                  type="text"
                                  class="form-control"
                                  placeholder="Allowance" />
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="clothing"
                                  type="text"
                                  class="form-control"
                                  placeholder="Clothing" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="midyear"
                                  type="text"
                                  class="form-control"
                                  placeholder="mid year" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="yearend"
                                  type="text"
                                  class="form-control"
                                  placeholder="year end bonus" />
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                <input
                                  name="cash_gift"
                                  type="text"
                                  class="form-control"
                                  placeholder="Cash gift" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="incentive"
                                  type="text"
                                  class="form-control"
                                  placeholder="Incentive" />
                              </div>
                              <div class="form-group">
                                <input
                                  name="issued_date"
                                  type="text"
                                  class="form-control"
                                  placeholder="Issued date" />
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="payment-adress">
                                <button
                                  type="submit" name="compensationbtn"
                                  class="btn btn-primary waves-effect waves-light">
                                  Submit
                                </button>
                              </div>
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
        </div>
      </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>