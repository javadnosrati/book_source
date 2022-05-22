<?php
require_once '../config/autoload.php';

if (isUserLoggedIn()) {
    redirect('/users/profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود کاربر</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div id="main">
    <div id="register">
        <form action="/process/login.php" method="post">
            <?php foreach (getFlash('error') as $error) {
//                var_dump($error);
                ?>
                <p style="background: #ff337d; color: #00aaff"><?= $error?></p>
                <?php }?>
            <input type="text" name="email" placeholder="ایمیل ..."><br>
            <input type="password" name="password" placeholder="کلمه عبور ..."><br>
            <input type="submit" name="login" value="ورود">
        </form>
    </div>
</div>

</body>
</html>
