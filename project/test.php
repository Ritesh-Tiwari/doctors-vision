<?php
// exec("sudo /bin/rm  ./server/*.*", $output, $returnVar);
exec("sudo /bin/chmod 777  ./share-files/results/data.json", $output, $returnVar);

if ($returnVar === 0) {
        echo "File permissions changed successfully.";
    } else {
        echo "Error changing file permissions. Return code: $returnVar";
        echo "<pre>" . implode("\n", $output) . "</pre>";
    }
    

// $file = "/home/avcdev/Desktop/doctor's-vision/project/share-files/results/data.json"; // Replace with the actual file path
// $command = "sudo bin/chmod 755 " . escapeshellarg($file); // Command to change file permissions

// // Execute the command
// exec($command, $output, $returnVar);

// // Check the result
// if ($returnVar === 0) {
//     echo "File permissions changed successfully.";
// } else {
//     echo "Error changing file permissions. Return code: $returnVar";
//     echo "<pre>" . implode("\n", $output) . "</pre>";
// }


// $scriptPath = './script.sh';

// // Use escapeshellarg() to safely escape any special characters in the script path
// $escapedScriptPath = escapeshellarg($scriptPath);

// // Execute the shell script and capture output
// $output = shell_exec("sh $escapedScriptPath");

// // Output the result
// if ($output !== null) {
// echo "Script output:\n";

// $directory =
// $listFilesCommand = "ls -l " . escapeshellarg("./share-files/");
// $listFilesOutput = shell_exec($listFilesCommand);
// echo "Files List:\n$listFilesOutput .||<br>";
// $countLinesCommand = "wc -l < " . escapeshellarg($directory . $filename);
// $countLinesOutput = shell_exec($countLinesCommand);
// echo " Number of Lines: $countLinesOutput"; ?>