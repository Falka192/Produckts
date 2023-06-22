<?php 
include "../components/connect.php";

if(isset($_POST['btn-signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rez = mysqli_query($link,"SELECT * FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($rez) == 1) {
      $row = mysqli_fetch_assoc($rez);
      if(md5($password) == $row['password']) {
        $_SESSION['user']['name'] = $row['name'];
        $_SESSION['user']['email'] = $row['email'];
        $_SESSION['user']['admin'] = $row['admin'];
        $_SESSION['user']['id'] = $row['id'];
        $_SESSION['msg'] = 'Вы успешно вошли';
        header("location: ../../index.php");
      } else {
        $_SESSION['msg'] = 'Неверный пароль';
        header("location: ../../login.php");
      }
    } else {
      $_SESSION['msg'] = 'Пользователь не найден';
      header("location: ../../login.php");
    }
}
if(isset($_POST['btn-signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password__confirm = $_POST['password__confirm'];

    if(empty($name) || empty($email) || empty($password) || empty($password__confirm)) {
        $_SESSION['msg'] = 'Заполните поля';
        header('location: ../../signup.php');
    } else {
      if ($password__confirm != $password) {
        header("location: ../../signup.php");
        $_SESSION['msg'] = 'Пароли не совпадают';
        $_SESSION['error']['password'] = 'error';
    } else {
      $password = md5($password);
      mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
      $rez2 = mysqli_query($link, "SELECT `id` FROM `users` WHERE `email` = '$email'");
      $id = mysqli_fetch_assoc($rez2);
      $_SESSION['msg'] = 'Вы успешно зарегистрировались';
      $_SESSION['user']['name'] = $name;
      $_SESSION['user']['email'] = $email;
      $_SESSION['user']['id'] = $id['id'];
      header('location: ../../index.php');
    }
  }
}