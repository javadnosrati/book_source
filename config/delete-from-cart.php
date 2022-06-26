<?php
require_once 'autoload.php';
$product_id = $_GET['product-id'];
$user_ip = $_SERVER['REMOTE_ADDR'];
$delete = mysqli_query($db, "DELETE FROM cart WHERE product_id='$product_id' AND user_ip='$user_ip'");
if($delete){
  header('Location: ../cart.php');
}

?>