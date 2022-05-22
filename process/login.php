<?php
require_once '../config/autoload.php';

/**
 * @var $db
 */

if (isUserLoggedIn()) {
    redirect('/users/profile.php');
}

$email = $_POST['email'];
$password = $_POST['password'];
$error = 0;
if ($email == "") {
    setFlash('error', 'فیلد ایمیل اجباری میباشد.');
    $error = 1;
}
if ($password == "") {
    setFlash('error', 'فیلد پسورد اجباری میباشد.');
    $error = 1;
}

if ($error !== 0) {
    redirect('/users/login.php');
}

$password = md5($password);

$user = mysqli_query($db, "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");

if (mysqli_num_rows($user) > 0) {
    $user = $user->fetch_assoc();
    if ($user['is_admin']) {
        login($user, true);
        redirect('/admin/index.php');
    } else {
        login($user);
        redirect('/index.php');
    }
    echo 'شما با موفقیت وارد شدید' . "<a href='/users/profile.php'>نمایش پروفایل</a>";
} else {
    echo 'کلمه عبور یا ایمیل شما صحیح نیست. یا ثبت نام نکرده‌اید.';
}

?>