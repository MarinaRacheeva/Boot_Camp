<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<title>Company - Интернет-магазин электронных сигарет</title>
</head>

<body>
	<header class="page-header">
		<div class="wrapper">
			<aside class="header-top">
				<div class="header-logo">
					<img class="header-logo__image" src="img/logo.png" alt="Логотип" width="95" height="75">
					<span class="header-logo__caption">Company</span>
				</div>
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
					<li class="header-nav-item"><span><a class="header-nav-item__link header-nav-item__link_current" href="index.php">Главная</a></span></li>
					<li class="header-nav-item">
						<span class="header-nav-item__container-for-link"><a class="header-nav-item__link" href="catalog.php">Каталог</a></span>
						<ul class="sub-menu">
						<?php 
						include "application/models/left_block.php"; 
						categoryMenu($submenu);
						?>
						</ul>
					</li>
					<li class="header-nav-item"><span><a class="header-nav-item__link" href="about.php">О компании</a></span></li>
					<li class="header-nav-item"><span><a class="header-nav-item__link" href="news.php">Новости</a></span></li>
					<li class="header-nav-item"><span><a class="header-nav-item__link" href="paydelivery.php">Доставка и оплата</a></span></li>
					<li class="header-nav-item"><span><a class="header-nav-item__link" href="contacts.php">Контакты</a></span></li>
				</ul>
			</div>
		</nav>
	</header>