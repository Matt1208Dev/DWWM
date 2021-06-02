<?php 

/*Exercice 1
Affichez la date du jour au format mardi 2 juillet 2019.*/

setlocale(LC_ALL, 'fra','fre','fr_FR','french'); // Paramètrages 'locaux', soit les français.
date_default_timezone_set("Europe/Paris"); // Paramètrage sur le fuseau horaire de Paris.
$date = new DateTime('now'); // Date du jour
$date = strftime('%A %d %B %Y'); // Conversion en date texte française
echo 'Nous sommes le ' . $date . '.';

?>