<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>
        Login
    </title>
     
    <link rel="stylesheet" type="text/css"
            href="login.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
      
    <form method="post" action="index.php">
  
        <?php include('error.php'); ?>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
                <?php endif ?>

  
        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                        name="login_user">
                Login
            </button>
        </div>
         
 
        <p>
            <a href="agent_registration_form.php">
                Click here to register
            </a>
        </p>
 
 
    </form>
</body>
 
</html>