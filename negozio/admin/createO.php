<?php
    $id= $_POST["oid"];
    $name= $_POST["oname"];
    $pass= $_POST["opass"];

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
    
    $sql = "INSERT INTO `operatori`(`nomeUtente`, `pass`, `idRuolo`) VALUES ('$name',PASSWORD('$pass'),'$id')";
    echo $sql;
    $result = $conn->query($sql);
    header("location:../index.php");
    
    

?>