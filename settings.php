<?php
session_start();
$verified = $_SESSION['verified'] ?? false;
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['verified'])) {
    $_SESSION['verified'] = false;
}
$verified = $_SESSION['verified'];

// Fetch current admin details
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
            $verified = true;
        } else {
            $error_message = "Incorrect password. Please try again.";
        }
    }

    if (isset($_POST['update_account']) && $verified) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (!empty($new_password) && $new_password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            $con->begin_transaction();
            try {
                $updateAdmin = $con->prepare("UPDATE admin SET email = ?, username = ? WHERE employee_no = ?");
                $updateAdmin->bind_param("sss", $email, $username, $user_id);
                $updateAdmin->execute();

                if (!empty($new_password)) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $updatePassword = $con->prepare("UPDATE admin SET password = ? WHERE employee_no = ?");
                    $updatePassword->bind_param("ss", $hashed_password, $user_id);
                    $updatePassword->execute();
                }

                $con->commit();

                // Destroy session after update
                session_destroy();

                // Redirect with JavaScript to avoid immediate redirect before session is destroyed
                echo "<script>
                        alert('Account updated successfully. You will be logged out.');
                        window.location.href = 'index.php';
                      </script>";
                exit();
            } catch (Exception $e) {
                $con->rollback();
                $error_message = "Error updating account: " . $e->getMessage();
            }
        }
    }
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Settings | ERMS</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                                            <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                                <li>
                                                    <a href="dashboard.php">
                                                        <i class="fa fa-home"></i> Home
                                                    </a>
                                                    <span class="bread-slash">/</span>
                                                    <a href="#"> Settings </a>
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
                                                                        <input type="password" id="confirmPassword" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                                                        <i class="fas fa-eye toggle-password" onclick="togglePassword('confirmPassword', this)"></i>
                                                                    </div>
                                                                    <button type="submit" name="update_account" class="btn btn-primary waves-effect waves-light">Update</button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Footer-part-->
            <?php include 'includes/footer.php'; ?>