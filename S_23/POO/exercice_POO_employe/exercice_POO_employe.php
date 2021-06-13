<?php

require 'Agence.php';
require 'Employe.php';
require 'Directeur.php';


// Données agences tests
$agence = array(

    $lyon = new Agence(1, 'Agence de Lyon', '3 rue de démo', 69000, 'Lyon', 'Restaurant d\'entreprise'),
    $bordeaux = new Agence(2, 'Agence de Bordeaux', '15 Place de la mairie', 33000, 'Bordeaux', 'Tickets Resto')

);

// Données employés tests
$employes = array(

    $Alphonse_Brown = new Employe('Brown', 'Alphonse', '01/11/2014', 'Commercial itinérant', 26, 'Commercial', $lyon, 19),
    $Chester_Bennington = new Employe('Bennington', 'Chester', '15/06/2010', 'Community Manager', 31, 'Communication', $bordeaux, [7, 9]),
    $Tom_Morello = new Employe('Morello', 'Tom', '08/04/2007', 'Responsable produit', 34, 'Marketing', $lyon, [10, 13, 17]),
    $Matthew_Bellamy = new Employe('Bellamy', 'Matthew', '18/02/2021', 'Directeur artistique', 39, 'Création', $bordeaux, null),
    $Angus_Young = new Employe('Young', 'Angus', '22/04/2001', 'Directeur financier', 41, 'Comptabilité', $bordeaux, [8, 2])

);

// Données directeurs tests
$directeur = array(

    $Dave_Grohl = new Directeur('Grohl', 'Dave', '01/11/1993', 'Directeur', 26, 'Direction', $lyon, 15),
    $Kurt_Cobain = new Directeur('Cobain', 'Kurt', '11/06/1990', 'Directeur', 26, 'Direction', $bordeaux, 11),

);

// Affichage de la prime annuelle pour chaque employé
foreach ($employes as $key=>$value) {
    $value->CalculPrimeAnnuelle();
}

foreach ($employes as $key=>$value) {
    $value->getAgenceRestau();
}

foreach ($employes as $key=>$value) {
    $value->chequeVacances();
}

foreach ($employes as $key=>$value) {
    $value->chequesNoel();
}

foreach ($directeur as $key=>$value) {
    $value->CalculPrimeAnnuelle();
}

// var_dump($Alphonse_Brown);
// var_dump($Chester_Bennington);
// var_dump($Tom_Morello);
// var_dump($Matthew_Bellamy);
// var_dump($Angus_Young);

// var_dump($Dave_Grohl);
// var_dump($Kurt_Cobain);

function nbEmployes($employes, $directeur)
    {
        echo "L'entreprise compte " . (count($employes) + count($directeur)) . " salariés.";
    }

echo nbEmployes($employes, $directeur);

function detailsEmp($employes, $directeur)
{
    $array = array_merge($employes, $directeur);
    asort($array);
    foreach($array as $key => $value)
    {
        echo "Informations de l'employé : <br> $key = $value <br>";
        var_dump($key, $value);
    }
}
?>