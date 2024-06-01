<?php
session_start();

// Check if the form is submitted or not
if (isset($_POST['submit'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        // Validate file type and size (optional)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 20 * 1024 * 1024; // 20 MB

        if (in_array($file_type, $allowed_types) && $file_size <= $max_size) {
            $folder = './share-files/' . $file_name;
            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['msg']    = "Image uploaded successfully";
                $_SESSION['color']  = 'text-success';
               // Redirect to another page
                header("Location: message.php");
                exit();

                // Flush the output buffer
                ob_end_flush();

            } else {
                $_SESSION['msg']    = "Image Upload failed";
                $_SESSION['color']  = "text-secondary";  
                // Redirect to another page
               header("Location: message.php");
               exit();

               // Flush the output buffer
               ob_end_flush();

            }
        } else {
            $_SESSION['msg']    = "Invalid file type or size.";
            $_SESSION['color']  = "text-secondary";
            // Redirect to another page
             header("Location: message.php");
             exit();

             // Flush the output buffer
             ob_end_flush();

        }
    } else {
        $_SESSION['msg']    = "File upload error: " . $_FILES['image']['error'];
        $_SESSION['color']  = "text-secondary";
        // Redirect to another page
         header("Location: message.php");
         exit();

         // Flush the output buffer
         ob_end_flush();

    }
}
?>