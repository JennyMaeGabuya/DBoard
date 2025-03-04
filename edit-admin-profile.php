<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

// Include the database connection file
include_once "dbcon.php";

// Set the user_id logged in as the employee_no
$employee_no = $_SESSION['user_id'];

// Fetch user data from the database using the specified employee_no
$query = "SELECT
    e.*, s.*, g.*, c.*,
    c.salary AS compensation_salary
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
    e.employee_no = ?";

$stmt = $con->prepare($query);
$stmt->bind_param("s", $employee_no);
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
    $status = $row['status'];
    $salary = $row['salary'];
    $station_place = $row['station_place'];
    $branch = $row['branch'];
    $abs_wo_pay = $row['abs_wo_pay'];
    $date_separated = $row['date_separated'];
    $cause_of_separation = $row['cause_of_separation'];
    $compensation_salary = $row['compensation_salary'];
    $pera = $row['pera'];
    $clothing = $row['clothing'];
    $cash_gift = $row['cash_gift'];
    $mid_year = $row['mid_year'];
    $productivity_incentive = $row['productivity_incentive'];
    $rt_allowance = $row['rt_allowance'];
    $year_end_bonus = $row['year_end_bonus'];
    $issued_date = $row['issued_date'];
} else {
    die("No user data found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Edit Admin Profile | ERMS</title>
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
</head>

<body>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Breadcrumb -->
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
                                                    <link rel="stylesheet"
                                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                                    <a href="dashboard.php">
                                                        <i class="fa fa-home"></i> Home
                                                    </a>
                                                    <span class="bread-slash">/</span>
                                                    <a href="my-profile.php"> My Profile </a>
                                                    <span class="bread-slash">/</span>
                                                    <span class="bread-blod">Edit Admin Profile</span>
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
    </div>

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img src="<?php echo htmlspecialchars($user_image); ?>" alt="User  Image" />
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
                            <li class="active"><a href="#description">Basic Informations</a></li>
                            <li><a href="#reviews">Service Records</a></li>
                            <li><a href="#INFORMATION">Compensation</a></li>
                        </ul>

                        <div class="tab-content custom-product-edit">
                            <div id="description" class="tab-pane fade active in">
                                <form action="update-admin-profile.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="update_type" value="basic_info">

                                    <div class="product-tab-list">
                                        <div class="row">
                                            <form id="profile-form">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="review-content-section">
                                                        <div id="dropzone1" class="pro-ad">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label for="firstname">Firstname</label>
                                                                        <input id="firstname" name="firstname"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $firstname; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middlename">Middlename</label>
                                                                        <input id="middlename" name="middlename"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $middlename; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lastname">Lastname</label>
                                                                        <input id="lastname" name="lastname" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $lastname; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="name_extension">Extension
                                                                            Name</label>
                                                                        <input id="name_extension" name="name_extension"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $name_extension; ?>" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email_address">Email Address</label>
                                                                        <input id="email_address" name="email_address"
                                                                            type="email" class="form-control"
                                                                            value="<?php echo $email_address; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="mobileno">Mobile no.</label>
                                                                        <input id="mobileno" name="mobileno" type="tel"
                                                                            class="form-control"
                                                                            value="<?php echo $mobile_no; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="dob">Date of Birth</label>
                                                                        <input id="dob" name="dob" type="date"
                                                                            class="form-control"
                                                                            value="<?php echo $dob; ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label for="address">Address</label>
                                                                        <input id="address" name="address" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $address; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pob">Place of Birth</label>
                                                                        <input id="pob" name="pob" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $pob; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="civil_status">Civil Status</label>
                                                                        <select id="civil_status" name="civil_status"
                                                                            class="form-control" required>
                                                                            <option value="none" disabled>Civil Status
                                                                            </option>
                                                                            <option value="Single" <?php echo ($civil_status == 'Single') ? 'selected' : ''; ?>>Single</option>
                                                                            <option value="Married" <?php echo ($civil_status == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                                            <option value="Widowed" <?php echo ($civil_status == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                                                            <option value="Separated" <?php echo ($civil_status == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="sex">Sex</label>
                                                                        <select id="sex" name="sex" class="form-control"
                                                                            required>
                                                                            <option value="none" disabled>Sex</option>
                                                                            <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>
                                                                                Male
                                                                            </option>
                                                                            <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>
                                                                                Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="blood_type">Blood Type</label>
                                                                        <input id="blood_type" name="blood_type"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $blood_type; ?>" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="formFile" class="form-label">Upload
                                                                            profile picture</label>
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress"></div>
                                                                    <button type="submit" class="btn btn-primary">Update
                                                                        Profile</button>
                                                                </div>

                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="reviews" class="tab-pane fade">
                <form action="update-admin-profile.php" method="POST">
                    <input type="hidden" name="update_type" value="service_records">
                    <div class="product-tab-list">
                        <div class="row">
                            <form id="service-records-form">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="gsis_no">GSIS Number</label>
                                                    <input type="text" class="form-control" id="gsis_no" name="gsis_no"
                                                        value="<?php echo $gsis_no; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pag_ibig_no">Pag-Ibig Number</label>
                                                    <input type="text" class="form-control" id="pag_ibig_no" name="pag_ibig_no"
                                                        value="<?php echo $pag_ibig_no; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="philhealth_no">PhilHealth Number</label>
                                                    <input type="text" class="form-control" id="philhealth_no" name="philhealth_no"
                                                        value="<?php echo $philhealth_no; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tin_no">TIN Number</label>
                                                    <input type="text" class="form-control" id="tin_no" name="tin_no"
                                                        value="<?php echo $tin_no; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sss_no">SSS Number</label>
                                                    <input type="text" class="form-control" id="sss_no" name="sss_no"
                                                        value="<?php echo $sss_no; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="from_date">Date Started</label>
                                                    <input type="text" class="form-control" id="from_date" name="from_date"
                                                        value="<?php echo $from_date; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" class="form-control" id="designation" name="designation"
                                                        value="<?php echo $designation; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input type="text" class="form-control" id="status" name="status"
                                                        value="<?php echo $status; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="branch">Branch</label>
                                                    <input type="text" class="form-control" id="branch" name="branch"
                                                        value="<?php echo $branch; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="abs_wo_pay">Absent without Pay</label>
                                                    <input type="text" class="form-control" id="abs_wo_pay" name="abs_wo_pay"
                                                        value="<?php echo $abs_wo_pay; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cause_of_separation">Cause of Separation</label>
                                                    <input type="text" class="form-control" id="cause_of_separation" name="cause_of_separation"
                                                        value="<?php echo $cause_of_separation; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="station_place">Station/Place</label>
                                                    <input type="text" class="form-control" id="station_place" name="station_place"
                                                        value="<?php echo $station_place; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_separated">Date Separated</label>
                                                    <input type="text" class="form-control" id="date_separated" name="date_separated"
                                                        value="<?php echo $date_separated; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="payment-adress"></div>
                                        <button type="submit" class="btn btn-primary">Update Service Records</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
            </div>


            <div id="INFORMATION" class="tab-pane fade">
                <form action="update-admin-profile.php" method="POST">
                    <input type="hidden" name="update_type" value="compensation">
                    <div class="product-tab-list">
                        <div class="row">
                            <form id="compensation-form">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="compensation_salary">Salary</label>
                                                    <input type="number" class="form-control" id="compensation_salary" name="compensation_salary"
                                                        value="<?php echo $compensation_salary; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pera">PERA</label>
                                                    <input type="number" class="form-control" id="pera" name="pera" value="<?php echo $pera; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="clothing">Clothing Allowance</label>
                                                    <input type="number" class="form-control" id="clothing" name="clothing"
                                                        value="<?php echo $clothing; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rt_allowance">Representation and Transportation Allowance</label>
                                                    <input type="number" class="form-control" id="rt_allowance" name="rt_allowance"
                                                        value="<?php echo $rt_allowance; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="issued_date">Issued Date</label>
                                                    <input type="number" class="form-control" id="issued_date" name="issued_date"
                                                        value="<?php echo $issued_date; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="cash_gift">Cash Gift</label>
                                                    <input type="number" class="form-control" id="cash_gift" name="cash_gift"
                                                        value="<?php echo $cash_gift; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mid_year">Mid-Year</label>
                                                    <input type="number" class="form-control" id="mid_year" name="mid_year"
                                                        value="<?php echo $mid_year; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="productivity_incentive">Productivity Enhancement Incentive</label>
                                                    <input type="number" class="form-control" id="productivity_incentive"
                                                        name="productivity_incentive" value="<?php echo $productivity_incentive; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="year_end_bonus">Year End Bonus</label>
                                                    <input type="number" class="form-control" id="year_end_bonus" name="year_end_bonus"
                                                        value="<?php echo $year_end_bonus; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress"></div>
                                                    <button type="submit" class="btn btn-primary">Update Compensation</button>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>