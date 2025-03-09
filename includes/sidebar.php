<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
  .metismenu li.active>a {
    font-weight: bold;
    background-color: #3388f5;
    color: white;
  }

  .metismenu li.active>ul {
    background-color: transparent !important;
  }

  .metismenu li.active>ul li.active a {
    background-color: rgba(118, 184, 250, 0.51) !important;
    color: black !important;
    font-weight: bold;
  }

  .metismenu li>a:hover {
    background-color: rgba(51, 135, 245, 0.15) !important;
    color: black !important;
  }

  .metismenu li.active>ul li a:hover {
    background-color: rgba(63, 141, 244, 0.59) !important;
    color: black !important;
  }
</style>

<!-- Start Left menu area -->
<div class="left-sidebar-pro">
  <nav id="sidebar">
    <div class="sidebar-header">
      <a href="./dashboard.php">
        <img class="main-logo" src="img/hdr-logo.png" alt="" style="width: 200px; height: auto; margin-top: 10px; margin-bottom: 30px;" />
      </a>
      <strong><a href="./dashboard.php"><img src="img/mk-logo.png" alt="" style="width: 60px; height: auto;" /></a></strong>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
      <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
          <li class="<?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
            <a href="./dashboard.php">
              <span class="educate-icon educate-home icon-wrap"></span>
              <span class="mini-click-non">Dashboard</span>
            </a>
          </li>
          <li class="<?= ($current_page == 'events.php') ? 'active' : ''; ?>">
            <a href="events.php">
              <span class="educate-icon educate-event icon-wrap sub-icon-mg"></span>
              <span class="mini-click-non">Event</span>
            </a>
          </li>
          <li class="<?= ($current_page == 'organization.php') ? 'active' : ''; ?>">
            <a href="./organization.php">
              <i class="fas fa-sitemap"></i>
              <span class="mini-click-non">Organization</span>
            </a>
          </li>
          <li class="<?= ($current_page == 'all-employees.php' || $current_page == 'add-employee.php' || $current_page == 'edit-employee.php' || $current_page == 'employee-profile.php' || $current_page == 'service_records.php') ? 'active' : ''; ?>">
            <a class="has-arrow" href="#">
              <span class="educate-icon educate-professor icon-wrap"></span>
              <span class="mini-click-non">Employee</span>
            </a>
            <ul class="submenu-angle">
              <li class="<?= ($current_page == 'all-employees.php') ? 'active' : ''; ?>">
                <a href="all-employees.php"><span class="mini-sub-pro">All Employees</span></a>
              </li>
              <li class="<?= ($current_page == 'employeedetails.php') ? 'active' : ''; ?>">
                <a href="#"><span class="mini-sub-pro">Employees Details</span></a>
              </li>
            </ul>
          </li>
          <li class="<?= ($current_page == 'certifications.php' || $current_page == 'add-course.php' || $current_page == 'edit-course.php' || $current_page == 'course-info.php' || $current_page == 'course-payment.php') ? 'active' : ''; ?>">
            <a class="has-arrow" href="#">
              <i class="fas fa-file-contract"></i>
              <span class="mini-click-non">Certifications</span>
            </a>
            <ul class="submenu-angle">
              <li class="<?= ($current_page == 'certifications.php') ? 'active' : ''; ?>">
                <a href="certifications.php"><span class="mini-sub-pro">Issue Certificate</span></a>
              </li>
              <li class="<?= ($current_page == 'cert-history.php') ? 'active' : ''; ?>">
                <a href="cert-history.php"><span class="mini-sub-pro">History</span></a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-download"></i>
              <span class="mini-click-non">CSC Downloads</span>
            </a>
          </li>
          <li>
            <a href="./logout.php">
              <span class="educate-icon educate-pages icon-wrap sub-icon-mg"></span>
              <span class="mini-click-non">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </nav>
</div>
<!-- End Left menu area -->