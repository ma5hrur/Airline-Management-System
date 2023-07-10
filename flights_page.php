<?php
 
// Starting the session, to use and
// store data in session variable
session_start();
  
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: index.php');
}
  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>
           My Air Travel Agency
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="flights_page.css">
    </head>
    <body>
        <div class = background_pic>

        </div>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <h2><a href="homepage_agent.php">My Air Travel Agency</a></h2>
                </div>
              <!--  <button class = "logout_button" name="logoutbutton" value="Logout">Log out</button> --> 
                <div class="clear">

                </div>
                <?php  if (isset($_SESSION['username'])) : ?>
                <p>
                    <a href="homepage.php?logout='1'" style="color: red;">
                        <button class = "logout_button" name="logoutbutton" value="Logout">Log out</button>
                    </a>
                </p>
                <?php endif ?>
            </div>
            <br/>
            <div class = "center_box">

            </div>
            <br/>
            <div id="menu">
                <div class = domestic_box>
                    <p><a href="domestic_flights.php">Domestic</a></p>
                    <a href="domestic_flights.php"><img src="images/airplane_icon_transparent.png"></a>
                </div>
            </div>
            <br/>
            <div id="introduction">
                <div class = international_box>
                    <p><a href="international_flights.php">International</a></p>
                    <a href="international_flights.php"><img src="images/airplane_icon_transparent.png"></a>
                </div>
            </div>
        </div>

    </body>
</html>
