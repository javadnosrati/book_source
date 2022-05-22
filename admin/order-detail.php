<?php require_once '../config/config.php'; ?>
<?php
if (!isset($_SESSION['admin-login'])) {
  header("Location: login.php");
}
$getOrders = mysqli_query($db, "SELECT * FROM orders");
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
      <li><a href="do-logout.php">خروج از بخش مدیریت</a></li>
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
        foreach ($getIds as $getId) {
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
