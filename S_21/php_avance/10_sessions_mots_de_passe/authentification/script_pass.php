
<?php 
    session_start();
?>


<?php

// Déclaration des variables

$login = htmlspecialchars($_POST["login"]);
$pass = htmlspecialchars($_POST["pass"]);
$error = false;

if ((isset($login)) && $login == 'jean.dupont@gmail.com'){

    if ((isset($pass)) && $pass == 'Pass'){

        $_SESSION["login"] = $login;
        $_SESSION["pass"] = $pass;
        setcookie("login", $login, null, null, false);
        setcookie("pass", $pass, null, null, false);
        header("Location:welcome.php");
    } else {

        $error = true;
        header("Location:index.php");
    }

} else {
    $error = true;
    include("index.php");
}

?>