<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>
        Agent Registration Form 
    </title>
    <link rel="stylesheet" type="text/css"
                    href="agent_registration_form.css">
</head>
 
<body>
    <div class="header">
        <h2>Agent Registration</h2>
    </div>
      
    <form method="post" action="agent_registration_form.php">
  
        <?php include('error.php'); ?>
  
        <div class="input-group">
            <label>Enter Firstname</label>
            <input type="text" name="firstname"
                value="<?php echo $firstname; ?>">
        </div>

        <div class="input-group">
            <label>Enter Lastname</label>
            <input type="text" name="lastname"
                value="<?php echo $lastname; ?>">
        </div>

        <div class="input-group">
            <label>Enter Date of Birth</label>
            <input type="date" name="dateofbirth"
                value="<?php echo $dateofbirth; ?>">
        </div>

        <div class="input-group">
            <label>Enter Phone-number</label>
            <input type="number" name="phoneno"
                value="<?php echo $phoneno; ?>">
        </div>

        <div class="input-group">
            <label>Enter Address</label>
            <input type="text" name="address"
                value="<?php echo $address; ?>">
        </div>

        <div class="input-group">
            <label>Enter City</label>
            <input type="text" name="city"
                value="<?php echo $city; ?>">
        </div>

        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username"
                value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email"
                value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                                name="reg_user">
                Register
            </button>
        </div>
         
 
        <p>
            <a href="index.php">
                Login Here
            </a>
        </p>
 
 
    </form>
</body>
</html>