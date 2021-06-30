<?php 
header('Access-Control-Allow-Origin: http://localhost/ajax/exemple_2');  

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=ajax_regions;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));   
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$requete = "SELECT * FROM regions";
$result = $db->query($requete);

$produits = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($produits);

$result->closeCursor();

?>