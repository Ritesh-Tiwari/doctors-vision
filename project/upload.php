<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = './share-files/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 20 * 1024 * 1024; // 20 MB

    // if (!is_dir($uploadDir)) {
    //     // mkdir($uploadDir, 0777, true);
    // }

    foreach ($_FILES['images']['name'] as $key => $name) {
        $fileTmpPath = $_FILES['images']['tmp_name'][$key];
        $fileType = mime_content_type($fileTmpPath);
        $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $safeName = preg_replace('/[^a-zA-Z0-9-_\.]/', '', basename($name));
        $targetFile = $uploadDir . $safeName;
        $msg ='';
        if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
            if (in_array($fileType, $allowedTypes) && in_array($fileExtension, $allowedExtensions)) {
                if ($_FILES['images']['size'][$key] <= $maxSize) {
                    
                    if (move_uploaded_file($fileTmpPath, $targetFile)) {
                        echo  "File $safeName uploaded successfully. <a href='/'> go to Home</a> <br>"; 
                        
                    } else {
                        echo "Error 3002: Failed to upload $safeName.  <br>";
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