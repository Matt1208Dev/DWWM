<?php 

/*Exercice 7
Affichez l'heure courante sous cette forme : 11h25.*/

date_default_timezone_set("Europe/Paris"); // Paramètrage sur le fuseau horaire de Paris.
$heureCourante = date('H\hi');
echo "Il est $heureCourante.";

?>