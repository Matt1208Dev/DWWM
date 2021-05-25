<?php 

/*Exercice 6
Montrez que la date du 17/17/2019 est erronée.*/

$date = '17/17/2019'; // date à tester au format français
$arrayDate = explode('/', $date); // On éclate la string en tableau
$day = $arrayDate[0];
$month = $arrayDate[1];
$year = $arrayDate[2];
$checkDate = checkdate($month, $day, $year); // On utilise chaque valeur individuellement pour vérifier la date avec checkdate()
if ($checkDate == false) {
    echo "La date $date saisie est invalide !";
} else {
    echo "La date $date saisie est valide !";
}

?>