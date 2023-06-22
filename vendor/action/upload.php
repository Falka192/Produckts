<?php 
include "../components/connect.php";

if(isset($_POST['uploadProduct'])) {
    if(!empty($_FILES['file'])) {
        var_dump($_FILES['file']);
        $file = $_FILES['file'];
        $name = $file['name'];
        echo $name;
        $pathFile = "D:\Максима\ВСЯКАЯ ФИГНЯ ДЛЯ УЧЕБЫ\OpenServer\domains\localhost\surkov\surkov\assets\img/".$name;

        if(!move_uploaded_file($file['tmp_name'], $pathFile)) {
            echo 'Файл не смог загрузиться';
        }

        $title = $_POST['title'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $type_id = $_POST['type_id'];

        mysqli_query($link, "INSERT INTO `prodcuts`(`path`, `title`, `price`, `weight`, `type_id`) VALUES ('$name','$title','$price','$weight','$type_id')");    
    } 
    header('location: ../../admin.php');
}