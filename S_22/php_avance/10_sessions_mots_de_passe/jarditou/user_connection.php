
<?php include 'header.php' ?>

<div class="container-fluid d-flex align-items-center justify-content-center">
    
        <div class="col-lg-4">
            <h2 class="fs-1 text-ds text-center pt-5 text-dark">Connexion</h2>
            <form action="script_user_connection.php" method="POST">
                <div class="mb-3 mt-5 px-5">
                    <label class="form-label text-dark text-ds fs-5" for="login">Email :</label>
                    <input class="form-control" type="text" name="login" placeholder="name@example.com">
                </div>
            

                <div class="mb-3 px-5">
                    <label class="form-label text-dark text-ds fs-5" for="pass">Mot de passe :</label>
                    <input class="form-control" type="password" name="pass">
                </div>
                <div class="mb-3 px-5">
                <?php if (isset ($error) && $error == true){echo "<p class=\"bold text-danger\"><strong>La connexion a échoué. Votre login et/ou mot de passe est incorrect. Veuillez réessayer.</strong></p>";}?>
                </div>
                <div class="mb-3 px-5">
                    <a href="#" class="text-secondary text-decoration-none">Mot de passe oublié ?</a>
                </div>
                <div class="mb-3 px-5">
                    <a href="user_inscription.php" class="text-secondary text-decoration-none">Créer mon compte</a>
                </div>
                <div class=" text-center mb-3 pt-2 pb-5 d-grid gap-2 px-5">
                    <input class="btn btn-lg btn-outline-success button-grad" type="submit" name="submit" value="Valider">
                </div>
            </form>
        </div>
    
</div>

<?php include 'footer.php' ?>