<?php require_once '../config/config.php'; ?>
<?php
if (isset($_SESSION['user-login'])) {
    header("Location: profile.php");
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ورود کاربر</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>

    <div id="main">
        <div id="register">
            <form action="login.php" method="post">
                <input type="text" name="email" placeholder="ایمیل ..."><br>
                <input type="password" name="password" placeholder="کلمه عبور ..."><br>
                <input type="submit" name="login" value="ورود">
            </form>
        </div>
    </div>

    </body>
    </html>
<?php

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $loginCheck = mysqli_query($db, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($loginCheck) > 0) {
        $_SESSION['user-login'] = $email;
        echo 'شما با موفقیت وارد شدید' . "<a href='profile.php'>نمایش پروفایل</a>";
    } else {
        echo 'کلمه عبور یا ایمیل شما صحیح نیست. یا ثبت نام نکرده‌اید.';
    }
}

?>