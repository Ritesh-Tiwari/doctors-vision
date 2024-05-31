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
        $_SESSION['msg'] = "Please wait your are loggin...";
        $_SESSION['color'] = "text-success";
        
        // Redirect to another page
        header("Location: message.php");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }else{
        $_SESSION['msg'] = "Wrong username and password...";
        $_SESSION['color'] = "text-secondary";
        // Redirect to another page
        header("Location: message.php");
        exit();

        // Flush the output buffer
        ob_end_flush();

    }
}else{
    $_SESSION['msg'] = "Form was not submitted correctly.";
    $_SESSION['color'] = "text-secondary";
    // Redirect to another page
    header("Location: message.php");
    exit();

    // Flush the output buffer
    ob_end_flush();

}
?>