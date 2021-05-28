<?php include 'header.php' ?> 

<div class="row g-0">
            <div class="col">

                <section>
        
                    <div>
                        <p>* Ces zones sont obligatoires</p>
                        <form action="script_user_inscription.php" method="POST" id="form">
                            <Fieldset>
                            <legend class="fs-1">Inscription</legend>
                                <label for="lastName" class="form-label">Nom* :</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Veuillez saisir votre nom" value= <?php if (isset ($lastName)){echo $lastName;}?>>

                                    <?php if (isset ($lastNameError)){echo $lastNameError;} ?>

                                <label for="firstName" class="form-label mt-1">Prénom* :</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Veuillez saisir votre prénom" value= <?php if (isset ($firstName)){echo $firstName;}?>>

                                    <?php if (isset ($firstNameError)){echo $firstNameError;} ?>

                                <label for="email" class="form-label mt-1">Email* :</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="dave.loper@afpa.fr" value= <?php if (isset ($email)){echo $email;}?>>

                                    <?php if (isset($emailError)){echo $emailError;} ?>

                                    <label for="login" class="form-label mt-1">Login* :</label>
                                    <input type="text" class="form-control" id="login" name="login" placeholder="Saisissez l'identifiant de connexion" value= <?php if (isset ($login)){echo $login;}?>>

                                    <?php if (isset ($loginError)){echo $loginError;} ?>

                                    <label for="password" class="form-label mt-1">Mot de passe* :</label>
                                    <input type="password" class="form-control" id="password" name="password"?>

                                    <?php if (isset ($passwordError)){echo $passwordError;} ?>

                                    <label for="passwordConfirm" class="form-label mt-1">Confirmation mot de passe* :</label>
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm"?>

                            </Fieldset><br>
                        

                            <button class="btn btn-dark" type="submit" id="envoi" value="envoi">Envoyer</button>
                            <button class="btn btn-dark" type="reset">Annuler</button>
                        </form>
                        <br>
                    </div>

                </section>

        </div>


<?php include 'footer.php' ?> 