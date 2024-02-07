<?php session_start()

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/nouveau_membre.css"/>
    <title>Nouveau membre</title>
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

<p id="nouveau"><strong><u>Nouveau membre :</u></strong></p>

<br/>
<br/>


<div id="form-container">

<form action="inscription_membre.php" method="post">

<div class="form-field">
    <label for="nom">Nom :</label><br/><br/><input type="text" id="nom" name="nom" placeholder="Nom"/> <br/><br/>  <!-- Mettre required à la fin du projet -->
</div>
<div class="form-field">
    <label for="prenom">Prénom :</label> <br/><br/><input type="text" id="prenom" name="prenom" placeholder="Prénom"/><br/><br/>
</div>

<div class="form-field">
    <label for="adresse">Adresse :</label> <br/><br/><input type="text" id="addresse" name="adresse" placeholder="Adresse"/><br/><br/>
</div>


<div class="form-field">
    <label for="tel">Numéro de téléphone :</label> <br/><br/><input type="tel" id="tel" name="tel" placeholder="Téléphone" required/><br/><br/>
</div>

<div class="form-field">
    <label for="genre" id="genre">Genre :</label>
    <select name="genre">  
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
</div>

</div>

<div class="form-field">
<label for="date">Date de naissance :</label><br/><br/>
<input type="date" id="date" name="datenais"
       value="2018-07-22"/><br/><br/>

</div>

    <div class="form-field">
    <label for="pseudo">Pseudo :</label> <br/><br/><input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required/><br/><br/>
</div>
    <div class="form-field">
    <label for="email">E-mail :</label> <br/> <br/><input type="email" id="email" name="email" placeholder="E-mail" required/><br/><br/>
</div>
    <div class="form-field">
    <label for="pass" id="mdp">Nouveau mot de passe : </label> <br/><br/> <input type="password" id="pass" name="password" placeholder="Mot de passe" minlength="8" required> <br/><br/><br/>
</div>
<div class="form-field">
	<input type="submit" value="Envoyer" />
</div>

</form>
</div>

<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>
</body>
</html>