<?php

function UserCheckPass() {

    require "connexion_bdd.php";

    // Déclaration des variables 

    $login = htmlspecialchars($_POST["login"]);
    $pass = htmlspecialchars($_POST["pass"]);
    $error;
    try {
        // Requête de récupération du password hashé
        $requete = "SELECT user_password FROM users where user_login='$login'";
        $result = $db->query($requete);

    // Récupération du résultat de la requête

    $row = $result->fetch(PDO::FETCH_OBJ);
        // Libération de la connexion au serveur de BDD
    $result->closeCursor();

    }    
        
    // Gestion des erreurs
    catch (Exception $e) {
    
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
    }

    // Si la requête ne renvoi pas de résultat ou qu'il ne correspond pas à la saisie utilisateur
    if (!$row || (!password_verify($pass, $row->user_password))) {

        $error = true;
        include 'user_connection.php'; // renvoi à la page de connexion

    } else {

        header("Location: log_in_success.php"); // renvoi à la page de succès
        exit;
    }
}

?>