<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/page_cookies_consentement_cookie_bdd.css"/>
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




    <p class="tetepage">Pour revenir à la page d'accueil, <a href="index.php">cliquez-ici !</a> </p>

<p class="tetepage"> Partie pour se connecter à la base webcourses </p>
<?php 


try {
  // Connexion à la base de données
  $bdd = new PDO('mysql:host=localhost;dbname=webcourses;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo('<p id="co">Connexion réussie.</p><br/>');
} catch (Exception $e) {
  die('Erreur de connexion : ' . $e->getMessage());
}

try {
  // Récupération des données du formulaire
  $cok_type_consentement = $_POST['type_consentement'];
  $cok_necessaire = isset($_POST['necessaire']) ? 1 : 0;
  $cok_performance = isset($_POST['performance']) ? 1 : 0;
  $cok_fonctionnalite = isset($_POST['fonctionnalite']) ? 1 : 0;
  $cok_marketing = isset($_POST['marketing']) ? 1 : 0;
  $cok_autres = isset($_POST['autres']) ? 1 : 0;

  // Récupération de l'identifiant du dernier membre inséré dans la base de données
  $req_person_id = $bdd->query('SELECT person_id FROM membre ORDER BY person_id DESC LIMIT 1');
  $person_id = $req_person_id->fetch(PDO::FETCH_ASSOC)['person_id'];

  // Insertion des données dans la table consentement_cookie
  $req = $bdd->prepare('INSERT INTO consentement_cookie(cok_type_consentement, cok_necessaire, cok_performance, cok_fonctionnalite, cok_marketing, cok_autres, person_id) VALUES(:type_consentement, :necessaire, :performance, :fonctionnalite, :marketing, :autres, :person_id)');
  $req->execute(array(
      'type_consentement'=> $cok_type_consentement,
      'necessaire'=> $cok_necessaire,
      'performance'=> $cok_performance,
      'fonctionnalite'=> $cok_fonctionnalite,
      'marketing'=> $cok_marketing,
      'autres'=> $cok_autres,
      'person_id'=>$person_id
  ));

  echo('<p id="insere"><u> Le cookie a bien été inséré !</u></p> <br/></br><p id="add"> Accepter : 1 / Refuser : Rien</p><br/></br>'.' <p id="cookiesall"> Type de consentement : '. htmlspecialchars($_POST['type_consentement']).'<br/><br/> Cookie nécessaire : '.(isset($_POST['necessaire']) ? $_POST['necessaire'] : '').' <br/><br/>Cookie de performance : '.(isset($_POST['performance']) ? $_POST['performance'] : '').' <br/><br/>Cookie de fonctionnalité : '.(isset($_POST['fonctionnalite']) ? $_POST['fonctionnalite'] : '').' <br/><br/>Cookie de marketing : '.(isset($_POST['marketing']) ? $_POST['marketing'] : '').' <br/><br/>Cookie autres : '.(isset($_POST['autres']) ? $_POST['autres'] : '</p>'));


} catch (Exception $e) {
  die('Erreur d\'insertion avec variable : ' . $e->getMessage());
}

?>



    <footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>    

</body>

</html>