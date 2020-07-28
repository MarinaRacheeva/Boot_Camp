<?php

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASS = 'root';
const DB_NAME = 'company';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
or die(mysqli_connect_error());

$sql = "SELECT id, header, date, preview FROM News ORDER BY date DESC";
$res = mysqli_query($link, $sql);

while ($new = mysqli_fetch_array($res))
{
    echo '<li class="news-item">
							<a class="news-item__link" href="news-detail.php">'
								. $new["header"] .
							'</a>
                            <span class="news-item__date">' . $new["date"] . '</span>   
                            <span class="news-item__date">' . $new["preview"] . '</span>   
						</li>';
    
}
?>