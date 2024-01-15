<?php
session_start();
include('/admin/conn.php');

// Register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = strtolower($_POST['email']);
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email is unique
    $check_email_sql = "SELECT COUNT(*) FROM `customers` WHERE `email` = ?";
    $stmt_check_email = $conn->prepare($check_email_sql);
    $stmt_check_email->execute([$email]);
    $email_exists = $stmt_check_email->fetchColumn();

    if ($email_exists) {
        $error = "البريد الإلكتروني مستخدم بالفعل. يرجى استخدام بريد إلكتروني آخر.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "البريد الإلكتروني غير صالح";
        } else {
            $sql = "INSERT INTO `customers` (name, email, password, phone_number, address) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute([$name, $email, $hashed_password, $phone, $address])) {
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            } else {
                $error = "حدث خطأ أثناء إنشاء الحساب: " . $stmt->errorInfo()[2];
            }
        }
    }
}
?>
