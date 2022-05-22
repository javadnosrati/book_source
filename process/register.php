<?php
require_once __DIR__ . '/../config/autoload.php';
//return login(['id' => 1]);
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