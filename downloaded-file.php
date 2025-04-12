<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
include 'emailnotif.php';

$uploadDir = "img/uploads/";

if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0777, true);
}

$query = "SELECT id, name FROM folders";
$result = mysqli_query($con, $query);
$folders = [];
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $folders[] = $row;
  }
} else {
  die("Database query failed: " . mysqli_error($con));
}

function sanitizeFileName($name)
{
  // Remove problematic characters from the filename and ensure it's safe
  return preg_replace('/[\/\\\\?%*:|"<>#&]/', '_', $name);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files']) && isset($_POST['folder_id'])) {
  $folder_id = intval($_POST['folder_id']);
  if ($folder_id <= 0) {
    echo json_encode(["success" => false, "error" => "Invalid folder selection."]);
    exit();
  }

  $uploadedFiles = [];
  $duplicateFiles = [];

  foreach ($_FILES['files']['name'] as $key => $originalName) {
    $fileTmpName = $_FILES['files']['tmp_name'][$key];

    // Sanitize filename for the file system
    $safeName = sanitizeFileName($originalName);
    $targetFilePath = $uploadDir . $safeName;

    // Check for existing file in the same folder (DB check)
    $checkQuery = "SELECT id FROM files WHERE filename = ? AND folder_id = ?";
    $checkStmt = mysqli_prepare($con, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "si", $originalName, $folder_id);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
      $duplicateFiles[] = $originalName;
      mysqli_stmt_close($checkStmt);
      continue;
    }
    mysqli_stmt_close($checkStmt);

    // Move file to target directory
    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
      // Save original filename and current datetime in DB
      $stmt = mysqli_prepare($con, "INSERT INTO files (folder_id, filename, uploaded_at) VALUES (?, ?, NOW())");
      mysqli_stmt_bind_param($stmt, "is", $folder_id, $originalName);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      $uploadedFiles[] = $originalName;
    } else {
      echo json_encode(["success" => false, "error" => "File upload failed."]);
      exit();
    }
  }

  echo json_encode([
    "success" => true,
    "files" => $uploadedFiles,
    "duplicates" => $duplicateFiles
  ]);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $fileToDelete = $_POST['delete'];
  $folderId = intval($_POST['folder_id']);

  $stmt = mysqli_prepare($con, "SELECT id FROM files WHERE filename = ? AND folder_id = ?");
  mysqli_stmt_bind_param($stmt, "si", $fileToDelete, $folderId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  if (mysqli_stmt_num_rows($stmt) > 0) {
    // Now get the actual stored filename (you may want to store the real file path or stored name)
    mysqli_stmt_close($stmt);

    // Then delete from file system and DB (same logic, but ensure folder-based)
    unlink($uploadDir . $fileToDelete); // Or use a stored actual name if it's prefixed
    $delStmt = mysqli_prepare($con, "DELETE FROM files WHERE filename = ? AND folder_id = ?");
    mysqli_stmt_bind_param($delStmt, "si", $fileToDelete, $folderId);
    mysqli_stmt_execute($delStmt);
    mysqli_stmt_close($delStmt);

    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false, "error" => "File not found."]);
  }
  exit();
}

// Fetch uploaded files
$recentFiles = [];
$query = "SELECT filename, folder_id FROM files WHERE uploaded_at >= NOW() - INTERVAL 7 DAY ORDER BY uploaded_at DESC";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $recentFiles[] = $row; // now each $file will have 'filename' and 'folder_id'
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>CSC Download | ERMS</title>
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
    .upload-section {
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px dashed #3388f5;
      padding: 100px;
      text-align: center;
      border-radius: 10px;
      background-color: #f8f9fa;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 40px;
      position: relative;
      margin-bottom: 10px;
    }

    .upload-section:hover {
      background-color: #eaf2ff;
    }

    .upload-section span {
      font-size: 18px;
      font-weight: bold;
      color: #3388f5;
    }

    .upload-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    #uploadBtn {
      position: relative;
      left: 480px;
      bottom: 65px;
    }

    .delete-btn {
      background: none;
      border: none;
      color: red;
      font-size: 16px;
      cursor: pointer;
      padding: 0;
    }

    .file-list {
      max-height: 550px;
      max-width: 450px;
      overflow-y: auto;
      overflow-x: hidden;
      border: 2px solid #3388f5;
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 10px;
      box-sizing: border-box;
    }

    .file-list ul li {
      padding: 10px;
      background: #fff;
      border: 1px solid #ddd;
      margin-bottom: 5px;
      border-radius: 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      overflow: hidden;
      white-space: nowrap;
    }

    .file-list ul li .action-buttons {
      display: flex;
      gap: 10px;
      flex-shrink: 0;
    }

    .file-list ul li a {
      text-decoration: none;
      color: #3388f5;
      font-weight: bold;
    }

    .file-list ul li a:hover {
      text-decoration: underline;
    }

    #filePreview {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    #filePreview .file-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: calc(100% / 2 - 10px);
      padding: 8px 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9f9f9;
      font-size: 14px;
    }

    #filePreview .file-item img {
      max-width: 30px;
      max-height: 30px;
      margin-right: 8px;
    }

    #filePreview .file-item span {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: calc(100% - 50px);
    }

    #filePreview .file-item .remove-file {
      background: none;
      border: none;
      color: #aaa;
      cursor: pointer;
      font-size: 16px;
    }

    #folderDropdown {
      width: 70%;
      padding: 10px;
      font-size: 16px;
      border: 2px solid #007bff;
      border-radius: 5px;
      background-color: #ffffff;
      color: #333;
      cursor: pointer;
      outline: none;
      transition: all 0.3s ease-in-out;
      margin-bottom: 10px;
    }

    .filename {
      display: inline-block;
      max-width: 250px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
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
                          <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                          <a href="dashboard.php">
                            <i class="fas fa-home"></i> Home
                          </a>
                          <span class="bread-slash"> / </span>
                          <a href="downloaded-file.php">
                            <strong>CSC Downloaded File</strong>
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

    <div class="product-status mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <div class="container">

                <div class="row">
                  <div class="col-md-6">
                    <div class="upload-section" id="dropArea">
                      <p>Drag or Drop Files Here</p>
                    </div>

                    <select id="folderDropdown" name="selected_folder" class="form-control">
                      <option value="">Select a Folder</option>
                      <?php foreach ($folders as $folder): ?>
                        <option value="<?= htmlspecialchars($folder['id']); ?>">
                          <?= htmlspecialchars($folder['name']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>

                    <input type="file" id="fileInput" multiple hidden>
                    <button class="btn btn-primary" id="uploadBtn">Upload</button>
                    <div class="file-preview" id="filePreview"></div>
                    <p id="uploadStatus"></p>
                  </div>

                  <div class="col-md-6">
                    <h4>Newly Uploaded Files</h4>
                    <div class="file-list">
                      <ul>
                        <?php foreach ($recentFiles as $file): ?>
                          <li>
                            <span class="filename" title="<?= htmlspecialchars($file['filename']); ?>">
                              <?= htmlspecialchars($file['filename']); ?>
                            </span>
                            <div class="action-buttons">
                              <a href="img/uploads/<?= urlencode($file['filename']); ?>" download class="download-btn">
                                <i class="fa fa-download"></i>
                              </a>
                              <button class="delete-btn"
                                data-file="<?= htmlspecialchars($file['filename']); ?>"
                                data-folder="<?= intval($file['folder_id']); ?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </button>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    let dropArea = $('#dropArea');
                    let fileInput = $('#fileInput');
                    let uploadBtn = $('#uploadBtn');
                    let filePreview = $('#filePreview');
                    let folderDropdown = $('#folderDropdown');
                    let filesToUpload = [];

                    // Clicking on dropArea opens file dialog
                    dropArea.on('click', function(e) {
                      fileInput.click();
                    });

                    // Prevent default drag behaviors on entire document
                    $(document).on('dragenter dragover', function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      dropArea.css('background', '#eaf2ff');
                    });

                    $(document).on('dragleave', function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      dropArea.css('background', '#f8f9fa');
                    });

                    // Global drop handler
                    $(document).on('drop', function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      dropArea.css('background', '#f8f9fa');
                      if (e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length > 0) {
                        handleFiles(e.originalEvent.dataTransfer.files);
                      }
                    });

                    // File selection via input
                    fileInput.on('change', function() {
                      handleFiles(this.files);
                    });

                    // Handle files
                    function handleFiles(files) {
                      for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        if (filesToUpload.some(f => f.name === file.name)) continue;
                        filesToUpload.push(file);
                        let fileId = `file-${filesToUpload.length}`;
                        filePreview.append(`
                        <div class="file-item" id="${fileId}">
                          <span>${file.name}</span>
                          <button class="cancel-btn" data-file="${file.name}" onclick="removeFile('${file.name}', '${fileId}')">x</button>
                        </div>
                      `);
                      }
                    }

                    // Remove file
                    window.removeFile = function(fileName, fileId) {
                      filesToUpload = filesToUpload.filter(file => file.name !== fileName);
                      $(`#${fileId}`).remove();
                    };

                    // Upload button handler
                    uploadBtn.click(function() {
                      if (filesToUpload.length === 0) {
                        Swal.fire('No File Selected', 'Please select files before uploading.', 'warning');
                        return;
                      }

                      let selectedFolder = folderDropdown.val();
                      if (!selectedFolder) {
                        Swal.fire('No Folder Selected', 'Please select a folder before uploading.', 'warning');
                        return;
                      }

                      let formData = new FormData();
                      filesToUpload.forEach(file => formData.append('files[]', file));
                      formData.append('folder_id', selectedFolder);

                      $.ajax({
                        url: 'downloaded-file.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                          let result = JSON.parse(response);

                          if (result.duplicates.length > 0) {
                            let duplicateFiles = result.duplicates.join('<br>');

                            Swal.fire({
                              title: "Duplicate Files Found",
                              html: `These files already exist:<br><strong>${duplicateFiles}</strong><br>Rename and upload?`,
                              icon: "warning",
                              showCancelButton: true,
                              confirmButtonText: "Yes, rename",
                              cancelButtonText: "Cancel"
                            }).then((res) => {
                              if (res.isConfirmed) {
                                renameAndUploadDuplicates(result.duplicates, selectedFolder);
                              }
                            });
                          } else {
                            if (result.success) {
                              Swal.fire('Upload Successful!', 'Your files have been uploaded.', 'success')
                                .then(() => location.reload());
                            } else {
                              Swal.fire('Upload Failed', 'An error occurred while uploading.', 'error');
                            }
                          }
                        }
                      });
                    });

                    function renameAndUploadDuplicates(duplicateFiles, folderId) {
                      let formData = new FormData();
                      filesToUpload.forEach(file => {
                        if (duplicateFiles.includes(file.name)) {
                          let fileExt = file.name.split('.').pop();
                          let fileBaseName = file.name.replace(/\.[^/.]+$/, ""); // Remove extension
                          let newFileName = `${fileBaseName}_1.${fileExt}`; // Add _1 instead of (1)
                          let renamedFile = new File([file], newFileName, {
                            type: file.type
                          });
                          formData.append('files[]', renamedFile);
                        } else {
                          formData.append('files[]', file);
                        }
                      });

                      formData.append('folder_id', folderId);

                      $.ajax({
                        url: 'downloaded-file.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                          let result = JSON.parse(response);
                          if (result.success) {
                            Swal.fire('Upload Successful!', 'Your files have been uploaded.', 'success')
                              .then(() => location.reload());
                          } else {
                            Swal.fire('Upload Failed', 'An error occurred while uploading.', 'error');
                          }
                        }
                      });
                    }

                    // Delete file with SweetAlert confirmation
                    $(document).on('click', '.delete-btn', function() {
                      let fileName = $(this).data('file');
                      let folderId = $(this).data('folder');

                      Swal.fire({
                        title: "Are you sure?",
                        text: `Do you really want to delete "${fileName}"? This action cannot be undone.`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                      }).then((result) => {
                        if (result.isConfirmed) {
                          $.post('downloaded-file.php', {
                            delete: fileName,
                            folder_id: folderId
                          }, function(response) {
                            let result = JSON.parse(response);
                            if (result.success) {
                              Swal.fire("Deleted!", `"${fileName}" has been deleted.`, "success")
                                .then(() => location.reload());
                            } else {
                              Swal.fire("Error!", result.error || "File deletion failed.", "error");
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
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>