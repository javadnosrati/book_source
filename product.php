<?php require_once __DIR__.'/config/autoload.php'; 
$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM products WHERE id=$id");
$comments = mysqli_query($db, "SELECT * FROM comments WHERE product_id='$id' AND is_confirm='1'");
$product = mysqli_fetch_array($query);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>فروشگاه اینترنتی سورس شاپ</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div id="container">
    <div class="header">
        <h1>فروشگاه اینترنتی سورس شاپ</h1>
        <h2>منبع کتابهای آموزشی و درسی و غیره</h2>
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

        <div class="product-page">
            <div class="product-image"><img src="images/<?php echo $product['product_image'] ?>" alt=""></div>
            <div class="product-name"><?php echo $product['product_name'] ?></div>
            <div class="product-price"><?php echo $product['product_price'] ?> تومان</div>
            <br>
            <a class="add-to-cart" href="config/add-to-cart.php?product-id=<?php echo $product['id'] ?>">افزودن به سبد خرید</a>
            <div style="clear:both;"></div>
            <div class="product-desc"><?php echo $product['product_desc'] ?></div>

            <hr>
            <div class="comments">
                <?php while ($row = mysqli_fetch_array($comments)) { ?>
                    <div class="comment-item">
                        <div class="username"><?php echo $row['username'] ?></div>
                        <div class="comment-text"><?php echo $row['comment_text'] ?></div>
                    </div>
                <?php } ?>

                <hr>
                <form action="config/add-comment.php" method="post">
                    <input type="text" name="username" placeholder="نام شما..."><br>
                    <input type="text" name="email" placeholder="ایمیل شما ..."><br>
                    <input type="hidden" name="product-id" value="<?php echo $product['id'] ?>">
                    <textarea name="comment" placeholder="نظر شما ..."></textarea><br>
                    <input type="submit" name="add-comment" value="افزودن نظر">
                </form>
            </div>
        </div>

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
    <div class="footer"><p>تمامی حقوق برای wwww.javadnosrati@gmail.com محفوظ می‌باشد.</p></div>
</div>

</body>
</html>