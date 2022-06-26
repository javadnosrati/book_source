<?php
require_once 'autoload.php';
if (isset($_POST['add-comment'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $commentText = $_POST['comment'];
    $id = $_POST['product-id'];
    $query = mysqli_query($db, "INSERT INTO comments (username,user_email,comment_text,product_id) VALUE ('$username', '$email', '$commentText', '$id')");
    if ($query) {
        echo 'نظر شما با موفقیت ثبت شد و بعد از تایید مدیریت در صفحه محصول نمایش داده خواهد شد.';
    } else {
        echo 'خطایی هنگام ثبت نظر پیش امده است.';
    }
}

?>