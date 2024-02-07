<?php session_start();

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Redirigez l'utilisateur vers une page appropriée ou affichez un message ici
    header("Location: deja_connecte.php"); // Redirigez vers une page "déjà connecté"
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/inscription_membre.css"/>
    <title>Inscription nouveau membre</title>
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



<p class="tetepage">Pour revenir à la page d'accueil, <a href="index.php">cliquez-ici !</a> </p>

<p class="tetepage"> Partie pour se connecter à la base webcourses </p>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=webcourses;charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("<p id='reussi'>Connexion réussie !</p><br/>");
} 

catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

try {
 
    if (
    !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['pseudo']) 
    && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['datenais']) 
    && !empty($_POST['genre'])){

    // Récupération des valeurs du formulaire
    $person_nom = htmlspecialchars(addslashes($_POST['nom']));
    $person_prenom = htmlspecialchars(addslashes($_POST['prenom']));
    $person_adresse = htmlspecialchars(addslashes($_POST['adresse']));
    $person_tel = htmlspecialchars(addslashes($_POST['tel']));

    // Insertion dans la table personne
    $req1 = $bdd->prepare('INSERT INTO personne (person_nom, person_prenom, person_adresse, person_tel) VALUES (:nom, :prenom, :adresse, :tel)');
    $req1->execute(array(
        'nom' => $person_nom,
        'prenom' => $person_prenom,
        'adresse' => $person_adresse,
        'tel' => $person_tel
    ));
    
    // Récupération de l'ID de la nouvelle personne
    $person_id = $bdd->lastInsertId();

    // Insertion dans la table membre
 
    $mem_email =  htmlspecialchars(addslashes($_POST['email']));

    
    $req2 = $bdd->prepare('INSERT INTO membre ( mem_email, person_id) VALUES (:email, :person_id)');
    $req2->execute(array(
        'email' => $mem_email,
        'person_id' => $person_id
    ));

    // Récupération de l'ID de la nouvelle personne
    $mem_id = $bdd->lastInsertId();

    $util_pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
    $util_mdp =  htmlspecialchars(addslashes(($_POST['password'])));
    // $mem_password =  MD5($mem_password);  //hachage  MD5()
    $util_mdp = password_hash($util_mdp, PASSWORD_DEFAULT); // hachage + salage
    

    $req3 = $bdd->prepare('INSERT INTO utilisateurs (util_pseudo, util_mdp, mem_id) VALUES (:pseudo, :password, :mem_id)');
    $req3->execute(array(
        'pseudo' => $util_pseudo,
        'password' => $util_mdp,
        'mem_id' => $mem_id
    ));



    // Insertion dans la table coureur
    $co_datenais =  htmlspecialchars(addslashes($_POST['datenais']));
    $co_sexe = htmlspecialchars(addslashes($_POST['genre'] == 'Homme')) ? 'Homme' : 'Femme';  //condition ternaire
    
    $req4 = $bdd->prepare('INSERT INTO coureur (co_datenais, co_sexe, person_id) VALUES (:datenais, :sexe, :person_id)');
    $req4->execute(array(
        'datenais' => $co_datenais,
        'sexe' => $co_sexe,
        'person_id' => $person_id
    ));


    echo('<p id="new">Le nouveau championnat avec insert requête préparée a bien été
    enregistré avec les données suivantes : </p>'.'<p id="nouveau">Le nouveau nom : ' .$_POST['nom'].   
    /*faire des modifs pour rendre en html bien */
    '<br/> Le nouveau prénom : '.$_POST['prenom'].' <br/>La nouvelle adresse : '.$_POST['adresse'].' <br/>Le nouveau téléphone : '.$_POST['tel'].' <br/>Le nouveau genre : '. $_POST['genre'].' <br/>La nouvelle date  : '.$_POST['datenais'].' <br/>Le nouveau pseudo : '.$_POST['pseudo'].' <br/>Le nouveau e-mail : '.$_POST['email'].'</p>'); 

    echo('<br/>'. '<br/>');
}

 
else {
    echo "<p id='remplir'>Veuillez remplir tous les champs obligatoires.</p>";
}

}
    

catch (Exception $e)
{
    die('Erreur d\'insertion avec variable ou enregistrement déjà existant'. $e->getMessage());
}



?>







<footer>
        <p id="footer">
            &copy; <a href="mentions_legalesv2.pdf" target="_blank">Mentions légales</a> - <a href="politique_de_confidentialite.pdf" target="_blank">Politique de confidentialité</a> - <a href="gestion_des_cookies.pdf" target="_blank">Gestion des cookies</a> - <a href="droitimage.pdf" target="_blank">Droit à l'image</a>
        </p>
    </footer>



</body>

</html>