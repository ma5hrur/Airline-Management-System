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
           Departments
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>

    <table>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
        </tr>

    <?php
        $sql = "SELECT * FROM departments";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if($checkResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["Dept_ID"] . "</td><td>" .  $row["Dept_Name"] . "</td></tr>";
            }
            echo "</table>";
        }

    ?>
    </table>

    </body>
</html>

