<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
include 'emailnotif.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Issuance of Certificate History | ERMS</title>
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
                          <a href="certifications.php">
                            Issue Certifications
                          </a>
                          <span class="bread-slash"> / </span>
                          <a href="#">
                            <strong>History</strong>
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
                    <th>Date Issued</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $stmt = $con->prepare("
                                    SELECT 
                                        id, 
                                        'Appointed' AS cert_type,
                                        fullname,
                                        position, 
                                        office_appointed AS department, 
                                        start_date, 
                                        date_issued 
                                    FROM appointed_cert_issuance 

                                    UNION ALL 

                                    SELECT 
                                        id, 
                                        'Elected' AS cert_type,
                                        fullname,
                                        position, 
                                        'N/A' AS department, 
                                        start_date, 
                                        date_issued 
                                    FROM elected_cert_issuance 
                                    ORDER BY date_issued DESC;
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
                      <td><?php echo date("F d, Y", strtotime($row['date_issued'])); ?></td>
                      <td>
                        <div style="text-align: center;">
                          <!-- Edit Button -->
                          <button class="btn btn-warning edit-btn" title="Edit Certificate" data-id="<?php echo $row['id']; ?>"
                            data-type="<?php echo strtolower($row['cert_type']); ?>" style="margin-right: 5px;">
                            <i class="fa fa-pencil"></i>
                          </button>

                          <!-- View Certificate Button -->
                          <a href="reports/<?php echo strtolower($row['cert_type']); ?>.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-success" title="View Certificate" target="_blank" style="margin-right: 5px;">
                            <i class="fa fa-eye"></i>
                          </a>

                          <!-- Delete Button -->
                          <button class="btn btn-danger delete-btn" title="Delete Certificate"
                            data-id="<?php echo $row['id']; ?>"
                            data-type="<?php echo strtolower($row['cert_type']); ?>">
                            <i class="fa fa-trash"></i>
                          </button>
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

  <!-- Edit Certificate Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning" style="border-radius: 3px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Certificate</h4>
        </div>
        <div class="modal-body">
          <form id="editForm">
            <input type="hidden" name="edit_id">
            <input type="hidden" name="edit_type">

            <h4 class="text-center">BASIC INFORMATION</h4>
            <hr>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Fullname</label>
                <input type="text" class="form-control" name="fullname" required>
              </div>
              <div class="form-group col-md-6">
                <label>Surname <em>(please specify)</em></label>
                <input type="text" class="form-control" name="lastname" required>
              </div>
              <div class="form-group col-md-6">
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
              <div class="form-group col-md-6 appointed-only">
                <label>Office Appointed</label>
                <input type="text" class="form-control" name="office_appointed">
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
                <input type="date" class="form-control" name="date_issued" required>
              </div>

              <!-- Extra Salary Fields -->
              <div class="row">
                <div class="form-group col-md-12">
                  <hr>
                  <h5 style=" margin-left: 15px">Other Allowances / Bonuses</h5>
                  <div id="edit-extra-fields"></div>
                  <div class="text-right" style="margin-right: 20px;">
                    <button type="button" class="btn btn-sm btn-primary mg-t-15" onclick="addExtraField('edit')"><i class="fa-solid fa-plus"></i>Add Field</button>
                  </div>
                </div>
              </div>

            </div>

            <!-- Hidden input to hold serialized extra fields -->
            <input type="hidden" name="extra_salary_json">
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update Certificate</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Make this function globally accessible
    function addExtraField(mode, key = '', value = '') {
      const container = document.getElementById(`${mode}-extra-fields`);
      const index = Date.now();

      const fieldGroup = document.createElement('div');
      fieldGroup.className = 'form-row align-items-center mb-2';
      fieldGroup.dataset.id = index;

      fieldGroup.innerHTML = `
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Label" value="${key}" data-key>
      </div>
      <div class="col-md-5">
        <input type="number" step="0.01" class="form-control" placeholder="Amount" value="${value}" data-value>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('[data-id]').remove()"><i class="fa-solid fa-trash"></i></button>
      </div>
    `;

      container.appendChild(fieldGroup);
    }

    $(document).ready(function() {
      // Open Edit Modal
      $(".edit-btn").click(function() {
        let certId = $(this).data("id");
        let certType = $(this).data("type");

        $.ajax({
          url: "get-certificate-info.php",
          type: "POST",
          data: {
            id: certId,
            type: certType
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              let form = $("#editForm");
              form[0].reset(); // Clear previous values
              $("#edit-extra-fields").empty(); // Clear extra fields

              form.find("[name='edit_id']").val(response.data.id);
              form.find("[name='edit_type']").val(certType);
              form.find("[name='fullname']").val(response.data.fullname);
              form.find("[name='lastname']").val(response.data.lastname);
              form.find("[name='sex']").val(response.data.sex);
              form.find("[name='start_date']").val(response.data.start_date);
              form.find("[name='position']").val(response.data.position);
              form.find("[name='salary']").val(response.data.salary);
              form.find("[name='pera']").val(response.data.pera);
              form.find("[name='rta']").val(response.data.rta);
              form.find("[name='clothing']").val(response.data.clothing);
              form.find("[name='mid_year_bonus']").val(response.data.mid_year_bonus);
              form.find("[name='year_end_bonus']").val(response.data.year_end_bonus);
              form.find("[name='cash_gift']").val(response.data.cash_gift);
              form.find("[name='productivity_enhancement']").val(response.data.productivity_enhancement);
              form.find("[name='date_issued']").val(response.data.date_issued);

              if (certType === "appointed") {
                form.find("[name='office_appointed']").val(response.data.office_appointed);
                $(".appointed-only").show();
              } else {
                $(".appointed-only").hide();
              }

              // Parse and add extra salary fields if available
              const extraSalary = JSON.parse(response.data.extra_salary || '{}');
              for (const [key, value] of Object.entries(extraSalary)) {
                addExtraField('edit', key, value);
              }

              $("#editModal").modal("show");
            } else {
              Swal.fire("Error!", response.message, "error");
            }
          }
        });
      });

      // Serialize extra fields before submission
      document.getElementById('editForm').addEventListener('submit', function(e) {
        const extras = {};
        const extraFields = document.querySelectorAll('#edit-extra-fields [data-id]');
        extraFields.forEach(group => {
          const key = group.querySelector('[data-key]').value.trim();
          const value = parseFloat(group.querySelector('[data-value]').value) || 0;
          if (key) extras[key] = value;
        });
        this.querySelector('input[name="extra_salary_json"]').value = JSON.stringify(extras);
      });

      // Update Certificate
      $("#editForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: "update-certificate.php",
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              const certId = $("input[name='edit_id']").val();
              const certType = $("input[name='edit_type']").val();
              const reportUrl = `reports/${certType}.php?id=${certId}`;

              Swal.fire({
                title: "Updated!",
                text: "Certificate updated successfully.",
                icon: "success",
                confirmButtonText: "View Certificate"
              }).then((result) => {
                if (result.isConfirmed) {
                  window.open(reportUrl, "_blank");
                }
                location.reload();
              });
            } else {
              Swal.fire("Error!", response.message, "error");
            }
          }
        });
      });

      // Delete Certificate
      $(".delete-btn").click(function() {
        const certId = $(this).data("id");
        const certType = $(this).data("type");

        Swal.fire({
          title: "Are you sure?",
          text: "This certificate will be permanently deleted!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "actions/delete-certificate.php",
              type: "POST",
              data: {
                id: certId,
                type: certType
              },
              dataType: "json",
              success: function(response) {
                if (response.status === "success") {
                  Swal.fire({
                    title: "Deleted!",
                    text: "Certificate has been deleted successfully.",
                    icon: "success"
                  }).then(() => location.reload());
                } else {
                  Swal.fire("Error!", response.message, "error");
                }
              },
              error: function(jqXHR, textStatus) {
                Swal.fire("Error!", `Failed to delete: ${textStatus}`, "error");
              }
            });
          }
        });
      });

      // Auto-refresh every 5 minutes
      setTimeout(() => location.reload(), 300000);
    });
  </script>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>