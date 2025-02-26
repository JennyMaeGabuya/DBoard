<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_GET['employee_no'])) {
    $employee_no = $_GET['employee_no'];

    // Prepare the SQL statement
    $query = "SELECT * 
FROM employee WHERE employee.employee_no = ?";
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
        $imagePath = $row['image'];
        $address = $row['address'];
        $blood_type = $row['blood_type'];

        // Determine the image URL based on position

        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;
    }

    // Close the statement
    $stmt->close();
    // Fetch service records
    $compQuery = "SELECT * FROM compensation WHERE employee_no = ?";
    $compStmt = $con->prepare($compQuery);
    $compStmt->bind_param("s", $employee_no); // "s" means string
    $compStmt->execute();
    $compResult = $compStmt->get_result();

    // Initialize variables to hold compensation data
    $salary = $pera = $rt_allowance = $allowance = $clothing = $midyear = $yearend = $gift = $incentive = $issued = $created = $updated = null;

    // Fetch compensation data
    if ($compRow = $compResult->fetch_assoc()) {
        $salary = $compRow['salary'];
        $pera = $compRow['pera'];
        $rt_allowance = $compRow['rt_allowance'];
        $allowance = $compRow['allowance'];
        $clothing = $compRow['clothing'];
        $midyear = $compRow['mid_year'];
        $yearend = $compRow['year_end_bonus'];
        $gift = $compRow['cash_gift'];
        $incentive = $compRow['productivity_incentive'];
        $issued = $compRow['issued_date'];
        $created = $compRow['created_at'];
        $updated = $compRow['updated_at'];
    }

    // Close the compensation statement
    $compStmt->close();
    // Fetch service records
    $serviceQuery = "SELECT * FROM service_records WHERE employee_no = ?";
    $serviceStmt = $con->prepare($serviceQuery);
    $serviceStmt->bind_param("s", $employee_no); // "s" means string
    $serviceStmt->execute();
    $serviceResult = $serviceStmt->get_result();

    // Initialize variables to hold service data
    $date_started = $date_ended = $designation = $status = $servicesalary = $station = $branch = $abs_wo_pay = $separated = $separation = null;

    // Fetch compensation data
    if ($serviceRow = $serviceResult->fetch_assoc()) {
        $date_started = $serviceRow['from_date'];
        $date_ended = $serviceRow['to_date'];
        $designation = $serviceRow['designation'];
        $status = $serviceRow['status'];
        $servicesalary = $serviceRow['salary'];
        $station = $serviceRow['station_place'];
        $branch = $serviceRow['branch'];
        $abs_wo_pay = $serviceRow['abs_wo_pay'];
        $separated = $serviceRow['date_separated'];
        $separation = $serviceRow['cause_of_separation'];
        // $created = $compRow['created_at'];
        //$updated = $compRow['updated_at'];
    }

    // Close the service statement
    $serviceStmt->close();

    $govQuery = "SELECT * FROM government_info WHERE employee_no = ?";
    $govStmt = $con->prepare($govQuery);
    $govStmt->bind_param("s", $employee_no); // "s" means string
    $govStmt->execute();
    $govResult = $govStmt->get_result();

    // Initialize variables to hold service data
    $gsis = $pag_ibig = $philhealth = $sss = $tin = null;

    // Fetch compensation data
    if ($govRow = $govResult->fetch_assoc()) {
        $gsis = $govRow['gsis_no'];
        $pag_ibig = $govRow['pag_ibig_no'];
        $philhealth = $govRow['philhealth_no'];
        $sss = $govRow['sss_no'];
        $tin = $govRow['tin_no'];
    }

    // Close the service statement
    $govStmt->close();
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
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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

        @media print {
            .pds {
                background-color: #ccc !important;
                color: #000 !important;
                padding: 10px;
            }
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
                                <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                        <span class="bread-slash">/</span>
                                        <a href="all-employees.php">Employees</a>
                                        <span class="bread-slash">/</span>
                                        <span class="bread-blod">View Report</span>
                                    </li>
                                </ul>
                            </div>
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
                                        <button class="btn btn-danger btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                                            <i class="fa fa-print"></i> Print
                                        </button>

                                        <a href="#addcomp" data-toggle="modal" class="btn btn-primary btn-border btn-round btn-sm">
                                            <i class="fa fa-file"></i> Compensation
                                        </a>
                                        <a href="#addservice" data-toggle="modal" class="btn btn-success btn-border btn-round btn-sm">
                                            <i class="fa fa-file"></i> Service Records
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body m-5" id="printThis">
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
                                                <th rowspan="3">
                                                    <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="" class="avatar-img rounded-circle" style="height: 150px; width: 150px;margin-left:10px;">
                                                </th>
                                                <th colspan="1">SURNAME</th>
                                                <td><?php echo $lastname; ?></td>
                                            </tr>
                                            <tr>
                                                <th>FIRST NAME</th>
                                                <td><?php echo $firstname; ?></td>
                                                <th> NAME EXTENSION <br><?php echo $name_extension; ?></th>

                                            </tr>
                                            <tr>
                                                <th colspan="1">MIDDLE NAME</th>
                                                <td><?php echo $middlename; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $email_address; ?></td>
                                                <th>Contact No.:</th>
                                                <td><?php echo $mobile_no; ?></td>
                                            </tr>
                                            <tr>

                                                <th>Address:</th>
                                                <td colspan="3"><?php echo $address; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Place of Birth:</th>
                                                <td><?php echo $pob; ?></td>
                                                <th>Sex:</th>
                                                <td><?php echo $sex; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Birthday:</th>
                                                <td><?php echo $bday; ?></td>
                                                <th>Blood Type</th>
                                                <td><?php echo $blood_type; ?></td>
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

    <!--COMPENSATION FORM MODAL-->

    <div class="modal fade" id="addcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="border-radius: 3px;">
                    <h5 class="modal-title" id="exampleModalLabel">COMPENSATION RECORDS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="compensation-info.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label>Employee Number</label>
                                <input
                                    name="emp_no"
                                    type="text"
                                    class="form-control"
                                    placeholder="Employee Number" value="<?php echo $employee_no; ?>" readonly />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Salary</label>
                                <input
                                    name="salary"
                                    type="text"
                                    class="form-control"
                                    placeholder="Salary" value="<?php echo $salary; ?>" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pera</label>
                                <input
                                    name="pera"
                                    type="text"
                                    class="form-control"
                                    placeholder="Pera" value="<?php echo $pera; ?>" required />
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>RT Allowance</label>
                                <div class="form-group">
                                    <input
                                        name="rt_allowance"
                                        type="text"
                                        class="form-control" value="<?php echo $rt_allowance; ?>"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Allowance</label>
                                <input
                                    name="allowance"
                                    type="text"
                                    class="form-control"
                                    placeholder="Extension Name" value="<?php echo $allowance; ?>" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Clothing</label>
                                <input
                                    name="clothing"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $clothing; ?>" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Mid Year Bonus</label>
                                <input
                                    name="midyear"
                                    type="text"
                                    class="form-control" value="<?php echo $midyear; ?>"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Year End Bonus</label>
                                <input
                                    name="yearend"
                                    type="text"
                                    class="form-control" value="<?php echo $yearend; ?>"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Cash Gift</label>
                                <input
                                    name="gift"
                                    type="text"
                                    class="form-control" value="<?php echo $gift; ?>"
                                    required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Productivity Incentive</label>
                                <input
                                    name="incentive"
                                    type="text"
                                    class="form-control" value="<?php echo $incentive; ?>"
                                    required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Cash Gift</label>
                                <input
                                    name="gift"
                                    type="text"
                                    class="form-control" value="<?php echo $gift; ?>"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Issued Date</label>
                                <input
                                    name="issued"
                                    type="date"
                                    class="form-control" value="<?php echo $issued; ?>"
                                    required />
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <!--  <input type="hidden" id="pos_id" name="id"> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="compsavebtn">Save</button>
                    <button type="submit" class="btn btn-warning" name="compviewbtn">View</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!--SERVICE RECORDS FORM MODAL-->
    <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="border-radius: 3px;">
                    <h5 class="modal-title" id="exampleModalLabel">SERVICE RECORDS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="service-info.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label>Employee Number</label>
                                <input
                                    name="emp_no"
                                    type="text"
                                    class="form-control"
                                    placeholder="Employee Number" value="<?php echo $employee_no; ?>" readonly />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Date Started</label>
                                <input
                                    name="date_started"
                                    type="date"
                                    class="form-control"
                                    placeholder="Salary" value="<?php echo $date_started; ?>" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Date Ended</label>
                                <input
                                    name="date_ended"
                                    type="date"
                                    class="form-control"
                                    placeholder="Pera" value="<?php echo $date_ended; ?>" required />
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Designation</label>
                                <div class="form-group">
                                    <input
                                        name="designation"
                                        type="text"
                                        class="form-control" value="<?php echo $designation; ?>"
                                        required />
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <input
                                    name="status"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $status; ?>" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Salary</label>
                                <input
                                    name="servicesalary"
                                    type="number"
                                    class="form-control"
                                    value="<?php echo $servicesalary; ?>" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Station Place</label>
                                <input
                                    name="station"
                                    type="text"
                                    class="form-control" value="<?php echo $station; ?>"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Branch</label>
                                <input
                                    name="branch"
                                    type="text"
                                    class="form-control" value="<?php echo $branch; ?>"
                                    required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Absent without Pay</label>
                                <input
                                    name="abs_wo_pay"
                                    type="text"
                                    class="form-control" value="<?php echo $abs_wo_pay; ?>"
                                    required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Date Separated</label>
                                <input
                                    name="separated"
                                    type="date"
                                    class="form-control" value="<?php echo $separated; ?>"
                                    required />
                            </div>

                            <div class="form-group col-md-8">
                                <label>Cause of Separation</label>
                                <input
                                    name="separation"
                                    type="text"
                                    class="form-control" value="<?php echo $separation; ?>"
                                    required />
                            </div>

                        </div>
                </div>

                <div class="modal-footer">
                    <!--  <input type="hidden" id="pos_id" name="id"> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="servicesavebtn">Save</button>
                    <button type="submit" class="btn btn-warning" name="compviewbtn">View</button>
                </div>

                </form>
            </div>
        </div>
    </div>

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
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

            window.onafterprint = function() {
                newWindow.close();
                location.reload();
            };
        }
    </script>