<?php include 'header.php' ?> 





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <form action="add_script.php" method="POST">
                <div class="form-group">
                    <div class="mt-3">
                        <label class="form-label" for="pro_photo">Photo :</label>
                        <input class="form-control mt-2" type="text" name="pro_photo" value="<?php if(isset($pro_photo)){echo $pro_photo;}?>" placeholder="L'ajout de photo ne sera possible qu'après création de la fiche produit" disabled>
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proPhotoError)){echo $proPhotoError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_ref">Référence :</label>
                        <input class="form-control mt-2" type="text" name="pro_ref" value="<?php if(isset($pro_ref)){echo $pro_ref;}?>" >                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proRefError)){echo $proRefError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_cat_id">Catégorie :</label>
                        <select class="form-select" name="pro_cat_id" value="<?php if(isset($pro_cat_id)){echo $pro_cat_id;}?>">
                        <option value="" selected>Choisir</option>
                        <?php
                        require 'connexion_bdd.php';
                        $requete = "SELECT cat_id, cat_nom FROM categories GROUP BY cat_id ORDER BY cat_nom";
                        $result = $db->query($requete);
                        $nbLigne = $result->rowCount(); // Nombre de lignes retournées par la requête

                            if ($nbLigne > 1) 
                            {             
                                while ($row = $result->fetch(PDO::FETCH_OBJ)) // Tant qu'il y a des lignes à afficher :
                                {
                                ?>               
                                                <option value="<? echo $row->cat_id; ?>" <?php if(isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] != "") echo"selected" ?> > <? echo $row->cat_nom; ?> </option>
                                <?php
                                };
                                
                                // Libération de la connexion au serveur de BDD
                                $result->closeCursor();
                            };
                        ?>                  
                        </select>  

                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proCatIdError)){echo $proCatIdError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_libelle">Libellé :</label>
                        <input class="form-control mt-2" type="text" name="pro_libelle" value="<?php if(isset($pro_libelle)){echo $pro_libelle;}?>" >                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proLibelleError)){echo $proLibelleError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_description">Description :</label>
                        <textarea rows=5 class="form-control mt-2" type="text" name="pro_description" ><?php if(isset($pro_description)){echo $pro_description;}?></textarea>                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proDescriptionError)){echo $proDescriptionError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_prix">Prix :</label>
                        <input class="form-control mt-2" type="text" name="pro_prix" placeholder="ex: 14.99" value="<?php if(isset($pro_prix)){echo $pro_prix;}?>" >                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proPrixError)){echo $proPrixError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_stock">Stock :</label>
                        <input class="form-control mt-2" type="text" name="pro_stock" value="<?php if(isset($pro_stock)){echo $pro_stock;}?>" >                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proStockError)){echo $proStockError;}?></p>
                    <div class="mt-3">
                        <label class="form-label" for="pro_couleur">Couleur :</label>
                        <input class="form-control mt-2" type="text" name="pro_couleur" value="<?php if(isset($pro_couleur)){echo $pro_couleur;}?>" >                     
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proCouleurError)){echo $proCouleurError;}?></p>
                    <div class="mt-3">                            
                        <label class="mb-2" for="pro_bloque" class="form-check-label"> Produit bloqué :</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_bloque" id="yes" value="1" <?php if(isset($pro_bloque) AND ($pro_bloque == 1)){echo "checked=checked";}?> >Oui
                        </div>
                        <div class="form-check form-check-inline"> 
                        <input class="form-check-input" type="radio" name="pro_bloque" id="no" value="NULL" <?php if(isset($pro_bloque) AND ($pro_bloque == NULL)){echo "checked=checked";}?>>Non
                        </div>
                    </div>
                    <p class="text text-danger fw-bold" ><?php if(isset($proBloqueError)){echo $proBloqueError;}?></p>

                    
                    <a class="btn btn-secondary btn-lg px-3 me-3 mt-4" href="index.php" role="button" >Retour</a>
                    
                    <input class="btn btn-primary btn-lg me-3 mt-4" type="submit" id="enregistrer" value="Enregistrer"></input>
                    
                    <!-- Désactivation du bouton supprimer pour réactivation ultérieure éventuelle
                    <a class="btn btn-danger btn-lg px-1 me-3 mt-4" href="delete_script.php" role="button">Supprimer</a>--> 
                    <br><br>
                
                </div>           
            </form>
        </div>    
    </div>
</div>


<?php include 'footer.php' ?> 