<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>
        Client Registration Form 
    </title>
    <link rel="stylesheet" type="text/css"
                    href="client_registration_form.css">
</head>
 
<body>
    <div class="header">
        <h2>Client Registration</h2>
    </div>
      
    <form method="post" action="client_registration_form.php">
  
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
            <label>Enter Passport number</label>
            <input type="text" name="passport"
                value="<?php echo $passport; ?>">
        </div>

        <div class="input-group">
            <button type="submit" class="btn"
                                name="reg_user">
                Register
            </button>
        </div>
         
 
<p>
            <a href="homepage_agent.php">
                Return to homepage
            </a>
        </p>
 
 
    </form>
</body>
</html>