<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include_once "dbcon.php";

// Set the user_id logged in as employee_no
$employee_no = $_SESSION['user_id'];
$update_success = false; // Variable to track successful updates

// Handle form submission inside this file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_type = $_POST['update_type'];

    if ($update_type === 'basic_info') {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $name_extension = $_POST['name_extension'];
        $email_address = $_POST['email_address'];
        $mobile_no = $_POST['mobileno'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];
        $pob = $_POST['pob'];
        $dob = $_POST['dob'];
        $station_place = $_POST['station_place'];

        // Get existing image
        $query = "SELECT image FROM employee WHERE employee_no = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $employee_no);
        $stmt->execute();
        $stmt->bind_result($existing_image);
        $stmt->fetch();
        $stmt->close();

        // Handle image upload (keep existing if no new image uploaded)
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $image_name = basename($image['name']);
            $target_dir = "img/profile/";
            $target_file = $target_dir . $image_name;

            // Validate file type
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            if (!in_array($file_extension, $allowed_types)) {
                echo "<script>Swal.fire('Error!', 'Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.', 'error');</script>";
                exit();
            }

            // Validate file size (limit 2MB)
            if ($image['size'] > 2 * 1024 * 1024) {
                echo "<script>Swal.fire('Error!', 'File size exceeds 2MB limit.', 'error');</script>";
                exit();
            }

            // Move uploaded file
            if (!move_uploaded_file($image['tmp_name'], $target_file)) {
                echo "<script>Swal.fire('Error!', 'File upload failed.', 'error');</script>";
                exit();
            }
        } else {
            $image_name = $existing_image; // Keep existing image if no new upload
        }

        // Update employee table
        $query = "UPDATE employee e
                  JOIN admin a ON e.employee_no = a.employee_no
                  SET e.firstname = ?, e.middlename = ?, e.lastname = ?, e.name_extension = ?, 
                      e.email_address = ?, e.mobile_no = ?, e.address = ?, 
                      e.pob = ?, e.dob = ?, e.image = ?
                  WHERE e.employee_no = ?";

        $stmt = $con->prepare($query);
        $stmt->bind_param(
            "sssssssssss",
            $firstname,
            $middlename,
            $lastname,
            $name_extension,
            $email_address,
            $mobile_no,
            $address,
            $pob,
            $dob,
            $image_name,
            $employee_no
        );

        if (!$stmt->execute()) {
            die("Error updating employee record: " . $stmt->error);
        }

        // Update service records
        $service_query = "UPDATE service_records SET designation = ?, station_place = ? WHERE employee_no = ?";
        $service_stmt = $con->prepare($service_query);
        $service_stmt->bind_param("sss", $designation, $station_place, $employee_no);
        $service_stmt->execute();

        // ✅ Set update success flag
        $update_success = true;
    }
}

// Fetch user data (AFTER update) for the form fields
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
    e.employee_no = ?";

$stmt = $con->prepare($query);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
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
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Edit Admin Profile | ERMS</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Header -->
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
                                                    <span class="bread-slash">/</span>
                                                    <a href="my-profile.php">
                                                        My Profile
                                                    </a><span class="bread-slash">/</span>
                                                    <a href="#">
                                                        <strong>Edit Admin Profile</strong>
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

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img id="profileImage" src="<?php echo htmlspecialchars($user_image); ?>" alt="User Image" />
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
                            <li class="active"><a href="#description">Basic Informations</a></li>
                        </ul>

                        <div class="tab-content custom-product-edit">
                            <div id="description" class="tab-pane fade active in">
                                <form action="edit-admin-profile.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="update_type" value="basic_info">

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
                                                                        <input id="firstname" name="firstname"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $firstname; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middlename">Middlename</label>
                                                                        <input id="middlename" name="middlename"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $middlename; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lastname">Lastname</label>
                                                                        <input id="lastname" name="lastname" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $lastname; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="name_extension">Extension
                                                                            Name</label>
                                                                        <input id="name_extension" name="name_extension"
                                                                            type="text" class="form-control"
                                                                            value="<?php echo $name_extension; ?>" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email_address">Email Address</label>
                                                                        <input id="email_address" name="email_address"
                                                                            type="email" class="form-control"
                                                                            value="<?php echo $email_address; ?>"
                                                                            required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="mobileno">Mobile No.</label>
                                                                        <input id="mobileno" name="mobileno" type="tel"
                                                                            class="form-control"
                                                                            value="<?php echo $mobile_no; ?>"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label for="designation">Designation</label>
                                                                        <input type="text" class="form-control"
                                                                            id="designation" name="designation"
                                                                            value="<?php echo $designation; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Address</label>
                                                                        <input id="address" name="address" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $address; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pob">Place of Birth</label>
                                                                        <input id="pob" name="pob" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $pob; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="dob">Date of Birth</label>
                                                                        <input id="dob" name="dob" type="date"
                                                                            class="form-control"
                                                                            value="<?php echo $dob; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="station_place">Station/Place</label>
                                                                        <input type="text" class="form-control"
                                                                            id="station_place" name="station_place"
                                                                            value="<?php echo $station_place; ?>">
                                                                    </div>
                                                                    <div class="form-group">
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
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div style="text-align: center;">
                                                                        <a href="my-profile.php" class="btn btn-primary">Back</a>
                                                                        <button type="submit" class="btn btn-success" style="margin-left: 5px;">Update Profile</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    <?php if ($update_success): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Your profile has been successfully updated.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'my-profile.php';
            });
        </script>
    <?php endif; ?>

    <?php include 'includes/footer.php'; ?>