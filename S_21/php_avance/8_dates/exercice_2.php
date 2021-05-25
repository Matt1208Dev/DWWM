<?php 

/*Exercice 2
Trouvez le numéro de semaine de la date suivante : 14/07/2019.*/

$date = '14/07/2019'; // la date de fin est entrée sous le format français.
$week = date_create_from_format('d/m/Y', $date); // On crée l'objet dateTime en lui précisant le format et le contenu.
$week = date_format($week, 'Y-m-d'); // Transformation au format anglais.
$week = date('W',strtotime($week)); // Conversion en timestamp de $week puis reconversion en semaine (W).
echo "le $date, nous étions en semaine $week."

?>