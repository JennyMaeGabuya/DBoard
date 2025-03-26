<?php
session_start();
require 'dbcon.php';

if (!isset($_GET['token'])) {
    $_SESSION['error'] = "Invalid password reset link.";
    header("Location: index.php");
    exit();
}

$token = $_GET['token'];
$stmt = $con->prepare("SELECT email FROM admin WHERE reset_token = ? AND reset_expires > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Invalid or expired reset link.";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $con->prepare("UPDATE admin SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $new_password, $token);
    $stmt->execute();

    $_SESSION['success'] = "Password reset successfully. You can now log in.";
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Reset Password | ERMS</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/mk-logo.ico" />
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.theme.css" />
    <link rel="stylesheet" href="css/owl.transitions.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/morrisjs/morris.css" />
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css" />
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css" />
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css" />
    <link rel="stylesheet" href="css/form/all-type-forms.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .spin-logo {
            max-width: 120px;
            margin-bottom: 15px;
            display: inline-block;
            animation: spin 5s linear infinite;
        }

        .error-pagewrap {
            position: relative;
            top: -15px;
        }

        @keyframes spin {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        .error-pagewrap {
            margin-top: -15px;
        }

        html,
        body {
            background: url('img/kahoyhall.png') no-repeat center center fixed;
            background-size: cover;
            background-blend-mode: overlay;
            background-color: rgba(0, 0, 0, 0.5);

        }

        h3,
        p {
            text-align: center;
        }

        .hpanel {
            background: rgb(255, 255, 255);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 5px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(240, 238, 238, 0.8);
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 2px 7px rgba(255, 255, 255, 0.63);
            border: 2px solid rgba(168, 166, 166, 0.06);
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <img src="img/spin-logo.png" alt="Logo" class="spin-logo">
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="loginFields">
                            <div class="form-group">
                                <h3 style="margin-bottom: 30px;">Reset Password</h3>
                                <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <form action="" method="POST" onsubmit="return validatePasswords()">
                                    <div class="form-group" style="position: relative;">
                                        <input type="password" title="Please enter your password" placeholder="New Password"
                                            required name="new_password" id="new_password" class="form-control" />
                                        <span class="help-block small">Enter your desired new password</span>
                                        <i class="fas fa-eye" id="toggleNewPassword"
                                            style="position: absolute; right: 10px; top: 18%; cursor: pointer; font-size: 1.3em;"></i>
                                    </div>

                                    <div class="form-group" style="position: relative; margin-top: 10px;">
                                        <input type="password" title="Please confirm your password" placeholder="Confirm New Password"
                                            required name="confirm_password" id="confirm_password" class="form-control" />
                                        <span class="help-block small">Re-enter your new password</span>
                                        <i class="fas fa-eye" id="toggleConfirmPassword"
                                            style="position: absolute; right: 10px; top: 18%; cursor: pointer; font-size: 1.3em;"></i>
                                    </div>

                                    <div id="passwordError" style="color: red; font-size: 0.9em; display: none;">Passwords do not match.</div>

                                    <button type="submit" class="btn btn-warning btn-block" style="margin-top: 20px;">Reset Password</button>
                                </form>

                            </div>
                        </div>

                        <div class="text-center login-footer">
                            <div class="row-fluid">
                                <div id="footer" class="span12">
                                    <?php echo date("Y"); ?> &copy; Municipality of Mataasnakahoy
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle Password Visibility for New Password
            function togglePasswordVisibility(toggleButtonId, passwordFieldId) {
                const passwordField = document.getElementById(passwordFieldId);
                const toggleButton = document.getElementById(toggleButtonId);

                if (toggleButton) {
                    toggleButton.addEventListener("click", function() {
                        const isPassword = passwordField.type === "password";
                        passwordField.type = isPassword ? "text" : "password";
                        toggleButton.classList.toggle("fa-eye-slash", isPassword);
                        toggleButton.classList.toggle("fa-eye", !isPassword);
                    });
                }
            }

            togglePasswordVisibility("toggleNewPassword", "new_password");
            togglePasswordVisibility("toggleConfirmPassword", "confirm_password");
        });

        function validatePasswords() {
            const newPassword = document.getElementById("new_password").value;
            const confirmPassword = document.getElementById("confirm_password").value;
            const passwordError = document.getElementById("passwordError");

            if (newPassword !== confirmPassword) {
                passwordError.style.display = "block";
                return false; // Prevent form submission
            } else {
                passwordError.style.display = "none";
                return true; // Allow form submission
            }
        }
    </script>

</body>

</html>