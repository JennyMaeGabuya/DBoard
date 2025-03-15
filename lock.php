<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Lock Account | ERMS</title>
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
</head>

<body>

  <!--[if lt IE 8]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve
        your experience.
      </p>
    <![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="hpanel">
        <div class="panel-body text-center lock-inner">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <br />
          <h4>
            <span class="text-success">3:43:15 PM</span>
            <strong>Friday, February 27, 2015</strong>
          </h4>
          <p>
            Your are in lock screen. Main app was shut down and you need to
            enter your passwor to go back to app.
          </p>
          <form action="#" class="m-t">
            <div class="form-group">
              <input
                type="password"
                required=""
                placeholder="******"
                class="form-control" />
            </div>
            <button class="btn btn-primary block full-width" type="submit">
              Unlock
            </button>
          </form>
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