<?php 

/*Exercice 3
Combien reste-t-il de jours avant la fin de votre formation.*/

date_default_timezone_set("Europe/Paris"); // Paramètrage sur le fuseau horaire de Paris.
$aujourdhui = new DateTime(); // date du jour
$dateFinFormation = date_create_from_format('d/m/Y', '29/10/2021'); // la date de fin est entrée sous le format français.
$dateFinFormation -> format('Y-m-d'); // transformation au format anglais.
$joursRestants = $aujourdhui->diff($dateFinFormation); // on génère un objet DateInterval de la différence entre les deux dates.
echo 'Il reste ' . $joursRestants->format('%a jours') .' avant la fin de la formation.'; // On extrait la valeur recherchée, ici les jours.


?>