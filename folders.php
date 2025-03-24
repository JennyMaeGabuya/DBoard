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
    <title>Folders | ERMS</title>
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
    <style>
        .folder-section {
            margin-top: 30px;
        }

        .folders-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* Ensures 4 folders per row */
            gap: 30px;
            padding: 25px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .folder {
            background-color: #f1f3f5;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
            transition: all 0.3s ease;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .folder:hover {
            background-color: #e2e6ea;
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
        }

        .folder i {
            font-size: 90px;
            color:rgb(44, 44, 42);
            margin-bottom: 10px;
        }

        .folder-label {
            font-size: 16px;
            font-weight: 600;
            color: #212529;
            word-wrap: break-word;
            max-width: 100%;
        }

        @media (max-width: 992px) {
            .folders-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .folders-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .folder i {
                font-size: 60px;
            }

            .folder-label {
                font-size: 14px;
            }
        }

        .add-folder-btn {
            background-color:rgb(79, 170, 239);
            color: #212529;
            font-weight: 600;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .add-folder-btn:hover {
            background-color:rgb(25, 238, 13);
        }

        .folder input {
            border: none;
            background: transparent;
            font-size: 16px;
            font-weight: 600;
            color: #212529;
            text-align: center;
            width: 100%;
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
                <div class="col-lg-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcome-heading">
                                    <div class="row">
                                        <div class="col-lg-12"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <!-- Left Side: Home Breadcrumb -->
                                            <ul class="breadcome-menu"
                                                style="display: flex; align-items: center; padding: 0; margin: 0;">
                                                <li>
                                                    <link rel="stylesheet"
                                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                                    <a href="dashboard.php">
                                                        <i class="fas fa-home"></i> Home
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="downloaded-file.php">
                                                        CSC Downloaded File
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="#">
                                                        <strong>CSC File Folders</strong>
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
                            <h3>Downloadable File Folders</h3>
                        </div>

                        <div class="folder-section">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                <h3></h3>
                                <button class="add-folder-btn" id="addFolderBtn">Add Folder</button>
                            </div>

                            <div class="folders-container" id="foldersContainer">
                                <div class="folder">
                                    <i class="fa fa-folder"></i>
                                    <input type="text" value="Folder 1" readonly class="folder-label">
                                </div>
                                <div class="folder">
                                    <i class="fa fa-folder"></i>
                                    <input type="text" value="Folder 2" readonly class="folder-label">
                                </div>
                                <div class="folder">
                                    <i class="fa fa-folder"></i>
                                    <input type="text" value="Folder 3" readonly class="folder-label">
                                </div>
                                <div class="folder">
                                    <i class="fa fa-folder"></i>
                                    <input type="text" value="Folder 4" readonly class="folder-label">
                                </div>
                            </div>
                        </div>

                        <div class="widget-box">
                            <!-- JavaScript for live search -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

                            <script>
                                $(function () {
                                    new DataTable('#myTable', {
                                        responsive: true,
                                        autoWidth: false,
                                        language: {
                                            lengthMenu: "Show _MENU_ entries",
                                        },
                                    });
                                });



                                $(document).ready(function () {
                                    let folderCount = 4; // Start at 4 since there are 4 initial folders

                                    // Add Folder Button Click Event
                                    $('#addFolderBtn').click(function () {
                                        folderCount++;

                                        // Create new folder element
                                        const folderId = `folder-${folderCount}`;
                                        const newFolder = $(`
                                     <div class="folder" id="${folderId}">
                                          <i class="fa fa-folder"></i>
                                          <input type="text" value="Folder ${folderCount}" readonly class="folder-label">
                                     </div>
                                `);

                                        // Append to container
                                        $('#foldersContainer').append(newFolder);
                                    });

                                    // Make folders editable on double click
                                    $(document).on('dblclick', '.folder input', function () {
                                        $(this).prop('readonly', false).focus();
                                    });

                                    // Save folder name on blur
                                    $(document).on('blur', '.folder input', function () {
                                        if (!$(this).val().trim()) {
                                            $(this).val(`Folder ${folderCount}`);
                                        }
                                        $(this).prop('readonly', true);
                                    });
                                });

                            </script>
                        </div>

                        <!-- Start here! -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>