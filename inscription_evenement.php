<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/page_cookies.css"/>
    <link rel="stylesheet" type="text/css" href="style/inscription_evenement.css"/>
    <title>Inscription événement</title>
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


    <p class="inscri"><u>Inscription événement :</u></h2>
</br>

    <p class="inscri">Veuillez remplir le formulaire d'inscription ci-dessous pour réserver votre place :</p>

<br/>
<br/>
<br/>

<form action="confirmation_inscription_bdd.php" method="post">
   
<div class="form-field">
        <label for="licence">Numéro de licence :</label><br>
        <input type="text" id="licence" name="licence"  placeholder="Numéro de licence" required><br><br>
    </div><br/></br>


    <div class="form-field">
    <label for="categorie_person">Catégorie du coureur :</label><br>
    <select id="categorie_person" name="categorie_person">
        <option value="1">Bébé - 1</option>
        <option value="2">Jeune - 2</option>
        <option value="3">Junior- 3</option>
        <option value="4">Ado - 4</option>
        <option value="5">Etudiant - 5</option>
        <option value="6" selected>Adulte - 6</option>
        <option value="7">Senior - 7</option>
        <option value="8">Vétéran - 8</option>
    </select><br><br><br><br>
</div>


    <div class="form-field">
    <label for="epreuve_choisi">Epreuve choisi :</label><br>
    <select id="epreuve_choisi" name="epreuve_choisi">
        <option value="1">Arkétop - 1</option>
        <option value="2">Aventure - 2</option>
        <option value="3" selected>Suprême sensation - 3</option>
        <option value="4">Coule douce - 4</option>
        <option value="5">Admirer le paysage - 5</option>
        <option value="6">Verdoyants parcours - 6</option>
        <option value="7">Extrême - 7</option>
        <option value="8">Pour les mordues - 8</option>
        <option value="9">Vive demain - 9</option>
        <option value="10">La perle de la montagne - 10</option>
        <option value="11">Tous en plaine - 11</option>
        <option value="12">Parcours aventure - 12</option>
        <option value="13">Le chemin des petits - 13</option>
        <option value="14">Warriorss - 14</option>
        <option value="15">La baby course - 15</option>
        <option value="16">Upgrade - 16</option>
        <option value="17">Toujours plus loin - 17</option>
        <option value="18">Les 5 bornes - 18</option>
        <option value="19">La courses 100m - 19</option>

    </select><br><br><br><br>
</div>

    <div class="form-field">
    <label for="date">Date :</label><br>
    <input type="date" id="date" name="date" value="2023-03-06"><br><br><br><br>
</div>

<div class="form-field">
    <div class="form-filed2">
    <label for="certificat_medical">Présence du certificat médical :</label><br/><br/>
    <input type="radio" id="certificat-medical-oui" name="certificat_medical" value="Oui" required>
    <label for="certificat-medical-oui">Oui</label>
    <input type="radio" id="certificat-medical-non" name="certificat_medical" value="Non" required>
    <label for="certificat-medical-non">Non</label><br><br><br><br><br/>
</div>
</div>



<div class="form-field">
    <label for="taille_maillot">Taille du maillot choisi :</label><br>
    <select id="taille_maillot" name="taille_maillot">
        <option value="XS">Taille XS</option>
        <option value="S">Taille S</option>
        <option value="M" selected>Taille M</option>
        <option value="L">Taille L</option>
        <option value="XL">Taille XL</option>
        <option value="XXL">Taille XXL</option>
    </select><br><br><br><br>
</div>



<div class="form-field">
        
        <label for="numero_dossard" id="numero">Numéro de dossard affecté :</label>  
        <p>Généré automatiquement</p>
        <!-- <input type="text" id="numero_dossard" name="numero_dossard" placeholder="Numéro de dossard" required></input>--> </br> </br> <br> 
</div>


<div class="form-field">
    <label for="type_reglement">Type de règlement :</label><br>
    <select id="type_reglement" name="type_reglement">
        <option value="1">Chèque - 1</option>
        <option value="2">Liquide - 2</option>
        <option value="3">Carte bleu - 3</option>
    </select><br><br><br><br>
</div>

<hr/>

<div class="form-field">
    <label for="date_debut">Date début :</label><br>
    <input type="date" id="date" name="date_debut" value="2023-03-06"><br>
</div><br>

<div class="form-field">
    <input type="radio" id="type_amateur" name="type" value="amateur" required>
    <label for="type_amateur">Amateur</label><br>

    <input type="radio" id="type_professionnel" name="type" value="professionnel" required>
    <label for="type_professionnel">Professionnel</label><br>
</div>
<br><br/>

<!-- <div class="form-field">
    <label for="type">Type :</label><br>
    <select id="type" name="type">
        <option value="amateur">Amateur</option>
        <option value="professionnel">Professionnel</option>
    </select><br><br>
</div> -->


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