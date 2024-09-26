<?php
session_start();
require 'connect.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username already taken!";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the admin_users table
        $stmt = $conn->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)");
        $stmt->bind_param('ss', $username, $hashed_password);

        if ($stmt->execute()) {
            echo "Signup successful! <a href='admin_login.html'>Login here</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
