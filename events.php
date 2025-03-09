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
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');

        // Load events from the database
        $this->loadEventsFromDB($con);
    }

    private function loadEventsFromDB($con)
    {
        $sql = "SELECT title, start_date FROM events";
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

        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">' . date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-1')) . '</div>';
        $html .= '</div>';
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
                    $html .= '<div class="event">' . $event[0] . '</div>';
                }
            }
            $html .= '</div>';
        }

        $html .= '</div></div>';
        return $html;
    }
}

$calendar = new Calendar(null, $con);
echo $calendar;

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
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .calendar {
            display: flex;
            flex-flow: column;
        }

        .calendar .header .month-year {
            font-size: 20px;
            font-weight: bold;
            color: #636e73;
            padding: 20px 0;
        }

        .calendar .days {
            display: flex;
            flex-flow: wrap;
        }

        .calendar .days .day_name {
            width: calc(100% / 7);
            border-right: 1px solid #2c7aca;
            padding: 20px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            color: #818589;
            color: #fff;
            background-color: #448cd6;
        }

        .calendar .days .day_name:nth-child(7) {
            border: none;
        }

        .calendar .days .day_num {
            display: flex;
            flex-flow: column;
            width: calc(100% / 7);
            border-right: 1px solid #e6e9ea;
            border-bottom: 1px solid #e6e9ea;
            padding: 15px;
            font-weight: bold;
            color: #7c878d;
            cursor: pointer;
            min-height: 100px;
        }

        .calendar .days .day_num span {
            display: inline-flex;
            width: 30px;
            font-size: 14px;
        }

        .calendar .days .day_num .event {
            margin-top: 10px;
            font-weight: 500;
            font-size: 14px;
            padding: 3px 6px;
            border-radius: 4px;
            background-color: #f7c30d;
            color: #fff;
            word-wrap: break-word;
        }

        .calendar .days .day_num .event.green {
            background-color: #51ce57;
        }

        .calendar .days .day_num .event.blue {
            background-color: #518fce;
        }

        .calendar .days .day_num .event.red {
            background-color: #ce5151;
        }

        .calendar .days .day_num:nth-child(7n+1) {
            border-left: 1px solid #e6e9ea;
        }

        .calendar .days .day_num:hover {
            background-color: #fdfdfd;
        }

        .calendar .days .day_num.ignore {
            background-color: #fdfdfd;
            color: #ced2d4;
            cursor: inherit;
        }

        .calendar .days .day_num.selected {
            background-color: #f1f2f3;
            cursor: inherit;
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

</body>