<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/info_club.css"/>
    <title>Informations club</title>
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



<p id="vie"><strong><u>La vie des clubs :</u></strong> </p>

<p id="choisir"> Choisir son club sous forme de liste venant de la base de données :</p>


<label for="pet-select">Choix du club:</label>

<select name="pets" id="pet-select">
    <option value="">--Choissisez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>


<p id="nombre">Afficher : le nombre d'adhérents pour l'année en cours </p>
<p id="club">L'historique du classement du club (année / classement)</p>

<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>

<!--
    <p id="p1">  
        Bonjour Delamare Martin !
    </p>

    <p id="p2">
        Visualiser ses courses / son classement
        <span id="inscrire">S'inscrire à un évènement</span>
    
    </p>

    <p id="p3">Afficher la maquette visualiser / son classement en <a href="">cliquant-ici</a>

</p>

<p id="p4">
     Afficher la page nouvelle inscription en <a href="">cliquant-ici</a>

</p>
-->


</body>
</html>