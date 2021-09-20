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
$iname= $_POST['iname'];
$idate= $_POST['idate'];
$iprice= $_POST['iprice'];
$iid=$_POST['iid'];
$sql = "INSERT INTO `acquisti`(`prodotto`, `dataA`, `prezzo`, `cliente`) VALUES ('$iname','$idate','$iprice','$iid')";
$result = $conn->query($sql);
echo $sql;
header("location:../search.php");

?> 