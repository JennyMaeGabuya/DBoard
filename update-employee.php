<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

// Include the database connection file
include_once "dbcon.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if update_type is set
    if (!isset($_POST['update_type'])) {
        die("Update type not specified.");
    }

    // Get the update type
    $update_type = $_POST['update_type'];

    // Get the employee number
    $employee_no = $_POST['employee_no'];

    // Handle basic information update
    if ($update_type === 'basic_info') {
        // Get the posted data for basic information
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $name_extension = $_POST['name_extension'];
        $email_address = $_POST['email_address'];
        $mobile_no = $_POST['mobile_no'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $pob = $_POST['pob'];
        $civil_status = $_POST['civil_status'];
        $sex = $_POST['sex'];
        $blood_type = $_POST['blood_type'];

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

        // Prepare the update query for basic information
        $query = "UPDATE employee SET 
                  firstname = ?, middlename = ?, lastname = ?, name_extension = ?, 
                  email_address = ?, mobile_no = ?, dob = ?, address = ?, 
                  pob = ?, civil_status = ?, sex = ?, blood_type = ?, 
                  image = ? 
                  WHERE employee_no = ?";

        // Prepare the statement
        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $con->error);
        }

        // Bind parameters
        $stmt->bind_param(
            "ssssssssssssss",
            $firstname,
            $middlename,
            $lastname,
            $name_extension,
            $email_address,
            $mobile_no,
            $dob,
            $address,
            $pob,
            $civil_status,
            $sex,
            $blood_type,
            $image_name,
            $employee_no
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the profile page after successful update
            header('Location: all-employees.php?update=success');
            exit();
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }

    // Handle government info update
    elseif ($update_type === 'government_info') {
        // Get government info data
        $gsis_no = $_POST['gsis'];
        $pag_ibig_no = $_POST['pag_ibig'];
        $philhealth_no = $_POST['philhealth'];
        $tin_no = $_POST['tin'];
        $sss_no = $_POST['sss'];

        // Prepare the update query for government info
        $query = "UPDATE government_info SET 
                  gsis_no = ?, pag_ibig_no = ?, philhealth_no = ?, 
                  tin_no = ?, sss_no = ? 
                  WHERE employee_no = ?";

        // Prepare the statement
        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $con->error);
        }

        // Bind parameters
        $stmt->bind_param(
            "ssssss",
            $gsis_no,
            $pag_ibig_no,
            $philhealth_no,
            $tin_no,
            $sss_no,
            $employee_no
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the profile page after successful update
            header('Location: all-employees.php?update=success');
            exit();
        } else {
            echo "Error updating government info: " . $stmt->error;
        }
    }

    // Handle service records update
    elseif ($update_type === 'service_records') {
        // Get service records data
        $from_date = $_POST['from_date'];
        $designation = $_POST['designation'];
        $to_date = $_POST['to_date'];
        $status = $_POST['status'];
        $salary = $_POST['salary'];
        $station_place = $_POST['station_place'];
        $branch = $_POST['branch'];
        $abs_wo_pay = $_POST['abs_wo_pay'];

        // Prepare the update query for service records
        $query = "UPDATE service_records SET 
                  from_date = ?, designation = ?, to_date = ?, 
                  status = ?, salary = ?, station_place = ?, 
                  branch = ?, abs_wo_pay = ? 
                  WHERE employee_no = ?";

        // Prepare the statement
        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $con->error);
        }

        // Bind parameters
        $stmt->bind_param(
            "sssssssss",
            $from_date,
            $designation,
            $to_date,
            $status,
            $salary,
            $station_place,
            $branch,
            $abs_wo_pay,
            $employee_no
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the profile page after successful update
            header('Location: all-employees.php?update=success');
            exit();
        } else {
            echo "Error updating service records: " . $stmt->error;
        }
    }

    // Handle compensation update
    elseif ($update_type === 'compensation') {
        // Get compensation data
        $compensation_salary = $_POST['compensation_salary'];
        $pera = $_POST['pera'];
        $clothing = $_POST['clothing'];
        $cash_gift = $_POST['cash_gift'];
        $mid_year = $_POST['mid_year'];
        $productivity_incentive = $_POST['productivity_incentive'];
        $rt_allowance = $_POST['rt_allowance'];
        $year_end_bonus = $_POST['year_end_bonus'];
        $issued_date = $_POST['issued_date'];

        // Prepare the update query for compensation
        $query = "UPDATE compensation SET 
                  salary = ?, pera = ?, clothing = ?, 
                  rt_allowance = ?, issued_date = ?, 
                  cash_gift = ?, mid_year = ?, 
                  productivity_incentive = ?, year_end_bonus = ? 
                  WHERE employee_no = ?";

        // Prepare the statement
        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $con->error);
        }

        // Bind parameters
        $stmt->bind_param(
            "ssssssssss",
            $compensation_salary,
            $pera,
            $clothing,
            $rt_allowance,
            $issued_date,
            $cash_gift,
            $mid_year,
            $productivity_incentive,
            $year_end_bonus,
            $employee_no
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the profile page after successful update
            header('Location: all-employees.php?update=success');
            exit();
        } else {
            echo "Error updating compensation: " . $stmt->error;
        }
    }
} else {
    // Redirect if the form is accessed directly
    header('location: all-employees.php');
    exit();
}
