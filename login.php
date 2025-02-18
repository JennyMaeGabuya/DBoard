<?php
session_start();
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username and password are required!'); window.location.href='index.php';</script>";
        exit();
    }

    // Prepare statement to prevent SQL injection
    $stmt = $con->prepare("SELECT id, username, password FROM admin WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password (Assuming passwords are hashed in the database)
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('No user found!'); window.location.href='index.php';</script>";
        exit();
    }

    $stmt->close();
    $con->close();
}
?>
