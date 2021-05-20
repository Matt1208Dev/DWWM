<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Atelier PHP N°4 - Affichage de la liste</title>
    </head>

    <body> 

    <div class="container">

    <?php
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT pro_id, pro_ref, pro_libelle FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_d_ajout DESC";

    $result = $db->query($requete);

    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
    // Pas d'enregistrement
    die("La table est vide");
    }

    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 overflow-auto">
                <table class="table table-bordered .table-responsive{-sm|-md|-lg|-xl|-xxl} text-center">
                    <thead> <!-- Entetes des colonnes -->
                        <tr class="table-secondary" style="border-bottom: 1px solid black;">

                            <th>ID</th>
                            <th>Référence</th>
                            <th>Libellé</th>

                        </tr>
                    </thead>

                    <tbody>
                    
            <?php
                $nbLigne = $result->rowCount(); // Nombre de lignes retournées par la requête
                if ($nbLigne > 1) {             
                    while ($row = $result->fetch(PDO::FETCH_OBJ)) // Tant qu'il y a des lignes à afficher :
                    { ?>
                        <tr style="border: 1px solid black;">

                            <td class="table-active">
                                <?= $row->pro_id; ?>
                            </td>
                            <td class="bg-warning">
                                <?= $row->pro_ref; ?>
                            </td>
                            <td class="table-active">
                                <a class="text-uppercase text-danger" href="details.php?pro_id=<?php echo $row->pro_id ?>" title="Modifier"><strong><u><?php echo $row->pro_libelle ?></u></strong></a>
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
                    <a href="produits_ajout.php" role="button" class="btn btn-secondary btn-lg btn-block">Ajouter un nouvel article</a>
                </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </body>
</html> 