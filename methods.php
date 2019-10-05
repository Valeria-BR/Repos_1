<!Doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title></title>
            
        </head>
        <body>
            <?php		
				class methods{
					public function CreateTable($link){
						mysqli_query($link, "CREATE TABLE news(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, categori_id INT NOT NULL, title VARCHAR(50) NOT NULL, text TEXT, publish_up DATETIME NOT NULL, publish_down DATETIME, index (categori_id, publish_up))");
						
						mysqli_query($link, "CREATE TABLE categories( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title TEXT NOT NULL, text TEXT, alias VARCHAR(100), index (alias))");
					}
					
					
					public function InsertTable($link){
						mysqli_query($link,"INSERT INTO news VALUES (null,'1','Новость 1','Текст новости 1','2019-01-10 10:00','2019-02-10 10:00'), (null,'2','Новость 2','Текст новости 2','2019-01-10 12:00',null), (null,'1','Новость 3','Текст новости 3','2019-02-10 10:00',null), (null,'2','Новость 4','Текст новости 4','2019-03-10 10:00',null), (null,'2','Новость 5','Текст новости 5','2020-01-10 10:00',null)");
						mysqli_query($link,"INSERT INTO categories VALUES (null,'Политика','Описание раздела политика','politics'), (null,'Авто','Описание раздела авто','auto'), (null,'Проишествия','Описание раздела проишествия','incident')");
					}
					
					public function WriteTable($link){
						echo "<div id='z1'>";
						echo "<h3>Новости категории Политика</h3>";
						$res=mysqli_query($link,"SELECT news.title FROM categories, news WHERE categories.id=news.categori_id and categories.title='Политика' ORDER BY news.title");
						echo "<ol>";
						while($pole=mysqli_fetch_array($res))
						{
							echo
								"<li>".$pole['title']."</li>";
						}
						echo "</ol>";
						echo "</div>";
						
						$date=date("Y-m-d H:i:s"); 
						$date2=date("Y-m-d");
						echo "<div id='z2'>";
						echo "<h3>Опубликованные новости категории Авто</h3>";
						$res=mysqli_query($link,"SELECT news.title FROM categories, news WHERE categories.id=news.categori_id and categories.title='Авто' and (publish_down>'$date' or publish_down is null) and publish_up>='$date2' ORDER BY news.title");
						while($pole=mysqli_fetch_array($res))
						{
							echo
								$pole['title']."<br>";
						}
						echo "</div>";
						
						echo "<div id='z3'>";
						echo "<h3>Заголовки всех новостей с сылками</h3>";
						$res=mysqli_query($link,"SELECT news.title, categories.alias FROM categories, news WHERE categories.id=news.categori_id ORDER BY news.title");
						echo "<ol>";
						while($pole=mysqli_fetch_array($res))
						{
							echo
								"<li><a href=".$pole['alias']." target='_blank'>".$pole['title']."</a></li>";
						}
						echo "</ol>";
						echo "</div>";
					}
				}
            ?>
        </body>
    </html>