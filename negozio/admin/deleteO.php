<?php 
echo $_GET["id"];

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

$sql = "DELETE FROM `operatori` WHERE `operatori`.`nomeUtente` ='".$_GET["id"]."'";
echo $sql;
$result = $conn->query($sql);
echo $_SESSION["id"];

header("location:../index.php");


?>