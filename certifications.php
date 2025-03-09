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
  <title>Certificates | ERMS</title>
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

  <style>
    .clickable-container {
      display: block;
      text-decoration: none;
      color: inherit;
    }

    .courses-title {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 10px;
      border-radius: 10px;
      color: rgba(0, 0, 0, 0.44);
      font-weight: bold;
      transition: background 0.3s ease, transform 0.2s ease;
      cursor: pointer;
    }

    /* Hover effect */
    .courses-title:hover {
      background-color: rgb(244, 244, 244);
      transform: scale(1.03);
      color: black;
    }

    .fixed-img {
      width: 180px;
      height: 150px;
      object-fit: cover;
      border-radius: 5px;
    }
  </style>

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
          <div class="breadcome-list">
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
                            <strong>Issue Certifications</strong>
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

    <div class="courses-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner">
              <a href="#appointedModal" data-toggle="modal" class="clickable-container">
                <div class="courses-title">
                  <img src="img/certificate/appointed.png" alt="" class="fixed-img" />
                  <h4 style="margin-top: 15px; margin-bottom: 0;">Appointed Certificate</h4>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner">
              <a href="#electedModal" data-toggle="modal" class="clickable-container">
                <div class="courses-title">
                  <img src="img/certificate/elected.png" alt="" class="fixed-img" />
                  <h4 style="margin-top: 15px; margin-bottom: 0;">Elected Certificate</h4>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Appointed Certificate Modal -->
    <div class="modal fade" id="appointedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary" style="border-radius: 3px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Appointed Certificate</h4>
          </div>
          <div class="modal-body">
            <form id="appointedForm">
              <h4 class="text-center">BASIC INFORMATION</h4>
              <hr>
              <div class="row">
                <div class="form-group col-md-6 mb-2">
                  <label>Fullname</label>
                  <input type="text" class="form-control" name="fullname" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Surname <em>(please specify)</em></label>
                  <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Sex</label>
                  <select name="sex" class="form-control" required>
                    <option value="" selected disabled>Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Start Date</label>
                  <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Position</label>
                  <input type="text" class="form-control" name="position" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Office Appointed</label>
                  <input type="text" class="form-control" name="office_appointed" required>
                </div>
              </div>

              <br>
              <hr>
              <h4 class="text-center">ANNUAL SALARY</h4>
              <hr>

              <div class="row">
                <div class="form-group col-md-4">
                  <label>Salary</label>
                  <input type="number" step="0.01" class="form-control" name="salary" required>
                </div>
                <div class="form-group col-md-4">
                  <label>PERA</label>
                  <input type="number" step="0.01" class="form-control" name="pera" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Representation and Transpo Allowance</label>
                  <input type="number" step="0.01" class="form-control" name="rta" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Clothing</label>
                  <input type="number" step="0.01" class="form-control" name="clothing" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Mid-Year Bonus</label>
                  <input type="number" step="0.01" class="form-control" name="mid_year_bonus" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Year-End Bonus</label>
                  <input type="number" step="0.01" class="form-control" name="year_end_bonus" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Cash Gift</label>
                  <input type="number" step="0.01" class="form-control" name="cash_gift" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Productivity Enhancement Incentive</label>
                  <input type="number" step="0.01" class="form-control" name="productivity_enhancement" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Date Issued</label>
                  <input type="date" class="form-control" name="date_issued" required id="adateIssued">
                </div>

                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    let today = new Date().toISOString().split("T")[0];
                    document.getElementById("adateIssued").value = today;
                  });
                </script>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="basic-infobtn">Issue Certificate</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Elected Certificate Modal -->
    <div class="modal fade" id="electedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary" style="border-radius: 3px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Elected Certificate</h4>
          </div>
          <div class="modal-body">
            <form id="electedForm">
              <h4 class="text-center">BASIC INFORMATION</h4>
              <hr>
              <div class="row">
                <div class="form-group col-md-6 mb-2">
                  <label>Fullname</label>
                  <input type="text" class="form-control" name="fullname" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Surname <em>(please specify)</em></label>
                  <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label>Sex</label>
                  <select name="sex" class="form-control" required>
                    <option value="" selected disabled>Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Start Date</label>
                  <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Position</label>
                  <input type="text" class="form-control" name="position" required>
                </div>
              </div>

              <br>
              <hr>
              <h4 class="text-center">ANNUAL SALARY</h4>
              <hr>

              <div class="row">
                <div class="form-group col-md-4">
                  <label>Salary</label>
                  <input type="number" step="0.01" class="form-control" name="salary" required>
                </div>
                <div class="form-group col-md-4">
                  <label>PERA</label>
                  <input type="number" step="0.01" class="form-control" name="pera" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Representation and Transpo Allowance</label>
                  <input type="number" step="0.01" class="form-control" name="rta" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Clothing</label>
                  <input type="number" step="0.01" class="form-control" name="clothing" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Mid-Year Bonus</label>
                  <input type="number" step="0.01" class="form-control" name="mid_year_bonus" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Year-End Bonus</label>
                  <input type="number" step="0.01" class="form-control" name="year_end_bonus" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Cash Gift</label>
                  <input type="number" step="0.01" class="form-control" name="cash_gift" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Productivity Enhancement Incentive</label>
                  <input type="number" step="0.01" class="form-control" name="productivity_enhancement" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Date Issued</label>
                  <input type="date" class="form-control" name="date_issued" required id="edateIssued">
                </div>

                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    let today = new Date().toISOString().split("T")[0];
                    document.getElementById("edateIssued").value = today;
                  });
                </script>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="basic-infobtn">Issue Certificate</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $("#appointedForm, #electedForm").submit(function(e) {
          e.preventDefault();

          let form = $(this);
          let formData = form.serialize();
          let type = form.attr("id") === "appointedForm" ? "appointed" : "elected";

          formData += "&type=" + type;

          $.ajax({
            url: "issue-certificate.php",
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function() {
              Swal.fire({
                title: "Processing...",
                text: "Please wait while we issue the certificate.",
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                  Swal.showLoading();
                },
              });
            },
            success: function(response) {
              if (response.status === "success") {
                Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: "Certificate issued successfully!",
                  showConfirmButton: true,
                  confirmButtonText: "View Certificate",
                }).then((result) => {
                  if (result.isConfirmed) {
                    let reportType = type === "appointed" ? "appointed" : "elected";
                    window.open(`reports/${reportType}.php?id=${response.id}`, "_blank");
                  }

                  // Clear the form inputs
                  form.trigger("reset");
                });
              } else {
                Swal.fire({
                  icon: "error",
                  title: "Error!",
                  text: response.message,
                  showConfirmButton: true,
                });
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error("AJAX Error:", jqXHR.responseText);
              Swal.fire({
                icon: "error",
                title: "Request Failed!",
                text: `Error: ${textStatus} - ${errorThrown}`,
                showConfirmButton: true,
              });
            },
          });
        });
      });
    </script>

  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>