<html>

<head>
	<meta charset="UTF-8">
	<title>Обучение</title>
	<link rel="stylesheet" href="style.css">
</head>

<body bgcolor=white>
	<table style="font-style: italic;" bgcolor=#c4c4c4 width=800 border=6 align=center cellpadding=10>
		<tr>
			<td colspan="2" width=100% height=50>
				<h1 style="text-align: center; color: #000066;"><i>Web-приложения на РНР и MySQL</i></h1><br/>
				<font color="#000066"><b>Обучение</b></font>
			</td>
		</tr>
		<tr>
			<td bgcolor="#c4c4c4" width=25% height=450>
				<ul style="font-size: 24px;">
					<li><a href="index.php">Главная</a></li>
					<li><a href="study.php">Обучение</a></li>
					<li><a href="contacts.php">Контакты</a></li>
			</td>
			<td bgcolor="#c4c4c4" width=75% height=450 style="color: #000000">
				<?php
				$url = "http://localhost:30000/articles";
				$ch = curl_init();
				curl_setopt_array($ch, [
					CURLOPT_URL => $url,
					CURLOPT_HTTPGET => true,
					// CURLOPT_POST => true,
					CURLOPT_HTTPHEADER => [
						"Content-Type: application/json"
					]
				]);
				$result = curl_exec($ch);
				echo substr($result, 1)
				
				?>
				<br/>
				<a href="add.php" style="padding-bottom: 40px">Добавить статью</a>
			</td>
		</tr>
		<tr>
			<td style="text-align: center; color: #330099" colspan="2" width=100% height=50>
				<p>Все права защищены<br>Таганрог 2022</p>
			</td>
		</tr>
	</table>
</body>

</html>