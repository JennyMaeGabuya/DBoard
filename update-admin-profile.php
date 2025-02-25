<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

// Include the database connection file
include_once "dbcon.php";

// Set the user_id logged in as the employee_no
$employee_no = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $name_extension = $_POST['name_extension'];
    $email_address = $_POST['email_address'];
    $mobile_no = $_POST['mobileno'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $pob = $_POST['pob'];
    $civil_status = $_POST['civil_status'];
    $sex = $_POST['sex'];
    $blood_type = $_POST['blood_type'];
    $gsis_no = $_POST['gsis_no'];
    $pag_ibig_no = $_POST['pag_ibig_no'];
    $philhealth_no = $_POST['philhealth_no'];
    $tin_no = $_POST['tin_no'];
    $sss_no = $_POST['sss_no'];
    $from_date = $_POST['from_date'];
    $status = $_POST['status'];
    $branch = $_POST['branch'];
    $abs_wo_pay = $_POST['abs_wo_pay'];
    $cause_of_separation = $_POST['cause_of_separation'];
    $station_place = $_POST['station_place'];
    $date_separated = $_POST['date_separated'];
    $compensation_salary = $_POST['compensation_salary'];
    $pera = $_POST['pera'];
    $clothing = $_POST['clothing'];
    $cash_gift = $_POST['cash_gift'];
    $mid_year = $_POST['mid_year'];
    $productivity_incentive = $_POST['productivity_incentive'];
    $rt_allowance = $_POST['rt_allowance'];
    $year_end_bonus = $_POST['year_end_bonus'];
    $issued_date = $_POST['issued_date'];

    // Handle file upload for the profile picture
    $image_name = null; // Initialize image name
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $image_name = basename($image['name']);
        $target_dir = "img/profile/";
        $target_file = $target_dir . $image_name;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            echo "Error uploading file.";
        }
    }

    // Prepare the update query
    $query = "UPDATE employee e
              JOIN admin a ON e.employee_no = a.employee_no
              LEFT JOIN government_info g ON e.employee_no = g.employee_no
              LEFT JOIN service_records s ON e.employee_no = s.employee_no
              LEFT JOIN compensation c ON e.employee_no = c.employee_no
              SET e.firstname = ?, e.middlename = ?, e.lastname = ?, e.name_extension = ?, 
                  e.email_address = ?, e.mobile_no = ?, e.dob = ?, e.address = ?, 
                  e.pob = ?, e.civil_status = ?, e.sex = ?, e.blood_type = ?, 
                  g.gsis_no = ?, g.pag_ibig_no = ?, g.philhealth_no = ?, 
                  g.tin_no = ?, g.sss_no = ?, s.from_date = ?, s.status = ?, 
                  s.branch = ?, s.abs_wo_pay = ?, s.cause_of_separation = ?, 
                  s.station_place = ?, s.date_separated = ?, 
                  c.salary = ?, c.pera = ?, c.clothing = ?, 
                  c.rt_allowance = ?, c.issued_date = ?, 
                  c.cash_gift = ?, c.mid_year = ?, 
                  c.productivity_incentive = ?, c.year_end_bonus = ?";

    // Prepare the statement
    $stmt = $con->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssssssssssssssssssssssssssssss",
        $firstname, $middlename, $lastname, $name_extension,
        $email_address, $mobile_no, $dob, $address,
        $pob, $civil_status, $sex, $blood_type,
        $gsis_no, $pag_ibig_no, $philhealth_no,
        $tin_no, $sss_no, $from_date, $status,
        $branch, $abs_wo_pay, $cause_of_separation,
        $station_place, $date_separated,
        $compensation_salary, $pera, $clothing,
        $rt_allowance, $issued_date,
        $cash_gift, $mid_year,
        $productivity_incentive, $year_end_bonus
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the profile page after successful update
        header('Location: my-profile.php?update=success');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>