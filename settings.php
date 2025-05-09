<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include_once "dbcon.php";
include 'emailnotif.php';

$footerDir = 'img/footer/';
$latestFooter = 'latest-footer.jpg';

if (!file_exists($footerDir . $latestFooter)) {
    // Optional fallback if latest footer is not found
    $files = array_reverse(glob($footerDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE));
    $latestFooter = $files ? basename($files[0]) : 'default.jpg';
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Settings | ERMS</title>
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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <style>
        /* Additional CSS for footer management */
        .footer-item {
            transition: all 0.3s ease;
            padding: 5px;
            border-radius: 4px;
        }

        .footer-item:hover {
            background-color: #f8f9fa;
        }

        .active-footer {
            background-color: #f0f8ff;
            border-left: 3px solid #007bff;
            padding-left: 10px;
        }

        .footer-gallery {
            max-height: 400px;
            overflow-y: auto;
        }

        .selected-preview-container {
            position: relative;
        }

        .reuse-footer-btn {
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .reuse-footer-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Modal styles */
        #footerModal {
            transition: all 0.3s ease;
        }

        #modalImage {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .profile-img img {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-img img:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Button styles */
        .footer-item .btn-sm {
            margin-left: 5px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .footer-gallery {
                max-height: 300px;
            }

            .footer-item div {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-item div div {
                margin-top: 10px;
                display: flex;
                flex-direction: row;
            }
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
                                                        <strong>Settings</strong>
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

        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left: Upload New Footer -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="profile-info-inner">
                            <ul class="tab-review-design">
                                <li class="active"><a href="#description">Latest Footer</a></li>
                            </ul>

                            <!-- Current Footer Display -->
                            <div class="profile-img mb-2">
                                <br> <br>
                                <img src="img/footer/<?php echo $latestFooter . '?v=' . time(); ?>" alt="Current Footer" style="width: 100%; border: 1px solid #ccc;">
                            </div>

                            <br> <br>
                            <!-- Upload New Footer -->
                            <form action="upload-footer.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-2">
                                    <input class="form-control" type="file" name="image" accept="image/*" onchange="previewImage(event, 'previewNewFooter')" required>
                                </div>
                                <!-- New Image Preview -->
                                <div class="mb-2">
                                    <img id="previewNewFooter" src="#" alt="New Footer Preview" style="width: 100%; height: auto; display: none; border: 1px solid #ccc;" />
                                </div>
                                <button type="submit" style="width: 100%; margin-top: 15px;" class="btn btn-primary">Upload New Footer</button>
                            </form>
                        </div>
                    </div>

                    <!-- Right: List of Previous Footers -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul class="tab-review-design">
                                <li class="active"><a href="#description">Previous Footers</a></li>
                            </ul>
                            <div class="tab-content custom-product-edit">
                                <div id="description" class="tab-pane fade active in">
                                    <div class="product-tab-list">
                                        <div class="row">
                                            <div class="review-content-section">
                                                <div class="footer-gallery">
                                                    <?php
                                                    $footerDir = "img/footer/";
                                                    $images = array_reverse(glob($footerDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE));
                                                    foreach ($images as $img) {
                                                        $filename = basename($img);
                                                        $id = md5($filename); // Unique ID for preview toggle
                                                        $isActive = ($filename === $latestFooter) ? 'active-footer' : '';
                                                        echo '
                                                    <div class="footer-item mb-3 ' . $isActive . '">
                                                        <div style="display: flex; justify-content: space-between; align-items: center; margin: 10px;">
                                                            <span style="cursor: pointer; color: #007bff;" onclick="togglePreview(\'' . $id . '\', \'' . $img . '\')">' . $filename . '</span>
                                                            <div>
                                                                <button class="btn btn-success btn-sm mr-2" onclick="reuseFooter(\'' . $img . '\')"><i class="fa fa-check"></i> Use</button>
                                                                <button class="btn btn-danger btn-sm" onclick="deleteFooter(\'' . $filename . '\')"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <div id="preview_' . $id . '" style="margin-top: 10px; display: none;">
                                                            <img src="" style="max-width: 100%; border: 1px solid #ccc;" />
                                                        </div>
                                                        <hr>
                                                    </div>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mt-3 selected-preview-container">
                                                    <img id="selectedPreview" src="#" alt="Selected Preview" style="width: 100%; height: auto; display: none; border: 1px solid #ccc;" />
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
        </div>

        <!-- JavaScript -->
        <script>
            function previewImage(event, previewId) {
                const output = document.getElementById(previewId);
                output.src = URL.createObjectURL(event.target.files[0]);
                output.style.display = 'block';
            }

            function togglePreview(id, src) {
                const previewDiv = document.getElementById('preview_' + id);
                const img = previewDiv.querySelector('img');
                if (previewDiv.style.display === 'none') {
                    img.src = src;
                    previewDiv.style.display = 'block';

                    // Show in the selected preview area as well
                    showPreview(src);
                } else {
                    previewDiv.style.display = 'none';
                }
            }

            function openModal(src) {
                document.getElementById('modalImage').src = src;
                document.getElementById('footerModal').style.display = 'block';

                // Store the source for the reuse button
                document.getElementById('modalImage').dataset.src = src;
            }

            function reuseModalFooter() {
                const src = document.getElementById('modalImage').dataset.src;
                reuseFooter(src);
                closeModal();
            }

            function closeModal() {
                document.getElementById('footerModal').style.display = 'none';
            }

            function reuseFooter(src) {
                // Extract filename from path
                const filename = src.split('/').pop();

                Swal.fire({
                    title: 'Confirm',
                    text: "Do you want to set this as your current footer?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, use it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to set this as current footer
                        fetch('actions/set-current-footer.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'filename=' + encodeURIComponent(filename)
                            })
                            .then(response => response.json())
                            .then(data => {
                                showToast(data.status === 'success' ? 'success' : 'error', data.message);
                                if (data.status === 'success') {
                                    // Update the current footer display
                                    document.querySelector('.profile-img img').src = src;

                                    // Update footer item styling
                                    const footerItems = document.querySelectorAll('.footer-item');
                                    footerItems.forEach(item => {
                                        item.classList.remove('active-footer');
                                    });

                                    // Find and highlight the selected footer item
                                    footerItems.forEach(item => {
                                        if (item.querySelector('span').textContent === filename) {
                                            item.classList.add('active-footer');
                                        }
                                    });
                                }
                            })
                            .catch(() => {
                                showToast('error', 'Something went wrong with the request.');
                            });
                    }
                });
            }

            function showToast(icon, message) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: icon,
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }

            function deleteFooter(filename) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this footer image?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('actions/delete-footer.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'filename=' + encodeURIComponent(filename)
                            })
                            .then(response => response.json())
                            .then(data => {
                                showToast(data.status === 'success' ? 'success' : 'error', data.message);
                                if (data.status === 'success') {
                                    setTimeout(() => location.reload(), 1000);
                                }
                            })
                            .catch(() => {
                                showToast('error', 'Something went wrong with the request.');
                            });
                    }
                });
            }

            // Add click handler for all footer images
            document.addEventListener('DOMContentLoaded', function() {
                // Make the current footer image clickable to open modal
                const currentFooter = document.querySelector('.profile-img img');
                if (currentFooter) {
                    currentFooter.style.cursor = 'pointer';
                    currentFooter.addEventListener('click', function() {
                        openModal(this.src);
                    });
                }

                // Add CSS for active footer
                const style = document.createElement('style');
                style.textContent = `
            .active-footer {
                background-color: #f0f8ff;
                border-left: 3px solid #007bff;
            }
        `;
                document.head.appendChild(style);
            });

            // Show upload alerts based on URL parameter
            window.addEventListener('DOMContentLoaded', () => {
                const url = new URL(window.location);
                const uploadStatus = url.searchParams.get('upload');
                if (uploadStatus) {
                    let icon = 'info';
                    let message = 'Notice';
                    switch (uploadStatus) {
                        case 'success':
                            icon = 'success';
                            message = 'Footer uploaded successfully!';
                            break;
                        case 'invalid':
                            icon = 'error';
                            message = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                            break;
                        case 'failed':
                            icon = 'error';
                            message = 'There was an issue saving the file.';
                            break;
                        case 'none':
                            icon = 'warning';
                            message = 'No image was uploaded.';
                            break;
                    }
                    showToast(icon, message);
                    // Remove the URL parameter after showing the alert
                    url.searchParams.delete('upload');
                    window.history.replaceState(null, '', url);
                }
            });

            // Auto-reload every 5 minutes
            setTimeout(function() {
                location.reload();
            }, 300000);
        </script>
    </div>

    <!-- Footer Start-->
    <?php include 'includes/footer.php'; ?>