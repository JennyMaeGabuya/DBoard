<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_POST['basic-infobtn'])) {
    $emp_no = $_POST['emp_no'];
    $dept = $_POST['dept'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $name_extension = $_POST['name_extension'];
    $email_address = $_POST['email_address'];
    $mobile_no = $_POST['mobile_no'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $pob = $_POST['pob'];
    $civil_status = $_POST['civil_status'];
    $sex = $_POST['sex'];
    $blood_type = $_POST['blood_type'];
    $employee_no = $dept . $emp_no;
    $created_at = date('Y-m-d');
    $updated_at = date('Y-m-d');

    // Government records
    $gsis = $_POST['gsis'];
    $pag_ibig = $_POST['pag_ibig'];
    $sss = $_POST['sss'];
    $philhealth = $_POST['philhealth'];
    $tin = $_POST['tin'];

    // Default image value (NULL if no image is uploaded)
    $image_name = NULL;

    // Check if an image is uploaded
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];

        // Validate the image type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            $_SESSION['display'] = 'Invalid image type! Only JPG, PNG, and GIF are allowed.';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header("Location: all-employees.php");
            exit();
        }

        // Define the upload directory
        $uploadDir = 'img/profile/'; // Ensure this directory exists and is writable
        $image_name = basename($image['name']);
        $imagePath = $uploadDir . $image_name;

        // Move the uploaded file
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            $_SESSION['display'] = 'Failed to upload image!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header("Location: all-employees.php");
            exit();
        }
    }

    // Check if the employee already exists
    $checkNameQuery = "SELECT * FROM employee WHERE firstname = ? AND middlename = ? AND lastname = ?";
    $checkStmt = $con->prepare($checkNameQuery);
    $checkStmt->bind_param("sss", $firstname, $middlename, $lastname);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $_SESSION['display'] = 'Employee already exists!';
        $_SESSION['title'] = 'Error';
        $_SESSION['success'] = 'error';
        header("Location: all-employees.php");
        exit();
    }

    // Insert the new employee (image can be NULL)
    $insertQuery = "INSERT INTO `employee` (`employee_no`, `firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($insertQuery);
    $stmt->bind_param("sssssssssssissss", $employee_no, $firstname, $middlename, $lastname, $name_extension, $dob, $pob, $sex, $civil_status, $address, $blood_type, $mobile_no, $email_address, $image_name, $created_at, $updated_at);

    if ($stmt->execute()) {
        // Insert government records
        $govInsertQuery = "INSERT INTO `government_info` (`employee_no`, `gsis_no`, `pag_ibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $govStmt = $con->prepare($govInsertQuery);
        $govStmt->bind_param("ssssssss", $employee_no, $gsis, $pag_ibig, $philhealth, $sss, $tin, $created_at, $updated_at);

        if ($govStmt->execute()) {
            $_SESSION['display'] = 'Successfully added a new employee.';
            $_SESSION['title'] = 'Success';
            $_SESSION['success'] = 'success';
        } else {
            $_SESSION['display'] = 'Failed to insert government records!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
        }

        header("Location: all-employees.php");
        exit();
    } else {
        $_SESSION['display'] = 'Something went wrong. Please, try again!';
        $_SESSION['title'] = 'Error';
        $_SESSION['success'] = 'error';
        header("Location: all-employees.php");
        exit();
    }
}
?>