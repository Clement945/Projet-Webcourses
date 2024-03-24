<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/connexion_pseudo_incorrect.css"/>
    <title>Calendrier évènementiel</title>
</head>
<body>

<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>


<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes-nous ?</a></li>
            <li><a href="calendrier_evenementiel.php">Calendrier évènementiel</a></li>
            <li><a href="info_club.php">Informations Club</a></li></br>
            <li><a href="nouveau_membre.php">Nouveau membre</a></li>
            <li><a href="connexion.php">Déjà inscrit</a></li>
            <?php
            if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) 
            echo '<li><a href="inscription_evenement.php">Inscription événement</a></li>'
            ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <p id="pseudo"> Pseudo incorrect.</p>
    <p>Veuillez vérifier vos informations et <a href="connexion.php">cliquez ici pour réessayer.</a></p>


</body>
</html>