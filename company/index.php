<?php 
//// <main> обёртка должна уехать во вьюху во включаемые файлы
?> 
<? //require 'includes/config.php'; 
require 'application/views/index.php'?>
        <? //вывод категорий в рабочей области

            //// вот этот кусок кода должен разделиться на 2: в модели ты дёргаешь функцию из lib.php, которая выбирает в массив категории
            /// далее этот массив видит подключённая вьюха главной страницы, которая генерирует нужный html
            
            
		?>

<?php
//// . sidebar.php + seo-article + footer.php = template_footer.php
//. <article class="seo-article"> должен с содержимым вместе уехать в шаблон.
// предлагаю тебе во папке с вьюхами сделать папку include_areas и там внутри делать файлы типа index_seo.php, catalog_seo.php и прочие.
// в шаблоне смотришь если для текущего файла есть файл включаемой области, то его выводишь, иначе нет.
?>