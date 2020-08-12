<?php 
if ((!is_numeric($_GET['id'])) || ($_GET['id'] == 0) || (!$_GET['id'])) header('Location: /404.php');
else require 'application/views/news-detail.php';