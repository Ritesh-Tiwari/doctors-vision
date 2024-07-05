<?php
$output     = [];
$return_var = 0;
     
$command = "sudo /bin/cp ./server/data.json ./share-files/results/"; // Use sudo without password
exec($command, $output, $return_var);

 
if ($return_var === 0) {

    // exec("sudo chown www-data:www-data ./share-files/results/data.json");

    // exec("sudo /bin/chmod 0777 ./share-files/results/data.json");
    // if (chmod('./share-files/results/data.json', 0777)) {
    //     echo "File permissions changed successfully.";
    // } else {
    //     echo "Unable to change file permissions.";
    // }
    
    // Read the JSON file content
    $jsonData = file_get_contents('./share-files/results/data.json');

    // Decode JSON data into a PHP associative array
    $data = json_decode($jsonData, true);

    // Check if decoding was successful
    if ($data === null) {
        die("Error decoding JSON.");
    }

    // Access a specific word ('name' in this case)
    echo $data;

} else {
    echo "Error 3002: Failed to upload <br>";
}


?>