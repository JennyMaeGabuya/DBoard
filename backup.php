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

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Backup Database | ERMS</title>
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
        .db-table {
            width: 100%;
            border-collapse: collapse;
        }

        .db-table th,
        .db-table td {
            padding: 10px;
            vertical-align: middle;
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
                                                        <strong>Backup Database</strong>
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
                        <div class="db-section"
                            style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="db-title">Database Records</h3>
                            <div class="db-list">
                                <!-- DB icons go here -->
                            </div>
                            <div class="d-flex gap-2">
                                <span id="backup-status" class="mr-3" style="margin-right: 15px;"></span>
                                <button class="btn btn-danger btn-border btn-round btn-sm" onclick="confirmBackupDB()">
                                    <i class="fa-solid fa-cloud-arrow-down"></i> Backup Now
                                </button>
                            </div>
                        </div>

                        <div class="widget-box">
                            <table class="db-table">
                                <thead>
                                    <tr>
                                        <th style="width: 50%; text-align: center;">File Name</th>
                                        <th style="width: 25%; text-align: center;">Date</th>
                                        <th style="width: 10%; text-align: center;">Size</th>
                                        <th style="width: 15%; text-align: center;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="backup-list">
                                    <!-- Backup files will be listed here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if automatic backup is needed
            checkLastBackup();

            // Load existing backups
            loadBackups();

            // Set page refresh every 5 minutes
            setTimeout(function() {
                location.reload();
            }, 300000);
        });

        // Function to check when the last backup was made
        function checkLastBackup() {
            fetch('database/check-last-backup.php')
                .then(response => response.json())
                .then(data => {
                    const statusElement = document.getElementById('backup-status');

                    if (data.lastBackup) {
                        statusElement.innerHTML = `Last backup: ${formatDate(data.lastBackupTime)} (${data.daysSinceLastBackup} days ago)`;

                        // If we need a backup, perform it automatically
                        if (data.needsBackup) {
                            statusElement.innerHTML += ' <span style="color: orange;">Automatic backup needed</span>';
                            console.log('Automatic backup needed - last backup was more than a week ago');
                            // Show notification and perform backup after a short delay
                            setTimeout(() => {
                                performBackup(true);
                            }, 2000);
                        }
                    } else {
                        statusElement.innerHTML = 'No previous backups found';
                        // For first time use, prompt for initial backup
                        setTimeout(() => {
                            Swal.fire({
                                title: 'No backups found',
                                text: "Would you like to create your first database backup?",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, create backup!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    performBackup(true);
                                }
                            });
                        }, 1000);
                    }
                })
                .catch(error => {
                    console.error('Error checking last backup:', error);
                    document.getElementById('backup-status').innerHTML =
                        '<span style="color: red;">Error checking backup status</span>';
                });
        }

        // Function to load existing backups
        function loadBackups() {
            fetch('database/list-backups.php')
                .then(response => response.json())
                .then(data => {
                    const backupList = document.getElementById('backup-list');
                    backupList.innerHTML = '';

                    if (data.length === 0) {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td colspan="4" style="text-align: center;">No backups found</td>
                    `;
                        backupList.appendChild(row);
                        return;
                    }

                    data.forEach(backup => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${backup.filename}</td>
                        <td style="text-align: center;">${formatDate(backup.date)}</td>
                        <td style="text-align: center;">${backup.size}</td>
                        <td style="text-align: center;">
                            <a href="database/download-backup.php?file=${backup.filename}" class="btn btn-success">
                                <i class="fa-solid fa-download"></i> Download
                            </a>
                        </td>
                    `;
                        backupList.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error loading backups:', error);
                    document.getElementById('backup-list').innerHTML =
                        '<tr><td colspan="4" style="text-align: center; color: red;">Error loading backups</td></tr>';
                });
        }

        // Function to format date as "Month Day, Year at Hour:Minutes:Seconds" in Asia/Manila timezone
        function formatDate(dateString) {
            const date = new Date(dateString);

            // Format the date in Asia/Manila timezone
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true,
                timeZone: 'Asia/Manila'
            };

            return new Intl.DateTimeFormat('en-US', options).format(date);
        }

        // Function to perform backup
        function performBackup(isAutomatic = false) {
            if (isAutomatic) {
                Swal.fire({
                    title: 'Automatic Backup',
                    text: 'Creating weekly automatic backup...',
                    icon: 'info',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        // Use fetch instead of redirect to keep the user on the page
                        fetch('database/backup-db.php?automatic=true')
                            .then(response => {
                                Swal.fire({
                                    title: 'Backup Complete',
                                    text: 'Automatic backup has been created successfully.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                // Reload backups after a short delay
                                setTimeout(() => {
                                    loadBackups();
                                    checkLastBackup();
                                }, 2500);
                            })
                            .catch(error => {
                                console.error('Error during automatic backup:', error);
                                Swal.fire({
                                    title: 'Backup Failed',
                                    text: 'There was an error creating the automatic backup.',
                                    icon: 'error'
                                });
                            });
                    }
                });
            } else {
                // For manual backup, redirect to download
                window.location.href = 'database/backup-db.php';
            }
        }

        // Function for manual backup confirmation
        function confirmBackupDB() {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will download the latest database backup.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, backup now!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform manual backup
                    performBackup();
                }
            });
        }
    </script>

    <?php include 'includes/footer.php'; ?>