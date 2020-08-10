<?php
    require 'config.php';
    $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
    or die(mysqli_connect_error());