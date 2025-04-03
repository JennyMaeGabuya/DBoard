<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
include 'emailnotif.php';
$uploadDir = "img/uploads/";

// Ensure the upload directory exists
if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
  $uploadedFiles = [];

  foreach ($_FILES['files']['name'] as $key => $name) {
    $fileExt = pathinfo($name, PATHINFO_EXTENSION);
    $fileBaseName = pathinfo($name, PATHINFO_FILENAME);
    $sanitizedFileName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $fileBaseName); // Clean filename
    $newFileName = $sanitizedFileName . '.' . $fileExt;
    $targetFilePath = $uploadDir . $newFileName;

    // Avoid overwriting existing files by appending a number
    $counter = 1;
    while (file_exists($targetFilePath)) {
      $newFileName = $sanitizedFileName . "_$counter." . $fileExt;
      $targetFilePath = $uploadDir . $newFileName;
      $counter++;
    }
    // Fetch folders from the database
    $query = "SELECT id, folder_name FROM folders";
    $result = mysqli_query($con, $query); // Ensure you use `$con` here

    // Check for errors
    if (!$result) {
      die("Database query failed: " . mysqli_error($con));
    }

    // Store folders in an array
    $folders = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $folders[] = $row;
    }


    // Move uploaded file
    if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
      $uploadedFiles[] = $newFileName;
    } else {
      echo json_encode(["success" => false, "error" => "File upload failed."]);
      exit();
    }
  }

  echo json_encode(["success" => true, "files" => $uploadedFiles]);
  exit();
}

// Handle file deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $fileToDelete = $uploadDir . basename($_POST['delete']);
  if (file_exists($fileToDelete)) {
    unlink($fileToDelete);
    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false, "error" => "File not found."]);
  }
  exit();
}

// List uploaded files
$files = array_diff(scandir($uploadDir), ['.', '..']);
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
    .csc-container {
      background: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

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


    #uploadBtn {
      position: absolute;
      right: 20px;
      top: 79%;
    }

    .file-list ul {
      list-style: none;
      padding: 0;
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

    .file-list ul li span.filename {
      flex-grow: 1;
      /* Para lumawak ang file name area */
      overflow: hidden;
      text-overflow: ellipsis;
      /* Maglalagay ng "..." kung sobrang haba */
      white-space: nowrap;
      padding-right: 10px;
      /* Para may espasyo bago ang buttons */
    }

    .file-list ul li .action-buttons {
      display: flex;
      gap: 10px;
      /* Para may pagitan ang buttons */
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

    .delete-btn {
      background: none;
      border: none;
      color: black;
      font-size: 16px;
      cursor: pointer;
      padding: 0;
    }

    h4 {
      text-align: center;
    }

    .product-status-wrap {
      min-height: 100vh;
      background-color: white;
    }

    .file-list {
      max-height: 550px;
      /* Set a maximum height for scrolling */
      overflow-y: auto;
      /* Enable vertical scrolling */
      border: 2px solid #3388f5;
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 10px;
      margin-top: 10px;
      margin-left: 15px;
      margin-right: -20px;
      margin-bottom: 20px;
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

#folderDropdown:hover {
    border-color: #0056b3;
}

#folderDropdown:focus {
    border-color: #004085;
    box-shadow: 0 0 5px rgba(0, 91, 187, 0.5);
}

#folderDropdown option {
    padding: 10px;
    font-size: 16px;
    background: #ffffff;
    color: #333;
    
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
                <h2 class="text-center mb-4">CSC Downloaded File</h2>
                <div class="row">
                  <div class="col-md-6">
                    <div class="upload-section" id="dropArea">
                      <p>Drag & Drop Files Here</p>
                    </div>
                    <select id="folderDropdown" name="selected_folder" class="form-control">
    <option value="">Select a Folder</option>
    <?php foreach ($folders as $folder): ?>
        <option value="<?= $folder['id']; ?>"><?= htmlspecialchars($folder['folder_name']); ?></option>
    <?php endforeach; ?>
</select>
                    <input type="file" id="fileInput" multiple hidden>
                    <button class="btn btn-primary" id="uploadBtn">Upload</button>
                    <div class="file-preview" id="filePreview"></div>
                    <p id="uploadStatus"></p>
                  </div>
                  <div class="col-md-6">
                    <h4>Uploaded Files</h4>
                    <div class="file-list">
                      <ul>
                        <?php foreach ($files as $file): ?>
                          <li>
                            <span class="filename"><?= $file; ?></span>
                            <div class="action-buttons">
                              <a href="img/uploads/<?= $file; ?>" download class="download-btn">
                                <i class="fa fa-download"></i>
                              </a>
                              <button class="delete-btn" data-file="<?= $file; ?>">❌</button>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>

                    <script>
                      $(document).ready(function () {
                        let dropArea = $('#dropArea');
                        let fileInput = $('#fileInput');
                        let uploadBtn = $('#uploadBtn');
                        let filePreview = $('#filePreview');
                        let filesToUpload = [];

                        // Trigger file input when clicking on drop area
                        dropArea.click(function () {
                          fileInput.click();
                        });

                        dropArea.on('dragover', function (e) {
                          e.preventDefault();
                          dropArea.css('background', '#eaf2ff');
                        });

                        dropArea.on('dragleave', function () {
                          dropArea.css('background', "#f8f9fa");
                        });

                        dropArea.on('drop', function (e) {
                          e.preventDefault();
                          dropArea.css('background', "#f8f9fa");
                          let files = e.originalEvent.dataTransfer.files;
                          handleFiles(files);
                        });

                        fileInput.change(function () {
                          handleFiles(this.files);
                        });

                        function handleFiles(files) {
                          for (let i = 0; i < files.length; i++) {
                            let file = files[i];

                            // Avoid duplicate file selections
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

                        window.removeFile = function (fileName, fileId) {
                          filesToUpload = filesToUpload.filter(file => file.name !== fileName);
                          $(`#${fileId}`).remove();
                        };

                        uploadBtn.click(function () {
                          if (filesToUpload.length === 0) {
                            Swal.fire('No File Selected', 'Please select files before uploading.', 'warning');
                            return;
                          }

                          let formData = new FormData();
                          filesToUpload.forEach(file => formData.append('files[]', file));

                          $.ajax({
                            url: 'downloaded-file.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                              let result = JSON.parse(response);
                              if (result.success) {
                                Swal.fire('Upload Successful!', 'Your files have been uploaded.', 'success')
                                  .then(() => location.reload());
                              } else {
                                Swal.fire('Upload Failed', 'An error occurred while uploading.', 'error');
                              }
                            }
                          });
                        });
                      });


                      $(document).on('click', '.delete-btn', function () {
                        let fileName = $(this).data('file');
                        if (confirm("Are you sure you want to delete this file?")) {
                          $.post('downloaded-file.php', { delete: fileName }, function (response) {
                            let result = JSON.parse(response);
                            if (result.success) {
                              location.reload();
                            } else {
                              alert("Delete failed.");
                            }
                          });
                        }
                      });
                    </script>

                    <?php include 'includes/footer.php'; ?>
</body>

</html>