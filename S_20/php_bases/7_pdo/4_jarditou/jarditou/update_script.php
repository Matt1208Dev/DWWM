<?php



@$pro_id = htmlspecialchars($_POST['pro_id']);
@$pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
@$pro_ref = htmlspecialchars($_POST['pro_ref']);
@$pro_libelle = htmlspecialchars($_POST['pro_libelle']);
@$pro_description = htmlspecialchars($_POST['pro_description']);
@$pro_prix = htmlspecialchars($_POST['pro_prix']);
@$pro_stock = htmlspecialchars($_POST['pro_stock']);
@$pro_couleur = htmlspecialchars($_POST['pro_couleur']);
@$pro_photo = htmlspecialchars($_POST['pro_photo']);
@$pro_d_ajout = "";
@$pro_d_modif = date('Y-m-d h:i:s');
@$pro_bloque = htmlspecialchars($_POST['pro_bloque']);


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $counterror = 0;
    /* if ((!isset($pro_photo))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_photo)))
    {
        $proPhotoError = 'Entrez l\'extension de fichier.';
        $counterror++;
    } */ 

    if (!isset($_FILES['pro_photo']))
    {
        
    }
    elseif (isset($_FILES['pro_photo']) AND $_FILES['pro_photo']['error'] == 0)
    {
        $infosfichier = pathinfo($_FILES['pro_photo']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            $prod_name = 'pro_id' . '_' . $pro_id ;
            move_uploaded_file($_FILES['pro_photo']['tmp_name'], 'public/images/' . $prod_name . '.' . $extension_upload);
            $pro_photo = 'public/images/' . $prod_name . '.' . $extension_upload;
        }
    }

    var_dump($pro_photo);
    
    if ((!isset($pro_ref))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_ref)))
    {
        $proRefError = 'Entrez la référence.';
        $counterror++;
    }

    if ((!isset($pro_cat_id)) || $pro_cat_id == '')
    {
        $proCatIdError = 'Aucune catégorie sélectionnée.';
        $counterror++;
    }
    
    if ((!isset($pro_libelle)) || (!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/', $pro_libelle)))
    {
        $proLibelleError = 'Entrez le libellé de l\'article.';
        $counterror++;
    }
    
    if ((!isset($pro_description))||(!preg_match('/[0-9]*[a-zA-Z0-9éèàêëäï\\-\\ ]{1,200}/', $pro_description)))
    {
        $proDescriptionError = 'Entrez une description du produit.';
        $counterror++;
    }
    
    if ((!isset($pro_prix))||(!preg_match('/[0-9]{1,5}[.][0-9]{2}/', $pro_prix)))
    {
        $proPrixError = 'Entrez le prix de l\'article.';
        $counterror++;
    }
    
    if ((!isset($pro_stock))||(!preg_match('/[0-9]{1,5}/', $pro_stock)))
    {
        $proStockError = 'Entrez la quantité en stock.';
        $counterror++;
    }
    
    if ((!isset($pro_couleur))||(!preg_match('/[a-zA-Zéèàêëäï\\-\\ ]{1,20}/', $pro_couleur)))
    {
        $proCouleurError = 'Entrez la couleur.';
        $counterror++;
    }

    if ((!isset($pro_bloque)))
    {
        $proBloqueError = 'Veuillez cocher un champ.';
        $counterror++;
    }
    
    if ($counterror == 0)
    {
        /*  require 'functions/SetProduct.php';
            SetProduct(); */
        
        require "connexion_bdd.php";

        try {
        // Construction de la requête UPDATE sans injection SQL
        
        $requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_photo=:pro_photo, /*pro_d_ajout=:pro_d_ajout ,*/ pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id");
        
        $requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
        $requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $requete->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        //$requete->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);
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

    } 
    else
    {
        include 'update_form.php';
        
    }
}


?>