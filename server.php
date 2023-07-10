<?php
 
// Starting the session, necessary
// for using session variables
session_start();
  
// Declaring and hoisting the variables
$firstname = "";
$lastname = "";
$dateofbirth = "";
$phoneno = "";
$address = "";
$city = "";
$username = "";
$password = "";
$email    = "";
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
    $dateofbirth = mysqli_real_escape_string($db, $_POST['dateofbirth']);
    $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  
    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
    if (empty($dateofbirth)) { array_push($errors, "Date of Birth is required"); }
    if (empty($phoneno)) { array_push($errors, "Phone number is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
    if (empty($city)) { array_push($errors, "City is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
  
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
        // Checking if the passwords match
    }


    //Checking if the password is valid
    $digit = preg_match('@[0-9]@', $password_1);
    $uppercase = preg_match('@[A-Z]@', $password_1);
    $lowercase = preg_match('@[a-z]@', $password_1);

    if(strlen($password_1) < 6 || !$digit || !$uppercase || !$lowercase ) {
        array_push($errors, "Your password should be atleast 6 characters long. It should contain atleast 1 digit, 1 uppercase and 1 lowercase letter.");
       } 


    //Checking for duplicate username
    if (isset($username)) {
        $mysql_get_users = mysqli_query($db,"SELECT * FROM agents where username='$username'");
    
        $get_rows = mysqli_affected_rows($db);
    
        if ($get_rows >= 1) {
            
            array_push($errors, "Username already exists");
            
    }


    //Checking for duplicate email
    }
    if (isset($email)) {
        $mysql_get_users = mysqli_query($db,"SELECT * FROM agents where email='$email'");
    
        $get_rows = mysqli_affected_rows($db);
    
        if ($get_rows >= 1) {
            
            array_push($errors, "Email already exists");
            
    }
}
  
    // If the form is error free, then register the agent
    if (count($errors) == 0) {
         
        // Password encryption to increase data security
        $password = md5($password_1);
         
        // Inserting data into table
        $query = "INSERT INTO `agents`(`Username`, `Email`, `Pass_word`, `First_name`, `Last_name`, `Date_of_Birth`, `Phone_Num`, `Address`, `City`) VALUES ('$username','$email','$password','$firstname','$lastname','$dateofbirth','$phoneno','$address','$city')";
         
        mysqli_query($db, $query);
  
        // Storing username of the logged in user,
        // in the session variable
        $_SESSION['username'] = $username;
         
        // Welcome message
        $_SESSION['success'] = "You have logged in!";

         
        // Page on which the user will be
        // redirected after registering
        header('location: index.php');
    }
}
  
// User login
if (isset($_POST['login_user'])) {
     
    // Data sanitization to prevent SQL injection
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    // Error message if the input field is left blank
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    // Checking for the errors
    if (count($errors) == 0) {
         
        // Password matching
        $password = md5($password);
         
        $query = "SELECT * FROM agents WHERE username = '$username'";  //AND pass_word = '$password'";
        $results = mysqli_query($db, $query);
  
        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {
             
            // Storing username in session variable
            $_SESSION['username'] = $username;
             
            // Welcome message
            $_SESSION['success'] = "You have logged in!";

            if($username == 'Admin'){
                header('location: homepage_admin.php');
            }
            else{
                // Page on which the user is sent
            // to after logging in
            header('location: homepage_agent.php');
            }
             
        }
        else {
             
            // If the username and password doesn't match
            array_push($errors, "Username does not exist or password is incorrect");
        }
    }
}
  
?>