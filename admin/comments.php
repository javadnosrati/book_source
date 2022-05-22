<?php require_once '../config/config.php'; ?>
<?php
if (!isset($_SESSION['admin-login'])) {
    header("Location: login.php");
}

$comments = mysqli_query($db, "SELECT * FROM comments WHERE is_confirm='0' ORDER BY id DESC");
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
    <h1>نظرات کاربران</h1>
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
            <div class="admin-comments">
                <?php while ($row = mysqli_fetch_array($comments)) { ?>
                    <div class="comment-item">
                        <div class="user-data"><?php echo $row['username'] . '(' . $row['user_email'] . ')' ?></div>
                        <div class="comment-text"><?php echo $row['comment_text'] ?></div>
                        <div class="button">
                            <a class="confirm" href="confirm-comment.php?id=<?php echo $row['id'] ?>">تایید نظر</a>
                            <a class="delete" href="delete-comment.php?id=<?php echo $row['id'] ?>">حذف نظر</a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
