<?php

function InsertProduct()
{
    $pro_id = htmlspecialchars($_POST['pro_id']);
    $pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
    $pro_ref = htmlspecialchars($_POST['pro_ref']);
    $pro_libelle = htmlspecialchars($_POST['pro_libelle']);
    $pro_description = htmlspecialchars($_POST['pro_description']);
    $pro_prix = htmlspecialchars($_POST['pro_prix']);
    $pro_stock = htmlspecialchars($_POST['pro_stock']);
    $pro_couleur = htmlspecialchars($_POST['pro_couleur']);
    $pro_photo = htmlspecialchars($_POST['pro_photo']);
    $pro_d_ajout = date('Y-m-d');
    $pro_d_modif = NULL;
    $pro_bloque = htmlspecialchars($_POST['pro_bloque']);
    
    require "connexion_bdd.php";

try {
// Construction de la requête INSERT sans injection SQL

$requete = $db->prepare("INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque) VALUES (:pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_d_ajout, :pro_d_modif, :pro_bloque)");

$requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
$requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
$requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
$requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
$requete->bindValue(':pro_photo', $pro_path, PDO::PARAM_STR);
$requete->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);
$requete->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);
$requete->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);

$requete->execute();

// Libération de la connexion au serveur de BDD
$requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {

        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

// Redirection vers la page index.php
header("Location: index.php");
exit;

};

?>