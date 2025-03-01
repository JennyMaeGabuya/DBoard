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
  <title>Certifications History | ERMS</title>
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
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <div class="col-lg-12">
          <div class="breadcome-list single-page-breadcome">
            <div class="row">
              <div class="col-lg-12">
                <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                  <li>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                    <a href="dashboard.php">
                      <i class="fas fa-home"></i> <strong>Home</strong>
                    </a>
                    <span class="bread-slash"> / </span>
                    <a href="certifications.php">
                      <i class="fas fa-certificate"></i> <strong>Certificates</strong>
                    </a>
                    <span class="bread-slash"> / </span>
                    <a>
                      <i class="fas fa-history"></i> <strong>History</strong>
                    </a>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="product-status mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="product-status-wrap drp-lst">
            <h4>Issued Certificates</h4>

            <div class="widget-box">
              <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
              <script>
                $(function() {
                  new DataTable('#certHistoryTable', {
                    responsive: true,
                    autoWidth: false,
                    language: {
                      lengthMenu: "Show _MENU_ entries"
                    },
                  });
                });
              </script>
            </div>

            <div class="asset-inner">
              <table id="certHistoryTable" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Certificate Type</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Office / Department</th>
                    <th>Start Date</th>
                    <th>Date Issued</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $stmt = $con->prepare("
                                    SELECT id, 'Appointed' AS cert_type, fullname, position, office_appointed AS department, start_date, date_issued 
                                    FROM appointed_cert_issuance 
                                    UNION ALL 
                                    SELECT id, 'Elected' AS cert_type, fullname, position, 'N/A' AS department, start_date, date_issued 
                                    FROM elected_cert_issuance 
                                    ORDER BY date_issued DESC
                                ");

                  $stmt->execute();
                  $result = $stmt->get_result();
                  $count = 1;

                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $count; ?></td>
                      <td style="text-align: center;">
                        <span style="padding: 5px 10px; border-radius: 20px; color: white; background-color: <?php echo ($row['cert_type'] == 'Appointed') ? '#007bff' : '#28a745'; ?>;">
                          <?php echo htmlspecialchars($row['cert_type']); ?>
                        </span>
                      </td>

                      <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                      <td><?php echo htmlspecialchars($row['position']); ?></td>
                      <td><?php echo htmlspecialchars($row['department']); ?></td>
                      <td><?php echo date("F d, Y", strtotime($row['start_date'])); ?></td>
                      <td><?php echo date("F d, Y", strtotime($row['date_issued'])); ?></td>
                      <td>
                        <div style="text-align: center;">
                          <a href="reports/<?php echo strtolower($row['cert_type']); ?>.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" title="View Certificate" target="_blank">
                            <i class="fa fa-file-pdf"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php
                    $count++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>