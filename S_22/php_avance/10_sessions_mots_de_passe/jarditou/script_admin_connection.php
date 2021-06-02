
<?php 
    session_start();
?>


<?php

// Déclaration des variables

$login = htmlspecialchars($_POST["login"]);
$pass = htmlspecialchars($_POST["pass"]);
$error = false;

if (isset($login) && isset($pass)){ // Si les champs sont bien remplis

    if ($login == 'admin' && $pass == 'PorteSecr3te') {  // et s'ils correspondent à ceux attendus

        $_SESSION["acces"] = "OK";
        header ('location: admin_home.php');

    } else {

        $error = true;
        include 'admin_connection.php'; // renvoi à la page de connexion

    }

}

?>