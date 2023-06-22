<?php include "vendor/components/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <main>
        <div class="login">
            <form action="vendor/action/login.php" method="POST">
                <div class="login__title"><a href="index.php">Fast Products</a></div>
                <div class="php-message"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg'];} unset($_SESSION['msg']); ?></div>
                <input type="text" checked name="name" placeholder="Имя">
                <input type="text" checked name="email" placeholder="Почта">
                <input type="password" checked name="password" placeholder="Пароль">
                <input type="password" checked name="password__confirm" placeholder="Повтор пароля">
                <input type="submit" checked name="btn-signup" value="Зарегистрироваться">
                <div class="login__subtitle">У вас уже есть аккаунт? - <a class="signin__btn" href="login.php">Войти</a></div>
            </form>
        </div>
    </main>
    <script src="assets/js/calcPrice.js"></script>
    <script src="assets/js/cartStatus.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/cartAdd.js"></script>
</body>
</html>