<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_POST['basic-infobtn'])) {
    $emp_no= $_POST['emp_no'];
   $dept= $_POST['dept'];
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
    $employee_no =$dept . $emp_no;

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];

        // Validate the image (optional)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            $_SESSION['display'] = 'Invalid image type!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header("Location: add-employee.php");
            exit();
        }

        // Define the upload directory
        $uploadDir = 'img/profile/'; // Make sure this directory exists and is writable
        $imagePath = $uploadDir . basename($image['name']);

        // Move the uploaded file to the designated directory
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $created_at = date('Y-m-d');
            $updated_at = date('Y-m-d');

            // Check if the employee name already exists
            $checkNameQuery = "SELECT * FROM employee WHERE firstname = ? AND middlename = ? AND lastname = ?";
            $checkStmt = $con->prepare($checkNameQuery);
            $checkStmt->bind_param("sss", $firstname, $middlename, $lastname);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                // Employee already exists
                $_SESSION['display'] = 'Employee already exists!';
                $_SESSION['title'] = 'Error';
                $_SESSION['success'] = 'error';
                header("Location: add-employee.php");
                exit();
            } else {
                $insertQuery = "INSERT INTO `employee` (`employee_no`,`firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($insertQuery);
                $stmt->bind_param("sssssssssssissss", $employee_no, $firstname, $middlename, $lastname, $name_extension, $dob, $pob, $sex, $civil_status, $address, $blood_type, $mobile_no, $email_address, $image['name'], $created_at, $updated_at);

                if ($stmt->execute()) {
                    $_SESSION['display'] = 'Successfully added a new employee!';
                    $_SESSION['title'] = 'Good Job';
                    $_SESSION['success'] = 'success';
                    header("Location: add-employee.php");
                    exit();
                } else {
                    $_SESSION['display'] = 'Something went wrong during the database insertion!';
                    $_SESSION['title'] = 'Error';
                    $_SESSION['success'] = 'error';
                    header("Location: add-employee.php");
                    exit();
                }
            }
        } else {
            $_SESSION['display'] = 'Failed to upload image!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header("Location: add-employee.php");
            exit();
        }
    } else {
        $_SESSION['display'] = 'No image uploaded or there was an error!';
        $_SESSION['title'] = 'Error';
        $_SESSION['success'] = 'error';
        header("Location: add-employee.php");
        exit();
    }
}
