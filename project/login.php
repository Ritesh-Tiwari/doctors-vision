<?php
$username = $_POST['username'];
$password = $_POST['password'];
$username = filter_var($username, FILTER_SANITIZE_STRING);


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($username =="abc" && $password=="123"){
        echo "Logged in";
        header("Refresh: 5; Location: index.php");

    }else{
        echo "Wrong username and password...";
        header("Refresh: 5; Location: login.html");

    }
}else{
    echo "Form was not submitted correctly.";
    header("Refresh: 5; Location: login.html");

}
?>