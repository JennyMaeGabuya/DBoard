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
    background-color: rgba(118, 184, 250, 0.67) !important;
    color: black !important;
    font-weight: bold;
  }

  .metismenu li>a:hover {
    background-color: rgba(51, 135, 245, 0.35) !important;
    color: black !important;
  }

  .metismenu li.active>ul li a:hover {
    background-color: rgba(51, 135, 245, 0.2) !important;
    color: black !important;
  }
</style>

<!-- Start Left menu area -->
<div class="left-sidebar-pro">
  <nav id="sidebar">
    <div class="sidebar-header">
      <a href="./dashboard.php">
        <img class="main-logo" src="img/logo/header-logo.png" alt="" style="width: 200px; height: auto; margin-top: 15px; margin-bottom: 30px;" />
      </a>
      <strong><a href="./dashboard.php"><img src="img/logo/sidebar-logo.png" alt="" style="width: 60px; height: auto;" /></a></strong>
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
          <li class="<?= ($current_page == 'organization.php' || $current_page == 'add-office-member.php' || $current_page == 'edit-member.php') ? 'active' : ''; ?>">
            <a class="has-arrow" href="#">
              <span class="educate-icon educate-department icon-wrap"></span>
              <span class="mini-click-non">Organization</span>
            </a>
            <ul class="submenu-angle">
              <li class="<?= ($current_page == 'organization.php') ? 'active' : ''; ?>">
                <a href="organization.php"><span class="mini-sub-pro">Member</span></a>
              </li>
              <li class="<?= ($current_page == 'add-office-member.php') ? 'active' : ''; ?>">
                <a href="add-office-member.php"><span class="mini-sub-pro">Add Member</span></a>
              </li>
              <li class="<?= ($current_page == 'edit-member.php') ? 'active' : ''; ?>">
                <a href="edit-member.php"><span class="mini-sub-pro">Edit Member</span></a>
              </li>
            </ul>
          </li>
          <li class="<?= ($current_page == 'all-employees.php' || $current_page == 'add-employee.php' || $current_page == 'edit-employee.php' || $current_page == 'employee-profile.php') ? 'active' : ''; ?>">
            <a class="has-arrow" href="#">
              <span class="educate-icon educate-professor icon-wrap"></span>
              <span class="mini-click-non">Employee</span>
            </a>
            <ul class="submenu-angle">
              <li class="<?= ($current_page == 'all-employees.php') ? 'active' : ''; ?>">
                <a href="all-employees.php"><span class="mini-sub-pro">All Employees</span></a>
              </li>
              <li class="<?= ($current_page == 'add-employee.php') ? 'active' : ''; ?>">
                <a href="add-employee.php"><span class="mini-sub-pro">Add Employees</span></a>
              </li>
              <li class="<?= ($current_page == 'edit-employee.php') ? 'active' : ''; ?>">
                <a href="edit-employee.php"><span class="mini-sub-pro">Edit Employees</span></a>
              </li>
              <li class="<?= ($current_page == 'employee-profile.php') ? 'active' : ''; ?>">
                <a href="employee-profile.php"><span class="mini-sub-pro">Employees Profile</span></a>
              </li>
            </ul>
          </li>
          <li class="<?= ($current_page == 'certifications.php' || $current_page == 'add-course.php' || $current_page == 'edit-course.php' || $current_page == 'course-info.php' || $current_page == 'course-payment.php') ? 'active' : ''; ?>">
            <a class="has-arrow" href="#">
              <span class="educate-icon educate-course icon-wrap"></span>
              <span class="mini-click-non">Issue Certificate</span>
            </a>
            <ul class="submenu-angle">
              <li class="<?= ($current_page == 'certifications.php') ? 'active' : ''; ?>">
                <a href="certifications.php"><span class="mini-sub-pro">Certifications</span></a>
              </li>
              <li class="<?= ($current_page == 'add-course.php') ? 'active' : ''; ?>">
                <a href="add-course.php"><span class="mini-sub-pro">Add Course</span></a>
              </li>
              <li class="<?= ($current_page == 'edit-course.php') ? 'active' : ''; ?>">
                <a href="edit-course.php"><span class="mini-sub-pro">Edit Course</span></a>
              </li>
              <li class="<?= ($current_page == 'course-info.php') ? 'active' : ''; ?>">
                <a href="course-info.php"><span class="mini-sub-pro">Courses Info</span></a>
              </li>
              <li class="<?= ($current_page == 'course-payment.php') ? 'active' : ''; ?>">
                <a href="course-payment.php"><span class="mini-sub-pro">Courses Payment</span></a>
              </li>
            </ul>
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