<?php

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASS = 'root';
const DB_NAME = 'company';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
or die(mysqli_connect_error());


    $sql = "SELECT * FROM Category";
    $res = mysqli_query($link, $sql);
           
    
    
    


?>