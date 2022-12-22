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
      <?php
      $url = "http://localhost:30000/vacancy";
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
      echo substr($result, 1);
      ?>
    </div>
  </div>
</body>

</html>