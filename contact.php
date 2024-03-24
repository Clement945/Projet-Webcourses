<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/contact.css"/>
    <title>Contact</title>
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
            <?php
            if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) 
            echo '<li><a href="inscription_evenement.php">Inscription événement</a></li>'
            ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>


    <?php
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Affichez le bouton de déconnexion avec une bordure
    echo '<div id="deco"><div class="deco-link"><a href="deconnexion.php">Déconnexion</a></div></div>';
}
?>


<p id="contactez"><u>Contact :</u></p>



    <img src="./image/plan_d_acces.jpg" title="Plan d'accès" alt="Image plan d'accès" id="image4"/>



<p id="adresse">
<strong>Adresse:</strong> 45 rue des mathurins </br>
<strong>Ville: </strong> Paris 8ème
</p>


<section>
<p>Contacter les fondateurs de l'association:</p>

<p class="coordonees">
    E-mail : <a href="mailto:jim@rock.com">évènement@webcourses.fr</a><br>
    Téléphone : <a href="tel:+33615552368">0145454513</a>
</p>
</section>


<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>

</body>
</html>