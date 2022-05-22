<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */

$getOrders = mysqli_query($db, "SELECT * FROM orders");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نظرات کاربران</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <h1>سفارش های کاربران</h1>
    <hr>
    <div class="nav">
        <ul>
            <li><a href="../index.php">نمایش فروشگاه</a></li>
            <li><a href="products.php">لیست محصولات</a></li>
            <li><a href="add-product.php">افزودن محصول</a></li>
            <li><a href="users.php">لیست کاربران</a></li>
            <li><a href="comments.php">نظرات</a></li>
            <li><a href="orders.php">سفارش ها</a></li>
            <li><a href="/process/logout.php">خروج از بخش مدیریت</a></li>
        </ul>
        <hr>
        <div class="admin-main">
            <ul>
                <?php while ($order = mysqli_fetch_array($getOrders)) { ?>
                    <li><a href="order-detail.php?order-id=<?php echo $order['id'] ?>">سفارش
                            شماره‌ی <?php echo $order['id'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
