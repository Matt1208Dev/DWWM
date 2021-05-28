<?php

function SetProduct()
{
    $pro_id = htmlspecialchars($_POST['pro_id']);
    $pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
    $pro_ref = htmlspecialchars($_POST['pro_ref']);
    $pro_libelle = htmlspecialchars($_POST['pro_libelle']);
    $pro_description = htmlspecialchars($_POST['pro_description']);
    $pro_prix = htmlspecialchars($_POST['pro_prix']);
    $pro_stock = htmlspecialchars($_POST['pro_stock']);
    $pro_couleur = htmlspecialchars($_POST['pro_couleur']);
    // $pro_photo = htmlspecialchars($_POST['pro_photo']);
    $pro_d_ajout = "";
    $pro_d_modif = date('Y-m-d h:i:s');
    $pro_bloque = htmlspecialchars($_POST['pro_bloque']);
    
    require "connexion_bdd.php";

    if (isset($_FILES['pro_photo']) AND $_FILES['pro_photo']['error'] == 0) {

    try {
    // Construction de la requête UPDATE sans injection SQL

    $requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id");

    $requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
    $requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
    $requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
    $requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
    $requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
    $requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
    $requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
    $requete->bindValue(':pro_photo', $extension_upload, PDO::PARAM_STR);
    $requete->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);
    $requete->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);
    $requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);

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

    

} else {

    try {
        // Construction de la requête UPDATE sans injection SQL
    
        $requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id");
    
        $requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
        $requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $requete->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);
        $requete->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);
        $requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
    
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

}

?>