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

deleteFile($filename);

 // Replace with your file path
 function deleteFile($fileToCheck){
    // Escape the file path to prevent command injection
    $escapedFile = escapeshellarg($fileToCheck);
    
    // Construct the command to check file existence
    $command = "ls $escapedFile 2>/dev/null";
    
    // Execute the command
    $output = exec($command, $outputLines, $returnVar);
    
    // Check the return value
    if ($returnVar === 0) {
        exec("rm $fileToCheck", $output, $returnVar);
        if ($returnVar === 0) {
            $_SESSION['msg']  ='File '.$filename.' has been deleted';
            $_SESSION['color'] = "text-success";
            
             // Redirect to another page
            header("Location: message.php");
            exit();
                } else {
            $_SESSION['msg']  ="Failed to delete the file. Return code: $returnVar";
            $_SESSION['color'] = "text-secondary";
            
            // Redirect to another page
            header("Location: message.php");
            exit();
        
            // Flush the output buffer
            ob_end_flush();
         
        }
    } else {
        $_SESSION['msg']  ='Could not delete '.$filename.', file does not exist';
        $_SESSION['color'] = "text-secondary";
        
        // Redirect to another page
        header("Location: message.php");
        exit();
    
        // Flush the output buffer
        ob_end_flush();
     
    }
}




/*
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
 
}*/

?>