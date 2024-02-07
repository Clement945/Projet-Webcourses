<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/qui_somme_nous.css"/>

    <title>Qui sommes-nous ?</title>
</head>
<body>


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

  
<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

<p id="citation2">Le corps avec le vélo peut tout faire : Cycle de la vie !</p>


<h2 id="c"> <u>Notre Histoire :</u></h2>


<p class="texteh"> Association de la loi 1901 créée en 1960, par 2 frères passionées de courses de vélos.</p>

<br/>

<p class="texteh">Et c'est là que tout a  commencé..... Enchaînement d'actions </p>

<br/>

<p class="texteh">Aujourd'hui, notre association compte plus d'un million de membres, dont dix mille professionnels
    répartis dans diverses catégories comme la courses à pied, le vélo, la natation, et parmi lesquels nous
    retrouvons des champions connues !
</p>



<img src="image/photo_cycliste.jpg" title="Image personne Cycliste" alt="Image personnes cycliste" id="image3"/>

<br/>
<br/>
<p id="acces">
    <u>Voici le plan d'accès :</u>

</p>

<img src="./image/plan_d_acces.jpg" title="Plan d'accès" alt="Image plan d'accès" id="image4"/>



<p id="adresse">
<strong>Adresse:</strong> 11 Av. du Tremblay, 75012 Paris </br>
<strong>Ville: </strong> Paris 12ème
</p>


<section>
<p>Contacter les fondateurs de l'association:</p>

<p id="coordonees">
    E-mail : <a href="mailto:jim@rock.com">jim@rock.com</a><br>
    Téléphone : <a href="tel:+33615552368">0606063228</a>
</p>
</section>


<p id="mentionlegales">

    Mentions légales: (Paragraphe vide pour l'instant)

</p>

<br/>

<p id="politique">  
    Voir notre politique de confidentialité + chartes cookies en cliquant <a href=""><u>ici</u> !</a>
</p>


<p id="fin">
    Vous connaissez à présent l'équipe et le projet ! Cela a éveillé votre curisité ? <br/>
    Restez informé en souscrivant à la newsletter, <br/>vous recevez les dernières actualités dans
    secteur.
    

</p>

<input type="submit" value="Cliquez-ici pour vous abonner !">


<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>
    
</body>
</html>