<?php 

include_once 'header.php';



try {

    // Récupération de l'identifiant concerné, passé en GET
    $pro_id=$_GET['pro_id'];
    include 'connexion_bdd.php';
    $requete = "SELECT * FROM produits where pro_id=".$pro_id;
    $result = $db->query($requete);

    // Récupération du résultat de la requête

    $row = $result->fetch(PDO::FETCH_OBJ);

    // Libération de la connexion au serveur de BDD
$result->closeCursor();
}

catch (Exception $e) {

    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="d-flex justify-content-center" >
                <?php echo $row->pro_photo ?>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <span class="fs-1 fw-bold"><?php echo $row->pro_libelle ?></span>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <p class="fs-3 text-center">
                Etes-vous sûr de vouloir supprimer <span class="fw-bold"><?php echo '"'. $row->pro_libelle .'"'?></span> de la base de données ?
                </p>
            </div>
            <br>
            <div class="d-flex justify-content-center">
            <a class="btn btn-danger btn-lg px-1 me-3 mt-4" href="delete_script.php?pro_id=<?php echo $row->pro_id ?>" role="button">Supprimer</a>
            <a class="btn btn-success btn-lg px-3 me-3 mt-4" href="index.php" role="button" >Annuler</a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';

?>