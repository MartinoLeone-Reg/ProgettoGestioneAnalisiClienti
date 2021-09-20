
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
$uname= $_POST['uname'];
$ulname= $_POST['ulname'];
$udate= $_POST['udate'];
$umail= $_POST['umail'];
$ustreet= $_POST['ustreet'];
$ucivic= $_POST['ucivic'];
$ucity= $_POST['ucity'];
$uname= $_POST['uname'];
$uprov= $_POST['uprov'];
$ucap=$_POST['ucap'];
$sql = "INSERT INTO clienti(`nome`, `cognome`, `dataNascita`, `email`, `indirizzoCitta`, `indirizzoProvincia`, `indirizzoVia`, `indirizzoCivico`, `indirizzoCap`) 
        VALUES ('$uname','$ulname','$udate','$umail','$ucity','$uprov','$ustreet','$ucivic','$ucap')";
$result = $conn->query($sql);
echo $sql;
header("location:../index.php");

?>    
