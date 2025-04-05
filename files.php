<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

if (!isset($_GET['folder_id'])) {
    die("Invalid folder ID.");
}

$folder_id = intval($_GET['folder_id']);

// Get folder name
$folder_query = "SELECT name FROM folders WHERE id = $folder_id";
$folder_result = mysqli_query($con, $folder_query);
$folder = mysqli_fetch_assoc($folder_result);

if (!$folder) {
    die("Folder not found.");
}

// Get files in the folder
$file_query = "SELECT * FROM files WHERE folder_id = $folder_id";
$file_result = mysqli_query($con, $file_query);
?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Files | ERMS</title>
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
        .file-table {
            width: 100%;
            border-collapse: collapse;
        }

        .file-table th,
        .file-table td {
            padding: 10px;
            vertical-align: middle;
        }

        .filename-cell {
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-link {
            display: inline-block;
            max-width: 100%;
            vertical-align: middle;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .file-actions {
            text-align: right;
            white-space: nowrap;
        }

        .file-actions button {
            margin-left: 5px;
        }

        .preview-btn,
        .download-btn,
        .delete-btn {
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .preview-btn {
            background: #c49a6c;
            color: white;
        }

        .download-btn {
            background: #28a745;
            color: white;
        }

        .delete-btn {
            background: red;
            color: white;
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
                                                    <a href="folders.php">
                                                        Folders
                                                    </a>
                                                    <span class="bread-slash"> / </span>
                                                    <a href="#">
                                                        <strong>Files</strong>
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
                            <h3 style="margin-bottom: 20px;"><?php echo htmlspecialchars($folder['name']); ?> Files</h3>
                        </div>

                        <div class="widget-box">
                            <table class="file-table">
                                <thead>
                                    <tr>
                                        <th style="width: 80%; text-align: center;">File Name</th>
                                        <th style="width: 20%; text-align: center;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($file_result) > 0) {
                                        while ($file = mysqli_fetch_assoc($file_result)) {
                                            $filePath = "img/uploads/" . htmlspecialchars($file['filename']);
                                            $fileName = htmlspecialchars($file['filename']);
                                            $fileId = $file['id'];

                                            // Truncate filename if too long (optional PHP-side fallback)
                                            $displayName = strlen($fileName) > 50 ? substr($fileName, 0, 47) . '...' : $fileName;

                                            echo '<tr>
                                            <td class="filename-cell">
                                                <i class="fa fa-file-o" style="margin-right: 10px;"></i>
                                                <a href="' . $filePath . '" target="_blank" class="file-link" title="' . $fileName . '">' . $displayName . '</a>
                                            </td>
                                            <td class="file-actions text-right">
                                                <a href="view-files.php?id=' . $fileId . '" target="_blank" title="Preview">
                                                    <button class="preview-btn"><i class="fa fa-search"></i> Preview</button>
                                                </a>
                                                <a href="actions/download.php?file=' . urlencode($file['filename']) . '" title="Download">
                                                    <button class="download-btn"><i class="fa fa-download"></i> Download</button>
                                                </a>
                                                <a href="#" class="delete-btn-swal" data-id="' . $fileId . '" title="Delete">
                                                    <button class="delete-btn"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="2" class="no-files">No files found.</td></tr>';
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn-swal').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const fileId = this.getAttribute('data-id');
                    const row = this.closest('tr');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action will permanently delete the file.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request to delete
                            fetch(`actions/delete-files.php?id=${fileId}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Deleted!', data.message || 'File has been deleted.', 'success');
                                        // Optional: remove the row without reloading
                                        row.remove();
                                    } else {
                                        Swal.fire('Error!', data.message || 'Failed to delete the file.', 'error');
                                    }
                                })
                                .catch(error => {
                                    Swal.fire('Error!', 'Something went wrong.', 'error');
                                });
                        }
                    });
                });
            });

            // Optional: auto-reload every 5 minutes
            setTimeout(function() {
                location.reload();
            }, 300000);
        });
    </script>

    <?php include 'includes/footer.php'; ?>