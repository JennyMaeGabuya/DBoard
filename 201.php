<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

if (!$con) {
    die(json_encode(["success" => false, "error" => "Database connection failed!"]));
}

// Check if the request method is POST and folder_ids is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["folder_ids"])) {
    $folder_ids = $_POST["folder_ids"];

    // Validate input
    if (!is_array($folder_ids)) {
        echo json_encode(["success" => false, "error" => "Invalid folder IDs format!"]);
        exit();
    }

    foreach ($folder_ids as $folder_id) {
        $folder_id = intval($folder_id); // Convert to integer for security

        // Prepare delete query
        $deleteFolderQuery = "DELETE FROM 201_folders WHERE id = ?";
        $stmt = mysqli_prepare($con, $deleteFolderQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $folder_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(["success" => false, "error" => "Failed to prepare query!"]);
            exit();
        }

        // Delete folder from "201 Files" directory
        $folderPath = __DIR__ . "/img/201 Files/" . $folder_id;
        if (is_dir($folderPath)) {
            $files = glob("$folderPath/*"); // Get all files in folder
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); // Delete file
                }
            }
            rmdir($folderPath); // Delete the folder itself
        }
    }

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Invalid request!"]);
}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .product-status-wrap {
            background-color: white;
            min-height: 100vh;
        }

        .folder-section {
            margin-top: 30px;
        }

        .folders-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .folder {
            background-color: #f1f3f5;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px 10px;
            transition: all 0.3s ease;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            margin-top: 10px;
        }

        .folder:hover {
            background-color: rgb(165, 210, 247);
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
        }

        .folder i {
            font-size: 90px;
            color: rgb(44, 44, 42);
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

        .folder input {
            border: none;
            background: transparent;
            font-size: 16px;
            font-weight: 600;
            color: #212529;
            text-align: center;
            width: 100%;
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        .folder-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .folder-select-box {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
        }

        .folder-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .swal-title-sm {
            font-size: 20px !important;
        }

        .swal-input-sm {
            font-size: 14px !important;
            padding: 6px 8px !important;
        }

        .swal-btn-sm {
            font-size: 15px !important;
            padding: 6px 12px !important;
        }

        .swal-popup-sm {
            font-size: 15px !important;
        }

        .folder-dropdown li.rename-folder:hover {
            background-color: #f0f0f0;
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
                                                    <a href="#">
                                                        <strong>201 Folders</strong>
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
                            <h3>201 Downloadable File</h3>
                        </div>

                        <div class="folder-section"
                            style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                            <div class="folder-list">
                                <!-- Folder icons go here -->
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-border btn-round btn-sm" id="addFolderBtn"
                                    title="Add Folder">
                                    <i class="fas fa-folder-plus"></i> Add Folder
                                </button>
                                <button class="btn btn-danger btn-border btn-round btn-sm" id="deleteSelectedBtn"
                                    title="Delete Folder">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-warning btn-border btn-round btn-sm" id="selectBtn"
                                    title="Select Folder">
                                    <i class="fas fa-check-square"></i>
                                </button>
                            </div>
                        </div>

                        <div class="folders-container">
                            <?php
                            // Include database connection
                            include 'dbcon.php'; // Ensure this file contains the correct database connection

                            // Fetch folders from the database
                            $query = "SELECT * FROM 201_folders WHERE parent_id IS NULL ORDER BY name ASC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                        <div class="folder-container">
                                            <div class="folder-actions">
                                                <input type="checkbox" class="folder-checkbox" value="' . $row['id'] . '" style="display: none;">
                                                <div class="folder-options" style="position: relative; display: inline-block;">
                                <i class="fa fa-ellipsis-v folder-menu-toggle" data-folder-id="' . $row['id'] . '" style="cursor: pointer; padding: 5px;"></i>
                                <div class="folder-dropdown" id="dropdown-' . $row['id'] . '" style="display: none; position: absolute; left: 100%; top: 0; background: white; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); z-index: 1000; min-width: 50px;">
                                    <ul style="list-style: none; margin: 0; padding: 0;">
                                        <li class="rename-folder" data-folder-id="' . $row['id'] . '" data-folder-name="' . htmlspecialchars($row['name']) . '" style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee; transition: background 0.3s;">
                                            Rename
                                        </li>
                                    </ul>
                                </div>
                            </div>
                </div>
                <div class="folder" onclick="openFolder(' . $row['id'] . ')">
                    <i class="fa fa-folder"></i><br>
                    <strong>' . htmlspecialchars($row['name']) . '</strong>
                </div>
            </div>';
                                }
                            } else {
                                echo "<p>No folders found.</p>";
                            }
                            ?>
                        </div>
                        <script>
                            function openFolder(folderId) {
                                window.location.href = "201-files.php?folder_id=" + folderId;
                            }

                            $(document).ready(function() {
                                $('#addFolderBtn').click(function() {
                                    Swal.fire({
                                        title: 'Add New Folder',
                                        input: 'text',
                                        inputPlaceholder: 'Enter folder name',
                                        showCancelButton: true,
                                        confirmButtonText: 'Create',
                                        cancelButtonText: 'Cancel',
                                        inputValidator: (value) => {
                                            if (!value.trim()) {
                                                return 'Folder name cannot be empty';
                                            }
                                        },
                                        customClass: {
                                            title: 'swal-title-sm',
                                            input: 'swal-input-sm',
                                            confirmButton: 'swal-btn-sm',
                                            cancelButton: 'swal-btn-sm'
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            let folderName = result.value.trim();
                                            $.ajax({
                                                url: 'actions/201-add-folder.php',
                                                type: 'POST',
                                                data: {
                                                    folder_name: folderName
                                                },
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.success) {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Folder Created',
                                                            text: `"${folderName}" has been added successfully.`,
                                                            timer: 2000,
                                                            showConfirmButton: false,
                                                            customClass: {
                                                                title: 'swal-title-sm',
                                                                popup: 'swal-popup-sm'
                                                            }
                                                        }).then(() => {
                                                            location.reload();
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: response.error || 'Failed to create folder.',
                                                            customClass: {
                                                                title: 'swal-title-sm',
                                                                popup: 'swal-popup-sm'
                                                            }
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'AJAX Error',
                                                        text: error,
                                                        customClass: {
                                                            title: 'swal-title-sm',
                                                            popup: 'swal-popup-sm'
                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                            });

                            $(document).ready(function() {
                                let selectMode = false;

                                $('#selectBtn').click(function() {
                                    selectMode = !selectMode;
                                    if (selectMode) {
                                        $('.folder-checkbox').show();
                                        $(this).text('Cancel');
                                    } else {
                                        $('.folder-checkbox').hide().prop('checked', false);
                                        $(this).text('Select');
                                    }
                                });

                                $('#deleteSelectedBtn').click(function() {
                                    let selectedFolders = [];
                                    $('.folder-checkbox:checked').each(function() {
                                        selectedFolders.push($(this).val());
                                    });

                                    if (selectedFolders.length === 0) {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'No folders selected',
                                            text: 'Please select at least one folder to delete.'
                                        });
                                        return;
                                    }

                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'Selected folders and their files will be permanently deleted.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Yes, delete them!',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: 'actions/201-delete-folder.php',
                                                type: 'POST',
                                                data: {
                                                    folder_ids: selectedFolders
                                                },
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.success) {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Deleted!',
                                                            text: 'Folders deleted successfully.',
                                                            confirmButtonText: 'OK'
                                                        }).then(() => {
                                                            location.reload();
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: response.error || 'Something went wrong.',
                                                            confirmButtonText: 'OK'
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'AJAX Error',
                                                        text: error,
                                                        confirmButtonText: 'OK'
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 300000);

                            $(document).ready(function() {
                                // Toggle dropdown
                                $(document).on('click', '.folder-menu-toggle', function(e) {
                                    e.stopPropagation(); // Prevent other click events
                                    const folderId = $(this).data('folder-id');
                                    $('.folder-dropdown').hide(); // Close all
                                    $('#dropdown-' + folderId).toggle(); // Toggle this one
                                });

                                // Hide dropdown if clicked outside
                                $(document).on('click', function() {
                                    $('.folder-dropdown').hide();
                                });

                                // Handle rename click
                                $(document).on('click', '.rename-folder', function(e) {
                                    e.stopPropagation();
                                    const folderId = $(this).data('folder-id');
                                    const currentName = $(this).data('folder-name');

                                    Swal.fire({
                                        title: 'Rename this folder?',
                                        input: 'text',
                                        inputValue: currentName,
                                        showCancelButton: true,
                                        confirmButtonText: 'Rename',
                                        cancelButtonText: 'Cancel',
                                        customClass: {
                                            title: 'swal-title-sm',
                                            input: 'swal-input-sm',
                                            confirmButton: 'swal-btn-sm',
                                            cancelButton: 'swal-btn-sm'
                                        },
                                        inputValidator: (value) => {
                                            if (!value.trim()) {
                                                return 'Folder name cannot be empty';
                                            }
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            let newName = result.value.trim();
                                            $.ajax({
                                                url: 'actions/201-rename-folder.php',
                                                type: 'POST',
                                                data: {
                                                    folder_id: folderId,
                                                    folder_name: newName
                                                },
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.success) {
                                                        Swal.fire({
                                                            title: 'Renamed!',
                                                            text: 'Folder name updated.',
                                                            icon: 'success',
                                                            timer: 2000,
                                                            showConfirmButton: false,
                                                            customClass: {
                                                                title: 'swal-title-sm',
                                                                popup: 'swal-popup-sm'
                                                            }
                                                        }).then(() => {
                                                            location.reload(); // Reload to reflect changes
                                                        });
                                                    } else {
                                                        Swal.fire('Error', response.error || 'Rename failed.', 'error');
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('AJAX Error:', status, error, xhr.responseText);
                                                    Swal.fire('Error', 'AJAX error occurred: ' + error + ' (Status: ' + status + ')', 'error');
                                                }
                                            });
                                        }
                                    });
                                });

                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>