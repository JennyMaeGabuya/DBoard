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
    <title>All Service Records | ERMS</title>
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
                                                    <a href="all-employees.php">
                                                        Employees
                                                    </a><span class="bread-slash"> / </span>
                                                    <a href="#">
                                                        <strong>Service Records</strong>
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
                            <h4>All Service Records</h4>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT e.*
                                              FROM employee e
                                              INNER JOIN service_records s ON e.employee_no = s.employee_no
                                              LEFT JOIN hr_staffs h ON e.employee_no = h.employee_no AND LOWER(h.role) LIKE '%mayor%'
                                              WHERE h.employee_no IS NULL
                                              GROUP BY e.employee_no";

                                    $view_data = mysqli_query($con, $query);
                                    $count = 1;

                                    while ($row = mysqli_fetch_assoc($view_data)) {
                                        $employee_no = $row['employee_no'];
                                        $firstname = $row['firstname'];
                                        $middlename = $row['middlename'];
                                        $lastname = $row['lastname'];
                                        $name_extension = $row['name_extension'];
                                        $email_address = $row['email_address'];
                                        $imagePath = $row['image'];
                                        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;

                                        // Check if service records exist
                                        $serviceQuery = "SELECT COUNT(*) as count FROM service_records WHERE employee_no = ?";
                                        $serviceStmt = $con->prepare($serviceQuery);
                                        $serviceStmt->bind_param("s", $employee_no);
                                        $serviceStmt->execute();
                                        $serviceResult = $serviceStmt->get_result();
                                        $serviceRow = $serviceResult->fetch_assoc();
                                        $hasServiceRecords = $serviceRow['count'] > 0; // Boolean: true if records exist
                                        $serviceStmt->close();
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
                                            <td><?php echo htmlspecialchars($email_address); ?></td>
                                            <td style="text-align: center;">
                                                <a href="service_records.php?empno=<?php echo $employee_no ?>"
                                                    class="btn btn-success btn-border btn-round btn-sm"
                                                    onclick="return checkServiceRecords(<?php echo $hasServiceRecords ? 'true' : 'false'; ?>)">
                                                    <i class="fa fa-list-alt"></i> View Record
                                                </a>

                                                <script>
                                                    function checkServiceRecords(hasRecords) {
                                                        if (!hasRecords) {
                                                            Swal.fire({
                                                                icon: 'warning',
                                                                title: 'No Service Records Found',
                                                                text: 'This employee does not have any service records.',
                                                                confirmButtonColor: '#3085d6',
                                                                confirmButtonText: 'OK'
                                                            });
                                                            return false;
                                                        }
                                                        return true;
                                                    }
                                                </script>
                                            </td>

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

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>