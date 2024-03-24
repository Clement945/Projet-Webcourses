<?php session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/confirmation_inscription_bdd.css"/>
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




    <p class="tetepage">Pour revenir à la page d'accueil, <a href="index.php">cliquez-ici !</a> </p>






<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=webcourses;charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("<p id='reussi'>Connexion réussie !</p><br/>");

    if (!empty($_POST['licence']) && !empty($_POST['categorie_person']) && !empty($_POST['epreuve_choisi']) && !empty($_POST['date']) && !empty($_POST['certificat_medical']) && !empty($_POST['taille_maillot']) && !empty($_POST['type_reglement']) && !empty($_POST['date_debut'])) {
        
        // Récupération des valeurs du formulaire
        $ins_carte_licence = htmlspecialchars(addslashes($_POST['licence']));
        $ins_categorie_person = htmlspecialchars(addslashes($_POST['categorie_person']));
        $ins_epreuve_choisi = htmlspecialchars(addslashes($_POST['epreuve_choisi']));
        $ins_date = htmlspecialchars(addslashes($_POST['date']));
        $ins_certificat_medical = htmlspecialchars(addslashes($_POST['certificat_medical']));
        $ins_taille_maillot = htmlspecialchars(addslashes($_POST['taille_maillot']));
        $ins_type_reglement = htmlspecialchars(addslashes($_POST['type_reglement']));

        // Récupération de l'identifiant du dernier membre inséré dans la base de données
        $req_co_id = $bdd->query('SELECT co_id FROM coureur ORDER BY co_id DESC LIMIT 1');
        $co_id = $req_co_id->fetch(PDO::FETCH_ASSOC)['co_id'];

        // Insertion des données dans la table inscrire
        $ins_dossard = ''; // Initialisation, le trigger va générer la valeur
      
        // Insertion des données dans la table inscrire
        $req = $bdd->prepare('INSERT INTO inscrire(ins_carte_licencier, cat_id, ep_id, ins_date, ins_certificat_medical, ins_taille_maillot, ins_dossard, reg_id, co_id) VALUES(:licence, :categorie_person, :epreuve_choisi, :date, :certificat_medical, :taille_maillot, :ins_dossard, :type_reglement, :co_id)');

        $req->execute(array(
            'licence'=> $ins_carte_licence,
            'categorie_person' => $ins_categorie_person,
            'epreuve_choisi' => $ins_epreuve_choisi,
            'date'=> $ins_date,
            'certificat_medical'=> $ins_certificat_medical,
            'taille_maillot'=> $ins_taille_maillot,
            'ins_dossard'=> $ins_dossard,
            'type_reglement' => $ins_type_reglement,
            'co_id'=>$co_id
        ));

        //L'id Inscrire
        $nouvel_id = $bdd->lastInsertId();  //cela insert le dernier ID de la table inscrire

        // Récupération du numéro de dossard généré automatiquement 
        //LAST_INSERT_ID() pour obtenir l'identifiant de la dernière insertion
        $sql = "SELECT ins_dossard FROM inscrire WHERE ins_num_inscription = LAST_INSERT_ID()";
        $stmt = $bdd->query($sql);
        $ins_dossard = $stmt->fetch(PDO::FETCH_ASSOC)['ins_dossard'];

        echo('<p id="nouveau2">Le nouveau championnat a bien été enregistré avec les données suivantes : 
        </p>'.'<p id="nouveau">Le numéro de la carte de licence : ' .$_POST['licence'].'<br/> 
        La catégorie de personne : '.$_POST['categorie_person'].' <br/>
        L\'épreuve choisi : ' .$_POST['epreuve_choisi'].'<br/> 
        La nouvelle date: '.$_POST['date'].' <br/>
        Le certificat medical : '.$_POST['certificat_medical'].' <br/>
        La taille du maillot : '.$_POST['taille_maillot'].' <br/>
        Le numero du dossard: '. $ins_dossard.' <br/>
        Type de règlement : '.$_POST['type_reglement'].' </p>'); 

        echo '<p class="tetepage">Merci pour votre inscription. Votre numéro d\'inscription est le '. $nouvel_id. '</p>';

        echo '<hr/>';





        
      
        // Vérifions si une option a été sélectionnée dans le formulaire !
        if(isset($_POST['type'])) {
            $type = $_POST['type'];

            // Récupération de la date depuis le formulaire
            $ins_date = htmlspecialchars(addslashes($_POST['date_debut']));

            // Récupération de la table cible et de la colonne de clé étrangère correspondante en fonction du type sélectionné
            if($type === "amateur") {
                $table = "amateur";
                $foreign_key = "co_id";
            } elseif($type === "professionnel") {
                $table = "professionnel";
                $foreign_key = "co_id";
            }

            // Exécutez une requête SQL pour insérer la date dans la table correspondante
            $req_insertion = $bdd->prepare("INSERT INTO $table (date_debut, $foreign_key) VALUES (:date_debut, :co_id)");

            // Récupération du dernier ID de co_id dans la table coureur
            $stmt = $bdd->query('SELECT MAX(co_id) AS max_id FROM coureur');
            $max_id_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $co_id = $max_id_row['max_id'];

            // Exécution de la requête d'insertion avec le co_id récupéré
            $req_insertion->execute(array(
                'date_debut' => $ins_date,
                'co_id' => $co_id
            ));

            // Exécutez une requête SQL pour récupérer les informations sur le coureur (nom, etc.)
            $stmt_nom = $bdd->prepare('SELECT personne.person_nom
                                       FROM personne
                                       INNER JOIN coureur ON personne.person_id = coureur.person_id
                                       WHERE coureur.co_id = :co_id');
            $stmt_nom->execute(array('co_id' => $co_id));
            $result_nom = $stmt_nom->fetch(PDO::FETCH_ASSOC);
            $person_nom = $result_nom['person_nom'];

            // Affichage des résultats
            echo '<p id="nouveau2">Le nouveau <strong>' . ucfirst($type) . '</strong> a bien été enregistré avec les données suivantes :</p>';
            echo '<p id="nouveau">La date du début : ' . $ins_date . '</p>';
            echo '<p id="nouveau">Le nom du coureur : ' . $person_nom . '</p>';
        } else {
            echo "<p id='remplir'>Veuillez remplir tous les champs obligatoires pour amateur.</p>";
        }



        
    } else {
        echo "<p id='remplir'>Veuillez remplir tous les champs obligatoires.</p>";
    }
} catch (Exception $e) {
    die('Erreur lors de l\'insertion dans la table : ' . $e->getMessage());
}
?>


<!--$nouvel_id va faire apparaître le numéro du dernier ID-->

<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>


</body>
</html>