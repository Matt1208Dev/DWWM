
<?php include 'header.php' ?>
<br>
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
                    </tr>
                </thead>

                <tbody>
                

        <?php
            require "connexion_bdd.php"; // Connexion base
            $requete = "SELECT * FROM `produits`";
            $result = $db->query($requete);
            $nbLigne = $result->rowCount(); // Nombre de lignes retournées par la requête
            if ($nbLigne > 1) 
            {             
                while ($row = $result->fetch(PDO::FETCH_OBJ)) // Tant qu'il y a des lignes à afficher :
                { ?>
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

                    </tr>
                    
                <?php 
                }

            $result->closeCursor(); 

            }  
        ?>

                </tbody>
            </table>

        </div>  
        </div>
        <a href="add_form.php" role="button" class="btn btn-secondary btn-lg btn-block">Ajouter un nouvel article</a>
    </div>
    
</div>

<?php include 'footer.php' ?>