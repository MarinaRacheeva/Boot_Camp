<?php
require 'includes/lib.php';
function clearInt($data){
    return abs((int)$data);
}
// выбор всех новостей по id
$id = clearInt($_GET['id']);
$sql = "SELECT * FROM News WHERE id = $id";
$res = mysqli_query($link, $sql);