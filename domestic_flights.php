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
           Domestic flights
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>

    <table>
        <tr>
            <th>Airlines Name</th>
            <th>Plane ID</th>
            <th>Airlines Contact</th>
            <th>Destination</th>
            <th>Departure Date</th>
            <th>Ticket Price (BDT)</th>
        </tr>

    <?php
        $sql = "SELECT Airlines_Name, Plane_ID, Airlines_Contact_NO, Destination, Departure_Date, Ticket_Price FROM flights WHERE Plane_ID LIKE 'DA%';";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if($checkResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["Airlines_Name"] . "</td><td>" .  $row["Plane_ID"] . "</td><td>" .  $row["Airlines_Contact_NO"] . "</td><td>" .  $row["Destination"] . "</td><td>" .  $row["Departure_Date"] . "</td><td>" . $row["Ticket_Price"] . "</td></tr>";
            }
            echo "</table>";
        }

    ?>
    </table>

    </body>
</html>

