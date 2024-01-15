
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- العلامات الوصفية -->
    <meta charset="UTF-8">
     <!-- روابط أوراق الأنماط للفيسبوك والجيت هاب و لينكيد ان -->
      <!-- روابط أوراق الأنماط ال css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>login</title>
    <!-- عنوان الصفحة -->
</head>

<body>
        <!-- الحاوية التي تasحتوي على النماذج والألواح -->

    <div class="container" id="container">
           <!-- نموذج التسجيل -->
        <div class="form-container sign-up">
            <form action="register.php" method="post">

                <h1>Create Account</h1>
             
                <?php


if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<p style='color: red;'>$error</p>";
}
?>
                <input type="text" name="name" placeholder="Full  Name">
       
                <input type="email"  name="email" placeholder="Email">
                <input type="text"  name="phone_number" placeholder="Phone Number">
                <input type="text"  name="address" placeholder="Your address">
                <input type="password" name="password" placeholder="Password">

                        <!-- زر للتسجيل -->
                        
                        <button type="submit" class="bn30">Sign Up</button>
            </form>
        </div>
              <!-- نموذج تسجيل الدخول -->
        <div class="form-container sign-in">
        <form action="login.php" method="POST">
                <h1>Sign In</h1>
                    <!-- الرموز التواصل الاجتماعية لتسجيل الدخول باستخدام منصات مختلفة -->
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                  <!-- معلومات لاستخدام البريد الإلكتروني وكلمة المرور لتسجيل الدخول -->
                <span>or use your email password</span>
                <input type="email"name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <a href="/"><button class="bn30">Sign In</button></a>
            </form>
        </div>
            <!-- الحاوية التبديلية للتبديل بين لوحي تسجيل الدخول والتسجيل -->
        <div class="toggle-container">
            <div class="toggle">
                    <!-- اللوحين لتسجيل الدخول والتسجيل -->
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/script.js"></script>
</body>

</html>