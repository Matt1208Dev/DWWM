
<h1>Liste des produits</h1>

<!-- <div class="row">
    <div class="col-12">    
        <?php  
            /* foreach ($liste as $row) 
            {
                echo"<p>".$row->pro_id."</p>";
                echo"<p>".$row->pro_ref."</p>";
                echo"<p>".$row->pro_libelle."</p>";
                echo"<p>".$row->pro_libelle."</p>";
                echo"<p>".$row->pro_description."</p>";
                     
            }*/
        ?>
    </div>
</div>

<!-- <a  href="">Ajouter un article</a> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-10 overflow-auto px-0">
        <div class="table-responsive">
            <table class="table table-bordered text-center ">
                <thead>
                    <tr class="table-secondary" style="border-bottom: 1px solid black;">
                        <th>Photos</th>
                        <th>ID</th>
                        <th>Référence</th>
                        <th>Libellé</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Couleur</th>
                        <th>Ajout</th>
                        <th>Modif</th>
                        <th>Bloqué</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                

                <?php 
            foreach ($liste as $row) 
            {   ?>
                    <tr style="border: 1px solid black; height:150px;">
                        <td class="align-middle bg-warning">
                            <img  alt="photo du produit <?= $row->pro_libelle; ?>" src="public/images/<?= $row->pro_id ?>.<?= $row->pro_photo ?>" width=140>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_id; ?>
                        </td>
                        <td class="bg-warning">
                            <?= $row->pro_ref; ?>
                        </td>
                        <td class="table-active">
                            <a class="text-uppercase text-danger" href="details.php?pro_id=<?php echo $row->pro_id ?>" title="Modifier"><strong><u><?= $row->pro_libelle; ?></u></strong></a>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_prix; ?>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_stock; ?>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_couleur; ?>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_d_ajout; ?>
                        </td>
                        <td class="table-active">
                            <?= $row->pro_d_modif; ?>
                        </td>
                        <td class="align-middle table-active">
                        <span class="badge rounded-pill bg-danger"><?php if($row->pro_bloque == 1){echo 'BLOQUE';} ?></span>
                        </td>
                        <td>
                        <?php
                        echo form_open("panier/ajouterPanier"); 
                        ?>

                        <!-- champ visible pour indiquer la quantité à commander -->
                        <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
                        <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $row->pro_prix ?>">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $row->pro_id ?>">
                        <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $row->pro_libelle ?>">
                        <input type="hidden" name="pro_stock" id="pro_libelle" value="<?= $row->pro_stock ?>">

                        <!-- Bouton 'Ajouter au panier' -->
                        <div class="form-group">
                            <input type="submit" value="Ajouter au panier" class="btn btn-success btn-sm mt-1">            
                        </div>
                        </form>
                        </td>
                    </tr> 
                <?php
            }
            ?> 

                </tbody>
            </table>

        </div>  
        </div>
        <a class="btn btn-lg btn-primary mb-4" href="<?php echo site_url("produits/ajouter") ?>" role="button" class="btn btn-secondary btn-lg btn-block">Ajouter un nouvel article</a>
    </div>
</div>