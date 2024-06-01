<?php
require_once('connection.php');
// Start the session
session_start();

// Check if form submission method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect all form values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    // Check if the username and password are correct
    if ($username ==username && $password==password){

        // Set session variables
        $_SESSION["is_login"] = True;
        $_SESSION['username'] = $username;
        $_SESSION['msg'] = "Please wait, you are logging in...";
        $_SESSION['color'] = "text-success";
        
        // Redirect to another page
        header("Location: message.php");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }else{
        $_SESSION['msg'] = "Incorrect username and password...";
        $_SESSION['color'] = "text-secondary";
        // Redirect to another page
        header("Location: message.php");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }
}else{
    $_SESSION['msg'] = "The form was not submitted correctly.";
    $_SESSION['color'] = "text-secondary";
    // Redirect to another page
    header("Location: message.php");
    exit();

    // Flush the output buffer
    ob_end_flush();

}
?>