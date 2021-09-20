<?php 
$id=$_POST['uid'];
$nome=$_POST['uname'];
$cognome=$_POST['ulname'];
$nascita=$_POST['udate'];
$email=$_POST['umail'];
$citta=$_POST['ucity'];
$provincia=$_POST['uprov'];
$via=$_POST['ustreet'];
$civico=$_POST['ucivic'];
$cap=$_POST['ucap'];
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
$sql="UPDATE `clienti` SET `cognome` = '$cognome', nome='$nome', cognome='$cognome', dataNascita='$nascita', email='$email',indirizzoCitta='$citta',indirizzoProvincia='$provincia', indirizzoVia='$via', indirizzoCivico='$civico' WHERE id=$id";
echo $sql;
$result = $conn->query($sql);
header("location:../search.php");
?>