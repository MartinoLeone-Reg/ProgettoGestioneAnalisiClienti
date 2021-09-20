<?php 
try{
    $db= new pdo('mysql:host=localhost;dbname=catenanegozi;charset=utf8','root','');
}
catch(PDOException $e){die($e->getMessage());}

?>
