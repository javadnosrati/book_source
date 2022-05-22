<?php require_once '../config/config.php'; ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ورود ادمین</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>

    <div id="main">
        <div id="register">
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="نام کاربری مدیر ..."><br>
                <input type="password" name="password" placeholder="کلمه عبور مدیر ..."><br>
                <input type="submit" name="admin-login" value="ورود به بخش مدیریت">
            </form>
        </div>
    </div>

    </body>
    </html>
<?php

if (isset($_POST['admin-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD) {
        $_SESSION['admin-login'] = true;
        echo 'شما با موفقیت وارد شدید' . "<a href='index.php'>نمایش بخش مدیریت</a>";

    } else {
        echo 'no';
    }
}
?>