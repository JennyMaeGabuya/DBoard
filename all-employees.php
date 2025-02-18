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
  <title>All Employees | ERMS</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!--Sidebar-part-->
  <?php include 'includes/sidebar.php'; ?>

  <!--Header-part-->
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/dbcon.php'; ?>
  <!-- Mobile Menu end -->

  <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Search..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Employees</span>
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
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                    <div class="product-status-wrap drp-lst">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4>Employees</h4>     
                            </div>
    <div class="button-container">
        <a href="add-employee.php" class="btn btn-primary btn-border btn-round btn-sm">
            <i class="fa fa-plus"></i> Add Employee
        </a>
        <a href="" class="btn btn-success btn-border btn-round btn-sm">
            <i class="fa fa-excel"></i> export Excel
        </a>
        <a href="add-employee.php" class="btn btn-warning btn-border btn-round btn-sm">
            <i class="fa fa-file"></i> View Employee
        </a>
        <a href="" class="btn btn-danger btn-border btn-round btn-sm">
            <i class="fa fa-print"></i> Print
        </a>
    </div>
    
   
                        <div class="asset-inner">
                        <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                         <th scope="col">Profile</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * from employee";
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
                        $imageUrl = empty($imagePath) ? 'img/logo.png' : '../applicants/assets/uploads/applicant_profile/' . $imagePath;
                    ?>
                    <tr>
                      
                        <td><?php echo $count; ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt=""  style="height: 50px; width: 50px;">
                        </td>
                        <td><?php echo htmlspecialchars($lastname. ' ,'. $firstname. ' '. $middlename. ' '. $name_extension ); ?></td>
                        <td><?php echo htmlspecialchars($address); ?></td>
                        <td><?php echo htmlspecialchars($civil_status); ?></td>
                        <td><?php echo htmlspecialchars($email_address); ?></td>
                        <td>
                            <div style="display: flex;">
                                <a href="employeedetails.php?employee_no=<?php echo $id; ?>"  class="btn btn-info" title="View">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <a href="employeedetails.php?employee_no=<?php echo $id; ?>" class="btn btn-danger" title="Delete">
                                    <i class="fa fa-trash-o"></i> 
                                </a>
                          
                            </div>
                        </td>
                    </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>
                        </div>
                        <div class="custom-pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.querySelector(".search-int");
            const table = document.querySelector("table");
            const rows = table.querySelectorAll("tr");

            searchInput.addEventListener("keyup", function() {
                const searchQuery = searchInput.value.toLowerCase();

                rows.forEach(function(row, index) {
                    if (index === 0) return; // Skip the header row
                    const cells = row.querySelectorAll("td");
                    let found = false;

                    cells.forEach(function(cell) {
                        if (cell.textContent.toLowerCase().includes(searchQuery)) {
                            found = true;
                        }
                    });

                    row.style.display = found ? "" : "none"; // Show or hide row based on search match
                });
            });
        });
    </script>

  <div class="breadcome-area">
    <div class="container-fluid">



    
   
    </div>
  </div>
  </div>


  <script type="text/javascript" src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.min.js"></script>
        <!--sweet alert -->

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "pageLength": 10,
                    "lengthChange": true,
                    "order": [
                       // [1, "asc"], [0, "asc"]
                    ],
                    "searching": true,
                    "ordering": true,
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search here",
                        "lengthMenu": "_MENU_entries per page"
                    },
                });
            });

          
        </script>


  <!--Footer-part-->
  <?php include 'includes/footer.php'; ?>

