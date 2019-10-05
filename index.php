<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
		<link href="style.css" rel="stylesheet">
    <body>
		<?php
	    		/* @$connect=mysqli_connect("HOST", "USER","PASSWORD","DB"); // ПОДКЛЮЧЕНИЕ К БД!!!!
			if(!mysqli_connect_errno())
				mysqli_query($connect,'SET NAMES utf8');
			else
			{
				echo 'Ошибка подключения';
				exit;
			}*/
				
			include_once("methods.php");
			$methods = new Methods();
			$methods->CreateTable($connect); //Создаие таблиц
			$methods->InsertTable($connect); //Добавление записей
			$methods->WriteTable($connect); //Вывод запросов
		?>
    </body>
</html>
