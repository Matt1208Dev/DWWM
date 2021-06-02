<?php 

/*Exercice 8
Ajoutez 1 mois à la date courante.*/

setlocale(LC_ALL, 'fra','fre','fr_FR','french'); // Paramètrages 'locaux', soit les français.
date_default_timezone_set("Europe/Paris"); // Paramètrage sur le fuseau horaire de Paris.
$today = strftime('%A %d %B %Y'); // Création de la date du jour en textuel français
$nextMonth = strftime('%A %d %B %Y', strtotime('+1 month')); // Génération d'une date ultérieure dont l'interval est paramétré
echo 'Nous sommes le ' . $today . '.';
echo 'Dans un mois nous serons le ' . $nextMonth . '.';

?>