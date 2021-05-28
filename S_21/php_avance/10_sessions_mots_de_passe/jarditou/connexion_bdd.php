<?php

    //Tente de se connecter
    try 
{
    //Instanciation de la connexion à la base
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=jarditou", "root", ""); 

    // Configure des attributs PDO ATTR_ERRORMODE pour l'affichage des exceptions.
       
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

    //Si échec de la connexion (du try), on attrape l'exception avec catch
catch (Exception $e) 
{
    // On affiche le message et le code de l'erreur
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
    //Le script s'arrête ici.
}

?>