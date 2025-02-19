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
    <title>Organization | ERMS</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
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
                            <div class="col-lg-12">
                                <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                        <span class="bread-slash">/</span>
                                        <span class="bread-blod">Organization</span>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Human Resource Management Office </h4>
                        <div class="add-product">
                            <a href="add-member.php">Add Member</a>
                        </div>
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Name of Dept.</th>
                                    <th>Status</th>
                                    <th>Head</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>No. of Students</th>
                                    <th>Setting</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Computer</td>
                                    <td>
                                        <button class="pd-setting">Active</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1500</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mechanical</td>
                                    <td>
                                        <button class="ps-setting">Paused</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1700</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>MBA</td>
                                    <td>
                                        <button class="ds-setting">Disabled</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1500</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>BBA</td>
                                    <td>
                                        <button class="pd-setting">Active</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1200</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>CSE</td>
                                    <td>
                                        <button class="pd-setting">Active</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1800</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>MBA</td>
                                    <td>
                                        <button class="ps-setting">Paused</button>
                                    </td>
                                    <td>John Alva</td>
                                    <td>admin@gmail.com</td>
                                    <td>01962067309</td>
                                    <td>1000</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.querySelector(".search-int");
            const table = document.querySelector("table");
            const rows = table.querySelectorAll("tr");

            searchInput.addEventListener("keyup", function() {
                const searchQuery = searchInput.value.toLowerCase();

                rows.forEach(function(row, index) {
                    if (index === 0) return; // Skip the header row
                    const cells = row.querySelectorAll("td");
                    let found = false;

                    cells.forEach(function(cell) {
                        if (cell.textContent.toLowerCase().includes(searchQuery)) {
                            found = true;
                        }
                    });

                    row.style.display = found ? "" : "none"; // Show or hide row based on search match
                });
            });
        });
    </script>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>