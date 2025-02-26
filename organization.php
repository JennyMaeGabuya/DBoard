<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Organization | ERMS</title>
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                <ul class="breadcome-menu" style="display: flex; justify-content: flex-start; padding-left: 0; padding: 0;">
                                    <li>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="dashboard.php">
    <i class="fas fa-home"></i> <strong>Home</strong>
</a>
<span class="bread-slash"> / </span>
<a href="organization.php">
    <i class="fas fa-building"></i> <strong>Organization</strong>
</a>

                                    </li>
                                </ul>
                            </div>
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
                            <h4>Office of Human Resource Management</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <div class="button-container">
                                    <a href="add-office-member.php" class="btn btn-primary btn-border btn-round btn-sm">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                    <a href="#" class="btn btn-success btn-border btn-round btn-sm">
                                        <i class="fa fa-file-excel-o"></i> Export
                                    </a>
                                    <a href="organization-chart.php" class="btn btn-danger btn-border btn-round btn-sm" target="_blank">
                                        <i class="fa fa-file-pdf-o"></i> PDF
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="widget-box">
                            <!-- JavaScript for live search -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

                            <script>
                                $(function() {
                                    new DataTable('#myTable', {
                                        responsive: true,
                                        autoWidth: false,
                                        language: {
                                            lengthMenu: "Show _MENU_ entries",
                                        },
                                    });
                                });
                            </script>
                        </div>

                        <div class="asset-inner" style="margin-top: 5px;">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $con->prepare("SELECT 
                                            e.employee_no,
                                            e.firstname,
                                            e.middlename,
                                            e.lastname,
                                            e.name_extension,
                                            e.dob,
                                            e.pob,
                                            e.sex,
                                            e.civil_status,
                                            e.address,
                                            e.blood_type,
                                            e.mobile_no,
                                            e.email_address,
                                            e.image,
                                            h.designation,
                                            h.role,
                                            e.created_at,
                                            e.updated_at
                                        FROM employee e
                                        JOIN hr_staffs h ON e.employee_no = h.employee_no");

                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    $count = 1;

                                    while ($row = $result->fetch_assoc()) {
                                        $employee_no = $row['employee_no'];
                                        $firstname = $row['firstname'];
                                        $middlename = $row['middlename'];
                                        $lastname = $row['lastname'];
                                        $name_extension = $row['name_extension'];
                                        $dob = $row['dob'];
                                        $pob = $row['pob'];
                                        $sex = $row['sex'];
                                        $civil_status = $row['civil_status'];
                                        $address = $row['address'];
                                        $mobile_no = $row['mobile_no'];
                                        $email_address = $row['email_address'];
                                        $designation = $row['designation'];
                                        $role = $row['role'];
                                        $imagePath = $row['image'];
                                        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;
                                    ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Profile Image"
                                                    style="height: 50px; width: 50px; border-radius: 50%; object-fit: cover;">
                                            </td>
                                            <td><?php echo htmlspecialchars($employee_no); ?></td>
                                            <td>
                                                <?php
                                                $full_name = $lastname;
                                                if (!empty($name_extension)) {
                                                    $full_name .= ' ' . $name_extension;
                                                }
                                                $full_name .= ', ' . $firstname;
                                                if (!empty($middlename)) {
                                                    $full_name .= ' ' . substr($middlename, 0, 1) . '.';
                                                }
                                                echo htmlspecialchars($full_name);
                                                ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($address); ?></td>
                                            <td><?php echo htmlspecialchars($email_address); ?></td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="employeedetails.php?employee_no=<?php echo htmlspecialchars($employee_no); ?>"
                                                        class="btn btn-info" title="View" style="margin-right: 8px;">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="delete_employee.php?employee_no=<?php echo htmlspecialchars($employee_no); ?>"
                                                        class="btn btn-danger" title="Delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php $count++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    <?php include 'includes/footer.php'; ?>