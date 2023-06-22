<?php include "vendor/components/connect.php"; 
$search_item = trim(stripcslashes(htmlspecialchars(($_POST['search-item']))));?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продуктовый магазин</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body><div class="wrapper <?php if(isset($_SESSION['user'])) {echo 'index';}?>">
    <main>
        <header class="header js-header">
            <div class="nav">
                <div class="nav__menu">
                    <ul>
                        <li><a href="index.php"><span>Fast Products</span></a></li>
                        <li class="dropdown"><a href="#" class="nav__catalog"><img src="assets/img/menu.png" alt="">Каталог</a>
                            <div class="dropdown__menu">
                            <ul>
                                <div class="dropdown__title">Каталог</div>
                                <li><a href="water.php"><img src="assets/img/soda.png" alt="">Вода</a></li>
                                <li><a href="bread.php"><img src="assets/img/bread.png" alt="">Хлеб</a></li>
                                <li><a href="meat.php"><img src="assets/img/meat.png" alt="">Мясо</a></li>
                                <li><a href="alcohol.php"><img src="assets/img/alcohol.png" alt="">Алкоголь</a></li>
                            </ul>
                        </div>
                        </li>
                        <li><img src="assets/img/search.png" alt="">
                            <form action="search.php" method="POST">
                                <input type="text" name="search-item" placeholder="Найти в лавке">
                            </form>
                        </li>
                        <li><a href="https://yandex.ru/maps/-/CCUgqKuKoD" target="_blank" class="address"><img src="assets/img/marker.png" alt="">Ул. Гагарина, д. 10</a></li>
                        <li class="dropdown"><a href="#" class="cart"><img src="assets/img/cart.png" alt="">Корзина</a>
                            <div class="dropdown__cart none">
                                
                                    <div class="cart__item none" data-cart-full>
                                        <div class="cart__item-title">
                                            <div class="cart__item-title-text">Корзина</div>
                                        </div>
                                        <div class="cart-wrapper">
                                            
                                        </div>
                                        <div class="cart__item-count">
                                            <div class="count__text">Итого: </div>
                                            <div class="count__price">0</div> ₽
                                            <br>
                                        </div>
                                        <div class="cart__item-btn"><a data-order href="javascript://">Заказать</a></div>
                                    </div>
                                    <div class="cart__item" data-cart-empty>
                                        <div class="dropdown__img"><img src="assets/img/sad.png" alt=""></div>
                                        <div class="dropdown__title">В вашей корзине пока пусто</div>
                                        <div class="dropdown__subtitle">Тут появяться товары, которые вы закажите</div>
                                    </div>
                                   
                            </div>
                        </li>
                        <?php if(!isset($_SESSION['user'])): ?>
                        <li><a class="login__link" href="login.php">Войти</a></li>
                        <?php else: ?>
                            <li class="dropdown"><a class="login__link" href="#"><?php echo $_SESSION['user']['name'];?></a>
                            <div class="dropdown__login">
                                <ul>
                                    <?php if($_SESSION['user']['admin'] == '1'): ?>
                                    <li><a href="admin.php">Админ панель</a></li>
                                    <?php endif; ?>
                                    <li><a href="order.php">Мои заказы</a></li>
                                    <li><a href="vendor/action/exit.php">Выйти</a></li>
                                </ul>
                            </div>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
            
        </header>
    </main>
    <main>
        <div class="popup">
            <div class="popup-body">
                <div class="popup-order">
                    <div class="popup-input">
                    <?php if(!isset($_SESSION['user'])): ?>
                    <div class="order-title">Войдите чтобы совершить заказ!</div>
                <?php else: ?>
                    <form action="vendor/action/order.php" method="POST">
                            <div class="popup-text">Укажите номер телефона</div>
                            <input type="hidden" name="user-name" value="<?php if(isset($_SESSION['user'])) { echo $_SESSION['user']['name']; }?>">
                            <input type="hidden" name="user-id" value="<?php if(isset($_SESSION['user'])) { echo $_SESSION['user']['id']; }?>">
                            <input type="number" name="number" placeholder="Номер телефона">
                            <div class="popup-text">Укажите адрес доставки</div>
                            <input type="text" name="address" placeholder="Адрес доставки">
                            <div class="popup-title">Итоговая сумма заказа: </div>
                            <div class="popup-btn"><button name="btn" data-accept>Заказать</button></div>
                        </form>
                    </div>
                <?php endif; ?>
                </div>
            </div>
                
                <div class="popup-accept">
                <?php if(!isset($_SESSION['user'])): ?>
                    <div class="popup-title">Ваш заказ скоро приедет. Ожидайте.</div>
                <?php else: ?>
                    <div class="popup-title">Ваш заказ скоро приедет. Ожидайте.</div>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container liked">
             <div class="main">
             <div class="breadcrumbs">
                    <a href="index.php">Главная</a>
                    <img src="assets/img/arrow-right.png" alt="">
                    <a href="bread.php"><?= $search_item ?></a>
                </div>
                <div class="title liked">
                    <a href="#"><?= $search_item ?></a>
                    <!-- <a class="title last-chield" href="liked.php"><span>Все</span> <img src="assets/img/arrow-right.png" alt=""></a> -->
                </div>
                <div class="catalog">
                    <?php 
                    $data = mysqli_query($link, "SELECT * FROM `prodcuts` WHERE `title` LIKE '%$search_item%'");
                    $result = mysqli_fetch_all($data, MYSQLI_ASSOC); ?>
                    <?php foreach($result as $row): ?>
                        <div class="catalog__item" data-id="<?=$row['id'];?>" id="catalog__item">
                            <a href="#">
                            <div class="catalog__item-img"><img src="assets/img/<?=$row['path'];?>" alt=""></div>
                            <div class="catalog__price">
                                <div class="catalog__item-price"><?=$row['price'];?> &#8381; </div>
                            </div>
                            <div class="catalog__item-title"><?=$row['title'];?></div>
                            <div class="catalog__item-weight"><?=$row['weight'];?></div>
                            <input type="hidden" value="<?php echo $row['type_id']; ?>">
                            <div class="catalog__item-btn"><button data-cart>В корзину</button></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
             </div>
        </div>
        </main>
        <footer>
        <div class="footer">
            <div class="footer__title">Fast Products</div>
            <hr>
            <div class="footer__menu">
                <ul>
                    <li><a href="about.php">Как это работает</a></li>
                    <li><a href="">Что продаем</a></li>
                    <li><a href="">Как стать курьером</a></li>
                </ul>
            </div>
            <hr>
            <div class="footer__submenu">
                <div class="copyright">&#169; 2019-2023 "Fast Products"</div>
                <div class="social"><a href="https://vk.com/deadyourgod"><img src="assets/img/vk.png" alt=""></a></div>  
            </div>
        </div>
    </footer>
    </div>
    <script src="assets/js/calcPrice.js"></script>
    <script src="assets/js/cartStatus.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/cartAdd.js"></script>
</body>
</html>