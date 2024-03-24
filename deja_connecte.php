<?php session_start()

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/deja_connecte.css"/>
    
    <title>Connexion</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes-nous ?</a></li>
            <li><a href="calendrier_evenementiel.php">Calendrier évènementiel</a></li>
            <li><a href="info_club.php">Informations Club</a></li></br>
            <?php
            if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] === false) {
                echo '<li><a href="nouveau_membre.php">Nouveau membre</a></li>';
            }
            ?>
            <?php if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] === false) {
                echo '<li><a href="connexion.php">Déjà inscrit</a></li>';
            }
            ?>
            <li><a href="inscription_evenement.php">Inscription événement</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <?php
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Affichez le bouton de déconnexion avec une bordure
    echo '<div id="deco"><div class="deco-link"><a href="deconnexion.php">Déconnexion</a></div></div>';
}
?>

    


    <h2>Vous êtes déjà connecté</h2>
    <p>Vous êtes déjà connecté à votre compte. Vous pouvez accéder aux fonctionnalités réservées aux membres.</p>
    <p><a href="index.php">Retour à l'accueil</a></p>

</body>

</html>