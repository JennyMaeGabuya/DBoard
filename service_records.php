<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";

if (isset($_GET['empno'])) {
    $employee_no = $_GET['empno'];


    // Prepare the SQL statement
    $query = "SELECT * 
FROM service_records WHERE employee_no = ?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("s", $employee_no); // "s" means string

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $employee_no = $row['employee_no'];
        $from = $row['from_date'];
        $to = $row['to_date'];
        $designation = $row['designation'];
        $status = $row['status'];
        $salary = $row['salary'];
        $station_place = $row['station_place'];
        $branch = $row['branch'];
        $abs_wo_pay = $row['abs_wo_pay'];
        $date = $row['date_separated'];
        $cause = $row['cause_of_separation'];
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Service Records | ERMS</title>
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
                    <a href="all_employee.php">
                      <i class="fas fa-certificate"></i> <strong>Employee</strong>
                    </a>
                    <span class="bread-slash"> / </span>
                    <a>
                      <i class="fas fa-history"></i> <strong>Service Records</strong>
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
            <h4>Service Records</h4>

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

                    <th>From</th>
                    <th>To</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th>Salary</th>
                    <th>Station</th>
                    <th>Branch</th>
                    <th>Abs. W/o Pay</th>
                    <th>Date</th>
                    <th>Cause</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $stmt = $con->prepare("
                                    SELECT * 
                                    FROM service_records WHERE employee_no = ?
                                    ORDER BY to_date DESC
                                ");
                 $stmt->bind_param("s", $employee_no);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $count = 1;

                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $count; ?></td>
                      <td><?php echo htmlspecialchars($row['from_date']); ?></td>
                      <td><?php echo htmlspecialchars($row['to_date']); ?></td>
                      <td><?php echo htmlspecialchars($row['designation']); ?></td>
                      <td><?php echo htmlspecialchars($row['status']); ?></td>
                      <td><?php echo htmlspecialchars($row['salary']); ?></td>
                      <td><?php echo htmlspecialchars($row['station_place']); ?></td>
                      <td><?php echo htmlspecialchars($row['branch']); ?></td>
                      <td><?php echo htmlspecialchars($row['abs_wo_pay']); ?></td>
                      <td><?php echo htmlspecialchars($row['date_separated']); ?></td>
                      <td><?php echo htmlspecialchars($row['cause_of_separation']); ?></td>
                      <!--<td><?php echo date("F d, Y", strtotime($row['date_issued'])); ?></td>-->
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