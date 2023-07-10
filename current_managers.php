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
           Current Managers
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Salary</th>
            <th>Department in Charge</th>
        </tr>

    <?php
        $sql = "SELECT First_Name, Last_Name, Phone_Num, Salary, departments.Dept_Name AS Departments FROM manager JOIN departments ON (manager.Dept_ID = departments.Dept_ID)";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if($checkResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>" . $row["First_Name"] . "</td><td>" .  $row["Last_Name"] . "</td><td>" . $row["Phone_Num"] . "</td><td>" . $row["Salary"] . "</td><td>" . $row["Departments"] . "</td></tr>";
            }
            echo "</table>";
        }

    ?>
    </table>

    </body>
</html>

