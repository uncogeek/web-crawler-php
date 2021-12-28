<?php
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "";
$dbname = "poem";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
mysqli_query($conn, "SET NAMES utf8");

// check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}