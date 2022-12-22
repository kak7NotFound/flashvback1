<html>

<head>
    <meta charset="UTF-8">
    <title>Добавить</title>
    <link rel="stylesheet" href="style.css">
</head>

<body bgcolor=white>
    <table style="font-style: italic;" bgcolor=#c4c4c4 width=800 border=6 align=center cellpadding=10>
        <tr>
            <td style="text-align: center; color: #330099" colspan="2" width=100% height=50>
                <h2>Добавить статью</h2>
                <form action="http://localhost:30000/createarticle" method="post">
                     Заголовок статьи <br>
                     <input name="title" type="title"> <br>
                     Текст статьи <br>
                     <textarea name="text" id="" cols="30" rows="10"></textarea><br><br>
                     <button type = "submit">Создать статью</button><br>
                  </form>

                  <a href="study.php">Все статьи</a>


            </td>
        </tr>
    </table>
</body>

</html>