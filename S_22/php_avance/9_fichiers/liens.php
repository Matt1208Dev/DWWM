<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liens</title>
</head>
<body>
<pre>
<?php

var_dump($_SESSION);

?>
</pre>

<h1>Liste de liens</h1>

<?php
// Ouverture en lecture seule  
$fp = fopen("ListeLiens.txt", "r"); 

// Boucle jusqu'à la fin du fichier
while (!feof($fp)) 
{ 
    // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
    $ligne = fgets($fp, 4096); 
    echo "<a href='$ligne'>$ligne<br>"; 
} 

?>
    
</body>
</html>