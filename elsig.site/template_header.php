<?php
require 'application/models/includes/lib.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
	
	<?php include "application/models/index.php";?>
    <title><?php echo $title; ?></title>
</head>
<body>
    <header class="page-header">
        <div class="wrapper">
            <aside class="header-top">
                <?php				
					$pos = strpos(strtolower($_SERVER['REQUEST_URI']), "index.php");
					if ($pos === false) echo '<a class="qwerty" href="index.php">';
				?>
                <div class="header-logo">
                    <img class="header-logo__image" src="img/logo.png" alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>
                </a>
                <div class="company-info">
                    <b class="company-info__tagline">Нанотехнологии здоровья</b>
                    <div class="contacts">
                        <a class="contacts__link-mail" href="mailto:info@company.ru">info@company.ru</a>
                        <a class="contacts__link-phone" href="tel:+73833491849">+7 (383) 349-18-49</a>
                    </div>
                </div>
            </aside>
            <div class="user-info">
            </div>
        </div>
        <nav class="header-nav">
            <div class="wrapper">
                <span class="menu-toggler">Меню</span>
                <ul class="menu-togglable">
                <?  //вывод меню в шапке сайта
					foreach($menu as $mmenu)
					{//вывод субменю для раздела "Каталог" мобильной версии
						if ($mmenu['link'] == 'Каталог')
						{
							echo '<li class="header-nav-item">
									<span class="header-nav-item__container-for-link"><a class="header-nav-item__link" href="' . $mmenu['href'] . '">' . $mmenu['link'] . '</a></span>
									<ul class="sub-menu">';
							include "application/models/index.php"; 
                            foreach ($res as $cat)
							{    
								echo '<li class="sub-menu__list-item"><a class="sub-menu__link" href="catalog.php?cat_id='. $cat["id"] .'">'.$cat["name"].'</a></li>';
							}	
							echo '</ul>
								</li>';
						}
						else
						{
							echo '<li class="header-nav-item"><span><a class="header-nav-item__link" href="' . $mmenu['href'] . '">' . $mmenu['link'] . '</a></span></li>';
						}	
					}			
				?>
                </ul>
            </div>
        </nav>
	</header>