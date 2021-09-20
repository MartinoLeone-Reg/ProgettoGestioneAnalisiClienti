<?php 
session_start ();
if(!isset($_SESSION["login"])||$_SESSION["login"]!=1)

	header("location:../index.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="icon" href="img/shopping-bag.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="css/style.css"/>
 
</head>
<body>
  <script src="../js/bootstrap.bundle.min.js"></script>  
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.2/datatables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/script.js"></script>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
        <div class="container-fluid">
            <!-- off canvas trigger-->
            <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
           </button>
            <!-- off  canvas trigger-->
            <a class="navbar-brand me-auto" href="../index.php">Control Pannel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
   
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="../logout.php">Logout</a></li>  
                </ul>
              </div>
          </div>
        </div>
      </nav>
    <!-- Navbar -->

    <!-- off canvas-->
      <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="sidebar">   
        
        <div class="offcanvas-body">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            core
                        </div>
                    </li>
                    <li>
                        <a href="../search.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-card-list"></i>
                            </span>
                            <span>
                                List
                            </span>
                        </a> 
                    </li>
                    <li>
                        <a href="../addCustomer.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-person-plus"></i> 
                           </span>
                            <span>
                                Add Customer
                            </span>
                        </a> 
                    </li>
                    <li>
                        <a href="../addItem.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-plus-lg"></i>
                           </span>
                            <span>
                                New Sell
                            </span>
                        </a> 
                    </li>
                    <?php 
                    if(intval($_SESSION["login"])==1){
                        echo"<li class='my-4'>";
                            echo"<div class='dropdown-divider bg-white'></div>";
                        echo"</li>";
                        echo"<li>";
                            echo"<div class='text-muted small fw-bold text-uppercase px-3'>";
                            echo"Admin";
                            echo"</div>";
                        echo"</li>";
                        echo"<li>";
                            echo"<a href='../admin/users.php' class='nav-link px-3 active'>";
                                echo"<span class='me-2'>";
                                    echo"<i class='bi bi-people-fill'></i>";  
                                echo"</span>";
                                echo"<span>";
                                    echo"Users";
                                echo"</span>";
                            echo"</a>"; 
                        echo"</li>";
                        echo"<li>";
                            echo"<a href='../admin/addUsers.php' class='nav-link px-3 active'>";
                                echo"<span class='me-2'>";
                                    echo"<i class='bi bi-person-plus'></i>"; 
                                echo"</span>";
                                echo"<span>";
                                    echo"Add users";
                                echo"</span>";
                            echo"</a>";
                        echo"</li>"; 
                    }
                    ?>
                </ul>
            </nav>
          
        </div>
      </div>

    <!-- Off canvas-->
    <main class="mt-5 pt-3">        
        <div class="container mx-auto mt-4">
            <div class="row">
                <?php
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

                    $sql = "SELECT * FROM `operatori`,ruoli WHERE operatori.idRuolo=ruoli.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                            echo '<div class="card" style="width: 18rem;">';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">'.$row["nomeUtente"].'</h5>';
                                    echo '<h6 class="card-subtitle mb-2 text-muted">Ruolo:'.$row["descrizione"].'</h6>';
                                    echo "<a href=deleteO.php?id=".$row["nomeUtente"]." class='btn mr-2'><i class='fas fa-link'></i>Elimina</a>";
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';   
                    }
                    } else {
                    echo "0 results";
                    }

                    $conn->close();
                    ?>

                 
                    
            
        </div>
        </div>        
    </main>


</body>
</html>