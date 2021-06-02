<?php 

/*Exercice 4
Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime().*/

date_default_timezone_set("Europe/Paris"); // Paramètrage sur le fuseau horaire de Paris.
$aujourdhui = time(); // heure courante en timestamp
$dateFinFormation = mktime(0, 0, 0, 10, 29, 2021); // Conversion de la date de fin en timestamp
$joursRestants = ceil(($dateFinFormation - $aujourdhui)/(60*60*24)); // Différence rationalisée à la journée puis arrondit à l'entier supérieur
echo 'Il reste ' . $joursRestants .' jours avant la fin de la formation.'; // On affiche le résultat.

?>