<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
                                        <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;">
                                            <!-- Left Side: Home Breadcrumb -->
                                            <ul class="breadcome-menu" style="display: flex; align-items: center; padding: 0; margin: 0;">
                                                <li>
                                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                    <a href="reports/csv-employees.php" class="btn btn-success btn-border btn-round btn-sm">
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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT e.*
                                            FROM employee e
                                            LEFT JOIN hr_staffs h ON e.employee_no = h.employee_no AND LOWER(h.role) LIKE '%mayor%'
                                            WHERE h.employee_no IS NULL
                                            ORDER BY created_at DESC;
                                            ";
                                    $view_data = mysqli_query($con, $query);
                                    $count = 1;

                                    while ($row = mysqli_fetch_assoc($view_data)) {
                                        $employee_no = $row['employee_no'];
                                        $firstname = $row['firstname'];
                                        $middlename = $row['middlename'];
                                        $lastname = $row['lastname'];
                                        $name_extension = $row['name_extension'];
                                        $dob = $row['dob'];
                                        $pob = $row['pob'];
                                        $sex = $row['sex'];
                                        $civil_status = $row['civil_status'];
                                        $address = $row['address'];
                                        $mobile_no = $row['mobile_no'];
                                        $email_address = $row['email_address'];
                                        $imagePath = $row['image'];
                                        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;
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
                                                <div style="text-align: center;">
                                                    <a href="edit-employee.php?employee_no=<?php echo $employee_no; ?>" class="btn btn-warning" style="margin-right: 5px;">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="employeedetails.php?employee_no=<?php echo $employee_no; ?>"
                                                        class="btn btn-success" title="View" style="margin-right: 5px;">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger delete-btn" data-id="<?php echo $employee_no; ?>" title="Delete">
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
                    <form method="POST" action="basic-info.php" method="POST" enctype="multipart/form-data">
                        <h4 class="text-center">BASIC INFORMATION</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
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
                                    placeholder="Mobile No." required pattern="\d{11}" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Date of Birth</label>
                                <input name="dob" id="finish" type="date" class="form-control"
                                    placeholder="Date of Birth" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Civil Status</label>
                                <select name="civil_status" id="civil_status" class="form-control" required onchange="checkOtherStatus()">
                                    <option value="none" selected disabled>Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text" name="other_civil_status" id="other_civil_status" class="form-control" placeholder="Please specify..." style="display: none; margin-top: 5px;">
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
                                <label>Upload Profile Picture</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                        </div>

                        <br>
                        <hr>
                        <h4 class="text-center">GOVERNMENT RECORDS</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>GSIS ID No</label>
                                <input name="gsis" type="text" class="form-control" placeholder="GSIS No"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>PAGIBIG ID No</label>
                                <input name="pag_ibig" type="text" class="form-control" placeholder="PAG-IBIG ID No"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>PHILHEALTH No</label>
                                <input name="philhealth" type="text" class="form-control"
                                    placeholder="PhilHealth Number" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>SSS No</label>
                                <input name="sss" type="text" class="form-control" placeholder="SSS No" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>TIN No</label>
                                <input name="tin" type="text" class="form-control" placeholder="TIN No" required />
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

        <!--Footer-part-->
        <?php include 'includes/footer.php'; ?>