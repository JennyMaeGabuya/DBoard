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
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
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
            margin-bottom: 10px;
            display: inline-block;
            animation: spin 5s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        /* Landing Page Modal */
        .landing-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(199, 199, 199, 0.43);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Landing Content */
        .landing-content {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        /* Ensuring text remains readable */
        .landing-content h3,
        .landing-content p {
            color: black;
            font-family: 'Play', sans-serif;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: transparent !important;
            color: red !important;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease-in-out;
        }

        .close-btn:hover {
            background-color: rgba(255, 0, 0, 0.18) !important;
            border-radius: 20px;
        }

        .carousel {
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
        }

        .carousel img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .slick-slide {
            display: block !important;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: red;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .close-btn:hover {
            background: darkred;
        }
    </style>
</head>

<body>
    <!-- Landing Page Modal -->
    <div class="landing-modal" id="landingModal">
        <div class="landing-content">
            <button class="close-btn" onclick="closeModal()">x</button>
            <h3 style="margin-bottom: 20px;">Employee Records Management System</h3>

            <!-- Slick Carousel Wrapper -->
            <section class="slider carousel">
                <div><img src="img/landing/cs-1.jpg" alt="Image 1"></div>
                <div><img src="img/landing/cs-2.jpg" alt="Image 2"></div>
                <div><img src="img/landing/cs-3.jpg" alt="Image 3"></div>
                <div><img src="img/landing/cs-4.jpg" alt="Image 4"></div>
            </section>
        </div>
    </div>


    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <img src="img/spin-logo.png" alt="Logo" class="spin-logo">
                <h3>ADMIN LOGIN</h3>
                <p>Employee Records Management System</p>
            </div>

            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="login.php" method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username/Email</label>
                                <input
                                    type="text"
                                    placeholder="Email"
                                    title="Please enter your username"
                                    required
                                    name="username"
                                    id="username"
                                    class="form-control" />
                                <span class="help-block small">Enter your username or email</span>
                            </div>

                            <div class="form-group" style="position: relative;">
                                <label class="control-label" for="password">Password</label>
                                <input
                                    type="password"
                                    title="Please enter your password"
                                    placeholder="Password"
                                    required
                                    name="password"
                                    id="password"
                                    class="form-control" />
                                <i class="fas fa-eye" id="togglePassword"
                                    style="position: absolute; right: 10px; top: 55%; cursor: pointer; font-size: 1.3em;">
                                </i>
                            </div>

                            <div class="checkbox login-checkbox" style="margin-left: 25px;">
                                <label>
                                    <input type="checkbox" id="rememberMe" class="i-checks"> Remember Me
                                </label>
                            </div>

                            <button id="loginButton" class="btn btn-success btn-block loginbtn" disabled>
                                <i id="buttonIcon" class="fas fa-lock"></i> Login
                            </button>
                        </form>
                    </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Slick Carousel
            if (typeof jQuery !== 'undefined') {
                $('.slider').slick({
                    autoplay: true,
                    autoplaySpeed: 2000,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    cssEase: 'linear',
                    arrows: true,
                    dots: true
                });
            } else {
                console.error("jQuery is not loaded!");
            }

            // Close Modal Function
            window.closeModal = function() {
                document.getElementById('landingModal').style.display = 'none';
            };

            // Close Modal When Clicking Outside
            document.getElementById('landingModal').addEventListener("click", function(event) {
                const modalContent = document.querySelector(".landing-content");
                if (!modalContent.contains(event.target)) {
                    closeModal();
                }
            });

            // Remember Me Functionality
            const usernameField = document.getElementById("username");
            const rememberMeCheckbox = document.getElementById("rememberMe");

            if (localStorage.getItem("rememberedUsername")) {
                usernameField.value = localStorage.getItem("rememberedUsername");
                rememberMeCheckbox.checked = true;
            }

            document.getElementById("loginForm").addEventListener("submit", function() {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem("rememberedUsername", usernameField.value);
                } else {
                    localStorage.removeItem("rememberedUsername");
                }
            });

            // Toggle Password Visibility
            const passwordField = document.getElementById("password");
            const togglePassword = document.getElementById("togglePassword");

            togglePassword.addEventListener("click", function() {
                const isPassword = passwordField.type === "password";
                passwordField.type = isPassword ? "text" : "password";
                togglePassword.classList.toggle("fa-eye-slash", isPassword);
                togglePassword.classList.toggle("fa-eye", !isPassword);
            });

            // Enable/Disable Login Button
            const loginButton = document.getElementById("loginButton");

            function toggleButtonState() {
                loginButton.disabled = !(usernameField.value.trim() && passwordField.value.trim());
            }

            usernameField.addEventListener("input", toggleButtonState);
            passwordField.addEventListener("input", toggleButtonState);

            // SweetAlert2 for Login Feedback
            <?php if (isset($_SESSION['success'])): ?>
                Swal.fire({
                    title: "Success!",
                    text: "<?php echo $_SESSION['success']; ?>",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "dashboard.php"; // Redirect after user clicks OK
                });
                <?php unset($_SESSION['success']); ?> // Clear session message
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                Swal.fire({
                    title: "Error!",
                    text: "<?php echo $_SESSION['error']; ?>",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                <?php unset($_SESSION['error']); ?> // Clear session error
            <?php endif; ?>
        });
    </script>

</body>

</html>