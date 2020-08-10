<?php

/// кроме того title для статики — название пункта меню, а для динамики — название категории/товара/новости, то есть мы должны устанавливать его в модели и передавать во вьюху
////с меню надо поступить так: понимаем, что подменю может появиться у любого элемента
/// подменю же могут появиться у любого элемента.
//	базовый уровень надо утащить в конфиг, но не в константу, а в переменную
//	расширять (именно расширять) меню надо в модели, то есть между элементами 1го уровня вставлять 2й там, где это нужно. так ты готовишь данные для вьюхи.
//	во вьюхе только строить дерево меню, проходя циклом по линейному массиву или массиву из 2 уровней. для отслеживания уровня можно использовать элемент массива depthLevel
//// массив лучше сделать ассоциативным, где ключом будет адрес страницы.+

//// подключение к базе должно уехать в модель.

require 'includes/config.php'; 

//// вот этот кусок HTML до конца файла должен уехать во вьюху template_header.php
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
    <title><? echo $menu[$_SERVER[PHP_SELF]]; ?></title>
</head>
<body>
    <header class="page-header">
        <div class="wrapper">
            <aside class="header-top">
                <?			
					$pos = strpos(strtolower($_SERVER['REQUEST_URI']), "index.php");
					if ($pos === false) echo '<a class="qwerty" href="index.php">';
				?>
                <div class="header-logo">
                    <img class="header-logo__image" src="img/logo.png" alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>
                <?if ($pos === false) echo'</a>';?>
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
					foreach($menu as $address => $title):
					//вывод субменю для раздела "Каталог" мобильной версии
						if ($title == 'Каталог'):
						?>
						<li class="header-nav-item">
									<span class="header-nav-item__container-for-link"><a class="header-nav-item__link" href="<?=$address?>"><?=$title?></a></span>
									<ul class="sub-menu">
                            <?
                            $sql = "SELECT id, name FROM Category";
                            $res = mysqli_query($link, $sql);
                            foreach ($res as $cat):?>
							    <li class="sub-menu__list-item"><a class="sub-menu__link" href="catalog.php?cat_id=<?=$cat["id"]?>"><?=$cat["name"]?></a></li>
							<?endforeach?>	
							</ul>
						</li>
                        <?elseif ($title == 'Новость'): break;
                        else:?>
							<li class="header-nav-item"><span><a class="header-nav-item__link" href="<?=$address?>"><?=$title?></a></span></li>
						<?endif?>	
					<?endforeach?>			
				
                </ul>
            </div>
        </nav>
    </header>
    <div class="content">
		<div class="wrapper content__wrapper">