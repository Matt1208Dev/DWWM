<?php

// On déclare une variable dont la valeur (contenu) sera écrite dans le fichier
$myVar = "Bonjour le monde \n";

// Ouverture en écriture seule 
$fp = fopen("essai.txt", "a"); 

// Ecriture du contenu ($myVar) 
for ($i=0; $i<10; $i++){
    fputs($fp, $myVar); 
}
// Fermeture du fichier  
fclose($fp); 

// Ouverture en lecture seule  
$fp = fopen("essai.txt", "r"); 

print_r (file('essai.txt'));
echo (file_get_contents('essai.txt'));

?>