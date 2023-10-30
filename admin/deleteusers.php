<?php
include '../config/connection.php';
$get = $connection->query("SELECT * FROM users WHERE id_users = '$_GET[id]'");
$split = $get->fetch_assoc();
$usersimage = $split['users_img'];

if (file_exists("../assets/img/$usersimage")) {
  unlink("../assets/img/$usersimage");
}

$connection->query("DELETE FROM users WHERE id_users = '$_GET[id]'");

header("location:index.php");
