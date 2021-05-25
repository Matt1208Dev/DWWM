<?php 

/*Exercice 5
Quelle sera la prochaine année bissextile ?*/

$annee = 2021;
$bissextile = false;
While($bissextile == false){ 
    $annee += 1; // On incrémente $annee
    $bissextile = date("m-d", strtotime("$annee-02-29")) == "02-29"; // On analyse si le 29/02 de $annee est validé par la fonction date()
    }

echo "la prochaine année bissextile est $annee."

?>