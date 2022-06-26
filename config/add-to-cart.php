<?php
require_once __DIR__.'/autoload.php';
$product_id = $_GET['product-id'];
$user_ip = $_SERVER['REMOTE_ADDR'];
$check_cart = mysqli_query($db, "SELECT * FROM cart WHERE product_id='$product_id' AND user_ip='$user_ip'");
if (mysqli_num_rows($check_cart) > 0) {
  // header("Location: ../cart.php");
  echo "noo";
} else {
  $add_to_cart = mysqli_query($db, "INSERT INTO cart (user_ip, product_id) VALUES ('$user_ip', '$product_id')");
  if ($add_to_cart) {
    header("Location: ../cart.php");
  } else {
    echo 'مشکلی پیش آمده است.';
  }
}
?>