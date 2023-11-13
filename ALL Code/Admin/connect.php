<?php
session_start();
if($_SESSION['usertype'] != 'admin'){
    header("Location: ../../loginPage/login.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";    

$conn = new mysqli($servername, $username, $password, $dbname);


?>
