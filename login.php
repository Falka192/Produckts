<?php include "vendor/components/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <main>
        <div class="login">
            <form action="vendor/action/login.php" method="POST">
                <div class="login__title"><a href="index.php">Fast Products</a></div>
                <div class="php-message"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg'];} unset($_SESSION['msg']); ?></div>
                <input type="text" name="email" placeholder="Почта">
                <input type="password" name="password" placeholder="Пароль">
                <input type="submit" name="btn-signin" value="Войти">
                <div class="login__subtitle">У вас нет аккаунта? - <a class="signup__btn" href="signup.php">Зарегистрироваться</a></div>
            </form>
        </div>
    </main>
    <script src="assets/js/calcPrice.js"></script>
    <script src="assets/js/cartStatus.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/cartAdd.js"></script>
</body>
</html>