<?php
if (((!is_numeric($_GET['cat_id']))) && (!is_null($_GET['cat_id'])) || ($_GET['cat_id'] == '0')) header('Location: /404.php');
if (((!is_numeric($_GET['cost-from']))) && (!is_null($_GET['cost-from']))) header('Location: /404.php');
if (((!is_numeric($_GET['cost-to']))) && (!is_null($_GET['cost-to'])) || ($_GET['cost-to'] < $_GET['cost-from'])) header('Location: /404.php');
else
    require 'application/views/catalog.php';