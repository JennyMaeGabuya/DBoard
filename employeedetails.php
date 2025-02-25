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
    $query = "SELECT * FROM employee WHERE employee_no = ?";
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

    // Close the service statement
    $compStmt->close();
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

    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
            margin-bottom: 0px;
        }

        .logo {
            width: 160px;
            height: 100px;
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
                                            <i class="fa fa-print"></i>
                                            Print
                                        </button>
                                        <a href="#addcomp" data-toggle="modal" class="btn btn-primary btn-border btn-round btn-sm">
                                            <i class="fa fa-file"></i> Compensation
                                        </a>
                                        <button class="btn btn-danger btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                                            <i class="fa fa-file"></i>
                                            Service Records
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- HINDI PA FINAL, WALA PANG FORMAT-->
                            <div class="card-body m-5" id="printThis">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="header-container">
                                            <div class="text-center">
                                                <img src="img/mk-logo.png" class="logo" alt="Logo Left">
                                            </div>

                                            <div class="header-text">
                                                <p class="text1">Republic of the Philippines</p>
                                                <p class="text1">Province of Batangas</p>
                                                <h4>MUNICIPALITY OF MATAAS NA KAHOY</h4>
                                                <p class="text1">Tel. No.: (043) 784-1088</p>
                                                <h6 class="fw-bold mb-0">hrmo_lgumatasnakahoy@yahoo.com</h6>
                                            </div>

                                            <div class="text-center">
                                                <img src="img/Bagong-Pilipinas.png" class="logo" alt="Logo Right">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row mt-2">
                                    <div class="col-md-12 table-responsive">
                                        <br>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="4" style="text-align: center;">
                                                    <h3>Employee Information</h3>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="" class="avatar-img rounded-circle" style="height: 80px; width: 80px;"></th>
                                                <td style="text-transform: uppercase;font-weight:bold;"><?php echo $firstname . ' ' . $middlename . ' ' . $lastname . $name_extension; ?></td>
                                                <th>Email</th>
                                                <td><?php echo $email_address; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact No.:</th>
                                                <td><?php echo $mobile_no; ?></td>
                                                <th>Address:</th>
                                                <td><?php echo $address; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Place of Birth:</th>
                                                <td><?php echo $pob; ?></td>
                                                <th>Sex:</th>
                                                <td><?php echo $sex; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Birthday:</th>
                                                <td colspan=""><?php echo $dob; ?></td>
                                                <th>Blood Type</th>
                                                <td colspan=""><?php echo $blood_type; ?></td>
                                            </tr>
                                        </table>
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
        }
    </script>