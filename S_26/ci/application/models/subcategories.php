<?php 
header('Access-Control-Allow-Origin: *');  

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=jarditou;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));   
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$categorie = $_GET['cat_parent'];

$requete = "SELECT * FROM categories WHERE cat_parent = $categorie";
$result = $db->query($requete);

$SubCategories = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($SubCategories);

$result->closeCursor();

?>