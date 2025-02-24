<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    <title>All Employees | ERMS</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
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
                                        <a href="dashboard.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                        <span class="bread-slash">/</span>
                                        <span class="bread-blod">Employees</span>
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
                            <h4>Employees</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <div class="button-container">
                                    <a href="#add" data-toggle="modal" class="btn btn-primary btn-border btn-round btn-sm">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                    <a href="add-employee.php" class="btn btn-warning btn-border btn-round btn-sm">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="" class="btn btn-success btn-border btn-round btn-sm">
                                        <i class="fa fa-file-excel-o"></i> Export
                                    </a>
                                    <a href="" class="btn btn-danger btn-border btn-round btn-sm">
                                        <i class="fa fa-print"></i> Print
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
                                        <th scope="col">Sex</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM employee";
                                    $view_data = mysqli_query($con, $query);
                                    $count = 1;

                                    while ($row = mysqli_fetch_assoc($view_data)) {
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
                                        $imagePath = $row['image'];
                                        $imageUrl = empty($imagePath) ? 'img/mk-logo.png' : 'img/profile/' . $imagePath;
                                    ?>
                                        <tr>

                                            <td style="text-align: center;"><?php echo $count; ?></td>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt=""
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
                                            <td><?php echo htmlspecialchars($sex); ?></td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="employeedetails.php?employee_no=<?php echo $employee_no; ?>"
                                                        class="btn btn-info" title="View" style="margin-right: 8px;">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <a href="employeedetails.php?employee_no=<?php echo $id; ?>"
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

    <!-- Modal ADD NEW employee -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="border-radius: 3px;">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="basic-info.php" method="POST" enctype="multipart/form-data">
                        <h4 class="text-center">Basic Information</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label>Department</label>
                                <select name="dept" class="form-control" required>
                                    <option
                                        value="none"
                                        selected=""
                                        disabled="">
                                        Department
                                    </option>
                                    <option value="HRM">Human Resource Management</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="MKT">Marketing</option>
                                    <option value="ACT">Accounting</option>
                                    <option value="ENGR">Engineering</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label>Employee Number</label>
                                <input
                                    name="emp_no"
                                    type="number"
                                    class="form-control"
                                    placeholder="Employee Number" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Last Name</label>
                                <input
                                    name="lastname"
                                    type="text"
                                    class="form-control"
                                    placeholder="Lastname" required />
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>First Name</label>
                                <input
                                    name="firstname"
                                    type="text"
                                    class="form-control"
                                    placeholder="Firstname" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Middle Name</label>
                                <div class="form-group">
                                    <input
                                        name="middlename"
                                        type="text"
                                        class="form-control"
                                        placeholder="Middlename" required />
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Name Extension</label>
                                <input
                                    name="name_extension"
                                    type="text"
                                    class="form-control"
                                    placeholder="Extension Name" required />
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Email </label>
                                <input
                                    name="email_address"
                                    type="email"
                                    class="form-control"
                                    placeholder="Email Address" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Mobile Number</label>
                                <input
                                    name="mobile_no" id="mobile"
                                    type="tel"
                                    class="form-control"
                                    placeholder="Mobile no." required pattern="\d{11}" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Birthdate</label>
                                <input
                                    name="dob"
                                    id="finish"
                                    type="date"
                                    class="form-control"
                                    placeholder="Date of Birth" required />
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Civil Status</label>
                                <select name="civil_status" class="form-control" required>
                                    <option
                                        value="none"
                                        selected=""
                                        disabled="">
                                        Civil Status
                                    </option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sex</label>
                                <select name="sex" class="form-control" required>
                                    <option
                                        value="none"
                                        selected=""
                                        disabled="">
                                        Sex
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Blood Type</label>
                                <select name="blood_type" class="form-control" required>
                                    <option
                                        value="none"
                                        selected=""
                                        disabled="">
                                        Blood Type
                                    </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="Unknown">Unknown</option>

                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Address</label>
                                <input
                                    name="address"
                                    type="text"
                                    class="form-control"
                                    placeholder="Address" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Place of Birth</label>
                                <input
                                    name="pob"
                                    type="text"
                                    class="form-control"
                                    placeholder="Place of Birth" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Upload Profile Picture</label>
                                <input class="form-control" type="file" id="formFile" name="image" required>
                            </div>

                        </div>
                        <br>
                        <hr>
                        <h4 class="text-center">Government Records</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>GSIS Number</label>
                                <input
                                    name="gsis"
                                    type="text"
                                    class="form-control"
                                    placeholder="GSIS Number" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>PAG-IBIG Number</label>
                                <input
                                    name="pag_ibig"
                                    type="text"
                                    class="form-control"
                                    placeholder="PAGIBIG Number" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>PHILIHEALTH Number</label>
                                <input
                                    name="philhealth"
                                    type="text"
                                    class="form-control"
                                    placeholder="PhilHealth Number" required />
                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>SSS Number</label>
                                <input
                                    name="sss"
                                    type="text"
                                    class="form-control"
                                    placeholder="SSS Number" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label>TIN Number</label>
                                <input
                                    name="tin"
                                    type="text"
                                    class="form-control"
                                    placeholder="TIN Number" required />
                            </div>



                        </div>
                </div>
                <div class="modal-footer">
                    <!--  <input type="hidden" id="pos_id" name="id"> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="basic-infobtn">Create</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('mobile').addEventListener('input', function(e) {
            const value = e.target.value;
            if (value.length > 11) {
                e.target.value = value.slice(0, 11); // Limit input to 11 digits
            }
        });
    </script>
    <?php if (isset($_SESSION['display'])) : ?>
        <script>
            Swal.fire({
                title: '<?php echo $_SESSION['title']; ?>',
                text: '<?php echo $_SESSION['display']; ?>',
                icon: '<?php echo $_SESSION['success']; ?>',
                confirmButtonText: 'OK'
            });
        </script>
        <?php unset($_SESSION['display']);
        unset($_SESSION['success']); ?>
    <?php endif; ?>