<?php
   ob_start();
   session_start();
?>

<html>
   
   <head>
      <title>Админ панель</title>
      
   </head>
	
   <body>
      
      
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && 
                  $_POST['password'] == '12345') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo '
                  <form action="http://localhost:30000/createvacancy" method="post">
                     Название вакансии <br>
                     <input name="title" type="title"> <br>
                     Описание вакансии <br>
                     <textarea name="text" id="" cols="30" rows="10"></textarea><br>
                     <button type = "submit">Создать вакансию</button><br>
                  </form>';
               }else {
                  $msg = 'Неверный логин или пароль';
               }
            }
         ?>
      </div>
      
      <div class = "container">
         <h2>Введи логин и пароль</h2> 
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "логин" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "пароль" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Войти</button>
         </form>
         
      </div> 
      
   </body>
</html>