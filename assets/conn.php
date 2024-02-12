<?php
session_start();
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "empops";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
error_reporting(0);
?>