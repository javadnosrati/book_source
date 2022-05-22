<?php
require_once '../config/config.php';
$id = $_GET['id'];
$query = mysqli_query($db,"UPDATE comments SET is_confirm='1' WHERE id='$id'");
if($query){
    header("Location: comments.php");
}

?>