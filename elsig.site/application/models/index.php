<?php
require 'includes/lib.php';
$sql = "SELECT * FROM Category";
$res = mysqli_query($link, $sql);

//массив для вывода меню в нужных частях сайта
$menu = [
        ['link' => 'Главная', 'href' => 'index.php'],
        ['link' => 'Каталог', 'href' => 'catalog.php'],
        ['link' => 'О компании', 'href' => 'about.php'],
        ['link' => 'Новости', 'href' => 'news.php'],
        ['link' => 'Доставка и оплата', 'href' => 'paydelivery.php'],
        ['link' => 'Контакты', 'href' => 'contacts.php']
    ];

// выбор заголовка страницы
switch ($_SERVER['PHP_SELF'])
{
    case '/index.php': $title = 'Главная'; break;
    case '/catalog.php': $title = 'Каталог'; break;
    case '/about.php': $title = 'О компании'; break;
    case '/news.php': $title = 'Новости'; break;
    case '/news-detail.php': $title = 'Новость'; break;
    case '/paydelivery.php': $title = 'Доставка и оплата'; break;
    case '/contacts.php': $title = 'Контакты'; break;
    case '/product.php': $title = 'Товар'; break;
    case '/404.php': $title = 'Страницы на существует'; break;
}