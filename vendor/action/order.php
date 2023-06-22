<?php 
include "../components/connect.php";
if(isset($_SESSION['user'])) {
    if (isset($_POST['btn'])) {
        $name = $_POST['user-name'];
        $user_id = $_POST['user-id'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $total_price = $_POST['total-price'];
        $data = date("Y-m-d");
    
        mysqli_query($link,"INSERT INTO `user_order`(`user_id`, `user_name`, `user_number`, `user_address`, `total_price`, `order_data`) VALUES ('$user_id','$name','$number','$address','$total_price','$data')");
        header('location: ../../index.php');
    }
} else {
    // echo 'Войдите чтобы совершить заказ!';
}
