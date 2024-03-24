<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/refuse_cookies.css"/>
    <title>Formulaire inscription épreuve</title>
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

    <br/> 



    <?php
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Affichez le bouton de déconnexion avec une bordure
    echo '<div id="deco"><div class="deco-link"><a href="deconnexion.php">Déconnexion</a></div></div>';
}
?>



    <p class="tetepage">Pour revenir à la page d'accueil, <a href="index.php">cliquez-ici !</a> </p>

<!-- <p class="tetepage"> Partie pour se connecter à la base webcourses </p> -->


<?php

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=webcourses;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération de l'identifiant du dernier membre inséré dans la base de données
    $req_person_id = $bdd->query('SELECT person_id FROM membre ORDER BY person_id DESC LIMIT 1');
    $person_id = $req_person_id->fetch(PDO::FETCH_ASSOC)['person_id'];

    // Insertion des données dans la table consentement_cookie
    $req = $bdd->prepare('INSERT INTO consentement_cookie(cok_type_consentement, cok_necessaire, cok_performance, cok_fonctionnalite, cok_marketing, cok_autres, person_id) VALUES(:type_consentement, :necessaire, :performance, :fonctionnalite, :marketing, :autres, :person_id)');
    $req->execute(array(
        'type_consentement'=> 'E',
        'necessaire'=> 0,
        'performance'=> 0,
        'fonctionnalite'=> 0,
        'marketing'=> 0,
        'autres'=> 0,
        'person_id'=>$person_id
    ));

    echo('<p id="new">Les cookies ont bien été refusés.</p>');

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

