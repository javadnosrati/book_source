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
    <title>افزودن محصول</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <h1>افزودن محصول</h1>
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
            <div class="add-product">
                <form action="add-product.php" method="post">
                    <input type="text" name="product-name" placeholder="نام محصول ..."><br>
                    <input type="text" name="product-price" placeholder="قیمت محصول ..."><br>
                    <textarea name="product-desc" placeholder="توضیحات محصول ..."></textarea><br>
                    <input type="text" name="image-name" placeholder="نام عکس محصول .."><br>
                    <input type="submit" name="add-product" value="افزودن محصول">

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
if (isset($_POST['add-product'])) {
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $productDesc = $_POST['product-desc'];
    $image_name = $_POST['image-name'];
    $addProduct = mysqli_query($db, "INSERT INTO products (product_name, product_price, product_desc, product_image) VALUES ('$productName','$productPrice','$productDesc', '$image_name')");
    if ($addProduct) {
        echo 'محصول با موفقیت افزوده شد.';
    }
}

?>
