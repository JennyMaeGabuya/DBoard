<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
$uploadDir = "uploads/";

// Ensure the upload directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        echo json_encode(["success" => true, "file" => $fileName]);
        exit;
    } else {
        echo json_encode(["success" => false, "error" => "File upload failed."]);
        exit;
    }
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
  <title>CSC Download| ERMS</title>
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
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
  <style>
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
    justify-content: space-between;
    border: 2px dashed #3388f5;
    padding: 70px;
    text-align: center;
    border-radius: 10px;
    background-color: #f8f9fa;
    cursor: pointer;
    transition: background 0.3s;
    margin-top: 40px;
    position: relative;
}

    .upload-section:hover {
        background-color: #eaf2ff;
    }

    #uploadBtn {
    position: absolute;
    right: 20px;
    top: 95%;
    transform: translateY(-50%);
}

    .file-list {
        border: 2px dashed #3388f5;
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
        
        color: white;
        border: none;
        padding: 5px 8px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    h4 {
    text-align: center;
}
</style>
  </head>

<body>

  <!--Sidebar-part-->
  <?php include 'includes/sidebar.php'; ?>

  <!--Header-part-->
  <?php include 'includes/header.php'; ?>
  <!--Footer-part-->
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
                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <div class="container">
    <h2 class="text-center mb-4">CSC Downloaded File</h2>
    <div class="row">
            <div class="col-md-6">
                <div class="upload-section" id="dropArea">Drag & Drop Files Here OR Click to Upload</div>
                <input type="file" id="fileInput" hidden>
                <button class="btn btn-primary mt-2" id="uploadBtn">Upload</button>
                <p id="uploadStatus"></p>
            </div>
            <div class="col-md-6">
                <h4>Uploaded Files</h4>
                <div class="file-list">
                    <ul>
                        <?php foreach ($files as $file): ?>
                            <li>
                                <?= $file; ?>
                                <a href="uploads/<?= $file; ?>" download>
                                    <i class="fa fa-download"></i>
                                </a>
                                <button class="delete-btn" data-file="<?= $file; ?>">❌</button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#dropArea').click(() => $('#fileInput').click());
        $('#fileInput').change(function () { uploadFile(this.files[0]); });
        $('#uploadBtn').click(() => $('#fileInput').click());

        function uploadFile(file) {
            if (!file) return;
            let formData = new FormData();
            formData.append("file", file);

            $.ajax({
                url: "downloaded-file.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        location.reload();
                    } else {
                        $('#uploadStatus').text("Upload failed: " + result.error);
                    }
                }
            });
        }

        $(document).on('click', '.delete-btn', function () {
            let fileName = $(this).data('file');
            if (confirm("Are you sure you want to delete this file?")) {
                $.post("downloaded-file.php", { delete: fileName }, function (response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        location.reload();
                    } else {
                        alert("Delete failed: " + result.error);
                    }
                });
            }
        });
    </script>
</body>
</html>
<?php include 'includes/footer.php'; ?>