<?php
session_start();
if (!$_SESSION['is_login']){

    // Redirect to another page
    header("Location: login.html");
    exit();
    
    // Flush the output buffer
    ob_end_flush();
}


$filename = $_GET['delete_file'];
if (file_exists($filename)) {
   
    // delete file
    unlink($filename);
    $_SESSION['msg']  ='File '.$filename.' has been deleted';
    $_SESSION['color'] = "text-success";
    
     // Redirect to another page
    header("Location: message.php");
    exit();

    // Flush the output buffer
    ob_end_flush();
} else {
    $_SESSION['msg']  ='Could not delete '.$filename.', file does not exist';
    $_SESSION['color'] = "text-secondary";
    
    // Redirect to another page
    header("Location: message.php");
    exit();

    // Flush the output buffer
    ob_end_flush();
 
}

?>