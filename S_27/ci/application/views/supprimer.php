
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
        <?php echo form_open(); ?>

            <div class="form-group ">
                <input type="hidden" name="pro_id" value="<?php echo $produit->pro_id; ?>"> 

                <div class="mt-3 d-flex justify-content-center">                   
                    <img src="<?php echo base_url("assets/images/$produit->pro_id.$produit->pro_photo ")?>" alt="" srcset="" width= 300>
                </div>

                <div class="form-group">
                    <label for="pro_libelle">Libellé</label>
                    <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo $produit->pro_libelle; ?>" disabled>
                </div>    

                <div class="form-group">
                    <label for="pro_ref">Référence</label>
                    <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo $produit->pro_ref; ?>" disabled>
                </div>

                <div class="mt-2">
                <p>Êtes-vous sûr de vouloir supprimer le produit ? Cette action est irréversible.</p>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="ok" name="confirm" id="confirm" <?php if(isset($_POST['confirm'])){echo "checked=checked";}?>>
                <label class="form-check-label" for="confirm">
                Je confirme la suppression
                </label>
                </div>
            </div>
        <?php echo form_error('confirm'); ?>

            <button type="submit" class="btn btn-danger mt-2" value="delete">Supprimer</button>
            <a class="btn btn-dark mt-2" href="<?php echo site_url("produits/modifier/$produit->pro_id")?>" role="button" >Annuler</a>  
            </form>  
        </div> 
    </div> 
</div> 