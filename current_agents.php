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
           Current Agents
       </title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
       <link rel="stylesheet" href="current_clients.css">
    </head>

    <body>
    <p><a href="administration_page.php">Return</a><p>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Email</th>
                <th>Username</th>
                <th>Salary</th>
                <th>Update</th>
                <th>Remove</th>
            </tr>

        <?php
            $sql = "SELECT First_Name, Last_Name, Date_Of_Birth, Phone_Num, Address, City, Email, Username, Salary FROM agents WHERE Username NOT LIKE 'Admin';";
            $result = mysqli_query($conn, $sql);
            $checkResult = mysqli_num_rows($result);
            $i=0;

            //if($checkResult > 0)
            
                while($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                  <!-- echo "<tr><td>" . $row["First_Name"] . "</td><td>" .  $row["Last_Name"] . "</td><td>" . $row["Date_Of_Birth"] . "</td><td>" . $row["Phone_Num"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Salary"] . "</td>"; --> 
                  <tr class="<?php if(isset($classname)) echo $classname;?>">
                  <td><?php echo $row["First_Name"]; ?></td>
                  <td><?php echo $row["Last_Name"]; ?></td>
                  <td><?php echo $row["Date_Of_Birth"]; ?></td>
                  <td><?php echo $row["Phone_Num"]; ?></td>
                  <td><?php echo $row["Address"]; ?></td>
                  <td><?php echo $row["City"]; ?></td>
                  <td><?php echo $row["Email"]; ?></td>
                  <td><?php echo $row["Username"]; ?></td>
                  <td><?php echo $row["Salary"]; ?></td>
                  <td><button class="update_btn"><a href="update_agents.php?fname= <?php echo $row["First_Name"] ?> & lname= <?php echo $row["Last_Name"]; ?> & dob= <?php echo $row["Date_Of_Birth"]; ?> & pnum= <?php echo $row["Phone_Num"]; ?> & addr= <?php echo $row["Address"]; ?> & city= <?php echo $row["City"]; ?> & em= <?php echo $row["Email"]; ?> & uname= <?php echo $row["Username"]; ?> & sal= <?php echo $row["Salary"]; ?>">Update</a></button></td>
                  <td><button><a href="delete_agents.php?x=<?php echo $row["Username"]; ?>">Remove</a></button></td>
                  </tr>
                  <?php
                  $i++;
                }
                ?>
                
                 <!-- echo "</table>"; --> 
            
        

        </table>

    </body>
</html>