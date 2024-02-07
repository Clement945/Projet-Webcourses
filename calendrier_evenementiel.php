<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/calendrier_evenementiel.css"/>
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


    <p id="texte1">
        <u><strong>Calendrier évènementiel pour l'année courante :</strong></u> <br/> <br/>
        <strong>Partie Sélection :</strong>
    </p>


<label for="pet-select">Championnat :</label>

<select name="pets" id="pet-select">
    <option value="">--Choissisez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

<br/>
<br/>

<label for="pet-select">Manifestation :</label>

<select name="pets" id="pet-select">
    <option value="">--Choisissez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

<br/>

<br/>

<label for="pet-select">Catégorie d'épreuve :</label>

<select name="pets" id="pet-select">
    <option value="">--Choisissez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>


<br/>

<br/>

<label for="pet-select">Epreuve :</label>

<select name="pets" id="pet-select">
    <option value="">--Choisissez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

<br/>

<br/>

<label for="pet-select">Parcours :</label>

<select name="pets" id="pet-select">
    <option value="">--Choisissez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

<br/>

<br/>

<label for="pet-select">Catégorie d'âge :</label>

<select name="pets" id="pet-select">
    <option value="">--Choisissez une option--</option>
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
</select>

<br/>
<br/>

<p id="texte2"> <strong>Partie Affichage</strong> du calendrier sous format tableau :</p>

<table>
      <tr>
        <th>Date</th>
        <th>Lieu</th>
        <th>Parcours</th>
        <th>Distance</th>
        <th>Montant de<br/> l'inscription</th>
      </tr>
      <tr>
        <td>15/05/2020</td>
        <td>Paris</td>
        <td>Parcours 10</td>
        <td>42km</td>
        <td>50 euros</td>
      </tr>

    </table>


    <footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>

    
</body>
</html>