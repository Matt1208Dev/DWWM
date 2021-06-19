

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
                <img class="img-fluid" src="http://localhost/ci/assets/images/jarditou_logo.jpg" alt="Logo Jarditou" title="Logo Jarditou" width="180">
            </div>
            <div class="col-lg-4 d-none d-lg-block ">
                <p class="text-center fs-2">Tout le jardin</p>    
            </div>
        </div>

        <div class="row bg-light" style="margin:auto">
              <div class="nav container-fluid d-flex justify-content-between align-items-center">
                <div class="nav container-fluid d-flex justify-content-between align-items-center">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                      <div class="collapse navbar-collapse" id="navbar">
                        
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item fs-4">
                              <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item fs-4">
                              <a class="nav-link" href="<?php echo base_url('index.php/Produits/liste');?>">Tableau</a>
                            </li>
                            <li class="nav-item fs-4">
                              <a class="nav-link" href="" disabled>Contact</a>
                            </li>
                            <li class="nav-item fs-4">
                              <a class="nav-link"  href="user_connection.php">Mon Compte</a>
                            </li>
                          </ul>
                      </div>                   
                  </nav>
                
                  <a class="text-muted text-decoration-none align-self-start mt-2" href="<?php echo base_url('index.php/Panier/afficherPanier');?>">
                  <div class="d-flex align-items-center"><span>Mon panier</span>
                      <svg class="form-inline" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg>
                      <p class="badge rounded-pill bg-danger">4</p>
                  </div>
                  </a>        
                </div>
              </div>

                

                
        </div>

        <div class="row">
            <img src="http://localhost/ci/assets/images/promotion.jpg" alt="banniere promotionnelle sur les lames de terrasse" title="banniere promotionnelle sur les lames de terrasse">
        </div>