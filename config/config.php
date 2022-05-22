<?php
$db = mysqli_connect('localhost','root','','book_source');

if(!$db) {
    echo mysqli_connect_errno();

}
ini_set('display_errors',1);
error_reporting(E_ALL);
