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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
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
                          <a href="all-employees.php">
                            Employees
                          </a>
                          <span class="bread-slash"> / </span>
                          <a href="#">
                            <strong>Service Records</strong>
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
  </div>

  <div class="product-status mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-status-wrap drp-lst">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <h4>Service Records</h4>
            </div>

            <div class="row">
              <div class="col-md-6 text-right">
                <div class="button-container">
                  <a href="#addservice" data-toggle="modal" class="btn btn-primary btn-border btn-round btn-sm">
                    <i class="fa-solid fa-plus-circle"></i> Add Service Record
                  </a>

                  <a href="reports/serviceRecords.php?id=<?php echo $employee_no ?>" class="btn btn-danger btn-border btn-round btn-sm"
                    target="_blank">
                    <i class="fa-solid fa-file-pdf"></i> PDF
                  </a>
                </div>
              </div>
            </div>

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
                                    ORDER BY id DESC
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

                          <a href="#editservice" data-toggle="modal" data-empid="<?php echo $row['id']; ?>"
                            class="btn btn-success btn-border btn-round btn-sm">
                            <i class="fa fa-pencil"></i>
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

  <script>
    $(document).ready(function() {
      $('.btn-success').on('click', function() {
        var empid = $(this).data('empid'); // Get empid from the button's data attribute
        var row = $(this).closest('tr'); // Get the closest row
        var empno = '<?php echo $employee_no; ?>'; // Assuming employee_no is available in the PHP context
        var from = row.find('td:nth-child(2)').text(); // From date
        var to = row.find('td:nth-child(3)').text(); // To date
        var designation = row.find('td:nth-child(4)').text(); // Designation
        var status = row.find('td:nth-child(5)').text(); // Status
        var salary = row.find('td:nth-child(6)').text(); // Salary
        var station = row.find('td:nth-child(7)').text(); // Station
        var branch = row.find('td:nth-child(8)').text(); // Branch
        var abs = row.find('td:nth-child(9)').text(); // Absent without pay
        var date = row.find('td:nth-child(10)').text(); // Date separated
        var cause = row.find('td:nth-child(11)').text(); // Cause of separation

        // Populate the modal fields
        $('#editservice .modal-body').find('input[name="empid"]').val(empid); // Set empid
        $('#editservice .modal-body').find('input[name="empno"]').val(empno); // Set empno
        $('#editservice .modal-body').find('input[name="from"]').val(from); // Set from date
        $('#editservice .modal-body').find('input[name="to"]').val(to); // Set to date
        $('#editservice .modal-body').find('input[name="designation"]').val(designation); // Set designation
        $('#editservice .modal-body').find('input[name="status"]').val(status); // Set status
        $('#editservice .modal-body').find('input[name="salary"]').val(salary); // Set salary
        $('#editservice .modal-body').find('input[name="station"]').val(station); // Set station
        $('#editservice .modal-body').find('input[name="branch"]').val(branch); // Set branch
        $('#editservice .modal-body').find('input[name="abs"]').val(abs); // Set absent without pay
        $('#editservice .modal-body').find('input[name="date"]').val(date); // Set date separated
        $('#editservice .modal-body').find('input[name="cause"]').val(cause); // Set cause of separation
      });
    });
  </script>

  <!-- EDIT SERVICE RECORDS FORM MODAL-->
  <div class="modal fade" id="editservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary" style="border-radius: 3px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">SERVICE RECORDS</h4>
        </div>

        <div class="modal-body">
          <form method="POST" action="editservice_record.php" method="POST" enctype="multipart/form-data">

            <input name="empid" type="hidden" value="empid" />

            <div class="row">

              <div class="form-group col-md-4 mb-2">
                <label>Employee Number</label>
                <input name="empno" type="text" class="form-control" placeholder="Employee Number"
                  readonly />
              </div>
              <div class="form-group col-md-4">
                <label>From</label>
                <input name="from" type="date" class="form-control" />
              </div>
              <div class="form-group col-md-4">
                <label>To</label>
                <input name="to" type="date" class="form-control" placeholder="Pera" required />
              </div>

            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Designation</label>
                <div class="form-group">
                  <input name="designation" type="text" class="form-control" required />
                </div>
              </div>

              <div class="form-group col-md-4">
                <label>Status</label>
                <input name="status" type="text" class="form-control" required />
              </div>
              <div class="form-group col-md-4">
                <label>Salary</label>
                <input name="salary" type="number" class="form-control" value="<?php echo $salary; ?>" required />
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Station Place</label>
                <input name="station" type="text" class="form-control" required />
              </div>
              <div class="form-group col-md-4">
                <label>Branch</label>
                <input name="branch" type="text" class="form-control" required />
              </div>
              <div class="form-group col-md-4">
                <label>Absent without Pay</label>
                <input name="abs" type="text" class="form-control" required />
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Date Separated</label>
                <input name="date" type="date" class="form-control" />
              </div>

              <div class="form-group col-md-8">
                <label>Cause of Separation</label>
                <input name="cause" type="text" class="form-control" />
              </div>

            </div>
        </div>

        <div class="modal-footer">
          <!--  <input type="hidden" id="pos_id" name="id"> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="serviceupdatebtn">Update</button>

        </div>

        </form>
      </div>
    </div>
  </div>

  <?php if (isset($_SESSION['display'])) : ?>
    <script>
      Swal.fire({
        title: '<?php echo $_SESSION['title']; ?>',
        text: '<?php echo $_SESSION['display']; ?>',
        icon: '<?php echo $_SESSION['success']; ?>',
        confirmButtonText: 'OK'
      });
    </script>
    <?php unset($_SESSION['display']);
    unset($_SESSION['success']); ?>
  <?php endif; ?>

  <!--SERVICE RECORDS FORM MODAL-->
  <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary" style="border-radius: 3px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">SERVICE RECORDS</h4>
        </div>

        <div class="modal-body">
          <form method="POST" action="service-info.php" method="POST" enctype="multipart/form-data">

            <div class="row">
              <div class="form-group col-md-4 mb-2">
                <label>Employee Number</label>
                <input
                  name="emp_no"
                  type="text"
                  class="form-control"
                  placeholder="Employee Number" value="<?php echo $employee_no; ?>" readonly />
              </div>
              <div class="form-group col-md-4">
                <label>From</label>
                <input
                  name="date_started"
                  type="date"
                  class="form-control"
                  placeholder="Salary" />
              </div>
              <div class="form-group col-md-4">
                <label>To</label>
                <input
                  name="date_ended"
                  type="date"
                  class="form-control"
                  placeholder="Pera" required />
              </div>

            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Designation</label>
                <div class="form-group">
                  <input
                    name="designation"
                    type="text"
                    class="form-control"
                    required />
                </div>
              </div>

              <div class="form-group col-md-4">
                <label>Status</label>
                <input
                  name="status"
                  type="text"
                  class="form-control"
                  required />
              </div>
              <div class="form-group col-md-4">
                <label>Salary</label>
                <input
                  name="servicesalary"
                  type="number"
                  class="form-control"
                  required />
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Station Place</label>
                <input
                  name="station"
                  type="text"
                  class="form-control"
                  required />
              </div>
              <div class="form-group col-md-4">
                <label>Branch</label>
                <input
                  name="branch"
                  type="text"
                  class="form-control"
                  required />
              </div>
              <div class="form-group col-md-4">
                <label>Absent without Pay</label>
                <input
                  name="abs_wo_pay"
                  type="text"
                  class="form-control"
                  required />
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label>Date Separated</label>
                <input
                  name="separated"
                  type="date"
                  class="form-control" />
              </div>

              <div class="form-group col-md-8">
                <label>Cause of Separation</label>
                <input
                  name="separation"
                  type="text"
                  class="form-control" />
              </div>

            </div>
        </div>

        <div class="modal-footer">
          <!--  <input type="hidden" id="pos_id" name="id"> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="servicesavebtn">Save</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>