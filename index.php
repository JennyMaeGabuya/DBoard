<?php
session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mataasnakahoy | Employee Records Management System</title>
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

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
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            position: relative;
            background: url('img/kahoyhall.png') no-repeat center center fixed;
            background-size: cover;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hpanel {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255);
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

        h3,
        p {
            text-align: center;
        }

        h3 {

            font-size: 25px !important;
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
                        <!-- Login Form -->
                        <form action="login.php" method="POST" id="authForm">
                            <div id="loginFields">
                                <div class="form-group">
                                    <h3>ADMIN LOGIN</h3>
                                    <p>Employee Records Management System</p>
                                    <input type="text" placeholder="Email" required name="username" id="username" class="form-control">
                                    <span class="help-block small">Enter your username or email</span>
                                </div>
                                <div class="form-group" style="position: relative;">
                                    <input type="password" placeholder="Password" required name="password" id="password" class="form-control">
                                    <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 30%; cursor: pointer; font-size: 1.3em;"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="rememberMe" class="i-checks" style="margin: 5px;">
                                        <label for="rememberMe" style="font-weight: normal; margin-top: 5px;">Remember Me</label>
                                    </div>
                                    <button type="button" class="btn btn-link" onclick="toggleAuthMode()">Forgot Password?</button>
                                </div>
                                <button id="loginButton" class="btn btn-primary waves-effect waves-light btn-block loginbtn" disabled>
                                    <i id="buttonIcon" class="fas fa-lock"></i> Login
                                </button>
                            </div>
                        </form>

                        <!-- Forgot Password Form -->
                        <form action="resetpass-email.php" method="POST" id="forgotPasswordForm">
                            <div id="forgotPasswordFields" style="display: none;">
                                <div class="text-center ps-recovered">
                                    <h3>PASSWORD RECOVERY</h3>
                                </div>
                                <p>Enter your email address and a reset link will be emailed to the address provided.</p>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" required name="email" id="email" class="form-control">
                                    <span class="help-block small">Your registered email address</span>
                                </div>
                                <button type="submit" class="btn btn-success btn-block" id="resetButton" style="margin-top: 20px;">
                                    Reset password
                                </button>
                                <button type="button" class="btn btn-link btn-block" onclick="toggleAuthMode()" style="margin: 0;">
                                    Back to Login
                                </button>
                            </div>
                        </form>

                        <!-- Footer -->
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

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle between Login and Forgot Password
            window.toggleAuthMode = function() {
                const loginFields = document.getElementById("loginFields");
                const forgotPasswordFields = document.getElementById("forgotPasswordFields");
                const isLoginVisible = loginFields.style.display !== "none";

                loginFields.style.display = isLoginVisible ? "none" : "block";
                forgotPasswordFields.style.display = isLoginVisible ? "block" : "none";
            };

            // Toggle Password Visibility
            const passwordField = document.getElementById("password");
            const togglePassword = document.getElementById("togglePassword");

            togglePassword.addEventListener("click", function() {
                const isPassword = passwordField.type === "password";
                passwordField.type = isPassword ? "text" : "password";
                togglePassword.classList.toggle("fa-eye-slash", isPassword);
                togglePassword.classList.toggle("fa-eye", !isPassword);
            });

            // Remember Me Functionality
            const usernameField = document.getElementById("username");
            const rememberMeCheckbox = document.getElementById("rememberMe");

            if (localStorage.getItem("rememberedUsername")) {
                usernameField.value = localStorage.getItem("rememberedUsername");
                rememberMeCheckbox.checked = true;
            }

            document.getElementById("authForm").addEventListener("submit", function() {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem("rememberedUsername", usernameField.value);
                } else {
                    localStorage.removeItem("rememberedUsername");
                }
            });

            // Prevent double submission on reset password form
            const resetPasswordForm = document.getElementById("forgotPasswordForm");
            const resetButton = document.getElementById("resetButton");

            if (resetPasswordForm) {
                resetPasswordForm.addEventListener("submit", function() {
                    resetButton.disabled = true;
                    resetButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                });
            }

            // Enable/Disable Login Button
            const loginButton = document.getElementById("loginButton");

            function toggleButtonState() {
                loginButton.disabled = !(usernameField.value.trim() && passwordField.value.trim());
            }

            usernameField.addEventListener("input", toggleButtonState);
            passwordField.addEventListener("input", toggleButtonState);

            // Show SweetAlert2 Messages
            <?php if (isset($_SESSION['success'])): ?>
                Swal.fire({
                    title: "Success!",
                    text: "<?php echo $_SESSION['success']; ?>",
                    icon: "success",
                    confirmButtonText: "OK"
                });
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                Swal.fire({
                    title: "Error!",
                    text: "<?php echo $_SESSION['error']; ?>",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        });
    </script>

</body>

</html>