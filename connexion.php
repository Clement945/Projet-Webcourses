<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/connexion.css"/>
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



<p id="connectez"><u>Pour vous connectez, entrer votre pseudo et votre mot de passe :</u></p>

<!--<p>-> Vérification dans la table membre de l'existence du couple </br>
    pseudo/mdp</p>-->

</br>

    <p id="seco">Connexion :</p>

</br>
/<br>
   
        
    <form action="connexion_membre.php" method="post">
    <div class="form-field">
   
    <label for="username">Pseudo :</label> <br/>

    <!--for sert pour un id de formulaire qui doit corresponde a la meme chose et met le curseur sur le formulaire-->
            <input type="text" id="username" name="username" placeholder="Pseudo" autofocus required> <!--met direct sur le champ du 1er et autocomplete="true" sert a se rappeler (quand on revient en arrière)-->
</div>

</br>
</br>


<div class="form-field">
    <label for="pass">Mot de passe :</label><br/>

    <input type="password" id="pass" name="password" placeholder="Mot de passe" minlength="8" required>  <!-- minimum 8 caractères  -->
</div>
           

</br>
</br>
<div class="form-field">
  

    <input type="submit" value="Valider">
</div>

</form>




<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>

</body>
</html>