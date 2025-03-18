<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid hidden-logo">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="./dashboard.php">
                        <img class="main-logo" src="img/hdr-logo.png" alt=""
                            style="width: 150px; height: auto; margin-top: 10px; margin-bottom: 10px;" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hidden-logo {
            visibility: hidden;
        }

        @media screen and (max-width: 768px) {
            .hidden-logo {
                display: none;
                text-align: center;
            }
        }
    </style>

    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button
                                            type="button"
                                            id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                </div>

                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                            <li class="nav-item">

                                                <?php
                                                if (!isset($_SESSION['user_id'])) {
                                                    header('location:../index.php');
                                                    exit();
                                                }

                                                include "dbcon.php";

                                                // Get the logged-in user's employee number
                                                $user_id = $_SESSION['user_id'];

                                                // Check if user_id is valid before running the query
                                                if (!empty($user_id)) {
                                                    $query = "
                                                        SELECT e.image, e.firstname, e.lastname, e.sex
                                                        FROM employee e 
                                                        INNER JOIN admin a ON e.employee_no = a.employee_no 
                                                        WHERE a.employee_no = ?
                                                    ";

                                                    $stmt = $con->prepare($query);
                                                    $stmt->bind_param("s", $user_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($row = $result->fetch_assoc()) {
                                                        $imagePath = $row['image'];
                                                        $sex = strtolower($row['sex']);

                                                        // Determine salutation based on sex
                                                        if ($sex === 'male') {
                                                            $salutation = "Mr.";
                                                        } elseif ($sex === 'female') {
                                                            $salutation = "Ms.";
                                                        } else {
                                                            $salutation = ""; // Default to no salutation if sex is not set
                                                        }

                                                        $user_image = !empty($imagePath) ? 'img/profile/' . $imagePath : 'img/mk-logo.png'; // Default image if empty
                                                        $user_name = trim("$salutation {$row['firstname']} {$row['lastname']}"); // Full name with salutation
                                                    } else {
                                                        // If no matching employee record, set default values
                                                        $user_image = 'img/mk-logo.png';
                                                        $user_name = 'Admin';
                                                    }

                                                    $stmt->close();
                                                } else {
                                                    // Handle case where session data is missing
                                                    $user_image = 'img/mk-logo.png';
                                                    $user_name = 'Admin';
                                                }

                                                ?>

                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="<?php echo htmlspecialchars($user_image); ?>" alt="User Image" />
                                                    <span class="admin-name"><?php echo htmlspecialchars($user_name); ?></span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>

                                                <ul
                                                    role="menu"
                                                    class="dropdown-header-top author-log dropdown-menu ">
                                                    <li>
                                                        <a href="my-profile.php"><span
                                                                class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                    </li>
                                                    <li>
                                                        <a href="./change-password.php"><span
                                                                class="edu-icon edu-settings author-log-ic"></span>Change Password</a>
                                                    </li>
                                                    <li>
                                                        <a href="./logout.php"><span
                                                                class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>