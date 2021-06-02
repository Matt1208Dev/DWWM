<?php 
    session_start();
    $id_session = session_id();
    if ($_SESSION["acces"] != "OK") {
        header("Location:index.php");
    }
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