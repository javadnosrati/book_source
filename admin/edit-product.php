<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */


$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM products WHERE id=$id");
$productInfo = mysqli_fetch_array($query);
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
            <li><a href="/process/logout.php">خروج از بخش مدیریت</a></li>
        </ul>
        <hr>
        <div class="admin-main">
            <div class="add-product">
                <form action="do-edit.php" method="post">
                    <input type="text" name="product-name" value="<?php echo $productInfo['product_name'] ?>" placeholder="نام محصول ..."><br>
                    <input type="text" name="product-price" value="<?php echo $productInfo['product_price'] ?>" placeholder="قیمت محصول ..."><br>
                    <textarea name="product-desc" placeholder="توضیحات محصول ..."><?php echo $productInfo['product_desc'] ?></textarea><br>
                    <input type="text" name="image-name" value="<?php echo $productInfo['product_image'] ?>" placeholder="نام عکس محصول .."><br>
                    <input type="hidden" name="product-id" value="<?php echo $productInfo['id'] ?>">
                    <input type="submit" name="edit-product" value="بروزرسانی محصول">

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
