<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login | Employee Records</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
  <link
    href="https://fonts.googleapis.com/css?family=Play:400,700"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/owl.theme.css" />
  <link rel="stylesheet" href="css/owl.transitions.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/morrisjs/morris.css" />
  <link
    rel="stylesheet"
    href="css/scrollbar/jquery.mCustomScrollbar.min.css" />
  <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css" />
  <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css" />
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
  <link rel="stylesheet" href="css/form/all-type-forms.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">
        <img src="img/logo.png" alt="Logo" style="max-width: 120px; margin-bottom: 10px;">
        <h3>ADMIN LOGIN</h3>
        <p>Employee Records Management System</p>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="#" id="loginForm">
              <div class="form-group">
                <label class="control-label" for="username">Username</label>
                <input
                  type="text"
                  placeholder="example@gmail.com"
                  title="Please enter you username"
                  required=""
                  value=""
                  name="username"
                  id="username"
                  class="form-control" />
                <span class="help-block small">Your unique username to app</span>
              </div>

              <div class="form-group" style="position: relative;">
                <label class="control-label" for="password">Password</label>
                <input
                  type="password"
                  title="Please enter your password"
                  placeholder="******"
                  required=""
                  name="password"
                  id="password"
                  class="form-control" />
                <i class="fas fa-eye" id="togglePassword"
                  style="position: absolute; right: 10px; top: 55%; cursor: pointer; font-size: 1.3em;">
                </i>
              </div>

              <!-- FontAwesome for Icons -->
              <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

              <!-- Password Toggle Script -->
              <script>
                const togglePassword = document.getElementById("togglePassword");
                const passwordField = document.getElementById("password");

                togglePassword.addEventListener("click", function() {
                  // Toggle the type attribute
                  const type = passwordField.type === "password" ? "text" : "password";
                  passwordField.type = type;

                  // Toggle the icon between eye and eye-slash
                  this.classList.toggle("fa-eye-slash");
                });
              </script>

              <div class="checkbox login-checkbox">
                <label>
                  <input type="checkbox" class="i-checks" /> Remember Me
                </label>
                <p class="help-block small">
                  (if this is a private computer)
                </p>
              </div>
              <button class="btn btn-success btn-block loginbtn" onclick="window.location.href='dashboard.php'">
    Login
</button>

            </form>
          </div>
        </div>
      </div>
      <div class="text-center login-footer">
        <!-- Footer-part -->
        <div class="row-fluid">
          <div id="footer" class="span12">
            <?php echo date("Y"); ?> &copy; Municipality of Mataasnakahoy
          </div>
        </div>
      </div>
    </div>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <script src="js/tab.js"></script>
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/tawk-chat.js"></script>
</body>

</html>