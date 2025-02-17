<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Add Professors | ERMS</title>
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
          <div class="breadcome-list">
          <div class="row">
             
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="breadcome-menu">
                  <li>
                    <a href="#">Employees</a>
                  
                  
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="" class="btn btn-danger btn-border btn-round btn-sm" title="Download">
                                                    <i class="fa fa-print"></i>
                                                   print
                                                </a>
              </div>
            </div> <br> <br>
          <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                         <th scope="col">Profile</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * from service_records";
                    $view_data = mysqli_query($con, $query);
                    $count = 1;

                    while ($row = mysqli_fetch_assoc($view_data)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $birthdate = $row['birthdate'];
                        $status = $row['status'];
                        $department = $row['station_place'];
                        $imagePath = $row['picture'];
                        $imageUrl = empty($imagePath) ? 'img/logo.png' : '../applicants/assets/uploads/applicant_profile/' . $imagePath;
                    ?>
                    <tr>
                      
                        <td><?php echo $count; ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt=""  style="height: 50px; width: 50px;">
                        </td>
                        <td><?php echo htmlspecialchars($name); ?></td>
                        <td><?php echo htmlspecialchars($department); ?></td>
                        <td><?php echo htmlspecialchars($status); ?></td>
                        <td><?php echo htmlspecialchars($birthdate); ?></td>
                        <td>
                            <div style="display: flex;">
                                <a href="studentdetails.php?studid=<?php echo $id; ?>" class="btn btn-sm btn-primary" title="View">
                                    <i class="fa fa-file"></i> View
                                </a>
                                <a href="studentdetails.php?studid=<?php echo $id; ?>" class="btn btn-sm btn-danger" title="View">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                          
                            </div>
                        </td>
                    </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>
        </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="contacts-area mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div
            class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/1.jpg" />
              <h3><a href="">John Alva</a></h3>
              <p class="all-pro-ad">London, LA</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div
            class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/2.jpg" />
              <h3><a href="">Amir dex</a></h3>
              <p class="all-pro-ad">Pakistan, Los</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div
            class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/3.jpg" />
              <h3><a href="">Alva Adition</a></h3>
              <p class="all-pro-ad">India, Col</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div
            class="hpanel hblue contact-panel contact-panel-cs res-tablet-mg-t-30 dk-res-t-pro-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/4.jpg" />
              <h3><a href="">Sex Dog</a></h3>
              <p class="all-pro-ad">Uk, LA</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="hpanel hblue contact-panel contact-panel-cs mg-t-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/1.jpg" />
              <h3><a href="">Fox Well</a></h3>
              <p class="all-pro-ad">California, LA</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="hpanel hblue contact-panel contact-panel-cs mg-t-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/3.jpg" />
              <h3><a href="">Drom Simson</a></h3>
              <p class="all-pro-ad">Austrolia, LA</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="hpanel hblue contact-panel contact-panel-cs mg-t-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/2.jpg" />
              <h3><a href="">Sima son</a></h3>
              <p class="all-pro-ad">Suiden, Cro</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="hpanel hblue contact-panel contact-panel-cs mg-t-30">
            <div class="panel-body custom-panel-jw">
              <div class="social-media-in">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
              <img
                alt="logo"
                class="img-circle m-b"
                src="img/contact/4.jpg" />
              <h3><a href="">Drama Son</a></h3>
              <p class="all-pro-ad">USA, LA</p>
              <p>
                Lorem ipsum dolor sit amet of, consectetur adipiscing
                elitable. Vestibulum tincidunt est vitae ultrices accumsan.
              </p>
            </div>
            <div class="panel-footer contact-footer">
              <div class="professor-stds-int">
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Likes: </span> <strong>956</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Comments: </span> <strong>350</strong>
                  </div>
                </div>
                <div class="professor-stds">
                  <div class="contact-stat">
                    <span>Views: </span> <strong>450</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

