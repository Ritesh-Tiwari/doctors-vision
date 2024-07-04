<?php
$file = 'share-files/a.txt';
$permissions = '777'; // Example permission, adjust as needed

$outp =  shell_exec("chmod 777 share-files/Screenshotfrom2023-11-2313-50-48.png");
echo $outp;
// // $command = "chmod $permissions $file";
// if (chmod($file, $permissions)) {
//   echo "File permissions changed successfully.";
// } else {
//   echo "Failed to change file permissions.";
// }
?>