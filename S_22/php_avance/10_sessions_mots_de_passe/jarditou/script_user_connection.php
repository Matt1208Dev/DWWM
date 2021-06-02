
<?php 
    session_start();
?>


<?php

// Déclaration des variables

$login = htmlspecialchars($_POST["login"]);
$pass = htmlspecialchars($_POST["pass"]);
$error = false;

if (isset($login) && isset($pass)){

    require 'functions/UserCheckPass.php';
    UserCheckPass();

}

?>