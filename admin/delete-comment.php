<?php
require_once '../config/autoload.php';
if (!isUserLoggedIn() && !isUserLoggedInAdmin()) {
    return redirect('/users/login.php');
}
/***
 * @var $db
 */

$id = $_GET['id'];
$query = mysqli_query($db, "DELETE FROM comments WHERE id='$id'");
if($query){
    header("Location: comments.php");
}
?>