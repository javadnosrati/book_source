<?php
require_once '../config/config.php';
$id = $_GET['id'];
$query = mysqli_query($db, "DELETE FROM comments WHERE id='$id'");
if($query){
    header("Location: comments.php");
}
?>