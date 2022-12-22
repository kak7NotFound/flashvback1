<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Вакансии | Авиаок</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="header">
    <h1>Авиаок</h1>
  </div>
  <div class="links">
    <a href="./index.php">Главная</a>
    <a href="./jobs.php">Вакансии</a>
    <a href="./contacts.php">Контакты</a>
  </div>
  <div class="delimiterX"></div>
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
      echo curl_exec($ch);
      ?>
      
    </div>
  </div>
</body>

</html>