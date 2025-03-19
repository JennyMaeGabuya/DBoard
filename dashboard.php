<?php
session_start();
if (isset($_SESSION['success'])) {
  echo "<script>
        setTimeout(() => {
            Swal.fire({
                title: 'Success!',
                text: '" . $_SESSION['success'] . "',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }, 100);
    </script>";
  unset($_SESSION['success']);
}

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
  <title>Dashboard | Employee Records Management System</title>
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
  <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
  <script src="fullcalendar/lib/jquery.min.js"></script>
  <script src="fullcalendar/lib/moment.min.js"></script>
  <script src="fullcalendar/fullcalendar.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var selectedEvent = null;

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "all-events.php",
        displayEventTime: true,
        selectable: true,
        selectHelper: true,

        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },

        // Default view when the calendar loads
        defaultView: 'month',

        // Open modal when selecting a date
        select: function(start, end) {
          selectedEvent = null;
          $("#eventId").val("");
          $("#eventTitle").val("");
          $("#eventDescription").val("");

          // Set the clicked date, but allow time to be editable
          let startDate = moment(start).format("YYYY-MM-DD") + "T12:00";

          $("#eventStart").val(startDate);
          $("#eventEnd").val("");
          $("#deleteEventBtn").hide();
          $("#eventModal").modal("show");
        },

        // Open modal for editing when clicking an event
        eventClick: function(event) {
          selectedEvent = event;
          $("#eventId").val(event.id);
          $("#eventTitle").val(event.title);
          $("#eventDescription").val(event.description);
          $("#eventStart").val(moment(event.start_date).format("YYYY-MM-DDTHH:mm"));
          $("#eventEnd").val(event.end ? moment(event.end_date).format("YYYY-MM-DDTHH:mm") : "");
          $("#eventColor").val(event.color);

          // Show delete button when editing an existing event
          $("#deleteEventBtn").show();

          $("#eventModal").modal("show");
        },

        // Update event position on drag
        eventDrop: function(event) {
          updateEvent(event);
        }
      });

      $("#eventStart").on("change", function() {
        let startDate = $("#eventStart").val();
        let endDate = $("#eventEnd").val();

        if (endDate && endDate < startDate) {
          Swal.fire({
            icon: "warning",
            title: "Invalid End Date",
            text: "End date cannot be before the start date.",
            confirmButtonText: "OK"
          });
          $("#eventEnd").val(startDate); // Reset end date to start date
        }
      });

      $("#eventEnd").on("change", function() {
        let startDate = $("#eventStart").val();
        let endDate = $("#eventEnd").val();

        if (endDate < startDate) {
          Swal.fire({
            icon: "warning",
            title: "Invalid End Date",
            text: "End date cannot be before the start date.",
            confirmButtonText: "OK"
          });
          $("#eventEnd").val(startDate); // Reset end date to start date
        }
      });

      // Save event (Add or Update)
      $("#saveEventBtn").click(function() {
        let id = $("#eventId").val();
        let title = $("#eventTitle").val();
        let description = $("#eventDescription").val();
        let start = $("#eventStart").val();
        let end = $("#eventEnd").val();
        let color = $("#eventColor").val();

        if (!title || !start || !end) {
          Swal.fire({
            icon: "warning",
            title: "Missing Fields",
            text: "Please fill in all required fields."
          });
          return;
        }

        if (new Date(end) < new Date(start)) {
          Swal.fire({
            icon: "error",
            title: "Invalid Date",
            text: "End date cannot be before the start date."
          });
          return;
        }

        let url = id ? "update-event.php" : "add-event.php";
        let data = `id=${id}&title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}&start_date=${start}&end_date=${end}&color=${encodeURIComponent(color)}`;

        fetch(url, {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded"
            },
            body: data
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: data.message,
                confirmButtonText: "OK"
              });

              if (id) {
                selectedEvent.title = title;
                selectedEvent.description = description;
                selectedEvent.start = moment(start);
                selectedEvent.end = moment(end);
                selectedEvent.color = color;
                $('#calendar').fullCalendar('refetchEvents');
              } else {
                $('#calendar').fullCalendar('renderEvent', {
                  id: data.id,
                  title,
                  start,
                  end,
                  description,
                  color
                }, true);
              }
              $("#eventModal").modal("hide");
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: data.message
              });
            }
          })
          .catch(error => console.error("Error:", error));
      });

      // Delete event
      $("#deleteEventBtn").click(function() {
        let id = $("#eventId").val();
        Swal.fire({
          title: "Are you sure?",
          text: "This action cannot be undone.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            fetch("delete-event.php", {
                method: "POST",
                headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `id=${id}`
              })
              .then(response => response.json())
              .then(data => {
                if (data.status === "success") {
                  $('#calendar').fullCalendar('removeEvents', id);
                  Swal.fire({
                    icon: "success",
                    title: "Deleted!",
                    text: data.message,
                    confirmButtonText: "OK"
                  });
                  $("#eventModal").modal("hide");
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data.message,
                    confirmButtonText: "OK"
                  });
                }
              })
              .catch(error => console.error("Error:", error));
          }
        });
      });

      function displayMessage(message, type = "success") {
        Swal.fire({
          icon: type,
          title: type === "success" ? "Success" : "Error",
          text: message,
          confirmButtonText: "OK",
          allowOutsideClick: false
        });
      }
    });
  </script>
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
                            <i class="fas fa-home"></i> <strong>Home</strong>
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

    <div class="analytics-sparkle-area">
      <div class="container-fluid">
        <div class="row">

          <!-- HR Staffs Calculation / The Total Employees -->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">
                <h5>HRM Staffs</h5>
                <h2>
                  <span class="counter">
                    <?php
                    include 'actions/count-staff.php';
                    echo $totalCount;
                    ?>
                  </span>
                  <span class="tuition-fees">Total Staff</span>
                </h2>

                <?php include 'actions/count-employee.php'; ?>

                <span class="text-success"><?php echo $percentage; ?>%</span>
                <small><?php echo $totalHR; ?> out of <?php echo $totalEmployees; ?> employees</small>

                <div class="progress m-b-0">
                  <div class="progress-bar progress-bar-success"
                    role="progressbar"
                    aria-valuenow="<?php echo $percentage; ?>"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: <?php echo $percentage; ?>%;">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TO FOLLOW -->
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">
                <h5>Accounting Technologies</h5>
                <h2>
                  $<span class="counter">3000</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-danger">30%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-danger"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 30%">
                    <span class="sr-only">230% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
              <div class="analytics-content">
                <h5>Electrical Engineering</h5>
                <h2>
                  $<span class="counter">2000</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-info">60%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-info"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 60%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div
              class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
              <div class="analytics-content">
                <h5>Chemical Engineering</h5>
                <h2>
                  $<span class="counter">3500</span>
                  <span class="tuition-fees">Tuition Fees</span>
                </h2>
                <span class="text-inverse">80%</span>
                <div class="progress m-b-0">
                  <div
                    class="progress-bar progress-bar-inverse"
                    role="progressbar"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 80%">
                    <span class="sr-only">230% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Calendar Preview -->
    <div class="container-fluid mg-tb-30">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="product-sales-chart">
            <div class="portlet-title">
              <h3 class="box-title">Event's Calendar</h3>
              <div id="calendar"></div>
            </div>
          </div>
        </div>

        <!-- Event Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="border-radius: 3px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="exampleModalLabel">Event Details</h4>
              </div>
              <div class="modal-body">
                <form id="eventForm">
                  <input type="hidden" id="eventId">
                  <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" id="eventTitle" required>
                  </div>
                  <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" id="eventDescription" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="eventStart">Start Date & Time:</label>
                    <input type="datetime-local" id="eventStart" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="eventEnd">End Date & Time:</label>
                    <input type="datetime-local" id="eventEnd" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Event Color:</label>
                    <input type="color" id="eventColor" class="form-control" value="#007bff">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="deleteEventBtn" style="display:none;">Delete</button>
                <button type="button" class="btn btn-success" id="saveEventBtn">Save</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Today's Events -->
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Today's Events</h3>
            <ul class="basic-list" id="event-list">
              <!-- Events will be loaded here dynamically -->
            </ul>
          </div>
        </div>

        <script>
          function loadTodayEvents() {
            fetch("today-events.php")
              .then(response => response.json())
              .then(data => {
                let eventList = document.getElementById("event-list");
                if (!eventList) return console.error("Error: Event list container not found.");

                eventList.innerHTML = "";

                if (data.length === 0) {
                  eventList.innerHTML = `<li style="color: red; font-style: italic;">No events for today.</li>`;
                } else {
                  data.forEach(event => {
                    let listItem = document.createElement("li");
                    listItem.innerHTML = `
                            <strong style="font-size: 16px;">${event.title}</strong><br>
                            <small>
                                <span style="background-color:${event.color}; color: #fff; padding: 3px 5px; border-radius: 3px; font-size: 13px; font-weight: bold;">
                                    ${event.start_date} - ${event.end_date} | ${event.start_time}
                                </span>
                            </small>`;
                    eventList.appendChild(listItem);
                  });
                }
              })
              .catch(error => console.error("Error fetching events:", error));
          }

          document.addEventListener("DOMContentLoaded", loadTodayEvents);
        </script>

      </div>
    </div>

  </div>

  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>