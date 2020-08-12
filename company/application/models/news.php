<?php
require 'includes/lib.php';
$page = (isset($_GET['page'])) ? clearInt($_GET['page']) : 1;

// задаем параметры для пагинации по новостям
$active = $page;
$next = $active + 1;
$start = ($page * KOL_NEWS) - KOL_NEWS;

// выбор всех новостей
$sql = "SELECT id, header, date, preview FROM News ORDER BY date DESC LIMIT $start, ". KOL_NEWS;
$sql_kol = "SELECT COUNT(*) as kol FROM News";
$news = getResult($sql);
$count = getResult($sql_kol);
foreach ($count as $kol)
    $news_kol = $kol['kol'];

// условия для пагинации
$kol_page = ceil($news_kol / KOL_NEWS);
if (!$_SERVER['QUERY_STRING'])
    $q = '?page=';  
else
    $q = $strq1[0] . '?page=';

// проверка на корректнось полученного значения страницы
if (($page > $kol_page) || ($page < 1) || (!$page)) header('Location: /404.php');