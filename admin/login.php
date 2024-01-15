<?php
session_start();
require_once('conn.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // استعلام للتحقق من وجود المستخدم في قاعدة البيانات
    $sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        header("location: welcome.php"); // توجيه المستخدم إلى صفحة ترحيبية بعد تسجيل الدخول بنجاح
    } else {
        $error = "بيانات تسجيل الدخول غير صحيحة";
    }
}
?>
