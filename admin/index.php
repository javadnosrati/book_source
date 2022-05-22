<?php require_once '../config/config.php'; ?>
<?php
if (!isset($_SESSION['admin-login'])) {
    header("Location: login.php");
}

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
    <h1>مدیریت فروشگاه</h1>
    <hr>
    <div class="nav">
        <ul>
            <li><a href="../index.php">نمایش فروشگاه</a></li>
            <li><a href="products.php">لیست محصولات</a></li>
            <li><a href="add-product.php">افزودن محصول</a></li>
            <li><a href="users.php">لیست کاربران</a></li>
            <li><a href="comments.php">نظرات</a></li>
            <li><a href="orders.php">سفارش ها</a></li>
            <li><a href="do-logout.php">خروج از بخش مدیریت</a></li>
        </ul>
        <hr>
        <div class="admin-main">

        </div>
    </div>
</div>

</body>
</html>
