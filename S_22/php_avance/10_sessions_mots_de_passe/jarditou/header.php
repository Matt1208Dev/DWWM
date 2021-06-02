<?php 
    session_start();
    $id_session = session_id();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Jarditou.com : Tout le jardin</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <img class="img-fluid" src="src/img/jarditou_logo.jpg" alt="Logo Jarditou" title="Logo Jarditou" width="180">
            </div>
            <div class="col-lg-4 d-none d-lg-block ">
                <p class="text-center fs-2">Tout le jardin</p>    
            </div>
        </div>

        <div class="row bg-light" style="margin:auto">
                <div class="nav container-fluid d-flex justify-content-center">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    
                      <div class="collapse navbar-collapse" id="navbar">
                        
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item fs-4">
                              <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item fs-4">
                              <a class="nav-link" href="tableau.php">Tableau</a>
                            </li>
                            <li class="nav-item fs-4">
                              <a class="nav-link" href="contact.php" disabled>Contact</a>
                            </li>
                            <li class="nav-item fs-4 d-flex d-inline">
                              <a class="nav-link"  href="user_connection.php">Mon Compte</a>
                            </li>
                          </ul>

                        
                      </div>
                    
                    </div>
                  </nav>

        </div>

        <div class="row">
            <img src="src/img/promotion.jpg" alt="banniere promotionnelle sur les lames de terrasse" title="banniere promotionnelle sur les lames de terrasse">
        </div>