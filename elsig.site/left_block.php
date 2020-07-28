<div class="sidebar">
				<section class="catalog">
					<h2 class="sidebar__headline">Каталог</h2>
					<ul class="catalog-list">
						<?php 
						include "application/models/left_block.php"; 
						categoryMenu($cataloglist);
						?>
					</ul>
					
				</section>
				<section class="news">
					<h2 class="sidebar__headline news__headline">Новости</h2>
					<ul class="news-list">
						<?php include "application/models/news.php" ?>
					</ul>
					<span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
				</section>
			</div>