<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

class Calendar
{
    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null, $con)
    {
        if (isset($_GET['date'])) {
            $date = $_GET['date']; // Get date from URL
        }

        $this->active_year = $date ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date ? date('d', strtotime($date)) : date('d');

        // Load events from the database
        $this->loadEventsFromDB($con);
    }

    private function loadEventsFromDB($con)
    {
        $sql = "SELECT title, start_date, end_date FROM events";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            $this->events[] = [$row['title'], $row['start_date'], 1, ''];
        }
    }

    public function __toString()
    {
        $num_days = date('t', strtotime($this->active_year . '-' . $this->active_month . '-1'));
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);

        // Get previous and next month
        $prev_month = date('Y-m', strtotime($this->active_year . '-' . $this->active_month . ' -1 month'));
        $next_month = date('Y-m', strtotime($this->active_year . '-' . $this->active_month . ' +1 month'));

        // Calendar Header with Navigation
        $html = '<div class="calendar-container">';
        $html .= '<div class="calendar">';

        // Navigation buttons
        $html .= '<div class="header">';
        $html .= '<button onclick="navigateCalendar(\'' . $prev_month . '\')" class="nav-btn">&laquo;</button>';
        $html .= '<div class="month-year">' . date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-1')) . '</div>';
        $html .= '<button onclick="navigateCalendar(\'' . $next_month . '\')" class="nav-btn">&raquo;</button>';
        $html .= '</div>';

        // View mode buttons
        $html .= '<div class="view-options">';
        $html .= '<button class="view-btn active" onclick="changeView(\'month\')">Month</button>';
        $html .= '<button class="view-btn" onclick="changeView(\'week\')">Week</button>';
        $html .= '<button class="view-btn" onclick="changeView(\'day\')">Day</button>';
        $html .= '<button class="view-btn" onclick="changeView(\'list\')">List</button>';
        $html .= '</div>';

        // Calendar Days
        $html .= '<div class="days">';
        foreach ($days as $day) {
            $html .= '<div class="day_name">' . $day . '</div>';
        }

        for ($i = 0; $i < $first_day_of_week; $i++) {
            $html .= '<div class="day_num ignore"></div>';
        }

        for ($i = 1; $i <= $num_days; $i++) {
            $html .= '<div class="day_num"><span>' . $i . '</span>';
            foreach ($this->events as $event) {
                if (date('Y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i)) == date('Y-m-d', strtotime($event[1]))) {
                    $event_classes = ['blue', 'green', 'orange', 'red', 'purple'];
                    $random_color = $event_classes[array_rand($event_classes)];

                    $html .= '<div class="event ' . $random_color . '">' . $event[0] . '</div>';
                }
            }
            $html .= '</div>';
        }

        $html .= '</div>'; // Close .days
        $html .= '</div>'; // Close .calendar
        $html .= '</div>'; // Close .calendar-container

        return $html;
    }
}

$calendar = new Calendar(null, $con);
?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        /* Elevated Container */
        .calendar-container {
            background: white;
        }

        /* Calendar Header */
        .calendar .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgb(255, 255, 255);
            padding: 10px;
        }

        .calendar .header .month-year {
            font-size: 20px;
            font-weight: bold;
            color: black;
            margin-top: 5px;
        }

        /* Days Row */
        .calendar .days {
            display: flex;
            flex-wrap: wrap;
            background: white;
        }

        /* Day Labels */
        .calendar .days .day_name {
            width: calc(100% / 7);
            text-align: center;
            font-weight: bold;
            padding: 5px;
            color: black;
        }

        /* Calendar Cells */
        .calendar .days .day_num {
            width: calc(100% / 7);
            padding: 15px;
            min-height: 100px;
            position: relative;
            text-align: center;
            background: white;
        }

        /* Number Styling */
        .calendar .days .day_num span {
            display: block;
            font-size: 14px;
            color: gray;
        }

        /* Event Styles */
        .calendar .days .day_num .event {
            margin-top: 5px;
            padding: 4px 8px;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            max-width: 90%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Event Colors */
        .calendar .days .day_num .event.blue {
            background-color: #007bff;
        }

        .calendar .days .day_num .event.green {
            background-color: #28a745;
        }

        .calendar .days .day_num .event.orange {
            background-color: #fd7e14;
        }

        .calendar .days .day_num .event.red {
            background-color: #dc3545;
        }

        .calendar .days .day_num .event.purple {
            background-color: rgb(202, 0, 162);
        }

        .calendar .days .day_num:hover {
            background: rgb(250, 250, 250);
        }

        /* Remove Box Shadow on Small Screens */
        @media (max-width: 768px) {
            .calendar-container {
                box-shadow: none;
            }
        }

        /* Calendar Navigation */
        .nav-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .nav-btn:hover {
            background: #0056b3;
        }

        .view-options {
            text-align: center;
            margin: 10px 0;
        }

        .view-btn {
            background: #ddd;
            color: #333;
            border: none;
            padding: 8px 15px;
            margin: 2px;
            cursor: pointer;
            font-size: 14px;
        }

        .view-btn.active {
            background: #007bff;
            color: white;
        }

        .view-btn:hover {
            background: #0056b3;
            color: white;
        }

        /* Event Creation */
        .add-event-container {
            background: white;
            padding: 15px;
        }

        /* Heading Styling */
        .add-event-container h3 {
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 5px;
        }

        /* Form Input Styling */
        .add-event-container .form-group {
            margin-bottom: 15px;
        }

        .add-event-container .form-group label {
            font-weight: bold;
            color: #555;
        }

        /* Submit Button */
        .add-event-container .btn-success {
            border: none;
            font-size: 14px;
            font-weight: bold;
            width: 100%;
        }

        .add-event-container .btn-success:hover {
            background: rgb(0, 143, 79);
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
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="breadcome-menu"
                                                style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                                <li>
                                                    <link rel="stylesheet"
                                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                                    <a href="dashboard.php">
                                                        <i class="fa fa-home"></i> Home
                                                    </a>
                                                    <span class="bread-slash">/</span>
                                                    <span class="bread-blod">Edit Admin Profile</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="calendar-area">
        <div class="container-fluid">
            <div class="row">

                <!-- Left Side: Calendar -->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="calendar-container">
                        <?php echo $calendar; ?>
                    </div>
                </div>

                <!-- Right Side: Event Form -->
                <div class="col-md-4 add-event-container">
                    <h3>Add New Event</h3>
                    <form id="event-form" method="POST">
                        <div class="form-group">
                            <label>Event Title:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Start Date:</label>
                            <input type="datetime-local" name="start_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>End Date:</label>
                            <input type="datetime-local" name="end_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Add Event
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function navigateCalendar(month) {
            window.location.href = window.location.pathname + '?date=' + month + '-01';
        }

        document.addEventListener("DOMContentLoaded", function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                events: 'all-events.php',
                editable: false,
                eventLimit: true
            });

            function changeView(viewType) {
                $('#calendar').fullCalendar('changeView', viewType);
                document.querySelectorAll('.view-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelector(`[data-view="${viewType}"]`).classList.add('active');
            }

            document.querySelectorAll('.view-btn').forEach(button => {
                button.addEventListener('click', function() {
                    changeView(this.dataset.view);
                });
            });
        });

        $(document).ready(function() {
            $("#event-form").on("submit", function(e) {
                e.preventDefault(); // Prevent full-page reload

                $.ajax({
                    url: "add-event.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        console.log("AJAX Response:", response); // Debug response
                        if (response.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: response.message,
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK"
                            }).then(() => {
                                location.reload(); // Reload the page after success
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", xhr.responseText);
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Something went wrong. Please try again."
                        });
                    }
                });
            });
        });
    </script>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>