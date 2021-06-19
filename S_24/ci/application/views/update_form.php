<?php var_dump($produit); ?>
<?php var_dump($_POST); ?>

    <div class="row justify-content-center">
        <div class="col-md-8 bg-white rounded">
        <?php echo form_open(); ?>
                <div class="form-group">
                <input id="prod_id" name="pro_id" type="hidden" value="<?php echo $produit->pro_id; ?>">
                    <div class="mt-3">
                        <!-- <label class="form-label" for="pro_photo">Photo :</label>
                        <input class="form-control mt-2" type="text" name="pro_photo" value="<?php //echo $row->pro_photo ?>" > -->
                        <p class="my-3">Photo actuelle du produit :</p>
                        <img  alt="photo du produit <?php echo $produit->pro_libelle; ?>" src="<?php echo base_url('/assets/images/')?><?php echo $produit->pro_id?>.<?php echo $produit->pro_photo; ?>" width=140><br>
                        <label class="form-label" for="img-aramis">Ajouter/remplacer la photo de l'article :<br>ATTENTION : toute nouvelle image écrasera la précédente.</label>
                        <input class="form-control mt-2" type="file" id="pro_photo" name="pro_photo" value="<?php echo set_value('pro_photo', $produit->pro_photo);?>">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_ref">Référence :</label>
                        <input class="form-control mt-2" type="text" name="pro_ref" value="<?php echo set_value('pro_ref', $produit->pro_ref);?>" >
                        <?php echo form_error('pro_ref'); ?>                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_cat_id">Catégorie :</label>
                        <input class="form-control mt-2" type="text" name="pro_cat_id" value="<?php echo set_value('pro_cat_id', $produit->pro_cat_id);?>" >    
                        <?php echo form_error('pro_cat_id'); ?>                 
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_libelle">Libellé :</label>
                        <input class="form-control mt-2" type="text" name="pro_libelle" value="<?php echo set_value('pro_libelle', $produit->pro_libelle);?>" > 
                        <?php echo form_error('pro_libelle'); ?>                    
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_description">Description :</label>
                        <textarea rows=5 class="form-control mt-2" type="text" name="pro_description" ><?php echo set_value('pro_description', $produit->pro_description);?></textarea> 
                        <?php echo form_error('pro_description'); ?>                    
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_prix">Prix :</label>
                        <input class="form-control mt-2" type="text" name="pro_prix" value="<?php echo set_value('pro_prix', $produit->pro_prix);?>" > 
                        <?php echo form_error('pro_prix'); ?>                    
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_stock">Stock :</label>
                        <input class="form-control mt-2" type="text" name="pro_stock" value="<?php echo set_value('pro_stock', $produit->pro_stock);?>" > 
                        <?php echo form_error('pro_stock'); ?>                    
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_couleur">Couleur :</label>
                        <input class="form-control mt-2" type="text" name="pro_couleur" value="<?php echo set_value('pro_couleur', $produit->pro_couleur);?>" >
                        <?php echo form_error('pro_couleur'); ?>                     
                    </div>
                    <div class="mt-3">                            
                        <label class="mb-2" for="pro_bloque" class="form-check-label"> Produit bloqué :</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_bloque" id="yes" value="1" <?php if ($produit->pro_bloque == 1){echo 'checked=checked';}?>>Oui
                        </div>
                        <div class="form-check form-check-inline"> 
                        <input class="form-check-input" type="radio" name="pro_bloque" id="no" value="NULL" <?php if (($produit->pro_bloque == NULL)||($produit->pro_bloque == 0)) {echo "checked=checked";}?>>Non
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_d_ajout">Date d'ajout :</label>
                        <input class="form-control mt-2" type="text" name="pro_d_ajout" value="<?php echo $produit->pro_d_ajout; ?>" disabled>                     
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="pro_d_modif">Date de modification :</label>
                        <input class="form-control mt-2" type="text" name="pro_d_modif" value="<?php echo set_value(date('Y-m-d h:i:s'), $produit->pro_d_modif);?>" placeholder="Sera mis à jour automatiquement" disabled>                     
                    </div>

                    
                    <a class="btn btn-secondary btn-lg px-3 me-3 mt-4" href="admin_home.php" role="button" >Retour</a>
                    <input class="btn btn-primary btn-lg me-3 mt-4" type="submit" value="Enregistrer les modifications"></input>

                    <br><br>
                
                </div>           
            </form>
        </div>    
    </div>
