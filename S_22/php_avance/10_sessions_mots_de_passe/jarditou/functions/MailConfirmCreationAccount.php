<?php 

function MailConfirmCreationAccount() {

    // Déclaration des variables 

    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $login = htmlspecialchars($_POST['login']);
    $user_creation_date = date('now');
    $dest = htmlspecialchars($_POST['email']);
    $object = 'Bienvenue chez Jarditou';
    $content = '<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="../MailConfirmCreationAccount_style.css">
        <title>Bienvenue chez Jarditou</title>
    </head>
    <body>
    
        <div class="container">
            <div class="mb-5">
                <img class="img-fluid" src="../src/img/jarditou_logo.jpg" alt="Logo Jarditou">
            </div>
    
            <section>
    
                <header class="mb-5">
                    <h1 class="h1 text-danger font-weight-bold">
                        Bienvenue chez Jarditou !
                    </h1>
                </header>
    
                <div class="fs-4">
                    <p>
                        Nous somme ravis de vous compter parmi nos nouveaux clients <?php if (isset($firstName)){echo $firstName;}?>.
                    </p>
                    <p>
                        Lors de vos prochaines visites, n\'hésitez pas à vous connecter en utilisant votre login : <?php if(isset($login)){echo $login;} ?>
                    </p>
                    <p>
                        Par mesure de sécurité, nous n\'allons pas vous repréciser votre mot de passe. Mais sachez qu\'en cas de perte, vous pourrez à tout moment le récupérer sur l\'adresse mail <?php if (isset($email)){echo $email;}?>.
                    </p>
                    <p>
                        A très vite sur <a class="text-decoration-none text-success" href="#">Jarditou.fr</a>.<br>
                        L\'équipe Jarditou
                    </p>
                </div>
            </section>
        </div>';

    $entete = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\n";
    $entete .= 'From: gueullematthieu@gmail.com' . "\r\n";

    if (mail($dest, $object, $content, $entete)) {

        header("Location: val_success.php");
    }


}

?>

