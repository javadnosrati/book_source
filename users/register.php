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
        <title>ثبت نام کاربر</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>

    <div id="main">
        <div id="register">
            <form action="register.php" method="post">
                <input type="text" name="display-name" placeholder="نام ..."><br>
                <input type="text" name="email" placeholder="ایمیل ..."><br>
                <input type="password" name="password" placeholder="کلمه عبور ..."><br>
                <input type="password" name="password-conf" placeholder="تکرار کلمه عبوور ..."><br>
                <input type="submit" name="register" value="ثبت نام">
            </form>
        </div>
    </div>

    </body>
    </html>

<?php

if (isset($_POST['register'])) {
    $name = $_POST['display-name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $passwordConf = md5($_POST['password-conf']);
    if ($password != $passwordConf) {
        echo 'پسورد و تکرار آن با هم برابر نیستند.';
    } else {
        mysqli_query($db, "INSERT INTO users (display_name, email,password) VALUES ('$name', '$email', '$password')");
        echo 'ثبت نام شما با موفقیت انجام شد';
    }
}
?>