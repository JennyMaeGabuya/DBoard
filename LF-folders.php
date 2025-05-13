<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["folder_ids"]) && is_array($_POST["folder_ids"])) {
        $folder_ids = $_POST["folder_ids"];
        $errors = [];

        foreach ($folder_ids as $folder_id) {
            // Delete folder from database
            $deleteFolderQuery = "DELETE FROM leave_folders WHERE id = ?";
            $stmt = mysqli_prepare($con, $deleteFolderQuery);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $folder_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                $errors[] = "Failed to prepare query for folder ID $folder_id.";
                continue;
            }

            // Delete folder from filesystem
            $folderPath = __DIR__ . "/img/Leave Files/" . $folder_id;
            if (is_dir($folderPath)) {
                $files = glob("$folderPath/*");
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                rmdir($folderPath);
            }
        }

        if (empty($errors)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $errors]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Invalid folder IDs format!"]);
    }
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Leave Credits | ERMS</title>
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
            margin: 30px 0 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .folder-actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .folder-actions button i {
            font-size: 16px;
        }

        /* Responsive tweaks for smaller screens */
        @media (max-width: 768px) {
            .folder-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .folder-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .folder-actions button {
                font-size: 14px;
                padding: 6px 10px;
            }

            .folder-actions button i {
                font-size: 14px;
            }

            .btn-label {
                display: inline;
            }
        }

        .folders-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
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

        /* Folder search */
        .folder-search input {
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 16px;
            width: 100%;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .folder-search input:focus {
            border-color: #0056b3;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .folder-count {
            font-size: 12px;
            color: red;
            font-weight: bold;
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
                                                        <strong>Leave Credits</strong>
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
                            <h3>Leave Credits</h3>
                        </div>

                        <div class="folder-section">

                            <div class="folder-list">
                                <!-- Folder icons go here -->
                            </div>

                            <div class="folder-actions">
                                <button class="btn btn-primary btn-border btn-round btn-sm" id="addFolderBtn" title="Add Folder">
                                    <i class="fas fa-folder-plus"></i> <span class="btn-label">Add Folder</span>
                                </button>
                                <button class="btn btn-danger btn-border btn-round btn-sm" id="deleteSelectedBtn" title="Delete Folder">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-warning btn-border btn-round btn-sm" id="selectBtn" title="Select Folder">
                                    <i class="fas fa-check-square"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Folder Search Bar -->
                        <div class="folder-search" style="margin-bottom: 20px;">
                            <input type="text" id="folderSearchInput" class="form-control" placeholder="Search folders..." onkeyup="filterFolders()" />
                        </div>

                        <div class="folders-container">
                            <?php
                            // Fetch folders from the database
                            $query = "SELECT * FROM leave_folders WHERE parent_id IS NULL ORDER BY name ASC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $folder_id = $row['id'];

                                    // Count subfolders
                                    $subfolder_query = mysqli_query($con, "SELECT COUNT(*) as count FROM leave_folders WHERE parent_id = $folder_id");
                                    $subfolder_count = mysqli_fetch_assoc($subfolder_query)['count'];

                                    // Count files
                                    $file_query = mysqli_query($con, "SELECT COUNT(*) as count FROM leave_files WHERE folder_id = $folder_id");
                                    $file_count = mysqli_fetch_assoc($file_query)['count'];

                                    echo '
                                        <div class="folder-container">
                                            <div class="folder-actions">
                                                <input type="checkbox" class="folder-checkbox" value="' . $folder_id . '" style="display: none;">
                                                <div class="folder-options" style="position: relative; display: inline-block;">
                                                    <i class="fa fa-ellipsis-v folder-menu-toggle" data-folder-id="' . $folder_id . '" style="cursor: pointer; padding: 5px;"></i>
                                                    <div class="folder-dropdown" id="dropdown-' . $folder_id . '" style="display: none; position: absolute; left: 100%; top: 0; background: white; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); z-index: 1000; min-width: 50px;">
                                                        <ul style="list-style: none; margin: 0; padding: 0;">
                                                            <li class="rename-folder" data-folder-id="' . $folder_id . '" data-folder-name="' . htmlspecialchars($row['name']) . '" style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee; transition: background 0.3s;">
                                                                Rename
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="folder" onclick="openFolder(' . $folder_id . ')">
                                                <i class="fa fa-folder"></i><br>
                                                ' . htmlspecialchars($row['name']) . ' <span class="folder-count">(' . $subfolder_count . '/' . ($subfolder_count + $file_count) . ')</span>
                                            </div>
                                        </div>';
                                }
                            } else {
                                echo "<p>No folders found.</p>";
                            }
                            ?>
                        </div>


                        <script>
                            // Function to filter folders based on search input
                            function filterFolders() {
                                const input = document.getElementById('folderSearchInput').value.toLowerCase();
                                const folders = document.querySelectorAll('.folders-container .folder-container');
                                let matchCount = 0;

                                folders.forEach(folder => {
                                    const folderName = folder.querySelector('.folder').innerText.toLowerCase();
                                    if (folderName.includes(input)) {
                                        folder.style.display = 'block';
                                        matchCount++;
                                    } else {
                                        folder.style.display = 'none';
                                    }
                                });

                                const noMatchMessageId = "no-match-message";
                                let noMatchMessage = document.getElementById(noMatchMessageId);

                                if (matchCount === 0) {
                                    if (!noMatchMessage) {
                                        noMatchMessage = document.createElement('p');
                                        noMatchMessage.id = noMatchMessageId;
                                        noMatchMessage.textContent = "No folders match your search.";
                                        noMatchMessage.style.cssText = `
                                                                        color: red;
                                                                        margin-top: 20px;
                                                                        font-weight: bold;
                                                                        font-size: 16px;
                                                                        font-style: italic;
                                                                    `;
                                        document.querySelector('.folders-container').appendChild(noMatchMessage);
                                    }
                                } else {
                                    if (noMatchMessage) {
                                        noMatchMessage.remove();
                                    }
                                }
                            }

                            function openFolder(folderId) {
                                window.location.href = "LF-files.php?folder_id=" + folderId;
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
                                                url: 'actions/LF-add-folder.php',
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
                                                url: 'actions/LF-delete-folder.php',
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
                                                url: 'actions/LF-rename-folder.php',
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