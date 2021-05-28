<?php include 'header.php' ?> 



<?php


try {

    
    // Récupération de l'identifiant concerné, passé en GET
    $pro_id=$_GET['pro_id'];
    include 'connexion_bdd.php';
    $requete = "SELECT * FROM produits where pro_id=".$pro_id;
    $result = $db->query($requete);

    // Récupération du résultat de la requête

    $row = $result->fetch(PDO::FETCH_OBJ);

    // Libération de la connexion au serveur de BDD
$result->closeCursor();
}

catch (Exception $e) {

    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <form action="update_script.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input id="prod_id" name="pro_id" type="hidden" value="<?php echo $pro_id; ?>">
                    <div class="mt-3">
                       <!-- <label class="form-label" for="pro_photo">Photo :</label>
                        <input class="form-control mt-2" type="text" name="pro_photo" value="<?php //echo $row->pro_photo ?>" > -->
                        <label class="form-label" for="img-aramis">Ajouter/remplacer la photo de l'article :<br>ATTENTION : toute nouvelle image écrasera la précédente.</label>
                        <input class="form-control mt-2" type="file" id="pro_photo" name="pro_photo" value="<?php if(isset($row->pro_photo)){echo $row->pro_photo;}?>"><?php if(isset($row->pro_photo)){echo $row->pro_photo;}?>
                        <p class="my-3">Photo actuelle du produit :</p>
                        <img  alt="photo du produit <?= $row->pro_libelle; ?>" src="public/images/<?= $row->pro_id ?>.<?= $row->pro_photo ?>" width=140>

                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_ref">Référence :</label>
                        <input class="form-control mt-2" type="text" name="pro_ref" value="<?php echo $row->pro_ref ?>" >                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_cat_id">Catégorie :</label>
                        <input class="form-control mt-2" type="text" name="pro_cat_id" value="<?php echo $row->pro_cat_id ?>" >                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_libelle">Libellé :</label>
                        <input class="form-control mt-2" type="text" name="pro_libelle" value="<?php echo $row->pro_libelle ?>" >                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_description">Description :</label>
                        <textarea rows=5 class="form-control mt-2" type="text" name="pro_description" ><?php echo $row->pro_description ?></textarea>                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_prix">Prix :</label>
                        <input class="form-control mt-2" type="text" name="pro_prix" value="<?php echo $row->pro_prix ?>" >                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_stock">Stock :</label>
                        <input class="form-control mt-2" type="text" name="pro_stock" value="<?php echo $row->pro_stock ?>" >                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_couleur">Couleur :</label>
                        <input class="form-control mt-2" type="text" name="pro_couleur" value="<?php echo $row->pro_couleur ?>" >                     
                    </div>
                    <div class="mt-3">                            
                        <label class="mb-2" for="pro_bloque" class="form-check-label"> Produit bloqué :</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_bloque" id="yes" value="1" <?php if ($row->pro_bloque == 1){echo 'checked=checked';}?>>Oui
                        </div>
                        <div class="form-check form-check-inline"> 
                        <input class="form-check-input" type="radio" name="pro_bloque" id="no" value="NULL" <?php if (($row->pro_bloque == NULL)||($row->pro_bloque == 0)) {echo "checked=checked";}?>>Non
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_d_ajout">Date d'ajout :</label>
                        <input class="form-control mt-2" type="text" name="pro_d_ajout" value="<?php echo $row->pro_d_ajout ?>" disabled>                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_d_modif">Date de modification :</label>
                        <input class="form-control mt-2" type="text" name="pro_d_modif" value="<?php if ($row->pro_d_modif == NULL){echo '';} ?>" placeholder="Sera mis à jour automatiquement" disabled>                     
                    </div>

                    
                    <a class="btn btn-secondary btn-lg px-3 me-3 mt-4" href="index.php" role="button" >Retour</a>
                    <input class="btn btn-primary btn-lg me-3 mt-4" type="submit" value="Enregistrer les modifications"></input>
                    <!-- Désactivation du bouton supprimer pour réactivation ultérieure éventuelle
                    <a class="btn btn-danger btn-lg px-1 me-3 mt-4" href="delete_script.php" role="button">Supprimer</a>--> 
                    <br><br>
                
                </div>           
            </form>
        </div>    
    </div>
</div>


<?php include 'footer.php' ?> 