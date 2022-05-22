<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */

$query = mysqli_query($db, "SELECT * FROM products");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <h1>لیست محصولات</h1>
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
            <div class="products">
                <table>
                    <tr>
                        <th>نام محصول</th>
                        <th>قیمت محصول</th>
                        <th>ویرایش/حذف</th>
                    </tr>
                    <?php while ($product = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $product['product_name'] ?></td>
                            <td><?php echo $product ['product_price'] ?></td>
                            <td><a href="edit-product.php?id=<?php echo $product['id'] ?>">ویرایش</a> - <a
                                        href="delete-product.php?id=<?php echo $product['id'] ?>">حذف</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
