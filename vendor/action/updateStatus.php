<?php
include "../components/connect.php";
$btn_id = $_GET['btn_id'];

if(isset($_GET['confirm'])) {
    $id = $_GET['id'];
    mysqli_query($link, "UPDATE `user_order` SET `order_status`= '1' WHERE `id` = '$id'");
    header('location: ../../admin.php');
}
if(isset($_GET['complete'])) {
    $id = $_GET['id'];
    mysqli_query($link, "UPDATE `user_order` SET `order_status`= '10' WHERE `id` = '$id'");
    header('location: ../../admin.php');
}
if(isset($_GET['cancel'])) {
    $id = $_GET['id'];
    mysqli_query($link, "UPDATE `user_order` SET `order_status`= '5' WHERE `id` = '$id'");
    header('location: ../../admin.php');
}