<?php 

Function AddUser(){

require "connexion_bdd.php";

// Déclaration des variables

$lastName = htmlspecialchars($_POST['lastName']);
$lastNameError;
$firstName = htmlspecialchars($_POST['firstName']);
$email = htmlspecialchars($_POST['email']);
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);
$user_creation_date = date('now');

try {
// Construction de la requête INSERT sans injection SQL

$requete = $db->prepare("INSERT INTO `users`(`user_lastname`, `user_firstname`, `user_email`, `user_login`, `user_password`, `user_creation_date`) VALUES (:user_lastname, :user_firstname, :user_email, :user_login, :user_password, :user_creation_date)");

$requete->bindValue(':user_lastname', $lastName, PDO::PARAM_STR);
$requete->bindValue(':user_firstname', $firstName, PDO::PARAM_STR);
$requete->bindValue(':user_email', $email, PDO::PARAM_STR);
$requete->bindValue(':user_login', $login, PDO::PARAM_STR);
$requete->bindValue(':user_password', $password, PDO::PARAM_STR);
$requete->bindValue(':user_creation_date', $user_creation_date, PDO::PARAM_STR);


$requete->execute();

// Libération de la connexion au serveur de BDD
$requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {

        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

}

?>