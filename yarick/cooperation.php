<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Сотрудничество | Авиаок</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="header">
    <h1>Авиаок</h1>
  </div>
  <div class="links">
    <a href="./index.php">Главная</a>
    <a href="./cooperation.php">Сотрудничество</a>
    <a href="./contacts.php">Контакты</a>
  </div>

  <div class="main">
    <div class="text">
      <div class="form">
        <center>
          <h3>Заполните форму</h3>
          <p>и с Вами свяжется наш специалист</p>
          <form action="http://localhost:30000/request" method="post">
            <p>Название вашей компании</p>
            <input name="company">
            <p>Ваше имя и должность</p>
            <input name="name">
            <p>Телефон</p>
            <input name="phone">
            <p>Электронный Адрес</p>
            <input name="email">
            <p>Наши специалисты свяжутся с вами, чтобы обсудить подробности</p>
            <button type="submit">Отправить</button>
          </form>
        </center>
      </div>
      <br><br>
      <a href="admin.php">Посмотреть отправленные формы</a>

    </div>
  </div>
</body>

</html>