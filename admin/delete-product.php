<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */

$productId = $_GET['id'];
$query = mysqli_query($db, "DELETE FROM products WHERE id=$productId");
if($query){
    header("Location: products.php");
}else{
    echo 'مشکلی در هنگام حذف محصول پیش امده است.';
}


?>