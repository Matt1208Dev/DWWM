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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Connexion à l'espace privé</title>
</head>
<body>

<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    
        <div class="col-lg-6 ">
            <h2 class="text-center">Connexion à votre espace membre</h2>
            <form action="script_pass.php" method="POST">
            <div class="mb-3 mt-5">
                <label class="form-label" for="login">Login :</label>
                <input class="form-control" type="text" name="login" placeholder="votre email">
            </div>
            

            <div class="mb-3">
                <label class="form-label" for="pass">Pass :</label>
                <input class="form-control" type="password" name="pass">
            </div>
            <?php if (isset ($error) && $error == true){echo "<p style=\"color: red\"><strong>La connexion a échoué. Votre login et/ou mot de passe est incorrect. Veuillez réessayer.</strong></p>";}?>
            <div class=" text-center mb-3">
                <input class="btn btn-lg btn-primary" type="submit" name="submit" value="Connexion">
            </div>
            </form>
        </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>