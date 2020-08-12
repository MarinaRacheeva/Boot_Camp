<?php 
header('Location: /404.php');
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
require 'application/views/404.php';