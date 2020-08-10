<?php
require 'includes/DBconnect.php';
function getResult($sql){
    global $link;
    $res = mysqli_query($link, $sql);
    return $res;
}
function clearInt($data){
    return abs((int)$data);
}