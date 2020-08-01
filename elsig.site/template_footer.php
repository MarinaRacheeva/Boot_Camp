<?php
setlocale(LC_ALL, "russian");
$year = strftime('%Y');
?>
<footer class="page-footer">
    <div class="wrapper page-footer__wrapper">
        <div class="copyright">
            <span class="copyright__part copyright__lifetime">Copyright ©2007-
                <?echo $year;?></span>
            <span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>,
                <?echo $year;?></span>
            <img class="copyright__image" src="img/logo.png" alt="Company-logo">
            <span class="copyright__part copyrhigt__company-name">Company</span>
        </div>
        <nav class="footer-nav">
            <ul class="footer-nav__list">
            <?  //вывод меню в подвале сайта
                    include "application/models/index.php";
					foreach($menu as $mmenu)
					{
                        echo '<li class="footer-nav__list-item"><a class="footer-nav__link" href="' . $mmenu['href'] . '">' . $mmenu['link'] . '</a></li>';
					}			
				?>
            </ul>
        </nav>
        <div class="developer">
            <span class="developer__ref">Разработка сайта - <a class="developer__link"
                    href="http://itconstruct.ru">ITConstruct</a></span>
            <img class="counter" src="img/counter.png" alt="Page-counter">
        </div>
    </div>
</footer>
</body>
</html>