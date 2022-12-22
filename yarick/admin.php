<?php
ob_start();
session_start();
?>

<html>

<head>
   <title>Админ панель</title>
   <style type="text/css">
      .login-container {
         display: block;
      }
   </style>
</head>

<body>


   <div class="container form-signin">

      <?php
      $msg = '';

      if (
         isset($_POST['login']) && !empty($_POST['username'])
         && !empty($_POST['password'])
      ) {

         // авторизация
         if (
            $_POST['username'] == 'admin' &&
            $_POST['password'] == '12345'
         ) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'tutorialspoint';

            echo '<style type="text/css">
            .login-container {
                display: none;
            }
            </style>
            ';

            // получаем запрашиваемое
            $url = "http://localhost:30000/getrequests";
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

         } else {
            $msg = 'Неверный логин или пароль';
         }
      }
      ?>
   </div>


   <div class="login-container">
      <center>
         <h2>Введи логин и пароль</h2>
         <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                         ?>" method="post">
            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
            <input type="text" class="form-control" name="username" placeholder="логин" required autofocus></br>
            <input type="password" class="form-control" name="password" placeholder="пароль" required> <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Войти</button>
         </form>
      </center>
   </div>

</body>

</html>