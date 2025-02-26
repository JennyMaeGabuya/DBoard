<?php
session_start();
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required!";
        header("Location: index.php");
        exit();
    }

    // Prepare statement to prevent SQL injection
    $stmt = $con->prepare("SELECT id, employee_no, username, email, password FROM admin WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password (Assuming passwords are hashed in the database)
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['employee_no'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['success'] = "Login successful!";

            header("Location: dashboard.php"); // Redirect to the dashboard after successful login
            exit();
        } else {
            $_SESSION['error'] = "Invalid account! Try again.";
        }
    } else {
        $_SESSION['error'] = "No user found with that username or email!";
    }

    $stmt->close();
    $con->close();

    header("Location: index.php"); // Redirect back to login page if login fails
    exit();
}
?>