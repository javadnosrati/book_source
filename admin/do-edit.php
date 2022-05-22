<?php
require_once '../config/config.php';
if (isset($_POST['edit-product'])) {
    $productId = $_POST['product-id'];
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $productDesc = $_POST['product-desc'];
    $productImage = $_POST['image-name'];

    $editProduct = mysqli_query($db, "UPDATE products SET product_name='$productName', product_price='$productPrice', product_desc='$productDesc', product_image='$productImage' WHERE id='$productId'");
    if ($editProduct) {
        header("Location: products.php");
    }
}
?>
