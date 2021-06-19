<?php
// var_dump($this->session->panier);
// var_dump($_POST);
?>
<h1 class="my-4">Mon panier</h1>

<?php 
// Si le panier n'existe pas encore  
if ($this->session->panier != null) 
{ 
?>
    <div class="row"> <!-- Début Tableau Mon Panier-->
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="table-secondary" style="border-bottom: 1px solid black;">
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>&nbsp;</th> 
                        </tr>   
                    </thead>

                    <tbody>
                    <?php 
                        $iTotal = 0;
                        $iTotalGlobal = 0;
                        foreach($this->session->panier as $row)
                        {   
                            
                             
                            $iTotal = number_format($row['pro_prix'] * $row['pro_qte'], 2, '.', ' ');
                            $iTotalGlobal = $iTotalGlobal + $iTotal;
                            ?>
                            <tr>
                        
                                <td class="col-xl-4 align-middle"> <?php echo $row['pro_libelle'] ;?> </td>
                                <td class="col-xl-3 align-middle"> <?php echo $row['pro_prix'] ;?> </td>

                                <td class="col-xl-2 align-middle"> 
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                    <?php // Ouverture formulaire pour modification quantité pour chaque ligne produit
                                    echo form_open('Panier/modifierQuantite'); ?>
                                    <!-- J'intègre des champs cachés qui transmettront les infos nécessaires à la restauration des lignes panier après traitement -->
                                    <input type="hidden" name="pro_id" id="pro_id" value="<?= $row['pro_id'] ?>">
                                    <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $row['pro_prix'] ?>">
                                    <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $row['pro_libelle'] ?>">
                                    <input type="hidden" name="pro_stock" id="pro_libelle" value="<?= $row['pro_stock'] ?>">
                                    <input class="form-control" type="number" name="pro_qte" size="2" id="pro_qte" value="<?php echo $row['pro_qte']; ?>">
                                    <!-- <select name="pro_qte" id="pro_qte">
                                    <?php  // for ($i=1; $i <= $row['pro_stock']; $i++)
                                            {  
                                                
                                                ?>
                                                <option value="<?php //echo $i; ?>" <?php // if ($i == $row['pro_qte']){echo "selected";} ?> > <?php echo $i; ?> </option>
                                                <?php
                                            }
                                                ?>
                                    </select> -->

                                    <!-- bouton Recalculer /  -->
                                    <button class="btn d-inline-block" type="submit" title="Recalculer"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="table-warning bi bi-arrow-clockwise d-flex d-inline-block" viewBox="-5 -3 20 20">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg></button>
                                    </div>
                                </td> 
                                </form>

                                <td class="col-xl-2 align-middle"> <?php echo $iTotal ;?> </td>
                                <td class="col-xl-2 align-middle">

                                <!-- Ouverture formulaire de suppression de ligne produit -->
                                <?php echo form_open('Panier/supprimerProduit');?>
                                <!-- champ caché pro_id qui transmettra l'information nécessaire à la suppression -->
                                    <input type="hidden" name="pro_id" id="pro_id" value="<?= $row['pro_id'] ?>">

                                    <!-- Bouton suppression -->
                                    <button class="btn" type="submit" title="Supprimer le produit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                    </button>             
                                </td>
                                </form>
                            </tr>
                            
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>  <!-- Fin Tableau Mon Panier -->
    <div>
        <div>
            <h3 class="mt-3">Récapitulatif</h3>
            <div>
                <p>TOTAL : <?= str_replace('.', ',' , $iTotalGlobal); ?> &euro;</p>
                <a class="btn btn-sm btn-success mb-3" href="#">Passer commande</a>
                <a class="btn btn-sm btn-secondary mb-3" href="<?= site_url("produits/liste"); ?>">Retour liste des produits</a>
                <a class="btn btn-sm btn-danger mb-3" href=" <?= site_url("panier/supprimerPanier"); ?>" >Supprimer le panier</a> 
                
            </div>
        </div>
    </div>
    </div>
    <?php 
    } 
    else 
    { 

        ?>
        <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez consulter <a href="<?= site_url("produits/liste"); ?>">la liste des produits</a>.</div>
        <?php 
    } 