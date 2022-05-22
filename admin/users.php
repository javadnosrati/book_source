<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */

$query = mysqli_query($db, "SELECT * FROM users ORDER BY id DESC");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست کاربران</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <h1>لیست کاربران</h1>
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
                        <th>نام کاربر</th>
                        <th>ایمیل کاربر</th>
                        <th>حذف کاربر</th>
                    </tr>
                    <?php while ($user = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $user['display_name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><a href="delete-user.php?id=<?php echo $user['id'] ?>">حذف</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
