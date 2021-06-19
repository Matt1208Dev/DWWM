<?php echo form_open(); ?>

    <input type="hidden" name="pro_id" value="<?php echo $produit->pro_id; ?>"> 

    <div class="form-group">
        <label for="pro_libelle">Libellé</label>
        <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo $produit->pro_libelle; ?>">
    </div>    

    <div class="form-group">
        <label for="pro_ref">Référence</label>
        <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo $produit->pro_ref; ?>">
    </div>    

    <button type="submit" class="btn btn-dark mt-2">Modifier</button>
    
    <a role="button" class="btn btn-danger mt-2" href="<?php echo site_url("produits/supprimer/$produit->pro_id")?>">Supprimer</a>
    
    </form>   