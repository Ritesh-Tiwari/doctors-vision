<?php
require_once('connection.php');
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    if ($username ==username && $password==password){

        // Set session variables
        $_SESSION["is_login"] = True;
        $_SESSION['username'] = $username;
        echo "Logged in";
        
        // Redirect to another page
        header("Location: index.php");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }else{
        echo "Wrong username and password...";
        header("Location: login.html");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }
}else{
    echo "Form was not submitted correctly.";
    header("Location: login.html");
    exit();

    // Flush the output buffer
    ob_end_flush();

}
?>