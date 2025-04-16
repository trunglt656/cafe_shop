<?php
session_start();

define('SITEURL', 'http://localhost:8080/');
define('LOCALHOST','db');
define('DB_USERNAME','cafe_user');
define('DB_PASSWORD','cafe');
define('DB_NAME','cafe');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
?>
