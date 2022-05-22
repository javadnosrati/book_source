<?php require_once 'config/config.php'; ?>
<?php
if (!isset($_SESSION['user-login'])) {
    header("Location: users/login.php");
}
$query = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT 4 ");
$user_ip = $_SERVER['REMOTE_ADDR'];
$get_cart_items = mysqli_query($db, "SELECT * FROM cart WHERE user_ip='$user_ip'");
$cart_items = mysqli_query($db, "SELECT * FROM cart WHERE user_ip='$user_ip'");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>سبد خرید</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div id="container">
    <div class="header">
        <h1>فروشگاه اینترنتی سورس شاپ</h1>
        <h2>منبع کتاب های آموزشی وغیره</h2>
    </div>
    <div class="nav">
        <ul>
            <li><a href="#">صفحه نخست</a></li>
            <li><a href="#">سبد خرید</a></li>
            <li><a href="#">ورود به حساب کاربری</a></li>
            <li><a href="#">ثبت نام</a></li>
        </ul>
    </div>
    <hr>
    <div class="content">
        <?php
        if (mysqli_num_rows($get_cart_items) == 0) {
            echo 'سبد خرید شما خالی است';
        }
        ?>
        <ul>
            <?php while ($row = mysqli_fetch_array($get_cart_items)) {
                $id = $row['product_id'];
                $get_product_name = mysqli_query($db, "SELECT * FROM products WHERE id='$id'");
                $product_name = mysqli_fetch_array($get_product_name);
                ?>
                <li><?php echo $product_name['product_name'] ?> | <a
                        href="config/delete-from-cart.php?product-id=<?php echo $product_name['id'] ?>">حذف</a></li>
                <?php
            } ?>
        </ul>


        <form action="config/pay.php" method="post">

            <input type="hidden" value="<?php while ($row = mysqli_fetch_array($cart_items)) {
                echo $row['product_id'] . ", ";
            }
            ?>" name="product-ids">
            <input type="submit" value="اتصال به درگاه پرداخت">
        </form>
    </div>
    <div class="sidebar">
        <div class="sidebar-item">
            <div class="sidebar-title">لیست محصولات</div>
            <div class="sidebar-content">
                <ul>
                    <?php
                    $query = mysqli_query($db, "SELECT * FROM products");
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <li><a href="#"><?php echo $row['product_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="footer"><p>تمامی حقوق برای www.javadnosrati@gmail.com محفوظ می‌باشد.</p></div>
</div>

</body>
</html>