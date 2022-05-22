<?php
require_once '../config/autoload.php';

if (isUserLoggedIn()) {
    redirect('/users/profile.php');
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
        <form action="/process/register.php" method="post">
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
