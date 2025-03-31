<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

$user_id = $_SESSION['user_id'];

// Ensure session variables are initialized
if (!isset($_SESSION['verified'])) {
    $_SESSION['verified'] = false;
}
$verified = $_SESSION['verified'];

// Fetch admin details
$query = $con->prepare("SELECT id, email, username, password, employee_no FROM admin WHERE employee_no = ?");
$query->bind_param("s", $user_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error_message'] = "No admin found with this employee number.";
    header("location: dashboard.php");
    exit();
}

$admin = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verify_password'])) {
        $password = $_POST['password'];

        if (!empty($admin['password']) && password_verify($password, $admin['password'])) {
            $_SESSION['verified'] = true;
            $_SESSION['success_message'] = "You can now update your details.";
        } else {
            $_SESSION['error_message'] = "Incorrect password. Please try again.";
        }
        header("Location: " . $_SERVER['PHP_SELF']); // Reload to reflect changes
        exit();
    }

    if (isset($_POST['update_account']) && $_SESSION['verified']) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if there are actual changes
        $email_changed = $email !== $admin['email'];
        $username_changed = $username !== $admin['username'];
        $password_changed = !empty($new_password);

        if (!$email_changed && !$username_changed && !$password_changed) {
            $_SESSION['error_message'] = "No changes detected. Please modify at least one field.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if ($password_changed && $new_password !== $confirm_password) {
            $_SESSION['error_message'] = "Passwords do not match.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        $con->begin_transaction();
        try {
            // Update only if email or username changed
            if ($email_changed || $username_changed) {
                $updateAdmin = $con->prepare("UPDATE admin SET email = ?, username = ? WHERE employee_no = ?");
                $updateAdmin->bind_param("sss", $email, $username, $user_id);
                $updateAdmin->execute();
            }

            // Update password if provided
            if ($password_changed) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $updatePassword = $con->prepare("UPDATE admin SET password = ? WHERE employee_no = ?");
                $updatePassword->bind_param("ss", $hashed_password, $user_id);
                $updatePassword->execute();
            }

            $con->commit();

            // Store success message and flag for logout
            $_SESSION['success_message'] = "You will be logged out shortly...";
            $_SESSION['logout_trigger'] = true;

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } catch (Exception $e) {
            $con->rollback();
            $_SESSION['error_message'] = "Error updating account: " . $e->getMessage();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Change Password | ERMS</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                                                    <a href="#">
                                                        <strong>Change Password</strong>
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

        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active">
                                    <?php if (!$verified): ?>
                                        <a href="#reviews">Verify Your Identity</a>
                                    <?php else: ?>
                                        <a href="#reviews">Account Settings</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">


                                <div
                                    class="product-tab-list tab-pane fade active in"
                                    id="reviews">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php if (!$verified): ?>
                                                <!-- Password verification form -->
                                                <div id="verify-section" style="margin-top: 10px;">
                                                    <?php if (isset($error_message)): ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <?= htmlspecialchars($error_message) ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (isset($success_message)): ?>
                                                        <div class="alert alert-success" role="alert">
                                                            <?= htmlspecialchars($success_message) ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <form method="POST" style="margin-top: 20px;">
                                                        <label for="currentPassword">Current Password</label>
                                                        <div class="form-group input-with-icon">
                                                            <input type="password" id="currentPassword" class="form-control" name="password" placeholder="Enter your current password" required>
                                                            <i class="fas fa-eye toggle-password" onclick="togglePassword('currentPassword', this)"></i>
                                                        </div>
                                                        <button type="submit" name="verify_password" class="btn btn-primary waves-effect waves-light">Verify</button>
                                                    </form>

                                                    <style>
                                                        .input-with-icon {
                                                            position: relative;
                                                            display: flex;
                                                            align-items: center;
                                                            width: 100%;
                                                        }

                                                        .input-with-icon .toggle-password {
                                                            position: absolute;
                                                            right: 10px;
                                                            cursor: pointer;
                                                            color: #888;
                                                        }

                                                        .input-with-icon .toggle-password:hover {
                                                            color: #333;
                                                        }
                                                    </style>

                                                    <script>
                                                        function togglePassword(fieldId, icon) {
                                                            let passwordField = document.getElementById(fieldId);
                                                            if (passwordField.type === "password") {
                                                                passwordField.type = "text";
                                                                icon.classList.remove("fa-eye");
                                                                icon.classList.add("fa-eye-slash");
                                                            } else {
                                                                passwordField.type = "password";
                                                                icon.classList.remove("fa-eye-slash");
                                                                icon.classList.add("fa-eye");
                                                            }
                                                        }
                                                    </script>

                                                </div>

                                            <?php else: ?>
                                                <div class="review-content-section">
                                                    <!-- Account update form -->
                                                    <div id="update-section" class="devit-card-custom">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <?php if (isset($error_message)): ?>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <?= htmlspecialchars($error_message) ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if (isset($success_message)): ?>
                                                                    <div class="alert alert-success" role="alert">
                                                                        <?= htmlspecialchars($success_message) ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <form method="POST">
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= htmlspecialchars($admin['email']) ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= htmlspecialchars($admin['username']) ?>" required>
                                                                    </div>
                                                                    <div class="form-group input-with-icon">
                                                                        <input type="password" id="newPassword" class="form-control" name="new_password" placeholder="New Password">
                                                                        <i class="fas fa-eye toggle-password" onclick="togglePassword('newPassword', this)"></i>
                                                                    </div>
                                                                    <div class="form-group input-with-icon">
                                                                        <input type="password" id="confirmPassword" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                                                                        <i class="fas fa-eye toggle-password" onclick="togglePassword('confirmPassword', this)"></i>
                                                                    </div>
                                                                    <button type="submit" name="update_account" class="btn btn-success">Update</button>
                                                                </form>

                                                                <style>
                                                                    .input-with-icon {
                                                                        position: relative;
                                                                        display: flex;
                                                                        align-items: center;
                                                                        width: 100%;
                                                                    }

                                                                    .input-with-icon .toggle-password {
                                                                        position: absolute;
                                                                        right: 10px;
                                                                        cursor: pointer;
                                                                        color: #888;
                                                                    }

                                                                    .input-with-icon .toggle-password:hover {
                                                                        color: #333;
                                                                    }
                                                                </style>

                                                                <script>
                                                                    function togglePassword(fieldId, icon) {
                                                                        let passwordField = document.getElementById(fieldId);
                                                                        if (passwordField.type === "password") {
                                                                            passwordField.type = "text";
                                                                            icon.classList.remove("fa-eye");
                                                                            icon.classList.add("fa-eye-slash");
                                                                        } else {
                                                                            passwordField.type = "password";
                                                                            icon.classList.remove("fa-eye-slash");
                                                                            icon.classList.add("fa-eye");
                                                                        }
                                                                    }
                                                                </script>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        <?php if (isset($_SESSION['error_message'])): ?>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: "<?= addslashes($_SESSION['error_message']) ?>",
                                            });
                                            <?php unset($_SESSION['error_message']); ?>
                                        <?php endif; ?>

                                        <?php if (isset($_SESSION['success_message']) && !isset($_SESSION['logout_trigger'])): ?>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Verified!',
                                                text: "<?= addslashes($_SESSION['success_message']) ?>",
                                                allowOutsideClick: false,
                                                confirmButtonText: 'OK'
                                            });
                                            <?php unset($_SESSION['success_message']); ?>
                                        <?php endif; ?>

                                        <?php if (isset($_SESSION['success_message']) && isset($_SESSION['logout_trigger'])): ?>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Updated Successfully!',
                                                text: "<?= addslashes($_SESSION['success_message']) ?>",
                                                allowOutsideClick: false,
                                                timer: 3000,
                                                showConfirmButton: false
                                            }).then(() => {
                                                window.location.href = 'logout.php';
                                            });
                                            <?php
                                            unset($_SESSION['success_message']);
                                            unset($_SESSION['logout_trigger']);
                                            ?>
                                        <?php endif; ?>
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>