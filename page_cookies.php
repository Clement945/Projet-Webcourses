<?php session_start()
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/page_cookies.css"/>
    <title>Fomrmulaire inscription épreuve</title>
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

    <br/> 

    <?php
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Affichez le bouton de déconnexion avec une bordure
    echo '<div id="deco"><div class="deco-link"><a href="deconnexion.php">Déconnexion</a></div></div>';
}
?>

    

    <p id="information"><u>Formulaire des informations à demander et à collecter :</u></p> 

<div id="form-container">
    
    <form action="page_cookies_consentement_cookie_bdd.php" method="post">

    
    <label for="type_consentement">Type de consentement :</label> 
    <!--for sert pour un id de formulaire qui doit corresponde a la meme chose et met le curseur sur le formulaire-->

    <select name="type_consentement" id="liste">
                <option value="I">Implicite</option>
                <option value="E">Explicite</option>
            </select>                           
            
<br/>
<br/>
<br/>



<label for="necessaire">Cookie nécessaire :</label> 
<input type="checkbox" name="necessaire" value="1" />




           

<br/>
<br/>
<br/>


<label for="performance">Cookie de performance :</label>
<input type="checkbox" name="performance" value="1" />

           

<br/>
<br/>
<br/>


<label for="fonctionnalite">Cookie de fonctionnalité :</label>
<input type="checkbox" name="fonctionnalite" value="1" />

           

<br/>
<br/>
<br/>

<label for="marketing">Cookie de marketing :</label>
<input type="checkbox" name="marketing" value="1" />

           

<br/>
<br/>
<br/>

<label for="autres">Cookie autres :</label> 
<input type="checkbox" name="autres" value="1" />

           

<br/>
<br/>
<br/>

<!--
<label for="text" id="cookie7">Cookie du membre :</label> <br/>  déjà existante dans la base de données
<br/>
            <input type="text" id="membre" name="membre" placeholder="Membre">
-->
           

<br/>


<div id="form-field">


    <input type="submit" value="Valider">
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