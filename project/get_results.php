<?php
$output     = [];
$return_var = 0;

// deleting local data.json file
exec("rm ./share-files/results/data.json");

// move file from server to local 
$command = "sudo /bin/cp ./server/data.json ./share-files/results/"; // change server location 
exec($command, $output, $return_var);

 
if ($return_var === 0) {
    // Change local file data.json permission 
    exec("sudo /bin/chmod 777  ./share-files/results/data.json", $output, $returnVar);
    if ($return_var === 0) {
    
        // Read the JSON file content
        $jsonData = file_get_contents('./share-files/results/data.json');

        // Decode JSON data into a PHP associative array
        $data = json_decode($jsonData, true);

        // Check if decoding was successful
        if ($data === null) {
            die("Error decoding JSON.");
        }
        
        echo $data;
    }else{
        echo "Error 3006: Result file permission process failed ";
    }
} else {
    echo "Error 3007: Result file not found... <br> (create json file from backend ) <br>";
}


?>