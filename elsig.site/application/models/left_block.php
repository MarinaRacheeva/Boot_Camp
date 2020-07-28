<?php

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASS = 'root';
const DB_NAME = 'company';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
or die(mysqli_connect_error());

function categoryMenu($classul)
{
    global $link;
    $sql = "SELECT * FROM Category";
    $res = mysqli_query($link, $sql);
    $submenu = 'sub-menu';
    $cataloglist = 'catalog-list';
    $categories = 'categories';
    switch ($classul)
    {
    case $submenu: {foreach ($res as $cat)
                        echo '<li class="' . $classul . '__list-item"><a class="' . $classul . '__link" href="catalog.php?cat_id='. $cat["id"] .'">'.$cat["name"].'</a></li>';
                    break;
                    }
    case $cataloglist: {foreach ($res as $cat)
                            echo '<li class="' . $classul . '__item"><a class="' . $classul . '__link" href="catalog.php?cat_id='. $cat["id"] .'">'.$cat["name"].'</a></li>';
                        break;
                        }
    case $categories: {foreach ($res as $cat) 
                        {
                            if ($cat["image"] == '') 
                            {
                                $cat["id"] = 'none';
                                $cat["image"] = 'img/category-none.jpg';
                            }
                            echo '<li class="category">
                                    <a class="category__link" href="catalog.php?cat_id=' . $cat["id"] . '">
                                        <img class="category__image" src="' . $cat["image"] . '" alt="category-image-' . $cat["id"] . '">
                                        <span class="category__name-container"><span class="category__name-inner">' . $cat["name"] . '</span></span>
                                    </a>
                                </li>'; 
                        }
                        break;
                        }
    }
 
}


?>