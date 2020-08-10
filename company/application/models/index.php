<?php
require 'includes/lib.php';
$sql = "SELECT id, name, image FROM Category";
$categories = getResult($sql);