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
    <title>Jarditou : Espace Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

    <div class="container">
        <header>
            <div class="row justify-content-center">
                <div class="col-6 mb-5">
                    <img class="img-fluid mt-4" src="src/img/jarditou_logo.jpg" alt="Logo Jarditou">
                    <h1 class="d-flex justify-content-end" id="header-title">.Admin</h1>
                </div>
            </div>
        </header>

<div class="container-fluid d-flex align-items-center justify-content-center">
    
        <div class="col-lg-4 bg-white rounded">
            <h2 class="fs-1 text-ds text-center pt-5 text-dark">Espace Admin</h2>
            <form action="script_admin_connection.php" method="POST">
                <div class="mb-3 mt-5 px-5">
                    <label class="form-label text-dark text-ds fs-5" for="login">Identifiant :</label>
                    <input class="form-control" type="text" name="login" placeholder="name@example.com">
                </div>
            

                <div class="mb-3 px-5">
                    <label class="form-label text-dark text-ds fs-5" for="pass">Mot de passe :</label>
                    <input class="form-control" type="password" name="pass">
                </div>
                <div class="mb-3 px-5">
                <?php if (isset ($error) && $error == true){echo "<p class=\"bold text-danger\"><strong>La connexion a échoué. Votre login et/ou mot de passe est incorrect. Veuillez réessayer.</strong></p>";}?>
                </div>
                <div class="mb-3 px-5">
                    <a href="#" class="text-success text-decoration-none">Mot de passe oublié ?</a>
                </div>
                <div class=" text-center mb-3 pt-2 pb-5 d-grid gap-2 px-5">
                    <input class="btn btn-lg btn-success button-grad" type="submit" name="submit" value="Valider">
                    <a class="btn btn-secondary btn-lg" href="index.php" role="button" >Retour</a>
                </div>
            </form>
        </div>
    
</div>

<?php include 'admin_footer.php' ?> 