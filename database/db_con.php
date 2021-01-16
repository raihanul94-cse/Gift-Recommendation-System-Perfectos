<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "project_database";
$db2="recommender";
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
$con2 = mysqli_connect($servername, $username, $password,$db2);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>