<?php

if (file_exists('header.php')){

    require_once('header.php');

} else {

    require('page_not_found.php');

}

?>

        <div class="row g-0">
            <div class="col">

                <section>
        
                    <div>
                        <p>* Ces zones sont obligatoires</p>
                        <form action="http://bienvu.net/script.php" method="POST">
                            <Fieldset>
                            <legend class="fs-1">Vos Coordonnées</legend>
                                <label for="name" class="form-label">Votre nom* :</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Veuillez saisir votre nom" required><br>
                                <label for="surname" class="form-label">Votre prénom* :</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Veuillez saisir votre prénom" required><br>
                                <div>                            
                                    <label class="mb-1" for="sex" class="form-check-label"> Sexe* :</label><br>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="sex" value="Féminin" required>Féminin
                                    </div>
                                    <div class="form-check form-check-inline"> 
                                    <input class="form-check-input" type="radio" name="sex" value="Masculin">Masculin
                                    </div>
                                </div>
                                <br>
                                <label for="dateOfBirth" class="form-label">Date de naissance* :</label>
                                    <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" required><br>
                                <label for="postalcode" class="form-label">Code postal* :</label>
                                    <input type="text" class="form-control" name="postalcode" id="postalcode" required><br>
                                <label for="address" class="form-label">Adresse :</label>
                                    <input type="text" class="form-control" name="address" id="address"><br>
                                <label for="town" class="form-label">Ville :</label>
                                    <input type="text" class="form-control" name="town" id="town"><br>
                                <label for="email" class="form-label">Email* :</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Dave.loper@afpa.fr">
                            </Fieldset><br>
                        
                            <fieldset>
                            <legend class="fs-2">Votre demande</legend>
                                <label for="subject-select" class="form-label">Sujet* :</label>
                                    <select name="Subject"  class="form-select" id="subject-select" required>
                                        <option value="" selected disabled>Veuillez sélectionner un sujet</option>
                                        <option value="Mes commandes">Mes commandes</option>
                                        <option value="Question sur un produit">Question sur un produit</option>
                                        <option value="Réclamation">Réclamation</option>
                                        <option value="Autres">Autres</option>
                        
                                    </select><br>
                        
                                    <label for="question" class="form-label">Votre question* :</label>
                                        <textarea name="question" class="form-control" id="question" cols="15" rows="2"></textarea>
                                    
                            </fieldset><br>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="accept" id="accept">
                                <label class="form-check-label" for="accept"></label>* j'accepte le traitement informatique de ce formulaire
                            </div><br>

                            <button class="btn btn-dark" type="submit">Envoyer</button>
                            <button class="btn btn-dark" type="reset">Annuler</button>
                        </form>
                        <br>
                    </div>

                </section>

        </div>
    
        <?php

if (file_exists('footer.php')){

    require_once('footer.php');

} else {

    require('page_not_found.php');

}

?>