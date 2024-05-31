<?php
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
                echo "Upload successful";
            } else {
                echo "Upload failed";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } else {
        echo "File upload error: " . $_FILES['image']['error'];
    }
}
?>