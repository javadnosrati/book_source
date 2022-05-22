<?php
require_once '../config/config.php';
$id = $_GET['id'];
$query = mysqli_query($db,"DELETE FROM users WHERE id=$id");
if($query){
    header("Location: users.php");
}else{
    echo 'هنگام حذف کاربر مشکلی پیش امده است.';
}

?>