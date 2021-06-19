<?php

require 'classes/Agence.class.php';
require 'classes/Employe.class.php';
require 'classes/Directeur.class.php';


// Données agences tests
$lyon = new Agence();
$lyon->setNom('Agence de Lyon'); 
$lyon->setAdresse('3 rue de démo'); 
$lyon->setCodePostal('69000');
$lyon->setVille('Lyon'); 
$lyon->setModeRestauration(true);

$bordeaux = new Agence();
$bordeaux->setNom('Agence de bordeaux'); 
$bordeaux->setAdresse('15 Place de la mairie'); 
$bordeaux->setCodePostal('33000');
$bordeaux->setVille('bordeaux'); 
$bordeaux->setModeRestauration(false);

$agences = array($lyon, $bordeaux);

// Données employés tests
$Alphonse_Brown = new Employe();
$Alphonse_Brown->setNom('Brown');
$Alphonse_Brown->setPrenom('Alphonse'); 
$Alphonse_Brown->setDateEmbauche('01/11/2014'); 
$Alphonse_Brown->setFonction('Commercial itinérant'); 
$Alphonse_Brown->setSalaire(26); 
$Alphonse_Brown->setService('Commercial'); 
$Alphonse_Brown->setAgence($lyon); 
$Alphonse_Brown->setEnfant(19);

$Chester_Bennington = new Employe();
$Chester_Bennington->setNom('Bennington');
$Chester_Bennington->setPrenom('Chester'); 
$Chester_Bennington->setDateEmbauche('15/06/2010'); 
$Chester_Bennington->setFonction('Community Manager'); 
$Chester_Bennington->setSalaire(31); 
$Chester_Bennington->setService('Communication'); 
$Chester_Bennington->setAgence($bordeaux); 
$Chester_Bennington->setEnfant([7, 9]);

$Tom_Morello = new Employe();
$Tom_Morello->setNom('Morello');
$Tom_Morello->setPrenom('Tom'); 
$Tom_Morello->setDateEmbauche('08/04/2007'); 
$Tom_Morello->setFonction('Responsable produit'); 
$Tom_Morello->setSalaire(34); 
$Tom_Morello->setService('Marketing'); 
$Tom_Morello->setAgence($lyon); 
$Tom_Morello->setEnfant([10, 13, 17]);

$Matthew_Bellamy = new Employe();
$Matthew_Bellamy->setNom('Bellamy');
$Matthew_Bellamy->setPrenom('Matthew'); 
$Matthew_Bellamy->setDateEmbauche('18/02/2021'); 
$Matthew_Bellamy->setFonction('Directeur artistique'); 
$Matthew_Bellamy->setSalaire(39); 
$Matthew_Bellamy->setService('Création'); 
$Matthew_Bellamy->setAgence($bordeaux); 
$Matthew_Bellamy->setEnfant(null);

$Angus_Young = new Employe();
$Angus_Young->setNom('Young');
$Angus_Young->setPrenom('Angus'); 
$Angus_Young->setDateEmbauche('22/04/2001'); 
$Angus_Young->setFonction('Directeur financier'); 
$Angus_Young->setSalaire(41); 
$Angus_Young->setService('Comptabilité'); 
$Angus_Young->setAgence($bordeaux); 
$Angus_Young->setEnfant([8, 2]);

$employes = array($Alphonse_Brown, $Chester_Bennington, $Tom_Morello, $Matthew_Bellamy, $Angus_Young);

    
// Données directeurs tests
$Dave_Grohl = new Directeur();
$Dave_Grohl->setNom('Grohl');
$Dave_Grohl->setPrenom('Dave'); 
$Dave_Grohl->setDateEmbauche('01/11/1993'); 
$Dave_Grohl->setFonction('Directeur'); 
$Dave_Grohl->setSalaire(31); 
$Dave_Grohl->setService('Direction'); 
$Dave_Grohl->setAgence($lyon); 
$Dave_Grohl->setEnfant(15);

$Kurt_Cobain = new Directeur();
$Kurt_Cobain->setNom('Cobain');
$Kurt_Cobain->setPrenom('Kurt'); 
$Kurt_Cobain->setDateEmbauche('11/06/1990'); 
$Kurt_Cobain->setFonction('Directeur'); 
$Kurt_Cobain->setSalaire(26); 
$Kurt_Cobain->setService('Direction'); 
$Kurt_Cobain->setAgence($bordeaux); 
$Kurt_Cobain->setEnfant(11);

$directeur = array($Dave_Grohl, $Kurt_Cobain);


// Affichage de la prime annuelle pour chaque employé
foreach ($employes as $key=>$value) {
    $value->CalculerPrime();
}

// Eligibilité chèques vacances
foreach ($employes as $key=>$value) {
    $value->isChequeVacance();
}

// Calcul chèques Noël
foreach ($employes as $key=>$value) {
    $value->chequesNoel();
}

// Calcul Prime annuelle des directeurs
foreach ($directeur as $key=>$value) {
    $value->CalculerPrime();
}

// Calcul nombres d'employés
function nbEmployes($employes, $directeur)
    {
        echo "<br>L'entreprise compte " . (count($employes) + count($directeur)) . " salariés.";
    }

echo nbEmployes($employes, $directeur);

