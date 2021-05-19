

<!-- modèle header contenant le doctype, les balises ouvrantes body et html, la navbar et la banniere promotionnelle -->

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
            <div class="col-lg-8 d-none d-lg-block">
                <img class="img-fluid" src="src/img/jarditou_logo.jpg" alt="Logo Jarditou" width="180">
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <p class="text-center fs-2" >Tout le jardin</p>
            </div>
        </div>

        <div class="row" style="margin:auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">Jarditou.com</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tableau.php">Tableau</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                      </li>
                      
                    </ul>
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Votre promotion" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                  </div>
                </div>
              </nav>

        </div>

        <div class="row">
            <img src="src/img/promotion.jpg" alt="banniere promotionnelle sur les lames de terrasse">
        </div>

        <!-- fin header -->