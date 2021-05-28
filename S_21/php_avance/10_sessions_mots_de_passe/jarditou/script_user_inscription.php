<pre>
<?php var_dump($_POST) ?>
</pre>


<?php

require 'functions/AddUser.php';

// Déclaration des variables

$lastName = htmlspecialchars($_POST['lastName']);
$lastNameError;
$errorCount = 0;
$firstName = htmlspecialchars($_POST['firstName']);
$email = htmlspecialchars($_POST['email']);
$emailError;
$login = htmlspecialchars($_POST['login']);
$loginError;
$password = htmlspecialchars($_POST['password']);
$passwordError;
$passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
$user_creation_date = date('now');

// Verification des champs du formulaire contact

// Verification du champ nom
if ((!isset($lastName)) || (!preg_match("/^[a-zA-Zéèïëê\-]{1,50}$/", $lastName))) {

     $errorCount += 1;
     $lastNameError = "<p style=\"color: red\"><strong>Votre nom doit être renseigné.</strong></p>";
}

// Verification du champ prénom
if (!isset($firstName) || !preg_match("/^[a-zA-Zéèïëê\-]{1,50}$/", $firstName)) {

     $errorCount += 1;
     $firstNameError = "<p style=\"color: red\"><strong>Votre prénom doit être renseigné.</strong></p>";
}

// Verification du champ email
if (!isset($email) || !preg_match("/^[0-9a-zA-Z\-_.]{1,50}@[0-9a-zA-Z\-]{1,50}.[a-zA-Z]{1,6}$/", $email)) {

     $errorCount += 1;
     $emailError = "<p style=\"color: red\"><strong>L'adresse email n'est pas renseignée.</strong></p>";
}

// Verification du champ Login
if (!isset($login) || !preg_match("/^[ 0-9a-zA-Zéèïëê\-!@#\$%\^&\*]{1,30}$/", $login)) {

    $errorCount += 1;
    $loginError = "<p style=\"color: red\"><strong>Le login n'est pas renseigné.</strong></p>";
}

// Verification du champ Password
if ((!isset($password) || !isset($passwordConfirm)) || (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/", $password) || $passwordConfirm != $password)) {

    $errorCount += 1;
    $passwordError = "<p style=\"color: red\"><strong>Saississez un mot de passe valide. Celui-ci doit comporter : au moins une majuscule, une minuscule, un chiffre, un caractère spécial et minimum 8 caractères.</strong></p>";
} 

// Verification du nombre d'erreurs. Si au moins une erreur, le formulaire est bloqué à l'envoi. Sinon, redirection vers une page confirmant la bonne transmission du formulaire.
if ($errorCount == 0) {

    AddUser();
    header("location: val_success.php");
}

require('user_inscription.php');


// FIN SCRIPT

?>