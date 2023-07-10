<?php

$var = $_GET['x'];

//Connecting to database

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "my_travel_agency_1";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


$sql = "DELETE FROM agents WHERE Username = '$var'";
$result = mysqli_query($conn, $sql);

header("location:current_agents.php");

?>