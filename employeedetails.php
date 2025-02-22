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
}

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
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                                        <button class="btn btn-danger btn-border btn-round btn-sm">
                                            <i class="fa fa-print"></i>
                                            Print
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- HINDI PA FINAL, WALA PANG FORMAT-->
                            <div class="card-body m-5" id="printThis">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <img src="img/mk-logo.png" class="img-fluid" width="100">
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mb-0">Republic of the Philippines</h3>
                                        <h3 class="mb-0">Province of Batangas</h3>
                                        <h3 class="fw-bold mb-0">Mataas na Kahoy</h3>
                                    </div>

                                    <div class="text-center">
                                        <img src="img/mk-logo.png" class="img-fluid" width="100">
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