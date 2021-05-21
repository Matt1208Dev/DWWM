
<?php
 /* Afin de ne pas trop mélanger le code PHP avec le HTML et améliorer la lisibilité, 
 * on peut mettre la connexion PDO en haut de la page 
 */ 
 try 
   {        
       $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage() . "<br>";
      echo "N° : " . $e->getCode();
      die("Fin du script");
}    

/* Ajoutons ici notre bloc d'exécution de la requête,
* Ainsi, elle est englobée dans le reste du code PHP
*/
$requete = "SELECT * FROM produits";
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PDO</title>
</head>
<body>
     
<?php
while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
{
   echo $produit->pro_id." – ".$produit->pro_libelle. "<br>";
}
?>

</body>
</html>