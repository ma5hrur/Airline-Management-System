<?php

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$pnum = $_GET['pnum'];
$addr = $_GET['addr'];
$city = $_GET['city'];
$em = $_GET['em'];
$uname = $_GET['uname'];
$sal = $_GET['sal'];

//Connecting to database

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "my_travel_agency_1";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


//$sql = "DELETE FROM agents WHERE Username = '$var'";
//$result = mysqli_query($conn, $sql);

//header("location:current_agents.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>
        Update Agent Info 
    </title>
    <link rel="stylesheet" type="text/css"
                    href="agent_registration_form.css">
</head>
 
<body>
    <div class="header">
        <h2>Update Agent Information</h2>
    </div>
      
    <form method="GET" action="">
  
        <div class="input-group">
            <label>Enter Firstname</label>
            <input type="text" name="firstname"
                value="<?php echo "$fname"; ?>">
        </div>

        <div class="input-group">
            <label>Enter Lastname</label>
            <input type="text" name="lastname"
                value="<?php echo $lname; ?>">
        </div>
        

        <div class="input-group">
            <label>Enter Address</label>
            <input type="text" name="address"
                value="<?php echo $addr; ?>">
        </div>

        <div class="input-group">
            <label>Enter City</label>
            <input type="text" name="city"
                value="<?php echo $city; ?>">
        </div>

        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username"
                value="<?php echo $uname; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email"
                value="<?php echo $em; ?>">
        </div>
        <div class="input-group">
            <label>Salary</label>
            <input type="number" name="salary"
                value="<?php echo $sal; ?>">
        </div>
        
        <div class="input-group">
            <button type="submit" class="btn"
                                name="update_agent">
                Update
            </button>
        </div>
 
 
    </form>
</body>
</html>


<?php
    //When Update is clicked
    if(isset($_GET['update_agent']))
    {
        $fn = mysqli_real_escape_string($conn, $_GET['firstname']);
        $ln = mysqli_real_escape_string($conn, $_GET['lastname']);
        $ad = mysqli_real_escape_string($conn , $_GET['address']);
        $ct = mysqli_real_escape_string($conn , $_GET['city']);
        $un = mysqli_real_escape_string($conn , $_GET['username']);
        $e_mail = mysqli_real_escape_string($conn , $_GET['email']);
        $sa = mysqli_real_escape_string($conn , $_GET['salary']);
        
        
        
        //$fn = $_GET['firstname'];
        //$ln = $_GET['lastname'];
        //$date_of_b = $_GET['dateofbirth'];
        //$pn = $_GET['phoneno'];
        //$ad = $_GET['address'];
        //$ct = $_GET['city'];
        //$un = $_GET['username'];
        //$e_mail = $_GET['email'];
        //$sa = $_GET['salary'];


        //$query = "UPDATE agents SET First_Name='$fn', Last_name='$ln', Date_Of_Birth='$date_of_b', Phone_num='$pn', Address='$ad', City='$ct', Email='$e_mail', Username='$un', Salary='$sa' WHERE Username = '$un'";
        $query1= "UPDATE agents SET First_Name = '$fn' , Last_Name = '$ln', Address = '$ad', City = '$ct', Email = '$e_mail', Username = '$un', Salary = '$sa' WHERE Email = '$e_mail'";
        $result = mysqli_query($conn, $query1);

        if($result)
        {
            header("location:current_agents.php");
        }
        else
        {
            echo "Could not update";
        }
    }




?>