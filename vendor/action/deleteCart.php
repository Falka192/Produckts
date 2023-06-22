<?php 
include "../components/connect.php";
$id = $_GET['delete_id'];
mysqli_query($link,"DELETE FROM `user_order` WHERE `id` = '$id'");
header("Location: ../../order.php");