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
           Visa Info
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>

    <table>
        <tr>
            <th>Passport Number</th>
            <th>Name</th>
            <th>Visa Number</th>
            <th>Embassy</th>
            <th>Contact</th>
            <th>Visa Processed</th>
        </tr>

    <?php
        $sql = "SELECT Passport_No, Client_First_Name, Visa_NO, Embassy_Name, Embassy_Contact, Visa_Processed FROM embassies WHERE Visa_Processed LIKE 'NO';";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if($checkResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["Passport_No"] . "</td><td>" .  $row["Client_First_Name"] . "</td><td>" .  $row["Visa_NO"] . "</td><td>" .  $row["Embassy_Name"] . "</td><td>" .  $row["Embassy_Contact"] . "</td><td>" . $row["Visa_Processed"] . "</td></tr>";
            }
            echo "</table>";
        }

    ?>
    </table>

    </body>
</html>

