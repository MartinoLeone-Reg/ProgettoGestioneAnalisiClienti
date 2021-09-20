<?php
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catenanegozi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$id=$_GET['id'];
$sql = "DELETE FROM `clienti` WHERE `clienti`.`ID` = $id";
$result = $conn->query($sql);
echo $sql;
header("location:../search.php");

?>