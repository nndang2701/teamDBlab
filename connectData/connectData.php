<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "205174";
$dbname = "onlinecourse";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn) {
   mysqli_query($conn, "SET NAMES 'utf8'");
   $sql = "INSERT INTO users(login_name) VALUES ('trang.nk1')";
   echo "connected";
} else {
   echo "That bai";
}