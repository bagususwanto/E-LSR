<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lsr";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

mysqli_select_db($conn, $dbname);
?>