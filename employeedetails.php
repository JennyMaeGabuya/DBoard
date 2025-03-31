<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

if (isset($_GET['employee_no'])) {
    $employee_no = $_GET['employee_no'];

    // Prepare the SQL statement
    $query = "SELECT e.employee_no as employee_no, 
e.firstname,
e.lastname as lastname,
e.middlename as middlename,
e.name_extension as name_extension,
e.dob as dob,
e.pob as pob, 
e.sex as sex,
e.civil_status as civil_status,
e.address as empaddress, 
e.blood_type as blood_type,
e.mobile_no as mobile_no,
e.email_address as email_address,
e.image as pic,
 g.tin_no as tin, g.sss_no as sss,
 g.philhealth_no as philhealth, g. pag_ibig_no as pag_ibig, g.gsis_no as gsis FROM employee e
LEFT JOIN government_info g ON e.employee_no=g.employee_no 
WHERE e.employee_no = ?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("s", $employee_no); // "s" means string

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $employee_no = $row['employee_no'];
        $lastname = $row['lastname'];
        $middlename = $row['middlename'];
        $firstname = $row['firstname'];
        $name_extension = $row['name_extension'];
        $email_address = $row['email_address'];
        $mobile_no = $row['mobile_no'];
        $pob = $row['pob'];
        $dob = $row['dob'];
        $date = new DateTime($dob);
        $bday = $date->format('F j, Y');
        $sex = $row['sex'];
        $civil_status = $row['civil_status'];
        $imagePath = $row['pic'];
        $address = $row['empaddress'];
        $blood_type = $row['blood_type'];
        $gsis = $row['gsis'];
        $sss = $row['sss'];
        $pag_ibig = $row['pag_ibig'];
        $tin = $row['tin'];
        $philhealth = $row['philhealth'];
        // Determine the image URL based on position

        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;
    }

    // Close the statement
    $stmt->close();

    // Fetch service records
    $serviceQuery = "SELECT * FROM service_records WHERE employee_no = ?";
    $serviceStmt = $con->prepare($serviceQuery);
    $serviceStmt->bind_param("s", $employee_no); // "s" means string
    $serviceStmt->execute();
    $serviceResult = $serviceStmt->get_result();

    // Initialize variables to hold service data
    $date_started = $date_ended = $designation = $status = $servicesalary = $station = $branch = $abs_wo_pay = $separated = $separation = null;

    // Close the service statement
    $serviceStmt->close();



    // Check if service records exist
    $serviceQuery = "SELECT COUNT(*) as count FROM service_records WHERE employee_no = ?";
    $serviceStmt = $con->prepare($serviceQuery);
    $serviceStmt->bind_param("s", $employee_no);
    $serviceStmt->execute();
    $serviceResult = $serviceStmt->get_result();
    $serviceRow = $serviceResult->fetch_assoc();
    $hasServiceRecords = $serviceRow['count'] > 0; // Boolean: true if records exist
    $serviceStmt->close();
}
//fetch service records
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Employee Details | ERMS</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .card {

            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .card-body {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 8.27in;
            height: 11in;
            position: relative;
            overflow: hidden;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
            line-height: 0.5;

        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
        }

        .footer img {
            width: 100%;
        }

        .logo {
            height: 100px;
            width: 100px;
            margin: 10px;
        }

        .card-head-row {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .table {
            border: 1px solidrgb(110, 106, 106);
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            line-height:0.328571;
        }

        @media print {
            .pds {
                background-color: #ccc !important;
                color: #000 !important;
                padding: 10px;
            }
        }

        th,
        td {
            height: 30px;
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
                                                    <a href="dashboard.php">
                                                        <strong>View Details</strong>
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

                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-tools">

                                        <a href="reports/emp.php?id=<?php echo $employee_no ?>" class="btn btn-danger btn-border btn-round btn-sm" target="_blank">
                                            <i class="fa-solid fa-file-pdf"></i> PDF
                                        </a>

                                        <a href="service-records.php?empno=<?php echo $employee_no ?>"
                                            class="btn btn-success btn-border btn-round btn-sm"
                                            onclick="return checkServiceRecords(<?php echo $hasServiceRecords ? 'true' : 'false'; ?>)">
                                            <i class="fa fa-file"></i> Service Records
                                        </a>

                                        <script>
                                            function checkServiceRecords(hasRecords) {
                                                if (!hasRecords) {
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'No Service Records Found',
                                                        text: 'This employee does not have any service records.',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Add Service Record',
                                                        cancelButtonText: 'Close'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href = "service-records.php?empno=<?php echo $employee_no ?>";
                                                        }
                                                    });
                                                    return false;
                                                }
                                                return true;
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body m-5">
                                <div class="header-container">
                                    <div class="text-center">
                                        <img src="img/mk-logo.png" class="logo" alt="Logo Left" style="height: 100px;width: 100px;">
                                    </div>
                                    <div class="header-text">
                                        <p class="text1">Republic of the Philippines</p>
                                        <p class="text1">Province of Batangas</p>
                                        <h4>MUNICIPALITY OF MATAAS NA KAHOY</h4>
                                        <p class="text1">Tel. No.: (043) 784-1088</p>
                                        <h6 class="fw-bold mb-0">hrmo_lgumatasnakahoy@yahoo.com</h6>
                                    </div>
                                    <div class="text-center">
                                        <img src="img/Bagong-Pilipinas.png" class="logo" alt="Logo Right" style="height: 100px;width: 130px;">
                                    </div>
                                </div>


                                <br>
                                <div class="row mt-2">
                                    <div class="col-md-12 table-responsive">
                                        <br>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="4" style="text-align: center; background-color: #ccc;line-height:0.5px;">
                                                    <h4 class="pds">PERSONAL DATA SHEET</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th rowspan="4">
                                                    <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="" class="avatar-img rounded-circle" style="height: 150px; width: 150px;margin-left:10px;">
                                                </th>
                                                <th colspan="1">SURNAME</th>
                                                <td colspan="2"><?php echo $lastname; ?></td>
                                            </tr>
                                            <tr>
                                                <th>FIRST NAME</th>
                                                <td colspan="2"><?php echo $firstname; ?></td>


                                            </tr>
                                            <tr>
                                                <th colspan="1">MIDDLE NAME</th>
                                                <td colspan="2"> <?php echo $middlename; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="1">NAME EXTENSION</th>
                                                <td colspan="3"> <?php echo $name_extension; ?></td>
                                            </tr>


                                            <tr>
                                                <th>Contact No.:</th>
                                                <td><?php echo $mobile_no; ?></td>
                                                <th>Email</th>
                                                <td><?php echo $email_address; ?></td>

                                            </tr>
                                            <tr>

                                                <th>Address:</th>
                                                <td colspan="3"><?php echo $address; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Place of Birth:</th>
                                                <td colspan="3"><?php echo $pob; ?></td>

                                            </tr>
                                            <tr>
                                            <th>Civil Status:</th>
                                            <td><?php echo $civil_status; ?></td>
                                                <th>Sex:</th>
                                                <td><?php echo $sex; ?></td>
                                              

                                            </tr>
                                            <tr>
                                            <th>Birthday:</th>
                                            <td><?php echo $bday; ?></td>
                                                <th>Blood Type</th>
                                                <td colspan="3"><?php echo $blood_type; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: center; background-color: #ccc;line-height:0.5px;">
                                                    <h6>GOVERNMENT INFORMATION</h6>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>GSIS NO</th>
                                                <td><?php echo $gsis; ?></td>
                                                <th>SSS NO</th>
                                                <td><?php echo $sss; ?></td>
                                            </tr>
                                            <tr>
                                                <th>PHILHEALTH NO</th>
                                                <td><?php echo $philhealth; ?></td>
                                                <th>PAG-IBIG NO</th>
                                                <td><?php echo $pag_ibig; ?></td>
                                            </tr>
                                            <tr>
                                                <th>TIN NO</th>
                                                <td><?php echo $tin; ?></td>
                                                <th>AGENCY EMPLOYEE NO</th>
                                                <td><?php echo $employee_no; ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="footer">
                                        <img src="img/JMI.png" class="jmifooter" alt="">
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