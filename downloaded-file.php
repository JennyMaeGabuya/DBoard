<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";
$uploadDir = "img/uploads/";

// Ensure the upload directory exists
if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
  $uploadedFiles = [];
  foreach ($_FILES['files']['name'] as $key => $name) {
    $targetFilePath = $uploadDir . basename($name);

    if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
      $uploadedFiles[] = $name;
    }
  }

  echo json_encode(["success" => true, "files" => $uploadedFiles]);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $fileToDelete = $uploadDir . basename($_POST['delete']);
  if (file_exists($fileToDelete)) {
    unlink($fileToDelete);
    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false, "error" => "File not found."]);
  }
  exit;
}

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
      padding: 70px;
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
      top: 91%;
      transform: translateY(-50%);
    }

    .file-list {
      border: 2px solid #3388f5;
      padding: 10px;
      text-align: center;
      border-radius: 10px;
      background-color: #f8f9fa;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 20px;
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
                      <span>Drag & Drop Files Here OR Click to Upload</span>
                    </div>
                    <input type="file" id="fileInput" multiple hidden>
                    <button class="btn btn-primary" id="uploadBtn">Upload</button>
                    <p id="uploadStatus"></p>
                  </div>
                  <div class="col-md-6">
                    <h4>Uploaded Files</h4>
                    <div class="file-list">
                      <ul>
                        <?php foreach ($files as $file): ?>
                          <li>
                            <?= $file; ?>
                            <div>
                              <a href="img/uploads/<?= $file; ?>" download>
                                <i class="fa fa-download"></i>
                              </a>
                              <button class="delete-btn" data-file="<?= $file; ?>">❌</button>
                            </div>
                          </li>
                        <?php endforeach; ?>
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

  <script>
    $(document).ready(function() {
      let dropArea = $("#dropArea");
      let fileInput = $("#fileInput");
      let uploadBtn = $("#uploadBtn");

      // Pag-drag over sa drop container
      dropArea.on("dragover", function(e) {
        e.preventDefault();
        dropArea.css("background-color", "#eaf2ff");
      });

      dropArea.on("dragleave", function() {
        dropArea.css("background-color", "#f8f9fa");
      });

      // Kapag ni-release sa drop container
      dropArea.on("drop", function(e) {
        e.preventDefault();
        dropArea.css("background-color", "#f8f9fa");
        let files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
          fileInput.prop("files", files);
          displayFileName(files[0]); // Ipakita ang filename
        }
      });

      fileInput.change(function() {
        displayFileNames(this.files);
      });


      function displayFileNames(files) {
        $("#uploadStatus").html(""); // Clears the text
      }


      uploadBtn.click(function() {
        let files = fileInput.prop("files");
        if (files.length === 0) {
          Swal.fire({
            icon: 'warning',
            title: 'No File Selected',
            text: 'Please select a file before uploading.'
          });
          return;
        }
        uploadFiles(files);
      });

      function uploadFiles(files) {
        let formData = new FormData();
        for (let i = 0; i < files.length; i++) {
          formData.append("files[]", files[i]);
        }

        $.ajax({
          url: "downloaded-file.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            let result = JSON.parse(response);
            if (result.success) {
              Swal.fire({
                icon: 'success',
                title: 'Upload Successful!',
                text: 'Your file has been uploaded successfully.',
                showConfirmButton: true
              }).then(() => {
                location.reload();
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Upload Failed',
                text: 'An error occurred while uploading the file.'
              });
            }
          }
        });
      }

      $(document).on('click', '.delete-btn', function() {
        let fileName = $(this).data('file');
        if (confirm("Are you sure you want to delete this file?")) {
          $.post("downloaded-file.php", {
            delete: fileName
          }, function(response) {
            let result = JSON.parse(response);
            if (result.success) {
              location.reload();
            } else {
              alert("Delete failed.");
            }
          });
        }
      });
    });
  </script>
</body>

</html>
<?php include 'includes/footer.php'; ?>