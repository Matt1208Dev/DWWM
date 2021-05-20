<?php

// Déclaration des variables

@$pro_id = htmlspecialchars($_POST['pro_id']);
@$pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
@$pro_ref = htmlspecialchars($_POST['pro_ref']);
@$pro_libelle = htmlspecialchars($_POST['pro_libelle']);
@$pro_description = htmlspecialchars($_POST['pro_description']);
@$pro_prix = htmlspecialchars($_POST['pro_prix']);
@$pro_stock = htmlspecialchars($_POST['pro_stock']);
@$pro_couleur = htmlspecialchars($_POST['pro_couleur']);
@$pro_photo = htmlspecialchars($_POST['pro_photo']);
@$pro_d_ajout = htmlspecialchars($_POST['pro_d_ajout']);
@$pro_d_modif = htmlspecialchars($_POST['pro_d_modif']);
@$pro_bloque = htmlspecialchars($_POST['pro_bloque']);
@$pro_path = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $counterror = 0;
    /* if ((!isset($pro_photo))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_photo)))
    {
        $proPhotoError = 'Entrez l\'extension de fichier.';
        $counterror++;
    } */
    
    // Contrôle champ référence
    if ((!isset($pro_ref))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_ref)))
    {
        $proRefError = 'Entrez la référence.';
        $counterror++;
    }

    // Contrôle champ catégorie
    if ((!isset($pro_cat_id)) || $pro_cat_id == '')
    {
        $proCatIdError = 'Aucune catégorie sélectionnée.';
        $counterror++;
    }
    
    // Contrôle champ libellé
    if ((!isset($pro_libelle)) || (!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_libelle)))
    {
        $proLibelleError = 'Entrez le libellé de l\'article.';
        $counterror++;
    }
    
    // Contrôle champ description
    if ((!isset($pro_description))||(!preg_match('/[0-9]*[a-zA-Z0-9éèàêëäï\\-\\ ]{1,200}/', $pro_description)))
    {
        $proDescriptionError = 'Entrez une description du produit.';
        $counterror++;
    }
    
    // Contrôle champ prix
    if ((!isset($pro_prix))||(!preg_match('/[0-9]{1,5}[.][0-9]{2}/', $pro_prix)))
    {
        $proPrixError = 'Entrez le prix de l\'article.';
        $counterror++;
    }
    
    // Contrôle champ stock
    if ((!isset($pro_stock))||(!preg_match('/[0-9]{1,5}/', $pro_stock)))
    {
        $proStockError = 'Entrez la quantité en stock.';
        $counterror++;
    }
    
    // Contrôle champ couleur
    if ((!isset($pro_couleur))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,20}/', $pro_couleur)))
    {
        $proCouleurError = 'Entrez la couleur.';
        $counterror++;
    }

    // Contrôle champ bloque
    if (((!isset($pro_bloque)))||($pro_bloque == ''))
    {
        $proBloqueError = 'Veuillez cocher un champ.';
        $counterror++;
    }
    
    if ($counterror == 0)
    {
        require 'functions/InsertProduct.php';
        InsertProduct();
    } 
    else
    {
        include 'produits_ajout.php';
 
    }
}

?>