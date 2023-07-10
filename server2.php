<?php
 
// Starting the session, necessary
// for using session variables
session_start();
  
// Declaring and hoisting the variables
$firstname = "";
$lastname = "";

$phoneno = "";
$address = "";
$passport = "";


$errors = array();
$_SESSION['success'] = "";
$success_message = ""; 
  
// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'my_travel_agency_1');
  
// Registration code
if (isset($_POST['reg_user'])) {
  
    // Receiving the values entered and storing
    // in the variables
    // Data sanitization is done to prevent
    // SQL injections
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $passport = mysqli_real_escape_string($db, $_POST['passport']);


  
    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
    if (empty($phoneno)) { array_push($errors, "Phone number is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
    if (empty($passport)) { array_push($errors, "Passport number is required"); }
  
  
    // If the form is error free, then register the user
    if (count($errors) == 0) {
         
         
        // Inserting data into table
        $query = "INSERT INTO `client`(`First_Name`, `Last_Name`, `Phone_Num`, `Address`, `Passport_No`) VALUES ('$firstname','$lastname','$phoneno','$address','$passport')";
         
        mysqli_query($db, $query);

         
        // Page on which the user will be
        // redirected after registering
        header('location: clients_page.php');
    }
}
  
?>