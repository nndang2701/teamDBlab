<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "";
global $conn;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn) {
   mysqli_query($conn, "SET NAMES 'utf8'");
   echo "connected";
} else {
   echo "That bai";
}