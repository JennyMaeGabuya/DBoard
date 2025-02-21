<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

// Include the database connection file
include_once "dbcon.php";

// Check if the database connection is established
if (!isset($conn) || !$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Set the employee_no for the admin
$employee_no = 'HRM-ADMIN'; // This is the specific employee_no for the admin

// Fetch user data from the database using the specified employee_no
$query = "SELECT 
    e.employee_no,
    e.firstname,
    e.middlename,
    e.lastname,
    e.name_extension,
    e.email_address,
    e.mobile_no,
    e.dob,
    e.address,
    e.pob,
    e.civil_status,
    e.sex,
    e.blood_type,
    e.image,
    s.designation,
    g.gsis_no,
    g.pag_ibig_no,
    g.philhealth_no,
    g.tin_no,
    g.sss_no,
    s.from_date,
    s.to_date,
    s.status,
    s.salary,
    s.station_place,
    s.branch,
    s.abs_wo_pay,
    s.date_separated,
    s.cause_of_separation,
    c.salary AS compensation_salary,
    c.pera,
    c.clothing,
    c.cash_gift,
    c.mid_year,
    c.productivity_incentive,
    c.rt_allowance,
    c.year_end_bonus,
    c.issued_date,
    c.allowance
FROM 
    employee e
JOIN 
    admin a ON e.employee_no = a.employee_no
LEFT JOIN 
    government_info g ON e.employee_no = g.employee_no
LEFT JOIN 
    service_records s ON e.employee_no = s.employee_no
LEFT JOIN 
    compensation c ON e.employee_no = c.employee_no
WHERE 
    e.employee_no = ?"; // Use employee_no to fetch data

$stmt = $conn->prepare($query);
if ($stmt === false) {
  die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $employee_no); // Bind the employee_no as a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Extract data from the $row array
  $firstname = $row['firstname'];
  $middlename = $row['middlename'];
  $lastname = $row['lastname'];
  $name_extension = $row['name_extension'];
  $email_address = $row['email_address'];
  $mobile_no = $row['mobile_no'];
  $dob = $row['dob'];
  $address = $row['address'];
  $pob = $row['pob'];
  $civil_status = $row['civil_status'];
  $sex = $row['sex'];
  $blood_type = $row['blood_type'];
  $image = $row['image'];
  $gsis_no = $row['gsis_no'];
  $pag_ibig_no = $row['pag_ibig_no'];
  $philhealth_no = $row['philhealth_no'];
  $tin_no = $row['tin_no'];
  $sss_no = $row['sss_no'];
  $from_date = $row['from_date'];
  $designation = $row['designation'];
  $to_date = $row['to_date'];
  $status = $row['status'];
  $salary = $row['salary'];
  $station_place = $row['station_place'];
  $branch = $row['branch'];
  $abs_wo_pay = $row['abs_wo_pay'];
  $date_separated = $row['date_separated'];
  $cause_of_separation = $row['cause_of_separation'];
  $compensation_salary = $row['compensation_salary']; // Aliased in SQL
  $pera = $row['pera'];
  $clothing = $row['clothing'];
  $cash_gift = $row['cash_gift'];
  $mid_year = $row['mid_year'];
  $productivity_incentive = $row['productivity_incentive'];
  $rt_allowance = $row['rt_allowance'];
  $year_end_bonus = $row['year_end_bonus'];
  $issued_date = $row['issued_date'];
  $allowance = $row['allowance'];

} else {
  die("No user data found.");
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Admin Profile | ERMS</title>
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
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      /* Light gray background */
      color: #343a40;
      /* Dark gray text */
      margin: 0;
      padding: 0;
    }

    .product-payment-inner-st {
      background-color: #fff;
      /* White background for the form */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* Subtle shadow */
    }

    .tab-review-design {
      margin-bottom: 20px;
    }

    .nav-tabs .nav-link {
      background-color: #e9ecef;
      /* Light gray for tabs */
      color: #495057;
      /* Gray text for tabs */
      border: 1px solid #dee2e6;
      /* Lighter border */
      border-radius: 0;
      /* Remove rounded corners */
    }

    .nav-tabs .nav-link.active {
      background-color: #007bff;
      /* Blue for active tab */
      color: #fff;
      /* White text for active tab */
      border-color: #007bff;
    }

    .form-control {
      margin-bottom: 15px;
    }

    .btn-primary {
      background-color: #007bff;
      /* Blue button */
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      /* Darker blue on hover */
      border-color: #0056b3;
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
                      <ul class="breadcome-menu"
                        style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                        <li>
                          <a href="dashboard.php">
                            <i class="fa fa-home"></i> Home
                          </a>
                          <span class="bread-slash">/</span>
                          <span class="bread-blod">My Profile</span></span>
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
                        <?php echo $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $name_extension; ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Designation</b><br />
                        <?php echo $designation; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                      <p>
                        <b>Email ID</b><br />
                        <?php echo $email_address; ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Phone</b><br />
                        <?php echo $mobile_no; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="address-hr">
                      <p>
                        <b>Address</b><br />
                        <?php echo $address; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
              <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Basic Information</a></li>
                <li><a href="#reviews">Service Records</a></li>
                <li><a href="#INFORMATION">Compensation</a></li>
              </ul>

              <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                  <form action="update_profile.php" method="POST" enctype="multipart/form-data" id="profile-form">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div id="dropzone1" class="pro-ad">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="firstname" type="text" class="form-control" placeholder="Firstname"
                                  value="<?php echo $firstname; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="middlename" type="text" class="form-control" placeholder="Middlename"
                                  value="<?php echo $middlename; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="lastname" type="text" class="form-control" placeholder="Lastname"
                                  value="<?php echo $lastname; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="name_extension" type="text" class="form-control"
                                  placeholder="Extension Name" value="<?php echo $name_extension; ?>" />
                              </div>
                              <div class="form-group">
                                <input name="email_address" type="email" class="form-control"
                                  placeholder="Email Address" value="<?php echo $email_address; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="mobileno" type="tel" class="form-control" placeholder="Mobile no."
                                  value="<?php echo $mobile_no; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="dob" type="date" class="form-control" value="<?php echo $dob; ?>"
                                  required />
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="address" type="text" class="form-control" placeholder="Address"
                                  value="<?php echo $address; ?>" required />
                              </div>
                              <div class="form-group">
                                <input name="pob" type="text" class="form-control" placeholder="Place of Birth"
                                  value="<?php echo $pob; ?>" required />
                              </div>
                              <div class="form-group">
                                <select name="civil_status" class="form-control" required>
                                  <option value="none" disabled="">Civil Status</option>
                                  <option value="Single" <?php echo ($civil_status == 'Single') ? 'selected' : ''; ?>>
                                    Single</option>
                                  <option value="Married" <?php echo ($civil_status == 'Married') ? 'selected' : ''; ?>>
                                    Married</option>
                                  <option value="Widowed" <?php echo ($civil_status == 'Widowed') ? 'selected' : ''; ?>>
                                    Widowed</option>
                                  <option value="Separated" <?php echo ($civil_status == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="sex" class="form-control" required>
                                  <option value="none" disabled="">Sex</option>
                                  <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>Male</option>
                                  <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>Female
                                  </option>
                                </select>
                              </div>
                              <div class="form-group">
                                <input name="blood_type" type="text" class="form-control" placeholder="Blood Type"
                                  value="<?php echo $blood_type; ?>" />
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                  Changes</button>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <form id="acount-infor" action="#" class="acount-infor">
                            <div class="devit-card-custom">
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group">
                                    <input name="gsis" type="text" class="form-control" placeholder="GSIS number"
                                      value="<?php echo $gsis_no; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="pag-ibig" type="text" class="form-control" placeholder="PAGIBIG number"
                                      value="<?php echo $pag_ibig_no; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="date_started" type="text" class="form-control"
                                      placeholder="Date started" value="<?php echo $from_date; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="salary" type="text" class="form-control" placeholder="Salary"
                                      value="<?php echo $salary; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="abs_wo_pay" type="text" class="form-control"
                                      placeholder="Absent without Pay" value="<?php echo $abs_wo_pay; ?>" />
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group">
                                    <input name="philhealth" type="text" class="form-control"
                                      placeholder="PHILHEALTH number" value="<?php echo $philhealth_no; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="sss" type="text" class="form-control" placeholder="SSS number"
                                      value="<?php echo $sss_no; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="date_ended" type="text" class="form-control" placeholder="Date Ended"
                                      value="<?php echo $to_date; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="station_place" type="text" class="form-control"
                                      placeholder="Station Place" value="<?php echo $station_place; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="date_separated" type="text" class="form-control"
                                      placeholder="Date separated" value="<?php echo $date_separated; ?>" />
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="form-group">
                                    <input name="tin" type="text" class="form-control" placeholder="TIN number"
                                      value="<?php echo $tin_no; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="designation" type="text" class="form-control" placeholder="Designation"
                                      value="<?php echo $designation; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="status" type="text" class="form-control" placeholder="Status"
                                      value="<?php echo $status; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="branch" type="text" class="form-control" placeholder="Branch"
                                      value="<?php echo $branch; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <input name="separation" type="text" class="form-control"
                                      placeholder="Cause of separation" value="<?php echo $cause_of_separation; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="payment-adress">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                      Changes</button>
                                  </div>
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
              <div class="product-tab-list tab-pane fade" id="INFORMATION">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                      <div class="row">
                        <form id="acount-infor" action="#" class="acount-infor">
                          <div class="devit-card-custom">
                            <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                  <input name="salary" type="text" class="form-control" placeholder="Salary"
                                    value="<?php echo $compensation_salary; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="pera" type="text" class="form-control" placeholder="Pera"
                                    value="<?php echo $pera; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="rt_allowance" type="text" class="form-control" placeholder="RT Allowance"
                                    value="<?php echo $rt_allowance; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="allowance" type="text" class="form-control" placeholder="Allowance"
                                    value="<?php echo $allowance; ?>" />
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                  <input name="clothing" type="text" class="form-control" placeholder="Clothing"
                                    value="<?php echo $clothing; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="midyear" type="text" class="form-control" placeholder="Mid Year"
                                    value="<?php echo $mid_year; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="yearend" type="text" class="form-control" placeholder="Year End Bonus"
                                    value="<?php echo $year_end_bonus; ?>" />
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                  <input name="cash_gift" type="text" class="form-control" placeholder="Cash Gift"
                                    value="<?php echo $cash_gift; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="incentive" type="text" class="form-control" placeholder="Incentive"
                                    value="<?php echo $productivity_incentive; ?>" />
                                </div>
                                <div class="form-group">
                                  <input name="issued_date" type="text" class="form-control" placeholder="Issued Date"
                                    value="<?php echo $issued_date; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="payment-adress">
                                  <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>
                                </div>
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
</body>

</html>