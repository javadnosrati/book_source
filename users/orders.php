<?php require_once '../config/config.php'; ?>
<?php
if (!isset($_SESSION['user-login'])) {
    header("Location: login.php");
}

$email = $_SESSION['user-login'];
$getUsername = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
$username = mysqli_fetch_array($getUsername);
$get_orders = mysqli_query($db, "SELECT * FROM orders WHERE user_email='$email'");
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
                <?php while ($row = mysqli_fetch_array($get_orders)) { ?>
                    <li><a href="order-detail.php?order-id=<?php echo $row['id'] ?>">سفارش شماره <?php echo $row['id'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
