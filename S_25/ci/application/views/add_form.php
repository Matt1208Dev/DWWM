


<div class="row justify-content-center">
    <div class="col-md-8 ">
        <!-- DEBUT formulaire -->
        <?php echo form_open_multipart(); ?>
        <div class="form-group">

            <!-- Champ photo -->
            <div class="mt-3">
                <label class="form-label" for="pro_photo">Photo :</label>
                <input class="form-control mt-2" type="file" name="pro_photo">
                <p class="text text-danger fw-bold"><?= isset($sUploadErrors) ? $sUploadErrors : ''; ?></p>
                
            </div>

            <!-- Champ référence -->
            <div class="mt-3">
                <label class="form-label" for="pro_ref">Référence :</label>
                <input class="form-control mt-2" type="text" name="pro_ref" value="<?php echo set_value('pro_ref'); ?>">
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_ref'); ?></p>

            <!-- Champ catégories -->
            <div class="mt-3">
                <label class="form-label" for="pro_cat_id">Catégorie :</label>
                <select class="form-select" name="pro_cat_id" value="<?php echo set_value('pro_cat_id'); ?>">
                    <option value="" <?php if (isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] == "") {
                                            echo "selected";
                                        } ?>>Choisir</option>
                    <?php

                    // Création de la requête et envoi en BDD
                    $results = $this->db->query("SELECT cat_id, cat_nom FROM categories");

                    // Récupération des résultats    
                    $aListe = $results->result();

                    // Ajoute des résultats de la requête au tableau des variables   
                    $aView["liste_produits"] = $aListe;

                    //Affichage du nom des catégories dans le select
                    foreach ($aListe as $row) {
                    ?>
                        <option value="<?php echo $row->cat_id ?>" <?php if (isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] == $row->cat_id) {
                                                                        echo "selected";
                                                                    } ?>> <?php echo $row->cat_nom ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_cat_id'); ?></p>

            <!-- Champ libellé -->
            <div class="mt-3">
                <label class="form-label" for="pro_libelle">Libellé :</label>
                <input class="form-control mt-2" type="text" name="pro_libelle" value="<?php echo set_value('pro_libelle'); ?>">
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_libelle'); ?></p>

            <!-- Champ description -->
            <div class="mt-3">
                <label class="form-label" for="pro_description">Description :</label>
                <textarea rows=5 class="form-control mt-2" type="text" name="pro_description"><?php echo set_value('pro_description'); ?></textarea>
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_description'); ?></p>

            <!-- Champ prix -->
            <div class="mt-3">
                <label class="form-label" for="pro_prix">Prix :</label>
                <input class="form-control mt-2" type="text" name="pro_prix" placeholder="ex: 14.99" value="<?php echo set_value('pro_prix'); ?>">
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_prix'); ?></p>

            <!-- Champ stock -->
            <div class="mt-3">
                <label class="form-label" for="pro_stock">Stock :</label>
                <input class="form-control mt-2" type="text" name="pro_stock" value="<?php echo set_value('pro_stock'); ?>">
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_stock'); ?></p>

            <!-- Champ couleur -->
            <div class="mt-3">
                <label class="form-label" for="pro_couleur">Couleur :</label>
                <input class="form-control mt-2" type="text" name="pro_couleur" value="<?php echo set_value('pro_couleur'); ?>">
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_couleur'); ?></p>

            <!-- Champ bloque -->
            <div class="mt-3">
                <label class="mb-2" for="pro_bloque" class="form-check-label"> Produit bloqué :</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pro_bloque" id="yes" value="1" <?php if (isset($pro_bloque) and ($pro_bloque == 1)) {
                                                                                                            echo "checked=checked";
                                                                                                        } ?>>Oui
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pro_bloque" id="no" value="NULL" <?php if (!isset($pro_bloque) || ($pro_bloque == NULL)) {
                                                                                                            echo "checked=checked";
                                                                                                        } ?>>Non
                </div>
            </div>
            <p class="text text-danger fw-bold"><?php echo form_error('pro_bloque'); ?></p>

            <!-- Champ caché avec la date du jour -->
            <div>
                <label for="pro_d_ajout"></label>
                <input class="form-control mt-2" type="hidden" name="pro_d_ajout" value="<?php echo date("Y-m-d"); ?>">
            </div>

            <!-- Bouton retour -->
            <a class="btn btn-secondary btn-lg px-3 me-3 mt-4" href="admin_home.php" role="button">Retour</a>

            <!-- Bouton enregistrer -->
            <input class="btn btn-primary btn-lg me-3 mt-4" type="submit" id="enregistrer" value="Enregistrer"></input>

            <br><br>

        </div>
        </form>
        <!-- FIN formulaire -->
    </div>
</div>