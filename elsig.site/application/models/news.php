<?php
require 'includes/lib.php';

// задаем параметры для пагинации товаров
$page = 1;
$input_page = abs((int)$_GET['page']);
if (isset($_GET['page'])){
	$page = $input_page;
}

$active = $input_page;
$next = $active + 1;
$start = ($page * $kol_news) - $kol_news;

// выбор всех новостей
$sql = "SELECT id, header, date, preview FROM News ORDER BY date DESC LIMIT $start, $kol_news";
$sql_sb = "SELECT id, header, date, preview FROM News ORDER BY date DESC LIMIT $kol_news_lb";
$res = mysqli_query($link, $sql);
$res_sb = mysqli_query($link, $sql_sb);

// условия для пагинации
$total = mysqli_num_rows(mysqli_query($link, "SELECT * FROM News"));
$kol_page = ceil($total / $kol_news);
$strq = strstr($_SERVER['QUERY_STRING'], 'page');
$strq1 = explode('page', $strq);
if (!$_SERVER['QUERY_STRING'])
    $q = '?page=';  
else
    $q = $strq1[0] . '?page=';