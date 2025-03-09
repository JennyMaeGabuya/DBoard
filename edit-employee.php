<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

// Initialize variables with default values
$firstname = $middlename = $lastname = $name_extension = $email_address = $mobile_no = $dob = $address = $pob = $civil_status = $sex = $blood_type = $image = '';
$gsis_no = $pag_ibig_no = $philhealth_no = $tin_no = $sss_no = $salary = $station_place = $branch = $abs_wo_pay = $cause_of_separation = '';
$compensation_salary = $pera = $clothing = $cash_gift = $mid_year = $productivity_incentive = $rt_allowance = $year_end_bonus = $issued_date = '';

// Fetch employee data if employee_no is set
if (isset($_GET['employee_no'])) {
    $employee_no = $_GET['employee_no'];
    $query = "SELECT
        e.*, s.*, g.*, c.*,
        c.salary AS compensation_salary
    FROM
        employee e
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
        $from_date = $row['from_date'];
        $status = $row['status'];
        $sss_no = $row['sss_no'];
        $designation = $row['designation'];
        $to_date = $row['to_date'];
        $salary = $row['salary'];
        $station_place = $row['station_place'];
        $branch = $row['branch'];
        $abs_wo_pay = $row['abs_wo_pay'];
        $date_separated = isset($row['date_separated']) ? $row['date_separated'] : ''; // Initialize if not set
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
        $allowance = $row['allowance'];
    } else {
        die("No employee data found.");
    }
} else {
    // Redirect if no employee number is provided
    header('location: all-employees.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Edit Employees | ERMS</title>
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Breadcrumb -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcome-heading">
                                    <div class="row">
                                        <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;">
                                            <!-- Left Side: Home Breadcrumb -->
                                            <ul class="breadcome-menu" style="display: flex; align-items: center; padding: 0; margin: 0;">
                                                <li>
                                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                                    <a href="dashboard.php">
                                                        <i class="fas fa-home"></i> Home
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="all-employees.php">
                                                        Employees
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="#">
                                                        <strong>Edit Employee</strong>
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Right Side: Time, Date, and User Location -->
                                            <div class="pst-container">
                                                <span id="user-location">Detecting location...</span> |
                                                <span id="pst-date"></span> - <span id="pst-time"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .pst-container {
                                    font-size: 14px;
                                    color: black;
                                    text-align: right;
                                    white-space: nowrap;
                                }

                                @media screen and (max-width: 768px) {
                                    .col-lg-12 {
                                        flex-direction: column;
                                        text-align: center;
                                    }

                                    .pst-container {
                                        font-size: 13px;
                                        padding-top: 5px;
                                        text-align: center;
                                    }
                                }
                            </style>

                            <script>
                                function updatePSTDateTime() {
                                    const optionsDate = {
                                        timeZone: 'Asia/Manila',
                                        weekday: 'long',
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    };

                                    const optionsTime = {
                                        timeZone: 'Asia/Manila',
                                        hour12: true,
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        second: '2-digit'
                                    };

                                    const now = new Date();
                                    document.getElementById('pst-date').textContent = now.toLocaleDateString('en-US', optionsDate);
                                    document.getElementById('pst-time').textContent = now.toLocaleTimeString('en-US', optionsTime);
                                }

                                function fetchUserLocation() {
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(position => {
                                            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.coords.latitude}&lon=${position.coords.longitude}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    document.getElementById('user-location').textContent = data.address.city || data.address.town || "Unknown Location";
                                                })
                                                .catch(() => {
                                                    document.getElementById('user-location').textContent = "Location Unavailable";
                                                });
                                        }, () => {
                                            document.getElementById('user-location').textContent = "Location Access Denied";
                                        });
                                    } else {
                                        document.getElementById('user-location').textContent = "Geolocation Not Supported";
                                    }
                                }

                                setInterval(updatePSTDateTime, 1000);
                                updatePSTDateTime();
                                fetchUserLocation();
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employee Form -->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <hr>
                        <h4 class="text-center">BASIC INFORMATION</h4>
                        <hr>
                        <br>
                        <form method="POST" action="update-employee.php" enctype="multipart/form-data">
                            <input type="hidden" name="employee_no" value="<?php echo htmlspecialchars($employee_no); ?>" />
                            <input type="hidden" name="update_type" value="basic_info" />
                            <div class="row">
                                <div class="form-group col-md-4 mb-2">
                                    <label>Department</label>
                                    <select name="dept" class="form-control" required>
                                        <option value="none" selected="" disabled="">
                                            Department
                                        </option>
                                        <option value="HRM">Human Resource Management</option>
                                        <option value="IT">Information Technology</option>
                                        <option value="MKT">Marketing</option>
                                        <option value="ACT">Accounting</option>
                                        <option value="ENGR">Engineering</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                    <label>Employee Number</label>
                                    <input name="emp_no" type="number" class="form-control"
                                        placeholder="Employee Number" value="<?php echo htmlspecialchars($employee_no); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Last Name</label>
                                    <input name="lastname" type="text" class="form-control" placeholder="Lastname"
                                        value="<?php echo htmlspecialchars($lastname); ?>" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>First Name</label>
                                    <input name="firstname" type="text" class="form-control" placeholder="Firstname"
                                        value="<?php echo htmlspecialchars($firstname); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Middle Name</label>
                                    <div class="form-group">
                                        <input name="middlename" type="text" class="form-control"
                                            placeholder="Middlename" value="<?php echo htmlspecialchars($middlename); ?>" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Name Extension</label>
                                    <input name="name_extension" type="text" class="form-control"
                                        placeholder="Extension Name" value="<?php echo htmlspecialchars($name_extension); ?>" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Email </label>
                                    <input name="email_address" type="email" class="form-control"
                                        placeholder="Email Address" value="<?php echo htmlspecialchars($email_address); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Mobile Number</label>
                                    <input name="mobile_no" id="mobile" type="tel" class="form-control"
                                        placeholder="Mobile no." value="<?php echo htmlspecialchars($mobile_no); ?>" required pattern="\d{11    }" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Birthdate</label>
                                    <input name="dob" id="finish" type="date" class="form-control"
                                        placeholder="Date of Birth" value="<?php echo htmlspecialchars($dob); ?>" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Civil Status</label>
                                    <select name="civil_status" class="form-control">
                                        <option value="none" selected="" disabled="">
                                            Civil Status
                                        </option>
                                        <option value="Single" <?php echo ($civil_status == 'Single') ? 'selected' : ''; ?>>Single</option>
                                        <option value="Married" <?php echo ($civil_status == 'Married') ? 'selected' : ''; ?>>Married</option>
                                        <option value="Widowed" <?php echo ($civil_status == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                        <option value="Separated" <?php echo ($civil_status == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sex</label>
                                    <select name="sex" class="form-control">
                                        <option value="none" selected="" disabled="">
                                            Sex
                                        </option>
                                        <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>Male
                                        </option>
                                        <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>
                                            Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Blood Type</label>
                                    <select name="blood_type" class="form-control">
                                        <option value="none" selected="" disabled="">
                                            Blood Type
                                        </option>
                                        <option value="A+" <?php echo ($blood_type == 'A+') ? 'selected' : ''; ?>>A+</option>
                                        <option value="A-" <?php echo ($blood_type == 'A-') ? 'selected' : ''; ?>>A-</option>
                                        <option value="B+" <?php echo ($blood_type == 'B+') ? 'selected' : ''; ?>>B+</option>
                                        <option value="B-" <?php echo ($blood_type == 'B-') ? 'selected' : ''; ?>>B-</option>
                                        <option value="AB+" <?php echo ($blood_type == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                                        <option value="AB-" <?php echo ($blood_type == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                                        <option value="O+" <?php echo ($blood_type == 'O+') ? 'selected' : ''; ?>>O+</option>
                                        <option value="O-" <?php echo ($blood_type == 'O-') ? 'selected' : ''; ?>>O-</option>
                                        <option value="Unknown" <?php echo ($blood_type == 'Unknown') ? 'selected' : ''; ?>>Unknown</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Address"
                                        value="<?php echo htmlspecialchars($address); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Place of Birth</label>
                                    <input name="pob" type="text" class="form-control" placeholder="Place of Birth"
                                        value="<?php echo htmlspecialchars($pob); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Upload Profile Picture</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>

                            </div>
                            <br>
                            <hr>
                            <h4 class="text-center">SERVICE RECORDS</h4>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>GSIS Number</label>
                                    <input name="gsis" type="text" class="form-control" placeholder="GSIS Number"
                                        value="<?php echo htmlspecialchars($gsis_no); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Pag-Ibig Number</label>
                                    <input name="pag_ibig" type="text" class="form-control" placeholder="PAGIBIG Number"
                                        value="<?php echo htmlspecialchars($pag_ibig_no); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>PhilHealth Number</label>
                                    <input name="philhealth" type="text" class="form-control"
                                        placeholder="PhilHealth Number" value="<?php echo htmlspecialchars($philhealth_no); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>SSS Number</label>
                                    <input name="sss" type="text" class="form-control" placeholder="SSS Number"
                                        value="<?php echo htmlspecialchars($sss_no); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>TIN Number</label>
                                    <input name="tin" type="text" class="form-control" placeholder="TIN Number"
                                        value="<?php echo htmlspecialchars($tin_no); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date Started</label>
                                    <input name="date_started" type="date" class="form-control"
                                        placeholder="Date Started" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Status</label>
                                    <input name="status" type="text" class="form-control" placeholder="Status"
                                        value="<?php echo htmlspecialchars($status); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Branch</label>
                                    <input name="branch" type="text" class="form-control" placeholder="Branch"
                                        value="<?php echo htmlspecialchars($branch); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Absent without Pay</label>
                                    <input name="abs_wo_pay" type="text" class="form-control"
                                        placeholder="Absent without Pay" value="<?php echo htmlspecialchars($abs_wo_pay); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Cause of Separation</label>
                                    <input name="cause_of_separation" type="text" class="form-control"
                                        placeholder="Cause of Separation" value="<?php echo htmlspecialchars($cause_of_separation); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Salary</label>
                                    <input name="salary" type="number" class="form-control" placeholder="Salary"
                                        value="<?php echo htmlspecialchars($salary); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>To Date</label>
                                    <input name="to_date" type="date" class="form-control" placeholder="To Date" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Station/Place</label>
                                    <input name="station_place" type="text" class="form-control"
                                        placeholder="Station/Place" value="<?php echo htmlspecialchars($station_place); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date Separated</label>
                                    <input name="date_separated" type="date" class="form-control"
                                        placeholder="Date Separated" value="<?php echo htmlspecialchars($date_separated); ?>" />
                                </div>
                            </div>

                            <br>
                            <hr>
                            <h4 class="text-center">COMPENSATION</h4>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Salary</label>
                                    <input name="compensation_salary" type="number" class="form-control" placeholder="Salary"
                                        value="<?php echo htmlspecialchars($compensation_salary); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Pera</label>
                                    <input name="pera" type="number" class="form-control" placeholder="Pera"
                                        value="<?php echo htmlspecialchars($pera); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Clothing Allowance</label>
                                    <input name="clothing" type="number" class="form-control"
                                        placeholder="Clothing Allowance" value="<?php echo htmlspecialchars($clothing); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>RT Allowance</label>
                                    <input name="rt_allowance" type="number" class="form-control"
                                        placeholder="Representative and Transportation Allowance" value="<?php echo htmlspecialchars($rt_allowance); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Issued Date</label>
                                    <input name="issued_date" type="date" class="form-control" placeholder="Issued Date"
                                        value="<?php echo htmlspecialchars($issued_date); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Cash Gift</label>
                                    <input name="cash_gift" type="number" class="form-control" placeholder="Cash Gift"
                                        value="<?php echo htmlspecialchars($cash_gift); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Mid-Year Bonus</label>
                                    <input name="mid_year" type="number" class="form-control" placeholder="Mid-Year Bonus"
                                        value="<?php echo htmlspecialchars($mid_year); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Productivity Enhancement Incentive</label>
                                    <input name="productivity_incentive" type="number" class="form-control"
                                        placeholder="Productivity Enhancement Incentive" value="<?php echo htmlspecialchars($productivity_incentive); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Year End Bonus</label>
                                    <input name="year_end_bonus" type="number" class="form-control"
                                        placeholder="Year End Bonus" value="<?php echo htmlspecialchars($year_end_bonus); ?>" />
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="window.location.href='all-employees.php'">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="update-employee-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>