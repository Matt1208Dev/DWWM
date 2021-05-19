
<?php

// Déclaration des variables

$lastName = htmlspecialchars($_POST['lastName']);
$lastNameError;
$errorCount = 0;
$firstName = htmlspecialchars($_POST['firstName']);
$sex = htmlspecialchars($_POST['sex']);
$arrSex = array('Féminin', 'Masculin');
$birthDate = new DateTime($_POST['birthDate']);
$birthDateStr = $birthDate -> format('Y-m-d');
$today = new DateTime();
$majority = $today -> sub(new DateInterval('P18Y'));
$postalcode = htmlspecialchars($_POST['postalcode']);
$postalcodeError;
$address = htmlspecialchars($_POST['address']);
$addressError;
$town = htmlspecialchars($_POST['town']);
$townError;
$email = htmlspecialchars($_POST['email']);
$emailError;
$subject = htmlspecialchars($_POST['subject']);
$subjectError;
$question = htmlspecialchars($_POST['question']);
$questionError;
$accept = htmlspecialchars($_POST['accept']);
$acceptError;

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

// Verification du champ sexe
if (!isset($sex) || !in_array($sex, $arrSex)) {

     $errorCount += 1;
     $sexError = "<p style=\"color: red\"><strong>Votre sexe doit être renseigné.</strong></p>";
}

// Verification du champ Date de naissance/majorité
if (!isset($birthDate) || $birthDate > $majority) {

     $errorCount += 1;
     $birthDateError = "<p style=\"color: red\"><strong>Vous devez être majeur pour envoyer ce formulaire.</strong></p>";
}

// Verification du champ code postal
if (!isset($postalcode) || !preg_match("/^[0-9]{5}$/", $postalcode)) {

     $errorCount += 1;
     $postalcodeError = "<p style=\"color: red\"><strong>Le code postal doit être renseigné.</strong></p>";
}

// Verification du champ adresse
if (!isset($address) || !preg_match("/^[ 0-9a-zA-Zéèïëê\-]{1,150}$/", $address)) {

     $errorCount += 1;
     $addressError = "<p style=\"color: red\"><strong>L'adresse doit être renseignée.</strong></p>";
}

// Verification du champ ville
if (!isset($town) || !preg_match("/^[ 0-9a-zA-Zéèïëê\-]{1,50}$/", $town)) {

     $errorCount += 1;
     $townError = "<p style=\"color: red\"><strong>La ville doit être renseignée.</strong></p>";
}

// Verification du champ email
if (!isset($email) || !preg_match("/^[0-9a-zA-Z\-_.]{1,50}@[0-9a-zA-Z\-]{1,50}.[a-zA-Z]{1,6}$/", $email)) {

     $errorCount += 1;
     $emailError = "<p style=\"color: red\"><strong>L'adresse email doit être renseignée.</strong></p>";
}

// Verification du champ subject
if (!isset($subject) || $subject == "") {

     $errorCount += 1;
     $subjectError = "<p style=\"color: red\"><strong>Selectionnez le sujet de votre demande.</strong></p>";
}
else if (isset($subject) || $subject != "Mes commandes"){

     $subjectError = "";

}

// Verification du champ question
if (!isset($question) || !preg_match("/^[ \?.a-zA-Zéèïëêà\-']{1,150}$/", $question)) {

     $errorCount += 1;
     $questionError = "<p style=\"color: red\"><strong>Vous n'avez pas écrit votre question.</strong></p>";
}

// Verification du champ accept
if (!isset($accept) || $accept != "ok") {

     $errorCount += 1;
     $acceptError = "<p style=\"color: red\"><strong>Vous devez accepter le traitement informatique pour envoyer le formulaire.</strong></p>";
}

// Verification du nombre d'erreurs. Si au moins une erreur, le formulaire est bloqué à l'envoi. Sinon, redirection vers une page confirmant la bonne transmission du formulaire.
if ($errorCount == 0) {

     header("location: val_success.php");
}

require('contact.php');


// FIN SCRIPT

?>