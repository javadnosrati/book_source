<?php
require_once '../config/autoload.php';

if (!isUserLoggedIn()) {
    redirect('/users/login.php');
    return die();
}

$user_id = $_SESSION['user_id'];
$userQuery = mysqli_query($db, "SELECT * FROM users WHERE id={$user_id}");
$user = mysqli_fetch_array($userQuery);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پروفایل کاربر</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <h1>پروفایل کاربر</h1>
    <hr>
    <div class="nav">
        <ul>
            <li><a href="#">مشخصات شما</a></li>
            <li><a href="#">سفارش‌ها</a></li>
            <li><a href="/process/logout.php">خروج</a></li>
        </ul>
        <hr>
        <div class="admin-main">
            <ul>
                <li>نام شما: <?php echo $user['display_name'] ?></li>
                <br>
                <li>ایمیل شما: <?php echo $user['email'] ?></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
