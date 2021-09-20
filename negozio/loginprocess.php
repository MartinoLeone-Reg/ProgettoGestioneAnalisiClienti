<?php 

session_start ();
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
$uname = $_POST['uname'];
$upass = $_POST['upassword'];
$sql = "select * from operatori where nomeUtente='$uname' and pass=PASSWORD('$upass')";
$result = $conn->query($sql);
echo $sql;
if($result->num_rows > 0)
{
  $row = $result->fetch_assoc();
	$idRuolo= $row["idRuolo"];
	$_SESSION["login"]=$idRuolo;
  $_SESSION["id"]=$row["nomeUtente"];
	header("location:index.php");
    $conn->close();

}
else	
{
    $_SESSION["err"]="1";
    header("location:login.php");

	
}

?>