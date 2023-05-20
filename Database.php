<?php 

$hostName= "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "registration_login";
$connect = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$connect) {
    die("SOMETHING WENT WRONG;");
}

?>