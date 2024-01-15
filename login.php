<?php
session_start();
include('./admin/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];

    // Fetch user data based on the provided email
    $sql = "SELECT * FROM `customers` WHERE `email` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session and store user data
            $_SESSION['email'] = $user['email'];


            // Redirect to the home page or any other page after successful login
            header("Location:home.php");
            exit();
        } else {
            // Password is incorrect
            $error = "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        $error = "User not found. Please check your email.";
    }
}
?>
