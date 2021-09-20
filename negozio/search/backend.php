<?php 
include 'dbconn.php';
if(isset($_POST['search'])){
    $search=$_POST['search'];
    $search= "%$search%";
    if(strlen($search)>0){
        $sql="select * from clienti where ID LIKE :s || nome LIKE :s || cognome LIKE :s || dataNascita LIKE :s || email LIKE :s || indirizzoCitta LIKE :s || indirizzoProvincia LIKE :s || indirizzoVia LIKE :s || indirizzoCivico LIKE :s || indirizzoCap LIKE :s";
        //$sql="select * from clienti where ID LIKE :s || nome LIKE :s || cognome LIKE :s || dataNascita LIKE :s";
        $stmt=$db->prepare($sql);
        $stmt->bindParam('s',$search);
        $stmt->execute();
       echo "<table class='table table-bordered'>";
        echo"<thead>";
        echo"<tr>";
            echo"<th scope='col'>ID</th>";
            echo"<th scope='col'>Name</th>";
            echo"<th scope='col'>Lastname</th>";
            echo"<th scope='col'>Birth Date</th>";
            echo"<th scope='col'>email</th>";
            echo"<th scope='col'>Città</th>";
            echo"<th scope='col'>Provincia</th>";
            echo"<th scope='col'>Via</th>";
            echo"<th scope='col'>Civico</th>";
            echo"<th scope='col'>Cap</th>";
            echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
        while($row = $stmt->fetch()){
            $id= $row["ID"];
            $nome= $row["nome"];
            $cognome=$row["cognome"];
            $dataNascita=$row["dataNascita"];
            $email=$row["email"];
            $citta=$row["indirizzoCitta"];
            $provincia=$row["indirizzoProvincia"];
            $via=$row["indirizzoVia"];
            $civico=$row["indirizzoCivico"];
            $cap=$row["indirizzoCap"];

            //echo "<div> $id </p> $nome $cognome </p $dataNascita </p> <a href='mailto;$email'>$email</a></p></div>";
            echo "<tr data-href='search/personal.php?id=".$id."'>";
            echo "<th>".$id."</th><th>".$nome."</th><th>". $cognome."</th><th>". $dataNascita."</th><th>". $email."</th><th>". $citta."</th><th>". $provincia."</th><th>". $via."</th><th>". $civico."</th><th>". $cap."</th>";
            echo "</tr>";
        }
        echo"</tbody>";

        echo "</table>";

    }
}

?>