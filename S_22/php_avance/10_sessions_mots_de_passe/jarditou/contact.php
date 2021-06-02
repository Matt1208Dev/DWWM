<?php include 'header.php' ?> 

        <div class="row g-0">
            <div class="col">

                <section>
        
                    <div>
                        <p>* Ces zones sont obligatoires</p>
                        <form action="script_contact.php" method="POST" id="form">
                            <Fieldset>
                            <legend class="fs-1">Vos Coordonnées</legend>
                                <label for="lastName" class="form-label">Votre nom* :</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Veuillez saisir votre nom" value= <?php if (isset ($lastName)){echo $lastName;}?>>

                                    <?php if (isset ($lastNameError)){echo $lastNameError;} ?>

                                <label for="firstName" class="form-label">Votre prénom* :</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Veuillez saisir votre prénom" value= <?php if (isset ($firstName)){echo $firstName;}?>>

                                    <?php if (isset ($firstNameError)){echo $firstNameError;} ?>

                                <div>                            
                                    <label class="mb-1" for="sex" class="form-check-label"> Sexe* :</label><br>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="sexf" value="Féminin" <?php if ((isset ($sex)) && $sex == "Féminin") {echo "checked";} else {echo "";} ?>>Féminin
                                    </div>
                                    <div class="form-check form-check-inline"> 
                                    <input class="form-check-input" type="radio" name="sex" id="sexm" value="Masculin" <?php if ((isset ($sex)) && $sex == "Masculin") {echo "checked";} ?>>Masculin
                                    </div>                                
                                </div>

                                <?php if (isset ($sexError)){echo $sexError;} ?>

                                <label for="birthDate" class="form-label">Date de naissance* :</label>
                                    <input type="date" class="form-control" name="birthDate" id="birthDate" value= "<?php  if (isset($birthDate)){ echo $birthDateStr;}?>" >

                                    <?php if (isset ($birthDateError)){echo $birthDateError;} ?>

                                <label for="postalcode" class="form-label">Code postal* :</label>
                                    <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="ex: 33000" value= <?php if (isset ($postalcode)){echo $postalcode;}?> >

                                    <?php if (isset ($postalcodeError)){echo $postalcodeError;} ?>

                                <label for="address" class="form-label">Adresse :</label>
                                    <input type="text" class="form-control" name="address" id="address" value= <?php if (isset ($address)){echo $address;}?>>

                                    <?php if (isset ($addressError)){echo $addressError;} ?>

                                <label for="town" class="form-label">Ville :</label>
                                    <input type="text" class="form-control" name="town" id="town" value= <?php if (isset ($town)){echo $town;}?>>

                                    <?php if (isset ($townError)){echo $townError;} ?>

                                <label for="email" class="form-label">Email* :</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="dave.loper@afpa.fr" value= <?php if (isset ($email)){echo $email;}?>>

                                    <?php if (isset($emailError)){echo $emailError;} ?>

                            </Fieldset><br>
                        
                            <fieldset>
                            <legend class="fs-2">Votre demande</legend>
                                <label for="subject-select" class="form-label">Sujet* :</label>
                                    <select name="subject"  class="form-select" id="subject-select" >
                                        <option value="" <?php if (!(isset($subject)) || ($subject == "")){echo "selected";}?>>Veuillez sélectionner un sujet</option>
                                        <option value="Mes commandes" <?php if ((isset($subject)) && ($subject === "Mes commandes")){echo "selected";}?>>Mes commandes</option>
                                        <option value="Question sur un produit" <?php if (isset ($subject) && $subject == "Question sur un produit"){echo "selected";}?>>Question sur un produit</option>
                                        <option value="Réclamation" <?php if (isset ($subject) && $subject == "Réclamation"){echo "selected";}?>>Réclamation</option>
                                        <option value="Autres" <?php if (isset ($subject) && $subject == "Autres"){echo "selected";}?>>Autres</option>
                        
                                    </select>

                                    <?php if (isset ($subjectError)){echo $subjectError;} ?>
                        
                                    <label for="question" class="form-label">Votre question* :</label>
                                        <textarea name="question" class="form-control" id="question" cols="15" rows="2"><?php if (isset ($question)){echo $question;}?></textarea>

                                        <?php if (isset ($questionError)){echo $questionError;} ?>
                                    
                            </fieldset><br>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="accept" id="accept" value="ok" <?php if (isset ($accept) && $accept == "ok"){echo "checked";}?>>
                                <label class="form-check-label" for="accept"></label>* J'accepte le traitement informatique de ce formulaire
                            </div>

                            <?php if (isset ($acceptError)){echo $acceptError;} ?>

                            <button class="btn btn-dark" type="submit" id="envoi" value="envoi">Envoyer</button>
                            <button class="btn btn-dark" type="reset">Annuler</button>
                        </form>
                        <br>
                    </div>

                </section>

        </div>
    

<?php include 'footer.php' ?>