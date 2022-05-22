<?php
session_start();
if(isset($_SESSION['admin-login'])){
    unset($_SESSION['admin-login']);
    header("Location: login.php");
}

?>