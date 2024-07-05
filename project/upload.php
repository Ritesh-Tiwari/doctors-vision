<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server_path = './server/'; // Change server path
    $local_path = './share-files/images/';

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 20 * 1024 * 1024; // 20 MB

    foreach ($_FILES['images']['name'] as $key => $name) {
        $fileTmpPath    = $_FILES['images']['tmp_name'][$key];
        $fileType       = mime_content_type($fileTmpPath);
        $fileExtension  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $safeName       = preg_replace('/[^a-zA-Z0-9-_\.]/', '', basename($name));
        
        $targetFile_server  = $server_path . $safeName;
        $targetFile_local   = $local_path . $safeName;
        
        
        $fileTmpPath        = escapeshellarg($fileTmpPath);
        $targetFile_server  = escapeshellarg($targetFile_server);
        $targetFile_local   = escapeshellarg($targetFile_local);
        
        $msg ='';
        if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
            if (in_array($fileType, $allowedTypes) && in_array($fileExtension, $allowedExtensions)) {
                if ($_FILES['images']['size'][$key] <= $maxSize) {
                    // Deleting old local files 
                    exec("rm $local_path/*", $output, $returnVar);
                    //  Deleting old server files
                    // exec("sudo /bin/rm  ./server/*.*", $output, $returnVar);
                    
                    // Copy new files 
                    $command_server = "sudo /bin/cp $fileTmpPath $targetFile_server"; // Use sudo without password
                    $command_local  = "cp $fileTmpPath $targetFile_local";  // Adjusted command
                    
                    $output     = [];
                    $return_var = 0;
                    $output2    = [];
                    $return_var2= 0;
                    
                    
                    if ($return_var === 0) {
                    
                        exec($command_server, $output, $return_var);
                        exec($command_local, $output2, $return_var2);
                        
                        if ($return_var === 0) {
                            exec("chmod 755 $local_path/*");
                            echo "File $safeName uploaded successfully. <a href='/'>Go to Home</a> <br>"; 
                        } else {
                            echo "Error 3002: Failed to upload $safeName. <br>";
                        }
                    }else{
                        echo "Files not deleted";
                    }
                } else {
                    echo "File $safeName exceeds the maximum size limit.<br>";
                }
            } else {
                echo "Invalid file type for $safeName.<br>";
            }
        } else {
            echo "Error uploading $safeName. Error code: " . $_FILES['images']['error'][$key] . "<br>";
        }
    }

} else {
    echo "Invalid request method.";
}

echo '
<script type="text/javascript">
// Redirect after 5 seconds (5000 milliseconds)
setTimeout(function() {
    window.location.href = "index.php";
}, 5000);
</script>';
?>