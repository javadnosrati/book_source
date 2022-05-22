<?php require_once '../config/config.php'; ?>
<?php
if (!isset($_SESSION['user-login'])) {
    header("Location: login.php");
}

$email = $_SESSION['user-login'];
$getUsername = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
$username = mysqli_fetch_array($getUsername);
$orderId = $_GET['order-id'];
$getOrderDetail = mysqli_query($db, "SELECT * FROM orders WHERE id=$orderId");
$orderDetail = mysqli_fetch_array($getOrderDetail);
$productIds = $orderDetail['product_ids'];
$getIds = explode(',', $productIds, -1);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>جزئیات سفارش</title>
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
                <li>مجموع مبلغ سفارش: <?php echo $orderDetail['total'] ?></li>
                <li><?php
                    if ($orderDetail['is_paid'] == 0) {
                        echo 'پرداخت نشده';
                    } else {
                        echo 'پرداخت شده';
                    }
                    ?></li>
            </ul>
            <hr>
            <h3>محصولات خریداری شده در این سفارش</h3>
            <ul>
                <?php
                foreach ($getIds as $getId){
                    $getProduct = mysqli_query($db, "SELECT * FROM products WHERE id=$getId");
                    $fetch = mysqli_fetch_array($getProduct);
                    echo $fetch['product_name'] . "<br>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
