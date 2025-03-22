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

// Fetch employee data if employee_no is set
if (isset($_GET['employee_no'])) {
    $employee_no = $_GET['employee_no'];
    $query = "SELECT
        e.*, s.*, g.*
    FROM
        employee e
    LEFT JOIN
        government_info g ON e.employee_no = g.employee_no
    LEFT JOIN
        service_records s ON e.employee_no = s.employee_no
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
        $imagePath = $row['image'];
        $imageUrl  = !empty($imagePath) ? 'img/profile/' . $imagePath : 'img/mk-logo.png';
        $gsis = $row['gsis_no'];
        $pag_ibig = $row['pag_ibig_no'];
        $philhealth = $row['philhealth_no'];
        $tin = $row['tin_no'];
        $sss = $row['sss_no'];
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
                                        <div class="col-lg-12"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <!-- Left Side: Home Breadcrumb -->
                                            <ul class="breadcome-menu"
                                                style="display: flex; align-items: center; padding: 0; margin: 0;">
                                                <li>
                                                    <link rel="stylesheet"
                                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">

                <form method="POST" action="update-employee.php"
                    enctype="multipart/form-data">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img id="profileImage" src="<?php echo htmlspecialchars($imageUrl); ?>" alt="User Image" />
                            </div>

                            <div class="profile-details-hr">

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="formFile" class="form-label">Upload Profile Picture</label>
                                        <input class="form-control" type="file" id="formFile" name="image" accept="image/*" onchange="previewImage(event)">
                                    </div>

                                    <script>
                                        function previewImage(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var output = document.getElementById('profileImage');
                                                output.src = reader.result; // Update the image preview
                                            };
                                            reader.readAsDataURL(event.target.files[0]); // Convert to Base64
                                        }
                                    </script>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <div class="tab-content custom-product-edit">
                                <div id="description" class="tab-pane fade active in">
                                    <div class="product-tab-list">
                                        <div class="row" style="margin: 10px 10px 0 10px;">

                                            <!-- Form upload also included -->
                                            <h4 class="text-center" style="color: #006df0;">BASIC
                                                INFORMATION</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Agency Employee Number</label>
                                                    <input name="emp_no" type="text"
                                                        class="form-control"
                                                        placeholder="Employee Number"
                                                        value="<?php echo htmlspecialchars($employee_no); ?>"
                                                        readonly />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name</label>
                                                    <input name="lastname" type="text"
                                                        class="form-control" placeholder="Lastname"
                                                        value="<?php echo htmlspecialchars($lastname); ?>" />
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name</label>
                                                    <input name="firstname" type="text"
                                                        class="form-control" placeholder="Firstname"
                                                        value="<?php echo htmlspecialchars($firstname); ?>" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Middle Name</label>
                                                    <div class="form-group">
                                                        <input name="middlename" type="text"
                                                            class="form-control"
                                                            placeholder="Middlename"
                                                            value="<?php echo htmlspecialchars($middlename); ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label>Name Ext.</label>
                                                    <input name="name_extension" type="text"
                                                        class="form-control" placeholder="Ext"
                                                        value="<?php echo htmlspecialchars($name_extension); ?>" />
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Email </label>
                                                    <input name="email_address" type="email"
                                                        class="form-control" placeholder="Email Address"
                                                        value="<?php echo htmlspecialchars($email_address); ?>" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number</label>
                                                    <input name="mobile_no" id="mobile" type="tel"
                                                        class="form-control" placeholder="Mobile no."
                                                        value="<?php echo htmlspecialchars($mobile_no); ?>"
                                                        required pattern="\d{11}" />
                                                </div>

                                                <!-- Accept only numbers -->
                                                <script>
                                                    document.getElementById('mobile').addEventListener('input', function(e) {
                                                        const value = e.target.value;
                                                        // Remove non-numeric characters
                                                        const numericValue = value.replace(/[^0-9]/g, '');

                                                        // Limit input to 11 digits
                                                        if (numericValue.length > 11) {
                                                            e.target.value = numericValue.slice(0, 11);
                                                        } else {
                                                            e.target.value = numericValue;
                                                        }
                                                    });
                                                </script>


                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Birthdate</label>
                                                    <input name="dob" id="finish" type="date"
                                                        class="form-control" placeholder="Date of Birth"
                                                        value="<?php echo htmlspecialchars($dob); ?>" />
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>Civil Status</label>
                                                    <select name="civil_status" id="civil_status" class="form-control" required onchange="checkOtherStatus()">
                                                        <option value="none" disabled <?php echo empty($civil_status) ? 'selected' : ''; ?>>Civil Status</option>
                                                        <option value="Single" <?php echo ($civil_status == 'Single') ? 'selected' : ''; ?>>Single</option>
                                                        <option value="Married" <?php echo ($civil_status == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                        <option value="Widowed" <?php echo ($civil_status == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                                        <option value="Separated" <?php echo ($civil_status == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                                                        <option value="Other" <?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? 'selected' : ''; ?>>Other</option>
                                                    </select>

                                                    <input type="text" name="other_civil_status" id="other_civil_status" class="form-control" placeholder="Please specify..."
                                                        value="<?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? htmlspecialchars($civil_status) : ''; ?>"
                                                        style="display: <?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? 'block' : 'none'; ?>; margin-top: 5px;">

                                                    <script>
                                                        function checkOtherStatus() {
                                                            var civilStatus = document.getElementById("civil_status").value;
                                                            var otherInput = document.getElementById("other_civil_status");

                                                            if (civilStatus === "Other") {
                                                                otherInput.style.display = "block";
                                                                otherInput.setAttribute("required", "true");
                                                            } else {
                                                                otherInput.style.display = "none";
                                                                otherInput.removeAttribute("required");
                                                                otherInput.value = ""; // Clear the input if another option is selected
                                                            }
                                                        }
                                                    </script>

                                                </div>

                                                <script>
                                                    function checkOtherStatus() {
                                                        var select = document.getElementById("civil_status");
                                                        var otherInput = document.getElementById("other_civil_status");

                                                        if (select.value === "Other") {
                                                            otherInput.style.display = "block";
                                                            otherInput.setAttribute("required", "required");
                                                        } else {
                                                            otherInput.style.display = "none";
                                                            otherInput.removeAttribute("required");
                                                        }
                                                    }
                                                </script>
                                                <div class="form-group col-md-3">
                                                    <label>Sex</label>
                                                    <select name="sex" class="form-control">
                                                        <option value="none" disabled <?php echo empty($sex) ? 'selected' : ''; ?>>Sex
                                                        </option>
                                                        Sex
                                                        </option>
                                                        <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>Male
                                                        </option>
                                                        <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>
                                                            Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Blood Type</label>
                                                    <select name="blood_type" class="form-control">
                                                        <option value="none" selected="" disabled="">
                                                            Blood Type
                                                        </option>
                                                        <option value="A+" <?php echo ($blood_type == 'A+') ? 'selected' : ''; ?>>A+
                                                        </option>
                                                        <option value="A-" <?php echo ($blood_type == 'A-') ? 'selected' : ''; ?>>A-
                                                        </option>
                                                        <option value="B+" <?php echo ($blood_type == 'B+') ? 'selected' : ''; ?>>B+
                                                        </option>
                                                        <option value="B-" <?php echo ($blood_type == 'B-') ? 'selected' : ''; ?>>B-
                                                        </option>
                                                        <option value="AB+" <?php echo ($blood_type == 'AB+') ? 'selected' : ''; ?>>
                                                            AB+</option>
                                                        <option value="AB-" <?php echo ($blood_type == 'AB-') ? 'selected' : ''; ?>>
                                                            AB-</option>
                                                        <option value="O+" <?php echo ($blood_type == 'O+') ? 'selected' : ''; ?>>O+
                                                        </option>
                                                        <option value="O-" <?php echo ($blood_type == 'O-') ? 'selected' : ''; ?>>O-
                                                        </option>
                                                        <option value="Unknown" <?php echo ($blood_type == 'Unknown') ? 'selected' : ''; ?>>Unknown</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Address</label>
                                                    <input name="address" type="text"
                                                        class="form-control" placeholder="Address"
                                                        value="<?php echo htmlspecialchars($address); ?>" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Place of Birth</label>
                                                    <input name="pob" type="text" class="form-control"
                                                        placeholder="Place of Birth"
                                                        value="<?php echo htmlspecialchars($pob); ?>" />
                                                </div>

                                            </div>
                                            <br>
                                            <hr>
                                            <h4 class="text-center" style="color: #006df0;">GOVERNMENT
                                                RECORDS</h4>
                                            <hr>

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>GSIS ID No</label>
                                                    <input name="gsis" type="text" class="form-control"
                                                        placeholder="GSIS No"
                                                        value="<?php echo htmlspecialchars($gsis); ?>"
                                                        required />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>PAGIBIG ID No</label>
                                                    <input name="pag_ibig" type="text"
                                                        class="form-control"
                                                        placeholder="PAG-IBIG ID No"
                                                        value="<?php echo htmlspecialchars($pag_ibig); ?>"
                                                        required />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>PHILHEALTH No</label>
                                                    <input name="philhealth" type="text"
                                                        class="form-control"
                                                        placeholder="PhilHealth Number"
                                                        value="<?php echo htmlspecialchars($philhealth); ?>"
                                                        required />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>SSS No</label>
                                                    <input name="sss" type="text" class="form-control"
                                                        placeholder="SSS No"
                                                        value="<?php echo htmlspecialchars($sss); ?>"
                                                        required />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>TIN No</label>
                                                    <input name="tin" type="text" class="form-control"
                                                        placeholder="TIN No"
                                                        value="<?php echo htmlspecialchars($tin); ?>"
                                                        required />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style="text-align: center;">
                                                        <a href="all-employees.php" class="btn btn-danger">Cancel</a>
                                                        <button type="submit" class="btn btn-success"
                                                            name="update-employee-btn" style="margin-left: 5px;">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <?php if (isset($_SESSION['display'])): ?>
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