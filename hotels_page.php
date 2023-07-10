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
       <link rel="stylesheet" href="hotels_page.css">
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
            <div class = "price_message">
                <h3>Select Price Range of Room: (In BDT)</h3>
            </div>
            <div class = "center_box">

            </div>
            <br/>
            <div id="menu">
                <div class = below5k_box>
                    <p><a href="5k_hotel_price.php">Less than 5k</a></p>
                </div>
            </div>
            <br/>
            <div id="introduction">
                <div class = below10k_box>
                    <p><a href="10k_hotel_price.php">Between 5k and 10k</a></p>
                </div>
            </div>
            <div id="leftsidebar">
                <div class = below15k_box>
                    <p><a href="15k_hotel_price.php">Above 10k</a></p>
                </div>
            </div>
        </div>

    </body>
</html>
