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
    e.employee_no = ?"; // Use employee_no to fetch data

$stmt = $con->prepare($query);
if ($stmt === false) {
    die("Error preparing statement: " . $con->error);
}
$stmt->bind_param("s", $employee_no); // Bind the employee_no as a string
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
    $image = $row['image'];
    $user_image = !empty($image) ? 'img/profile/' . $image : 'img/mk-logo.png';
    $designation = $row['designation'];
    $station_place = $row['station_place'];
   
} else {
    die("No user data found.");
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Admin Profile | ERMS</title>
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="breadcome-menu"
                                                style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                                <li>
                                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                                                    <a href="dashboard.php">
                                                        <i class="fas fa-home"></i> <strong>Home</strong>
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="my-profile.php">
                                                        <i class="fas fa-user-circle"></i> <strong>My Profile</strong>
                                                    </a>

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
                                <li class="active"><a href="#description">Basic Information</a></li>
                            </ul>

                            <div class="tab-content custom-product-edit">
                                <div id="description" class="tab-pane fade active in">
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
                                                                        <input id="firstname" name="firstname" type="text"
                                                                            class="form-control" placeholder="Firstname"
                                                                            value="<?php echo $firstname; ?>"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middlename">Middlename</label>
                                                                        <input id="middlename" name="middlename" type="text"
                                                                            class="form-control" placeholder="Middlename"
                                                                            value="<?php echo $middlename; ?>"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lastname">Lastname</label>
                                                                        <input id="lastname" name="lastname" type="text"
                                                                            class="form-control" placeholder="Lastname"
                                                                            value="<?php echo $lastname; ?>"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="name_extension">Extension Name</label>
                                                                        <input id="name_extension" name="name_extension"
                                                                            type="text" class="form-control"
                                                                            placeholder="Extension Name"
                                                                            value="<?php echo $name_extension; ?>"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email_address">Email Address</label>
                                                                        <input id="email_address" name="email_address"
                                                                            type="email" class="form-control"
                                                                            placeholder="Email Address"
                                                                            value="<?php echo $email_address; ?>" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="mobileno">Mobile no.</label>
                                                                        <input id="mobileno" name="mobileno" type="tel"
                                                                            class="form-control" placeholder="Mobile no."
                                                                            value="<?php echo $mobile_no; ?>"  />
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="designation">Designation</label>
                                                                    <input type="text" class="form-control" id="designation"
                                                                        name="designation" placeholder="Designation"
                                                                        value="<?php echo $designation; ?>" >
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Address</label>
                                                                        <input id="address" name="address" type="text"
                                                                            class="form-control" placeholder="Address"
                                                                            value="<?php echo $address; ?>"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pob">Place of Birth</label>
                                                                        <input id="pob" name="pob" type="text"
                                                                            class="form-control" placeholder="Place of Birth"
                                                                            value="<?php echo $pob; ?>" />
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <label for="dob">Date of Birth</label>
                                                                        <input id="dob" name="dob" type="date"
                                                                            class="form-control" value="<?php echo $dob; ?>"
                                                                            />
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label for="station_place">Station/Place</label>
                                                                    <input type="text" class="form-control" id="station_place"
                                                                        name="station_place" placeholder="Station/Place"
                                                                        value="<?php echo $station_place; ?>" >
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="formFile" class="form-label">Upload
                                                                            profile picture</label>
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="image" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress">
                                                                        <a href="edit-admin-profile.php" class="btn btn-primary">Edit Profile</a>
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

                                
    <!-- Footer Start-->
    <?php include 'includes/footer.php'; ?>