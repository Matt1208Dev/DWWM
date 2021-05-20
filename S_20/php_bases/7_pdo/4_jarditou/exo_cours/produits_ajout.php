<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ajout de produit</title>
</head>
<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">

            <h1 class="fs-1 text-center my-5">Ajout d'un nouveau produit</h1>

            <form action="produits_ajout_script.php" method="POST">
                <div class="form-group">
                    
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
                        $db = connexionBase();
                        $requete = "SELECT cat_id, cat_nom FROM categories GROUP BY cat_id ORDER BY cat_nom";
                        $result = $db->query($requete);
                        $nbLigne = $result->rowCount(); // Nombre de lignes retournées par la requête

                            if ($nbLigne > 1) 
                            {             
                                while ($row = $result->fetch(PDO::FETCH_OBJ)) // Tant qu'il y a des lignes à afficher :
                                {
                                        var_dump($row);
                                ?>               
                                                <option value="<?php echo $row->cat_id ?>" <?php if(isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] != "") echo"selected" ?> > <?php echo $row->cat_nom ?> </option>
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

                    
                    <a class="btn btn-secondary btn-lg px-3 me-3 my-4" href="index.php" role="button" >Retour</a>
                    
                    <input class="btn btn-primary btn-lg me-3 my-4" type="submit" id="enregistrer" value="Enregistrer"></input>
                
                </div>           
            </form>
        </div>    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>