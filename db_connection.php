<?php
$servername = "10.10.10.157";
$username = "csc210user";
$password = "CSC210!";
$dbname = "group4";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
