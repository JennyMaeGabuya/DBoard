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

// Get subfolders of the current folder
$subfolder_query = "SELECT * FROM folders WHERE parent_id = $folder_id ORDER BY name ASC";
$subfolder_result = mysqli_query($con, $subfolder_query);


if (!$folder) {
    die("Folder not found.");
}

// Get files in the folder
$file_query = "SELECT * FROM files WHERE folder_id = $folder_id ORDER BY uploaded_at DESC";
$file_result = mysqli_query($con, $file_query);
?>

<!DOCTYPE html>

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

        .preview-btn {
            border: none;
            padding: 9px 13px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .preview-btn[disabled] {
            background-color: #ccc !important;
            color: #666 !important;
            border: none;
            cursor: not-allowed;
            opacity: 0.8;
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
                                                        CSC Forms
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

                        <div class="folder-section"
                            style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="folder-title"><?php echo htmlspecialchars($folder['name']); ?> Files</h3>
                            <div class="folder-list">
                                <!-- Folder icons go here -->
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-border btn-round btn-sm"
                                    onclick="openCreateFolderModal()">
                                    <i class="fas fa-folder-plus"></i> Add Folder
                                </button>
                            </div>
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
                                    // Show subfolders first
                                    if (mysqli_num_rows($subfolder_result) > 0) {
                                        while ($subfolder = mysqli_fetch_assoc($subfolder_result)) {
                                            $folderId = htmlspecialchars($subfolder['id']);
                                            $folderName = htmlspecialchars($subfolder['name']);

                                            echo '<tr>
                                                <td class="filename-cell">
                                                    <i class="fa fa-folder-open rename-icon" style="margin-right: 10px; cursor: pointer;" data-id="' . $folderId . '"></i>
                                                    <span class="folder-name-text" data-id="' . $folderId . '">' . $folderName . '</span>
                                                    <input type="text" class="folder-name-input" data-id="' . $folderId . '" value="' . $folderName . '" style="display: none; width: 70%; padding: 2px; font-size: 14px;">
                                                </td>
                                                <td class="file-actions text-right" style="text-align: center;">
                                                    <a href="files.php?folder_id=' . $folderId . '" class="btn btn-info" style="width: 80%; margin-right: 5px;" title="Open Folder">
                                                        <i class="fa fa-folder-open"></i> Open
                                                    </a>
                                                    <a href="actions/delete-subfolder.php?id=' . $folderId . '" class="btn btn-danger delete-btn">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>';
                                        }
                                    }

                                    // Then show files
                                    if (mysqli_num_rows($file_result) > 0) {
                                        while ($file = mysqli_fetch_assoc($file_result)) {
                                            $filePath = "img/CSC Uploads/" . htmlspecialchars($file['filename']);
                                            $fileName = htmlspecialchars($file['filename']);
                                            $fileId = $file['id'];

                                            $displayName = strlen($fileName) > 55 ? substr($fileName, 0, 50) . '...' : $fileName;
                                            $fileExtension = strtolower(pathinfo($file['filename'], PATHINFO_EXTENSION));
                                            $isPdf = ($fileExtension === 'pdf');

                                            echo '<tr>
                                                    <td class="filename-cell">
                                                        <i class="fa fa-file-o" style="margin-right: 10px;"></i>
                                                        <a href="' . $filePath . '" target="_blank" class="file-link" title="' . $fileName . '">' . $displayName . '</a>
                                                    </td>
                                                    <td class="file-actions text-right">';

                                            if ($isPdf) {
                                                echo '<a href="actions/view-files.php?id=' . $fileId . '" target="_blank" title="Preview">
                                                <button class="btn btn-warning"><i class="fa fa-search"></i> Preview</button>
                                            </a>';
                                            } else {
                                                echo '<button class="preview-btn" disabled title="Preview only available for PDFs">
                                                <i class="fa fa-search"></i> Preview
                                            </button>';
                                            }
                                            echo '<a href="actions/download.php?file=' . urlencode($file['filename']) . '" title="Download">
                                                <button class="btn btn-success"><i class="fa fa-download"></i> Download</button>
                                                </a>
                                                <a href="#" class="delete-btn-swal" data-id="' . $fileId . '" title="Delete">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                                </tr>';
                                        }
                                    } else {
                                        // Only show if there are no files *and* no subfolders
                                        if (mysqli_num_rows($subfolder_result) == 0) {
                                            echo '<tr><td colspan="2" class="no-files">No files or subfolders found.</td></tr>';
                                        }
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
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');

                Swal.fire({
                    title: 'Delete this folder?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
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

            const folderId = <?php echo $folder_id; ?>;

            // Allow drag-and-drop anywhere on the page
            document.body.addEventListener('dragover', function(event) {
                event.preventDefault(); // Allow drop
            });

            document.body.addEventListener('drop', function(event) {
                event.preventDefault();

                const files = event.dataTransfer.files;
                if (files.length > 0) {
                    uploadFiles(files);
                }
            });

            // Handle file upload
            function uploadFiles(files) {
                const formData = new FormData();

                // Append each file to the FormData object
                Array.from(files).forEach(file => {
                    formData.append("files[]", file);
                });
                formData.append("folder_id", folderId);

                // Create an XMLHttpRequest to send the files
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "actions/upload-file.php", true);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            Swal.fire("Success!", "Files uploaded successfully.", "success");
                            location.reload(); // Reload the page to show the new files
                        } else {
                            Swal.fire("Error!", "An error occurred during file upload.", "error");
                        }
                    }
                };

                xhr.onerror = function() {
                    Swal.fire("Error!", "Network error occurred during upload.", "error");
                };

                xhr.send(formData);
            }
        });

        function openCreateFolderModal() {
            $('#createFolderModal').modal('show');
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('createFolderForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('actions/create-subfolder.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        $('#createFolderModal').modal('hide');

                        if (data.success) {
                            Swal.fire('Success!', data.message, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error', data.message || 'Could not create folder.', 'error');
                        }
                    })
                    .catch(err => {
                        Swal.fire('Error', 'An error occurred.', 'error');
                    });
            });
        });

        setTimeout(function() {
            location.reload();
        }, 300000);

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".rename-icon").forEach(function(icon) {
                icon.addEventListener("click", function() {
                    const id = this.dataset.id;
                    const span = document.querySelector('.folder-name-text[data-id="' + id + '"]');
                    const input = document.querySelector('.folder-name-input[data-id="' + id + '"]');

                    span.style.display = "none";
                    input.style.display = "inline-block";
                    input.focus();
                    input.select();
                });
            });

            function saveRename(input) {
                const id = input.dataset.id;
                const newName = input.value.trim();
                if (newName === "") return;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "actions/rename-subfolder.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    const response = JSON.parse(xhr.responseText);
                    if (xhr.status === 200 && response.success) {
                        const span = document.querySelector('.folder-name-text[data-id="' + id + '"]');
                        span.textContent = newName;
                        span.style.display = "inline";
                        input.style.display = "none";
                    } else {
                        alert(response.error || "Rename failed!");
                    }
                };
                xhr.send("id=" + encodeURIComponent(id) + "&name=" + encodeURIComponent(newName));
            }

            document.querySelectorAll(".folder-name-input").forEach(function(input) {
                input.addEventListener("blur", function() {
                    saveRename(this);
                });

                input.addEventListener("keydown", function(e) {
                    if (e.key === "Enter") {
                        this.blur(); // Trigger save
                    }
                });
            });
        });
    </script>

    <div class="modal fade" id="createFolderModal" tabindex="-1" role="dialog" aria-labelledby="createFolderLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="createFolderForm">
                <div class="modal-content">
                    <div class="modal-header bg-primary" style="border-radius: 3px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="exampleModalLabel">Add New Folder</h4>
                    </div>

                    <div class="modal-body">
                        <input type="text" class="form-control" name="folder_name" placeholder="Enter folder name"
                            required>
                        <input type="hidden" name="parent_id" value="<?php echo $folder_id; ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>