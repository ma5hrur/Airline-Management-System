<?php

//Connecting to database

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "my_travel_agency_1";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
       <title>
           Hotel Rooms
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>

    <table>
        <tr>
            <th>Hotel Name</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Room Price (BDT)</th>
        </tr>

    <?php
        $sql = "SELECT Hotel_Name, Location, Hotel_Phone_No, Room_Price FROM hotels WHERE Room_Price > 10000;";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if($checkResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["Hotel_Name"] . "</td><td>" .  $row["Location"] . "</td><td>" . $row["Hotel_Phone_No"] . "</td><td>" . $row["Room_Price"] . "</td></tr>";
            }
            echo "</table>";
        }

    ?>
    </table>

    </body>
</html>

