<?php
require 'includes/lib.php';

$sql = "SELECT * FROM News";
if ($_GET['id']) 
{
    $res = getResult($sql);
    foreach ($res as $new)
    {
        $mas_new[] = $new['id'];
    }
    if (!in_array($_GET['id'], $mas_new))
    {
        header('Location: 404.php');
    }
}
// выбор всех новостей по id
$id = clearInt($_GET['id']);
$sqln = "$sql WHERE id = $id";
$news = getResult($sqln);