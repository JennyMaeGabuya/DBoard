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
            /* Itaas ang logo */
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
            background: rgba(255, 255, 255, 0.89);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.73);
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
            background: transparent;
            color: red;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease-in-out;
            border: none;
        }

        .close-btn:hover {
            background-color: rgba(255, 0, 0, 0.18);
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

        .slick-prev,
        .slick-next {
            color: black !important;
            z-index: 1000;
        }

        .slick-prev::before,
        .slick-next::before {
            color: black !important;
        }

        .slick-prev:hover::before,
        .slick-next:hover::before {
            color: darkgray !important;
        }

        html, body {
            background: url('img/kahoyhall.png') no-repeat center center fixed;
            background-size: cover;
            background-blend-mode: overlay;
            background-color: rgba(0, 0, 0, 0.5);

        }

        h3,
        p {
            text-align: center;
        }

        content-error {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Para nasa gitna */
        }

        .hpanel {
            background: rgb(255, 255, 255);
            /* Semi-transparent white */
            backdrop-filter: blur(20px);
            /* Glass effect */
            -webkit-backdrop-filter: blur(20px);
            padding: 5px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(240, 238, 238, 0.8);
            /* Shadow effect */
            max-width: 500px;
            /* Limit ang laki */
            width: 100%;
            text-align: center;
            box-shadow: 0 2px 7px rgba(255, 255, 255, 0.63);
            border: 2px solid rgba(168, 166, 166, 0.06);
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
            </div>

            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="login.php" method="POST" id="loginForm">
                            <div class="form-group">
                                <h3>ADMIN LOGIN</h3>
                                <p>Employee Records Management System</p>
                                <input type="text" placeholder="Email" title="Please enter your username" required
                                    name="username" id="username" class="form-control" />
                                <span class="help-block small">Enter your username or email</span>
                            </div>

                            <div class="form-group" style="position: relative;">
                                <input type="password" title="Please enter your password" placeholder="Password"
                                    required name="password" id="password" class="form-control" />
                                <i class="fas fa-eye" id="togglePassword"
                                    style="position: absolute; right: 10px; top: 30%; cursor: pointer; font-size: 1.3em;">
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

                            <div class="text-center login-footer">
                                <div class="row-fluid">
                                    <div id="footer" class="span12">
                                        <?php echo date("Y"); ?> &copy; Municipality of Mataasnakahoy
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
            window.closeModal = function () {
                document.getElementById('landingModal').style.display = 'none';
            };

            // Close Modal When Clicking Outside
            document.getElementById('landingModal').addEventListener("click", function (event) {
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

            document.getElementById("loginForm").addEventListener("submit", function () {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem("rememberedUsername", usernameField.value);
                } else {
                    localStorage.removeItem("rememberedUsername");
                }
            });

            // Toggle Password Visibility
            const passwordField = document.getElementById("password");
            const togglePassword = document.getElementById("togglePassword");

            togglePassword.addEventListener("click", function () {
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