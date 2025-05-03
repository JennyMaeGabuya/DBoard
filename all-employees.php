<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>All Employees | ERMS</title>
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

    <!--Sidebar-part-->
    <?php include 'includes/sidebar.php'; ?>

    <!--Header-part-->
    <?php include 'includes/header.php'; ?>

    <!-- Mobile Menu end -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                                                    <a href="#">
                                                        <strong>Employees</strong>
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

    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4>Employees</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <div class="button-container">
                                    <a href="#add" data-toggle="modal"
                                        class="btn btn-primary btn-border btn-round btn-sm">
                                        <i class="fa-solid fa-plus-circle"></i> Add Employee
                                    </a>
                                    <a href="reports/csv-employees.php"
                                        class="btn btn-success btn-border btn-round btn-sm">
                                        <i class="fa fa-file-excel-o"></i> Export CSV
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="widget-box">
                            <!-- JavaScript for live search -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

                            <script>
                                $(function() {
                                    new DataTable('#myTable', {
                                        responsive: true,
                                        autoWidth: false,
                                        language: {
                                            lengthMenu: "Show _MENU_ entries",
                                        },
                                    });
                                });
                            </script>
                        </div>

                        <div class="asset-inner" style="margin-top: 5px;">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT 
                                            e.employee_no, e.firstname, e.middlename, e.lastname, e.name_extension, 
                                            e.dob, e.pob, e.sex, e.civil_status, e.address, e.mobile_no, e.email_address, e.blood_type, e.image,e.designation, e.role, e.account_status, e.hr_staff,
                                            g.gsis_no, g.pag_ibig_no, g.philhealth_no, g.tin_no, g.sss_no,
                                            (SELECT s.salary FROM service_records s WHERE s.employee_no = e.employee_no ORDER BY s.created_at DESC LIMIT 1) AS salary,
                                            (SELECT s.station_place FROM service_records s WHERE s.employee_no = e.employee_no ORDER BY s.created_at DESC LIMIT 1) AS station_place,
                                            (SELECT s.branch FROM service_records s WHERE s.employee_no = e.employee_no ORDER BY s.created_at DESC LIMIT 1) AS branch,
                                            (SELECT s.abs_wo_pay FROM service_records s WHERE s.employee_no = e.employee_no ORDER BY s.created_at DESC LIMIT 1) AS abs_wo_pay,
                                            (SELECT s.cause_of_separation FROM service_records s WHERE s.employee_no = e.employee_no ORDER BY s.created_at DESC LIMIT 1) AS cause_of_separation
                                            FROM employee e
                                            LEFT JOIN government_info g ON e.employee_no = g.employee_no
                                            ORDER BY e.created_at DESC";

                                    $view_data = mysqli_query($con, $query);
                                    $count = 1;

                                    while ($row = mysqli_fetch_assoc($view_data)) {
                                        $employee_no = $row['employee_no'] ?? '';
                                        $firstname = $row['firstname'] ?? '';
                                        $middlename = $row['middlename'] ?? '';
                                        $lastname = $row['lastname'] ?? '';
                                        $name_extension = $row['name_extension'] ?? '';
                                        $dob = $row['dob'] ?? '';
                                        $pob = $row['pob'] ?? '';
                                        $sex = $row['sex'] ?? '';
                                        $designation = $row['designation'] ?? '';
                                        $role = $row['role'] ?? '';
                                        $account_status = $row['account_status'] ?? '';
                                        $hr_staff = $row['hr_staff'] ?? '';
                                        $civil_status = $row['civil_status'] ?? '';
                                        $address = $row['address'] ?? '';
                                        $mobile_no = $row['mobile_no'] ?? '';
                                        $email_address = $row['email_address'] ?? '';
                                        $blood_type = $row['blood_type'] ?? '';
                                        $gsis = $row['gsis_no'] ?? '';
                                        $pag_ibig = $row['pag_ibig_no'] ?? '';
                                        $philhealth = $row['philhealth_no'] ?? '';
                                        $tin = $row['tin_no'] ?? '';
                                        $sss = $row['sss_no'] ?? '';
                                        $salary = $row['salary'] ?? '';
                                        $station_place = $row['station_place'] ?? '';
                                        $branch = $row['branch'] ?? '';
                                        $abs_wo_pay = $row['abs_wo_pay'] ?? '';
                                        $cause_of_separation = $row['cause_of_separation'] ?? '';
                                        $imagePath = $row['image'] ?? '';
                                        $imageUrl = !empty($imagePath) ? 'img/profile/' . $imagePath : 'img/mk-logo.png';
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt=""
                                                    style="height: 50px; width: 50px; border-radius: 50%; object-fit: cover;">
                                            </td>
                                            <td><?php echo htmlspecialchars($employee_no); ?></td>
                                            <td>
                                                <?php
                                                $full_name = $lastname;
                                                if (!empty($name_extension)) {
                                                    $full_name .= ' ' . $name_extension;
                                                }
                                                $full_name .= ', ' . $firstname;
                                                if (!empty($middlename)) {
                                                    $full_name .= ' ' . substr($middlename, 0, 1) . '.';
                                                }
                                                echo htmlspecialchars($full_name);
                                                ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($address); ?></td>
                                            <td><?php echo htmlspecialchars($email_address); ?></td>
                                            <td><?php echo htmlspecialchars($sex); ?></td>
                                            <td>
                                                <?php if ($account_status == 1): ?>
                                                    <span class="badge bg-primary text-white"
                                                        style="background-color: #0d6efd;">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger text-white"
                                                        style="background-color: #dc3545;">Inactive</span>
                                                <?php endif; ?>
                                            </td>


                                            <td>
                                                <div style="text-align: center;">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editEmployee<?php echo $employee_no; ?>"
                                                        style="margin-right: 5px;">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <a href="employeedetails.php?employee_no=<?php echo $employee_no; ?>"
                                                        class="btn btn-success" title="View" style="margin-right: 5px;">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger delete-btn"
                                                        data-id="<?php echo $employee_no; ?>" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    // Confirmation before deleting an employee
                                                    document.querySelectorAll(".delete-btn").forEach(button => {
                                                        button.addEventListener("click", function() {
                                                            let employee_no = this.getAttribute("data-id");

                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#d33",
                                                                cancelButtonColor: "#3085d6",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    window.location.href = "actions/delete-employee.php?employee_no=" + employee_no;
                                                                }
                                                            });
                                                        });
                                                    });

                                                    // Handle success or error messages from PHP redirects (Only One Handler)
                                                    const urlParams = new URLSearchParams(window.location.search);
                                                    let message = urlParams.get("message");
                                                    let error = urlParams.get("error");

                                                    if (message) {
                                                        Swal.fire({
                                                            title: "Success!",
                                                            text: message,
                                                            icon: "success",
                                                            confirmButtonText: "OK"
                                                        }).then(() => {
                                                            window.history.replaceState(null, null, window.location.pathname); // Clear URL params
                                                        });
                                                    } else if (error) {
                                                        Swal.fire({
                                                            title: "Error!",
                                                            text: error,
                                                            icon: "error",
                                                            confirmButtonText: "OK"
                                                        }).then(() => {
                                                            window.history.replaceState(null, null, window.location.pathname); // Clear URL params
                                                        });
                                                    }
                                                });
                                            </script>

                                        </tr>

                                        <!-- Edit Employee Modal -->
                                        <div class="modal fade" id="editEmployee<?php echo $employee_no; ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="editEmployeeLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning" style="border-radius: 3px;">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title" id="editEmployeeLabel"
                                                            style="margin-bottom: 0;">Edit Employee</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="update-employee.php"
                                                            enctype="multipart/form-data">
                                                            <h4 class="text-center">EDIT EMPLOYEE INFORMATION</h4>
                                                            <hr>

                                                            <!-- Hidden Field for Employee No -->
                                                            <input type="hidden" name="employee_no"
                                                                value="<?php echo $employee_no; ?>">

                                                            <div class="row">
                                                                <!-- Profile Picture Section -->
                                                                <div class="col-md-4 text-center">
                                                                    <div class="profile-info-inner">
                                                                        <div class="profile-img">
                                                                            <img id="profileImage_<?php echo $employee_no; ?>"
                                                                                src="<?php echo htmlspecialchars($imageUrl); ?>"
                                                                                alt="User Image" class="img-thumbnail"
                                                                                style="width: 150px; height: 150px;">
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label for="formFile">Upload Profile
                                                                                Picture</label>
                                                                            <input class="form-control" type="file"
                                                                                id="formFile_<?php echo $employee_no; ?>"
                                                                                name="image" accept="image/*"
                                                                                onchange="previewImage(event, '<?php echo $employee_no; ?>')">
                                                                            <small class="text-muted"
                                                                                style="font-style: italic; color: red;">*
                                                                                Leave blank to keep existing photo.</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Agency Employee Number</label>
                                                                    <input name="emp_no" type="text" class="form-control"
                                                                        placeholder="Employee Number"
                                                                        value="<?php echo htmlspecialchars($employee_no); ?>"
                                                                        readonly />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Surname</label>
                                                                    <input name="lastname" type="text" class="form-control"
                                                                        value="<?php echo $lastname; ?>" required />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>First Name</label>
                                                                    <input name="firstname" type="text" class="form-control"
                                                                        value="<?php echo $firstname; ?>" required />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Middle Name</label>
                                                                    <input name="middlename" type="text"
                                                                        class="form-control"
                                                                        value="<?php echo $middlename; ?>" required />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Name Extension (Jr., Sr.)</label>
                                                                    <input name="name_extension" type="text"
                                                                        class="form-control"
                                                                        value="<?php echo $name_extension; ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Email Address</label>
                                                                    <input name="email_address" type="email"
                                                                        class="form-control"
                                                                        value="<?php echo $email_address; ?>" required />
                                                                </div>

                                                                <div class="form-group col-md-4">
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

                                                                <div class="form-group col-md-4">
                                                                    <label>Birthdate</label>
                                                                    <input name="dob" id="finish" type="date"
                                                                        class="form-control" placeholder="Date of Birth"
                                                                        value="<?php echo htmlspecialchars($dob); ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Civil Status</label>
                                                                    <select name="civil_status" id="civil_status_edit"
                                                                        class="form-control" required
                                                                        onchange="checkOtherStatus('edit')">
                                                                        <option value="Single" <?php echo ($civil_status == 'Single') ? 'selected' : ''; ?>>
                                                                            Single</option>
                                                                        <option value="Married" <?php echo ($civil_status == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                                        <option value="Widowed" <?php echo ($civil_status == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                                                        <option value="Separated" <?php echo ($civil_status == 'Separated') ? 'selected' : ''; ?>>Separated</option>
                                                                        <option value="Other" <?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? 'selected' : ''; ?>>
                                                                            Other</option>
                                                                    </select>

                                                                    <input type="text" name="other_civil_status"
                                                                        id="other_civil_status_edit" class="form-control"
                                                                        placeholder="Please specify..."
                                                                        value="<?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? htmlspecialchars($civil_status) : ''; ?>"
                                                                        style="display: <?php echo (!in_array($civil_status, ['Single', 'Married', 'Widowed', 'Separated']) && !empty($civil_status)) ? 'block' : 'none'; ?>; margin-top: 5px;">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Sex</label>
                                                                    <select name="sex" class="form-control" required>
                                                                        <option value="Male" <?php if ($sex == "Male")
                                                                                                    echo "selected"; ?>>Male</option>
                                                                        <option value="Female" <?php if ($sex == "Female")
                                                                                                    echo "selected"; ?>>Female</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Blood Type</label>
                                                                    <select name="blood_type" class="form-control" required>
                                                                        <option value="A+" <?php if ($blood_type == "A+")
                                                                                                echo "selected"; ?>>A+</option>
                                                                        <option value="A-" <?php if ($blood_type == "A-")
                                                                                                echo "selected"; ?>>A-</option>
                                                                        <option value="B+" <?php if ($blood_type == "B+")
                                                                                                echo "selected"; ?>>B+</option>
                                                                        <option value="B-" <?php if ($blood_type == "B-")
                                                                                                echo "selected"; ?>>B-</option>
                                                                        <option value="AB+" <?php if ($blood_type == "AB+")
                                                                                                echo "selected"; ?>>AB+</option>
                                                                        <option value="AB-" <?php if ($blood_type == "AB-")
                                                                                                echo "selected"; ?>>AB-</option>
                                                                        <option value="O+" <?php if ($blood_type == "O+")
                                                                                                echo "selected"; ?>>O+</option>
                                                                        <option value="O-" <?php if ($blood_type == "O-")
                                                                                                echo "selected"; ?>>O-</option>
                                                                        <option value="Unknown" <?php if ($blood_type == "Unknown")
                                                                                                    echo "selected"; ?>>
                                                                            Unknown</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Address</label>
                                                                    <input name="address" type="text" class="form-control"
                                                                        value="<?php echo $address; ?>" required />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Place of Birth</label>
                                                                    <input name="pob" type="text" class="form-control"
                                                                        value="<?php echo $pob; ?>" required />
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Designation</label>
                                                                    <input name="designation" type="text"
                                                                        class="form-control"
                                                                        value="<?php echo $designation; ?>"
                                                                        placeholder="Designation" required />
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Role</label>
                                                                    <input name="role" type="text" class="form-control"
                                                                        value="<?php echo $role; ?>" placeholder="Role"
                                                                        required />
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Employee of HR Department?</label>

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="hr_department" id="radioDefault1"
                                                                            value="1" <?php if ($hr_staff == 1)
                                                                                            echo 'checked'; ?>>
                                                                        <label class="form-check-label" for="radioDefault1">
                                                                            Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="hr_department" id="radioDefault2"
                                                                            value="0" <?php if ($hr_staff == 0)
                                                                                            echo 'checked'; ?>>
                                                                        <label class="form-check-label" for="radioDefault2">
                                                                            No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Employee Status</label>
                                                                    <select name="account_status" class="form-control"
                                                                        required>
                                                                        <option value="1" <?php if ($account_status == 1)
                                                                                                echo 'selected'; ?>>Active</option>
                                                                        <option value="0" <?php if ($account_status == 0)
                                                                                                echo 'selected'; ?>>Inactive</option>
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <br>
                                                            <hr>
                                                            <h4 class="text-center">GOVERNMENT RECORDS</h4>
                                                            <hr>

                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label>GSIS ID No</label>
                                                                    <input name="gsis_no" type="text" class="form-control"
                                                                        value="<?php echo $gsis; ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>PAGIBIG ID No</label>
                                                                    <input name="pag_ibig_no" type="text"
                                                                        class="form-control"
                                                                        value="<?php echo $pag_ibig; ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>PHILHEALTH No</label>
                                                                    <input name="philhealth_no" type="text"
                                                                        class="form-control"
                                                                        value="<?php echo $philhealth; ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>SSS No</label>
                                                                    <input name="sss_no" type="text" class="form-control"
                                                                        value="<?php echo $sss; ?>" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>TIN No</label>
                                                                    <input name="tin_no" type="text" class="form-control"
                                                                        value="<?php echo $tin; ?>" />
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="update-employee-btn"
                                                                    style="margin-left: 5px;">Save Changes</button>
                                                            </div>

                                                            <!-- JavaScript for Image Preview -->
                                                            <script>
                                                                function previewImage(event, employee_no) {
                                                                    var reader = new FileReader();
                                                                    reader.onload = function() {
                                                                        var output = document.getElementById('profileImage_' + employee_no);
                                                                        output.src = reader.result; // Update the image preview
                                                                    };
                                                                    reader.readAsDataURL(event.target.files[0]); // Convert to Base64
                                                                }
                                                            </script>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php $count++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ADD NEW employee -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="border-radius: 3px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="exampleModalLabel">Add New Employee</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="basic-info.php" enctype="multipart/form-data">
                        <h4 class="text-center">BASIC INFORMATION</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                        <img id="addprofileImage" src="img/person.jpg" alt="User  Image"
                                            class="img-thumbnail" style="width: 150px; height: 150px;">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Upload Profile Picture</label>
                                        <input class="form-control" type="file" id="formFile" name="image"
                                            accept="image/*" onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>

                            <script>
                                function previewImage(event) {
                                    const file = event.target.files[0]; // Get the selected file
                                    const reader = new FileReader(); // Create a FileReader object

                                    reader.onload = function(e) {
                                        const img = document.getElementById('addprofileImage'); // Get the image element
                                        img.src = e.target.result; // Set the src of the image to the file's data URL
                                    }

                                    if (file) {
                                        reader.readAsDataURL(file); // Read the file as a data URL
                                    }
                                }
                            </script>

                            <div class="form-group col-md-4">
                                <label>Agency Employee No</label>
                                <input name="emp_no" type="text" class="form-control" placeholder="Employee No"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Surname</label>
                                <input name="lastname" type="text" class="form-control" placeholder="Lastname"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>First Name</label>
                                <input name="firstname" type="text" class="form-control" placeholder="Firstname"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Middle Name</label>
                                <div class="form-group">
                                    <input name="middlename" type="text" class="form-control" placeholder="Middlename"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Name Extension (Jr., Sr)</label>
                                <input name="name_extension" type="text" class="form-control"
                                    placeholder="Extension Name" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Email Address</label>
                                <input name="email_address" type="email" class="form-control"
                                    placeholder="Email Address" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Mobile Number</label>
                                <input name="mobile_no" id="mobile" type="tel" class="form-control"
                                    placeholder="Mobile No." required pattern="\d{11}" maxlength="11"
                                    oninput="this.value = this.value.replace(/\D/g, '').slice(0, 11);" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Date of Birth</label>
                                <input name="dob" id="finish" type="date" class="form-control"
                                    placeholder="Date of Birth" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Civil Status</label>
                                <select name="civil_status" id="civil_status_add" class="form-control" required
                                    onchange="checkOtherStatus('add')">
                                    <option value="" disabled selected>Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Other">Other</option>
                                </select>

                                <input type="text" name="other_civil_status" id="other_civil_status_add"
                                    class="form-control" placeholder="Please specify..."
                                    style="display: none; margin-top: 5px;" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Sex</label>
                                <select name="sex" class="form-control" required>
                                    <option value="none" selected="" disabled="">
                                        Sex
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Blood Type</label>
                                <select name="blood_type" class="form-control" required>
                                    <option value="none" selected="" disabled="">
                                        Blood Type
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

                            <div class="form-group col-md-4">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Address" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Place of Birth</label>
                                <input name="pob" type="text" class="form-control" placeholder="Place of Birth"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Designation</label>
                                <input name="designation" type="text" class="form-control" placeholder="Designation"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Role</label>
                                <input name="role" type="text" class="form-control" placeholder="Role" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Employee of HR Department?</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hr_department" id="radioDefault1"
                                        value="1">
                                    <label class="form-check-label" for="radioDefault1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hr_department" id="radioDefault2"
                                        value="0" checked>
                                    <label class="form-check-label" for="radioDefault2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>
                        <h4 class="text-center">GOVERNMENT RECORDS</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>GSIS ID No</label>
                                <input name="gsis" type="text" class="form-control" placeholder="GSIS No" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>PAGIBIG ID No</label>
                                <input name="pag_ibig" type="text" class="form-control" placeholder="PAG-IBIG ID No" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>PHILHEALTH No</label>
                                <input name="philhealth" type="text" class="form-control"
                                    placeholder="PhilHealth Number" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>SSS No</label>
                                <input name="sss" type="text" class="form-control" placeholder="SSS No" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>TIN No</label>
                                <input name="tin" type="text" class="form-control" placeholder="TIN No" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!--  <input type="hidden" id="pos_id" name="id"> -->
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="basic-infobtn">Add Employee</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById('addprofileImage');
                img.src = e.target.result; // Set the src of the image to the file's data URL
            }

            if (file) {
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        }

        function checkOtherStatus(formType) {
            var selectElement = document.getElementById("civil_status_" + formType);
            var otherInput = document.getElementById("other_civil_status_" + formType);

            if (selectElement.value === "Other") {
                otherInput.style.display = "block";
                otherInput.setAttribute("required", "true");
            } else {
                otherInput.style.display = "none";
                otherInput.removeAttribute("required");
                otherInput.value = ""; // Clear input when another option is selected
            }
        }

        // Ensure proper state on page load (for edit form only)
        document.addEventListener("DOMContentLoaded", function() {
            checkOtherStatus('edit'); // Only needed for Edit form
        });
    </script>

    <!-- Sweetalert Notifier -->
    <?php if (isset($_SESSION['display'])): ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: '<?php echo $_SESSION['success']; ?>', // 'success', 'error', 'warning', 'info', or 'question'
                title: '<?php echo $_SESSION['display']; ?>',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
        <?php
        unset($_SESSION['display']);
        unset($_SESSION['success']);
        unset($_SESSION['title']);
        ?>
    <?php endif; ?>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>