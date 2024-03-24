<?php session_start();
// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // Rediriger vers une page disant qu'il est déjà connecté ou afficher un message ici
    header("Location: deja_connecte.php"); // Rediriger vers une page "déjà connecté"
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/connexion_membre.css"/>
    <title>Connexion_membre</title>
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

try {
    $bdd = new PDO('mysql:host=localhost;dbname=webcourses;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    // Récupération des données du formulaire
    $util_pseudo = htmlspecialchars(addslashes($_POST['username']));
    $util_mdp = htmlspecialchars(addslashes($_POST['password']));

    // Requête SQL pour vérifier les informations de connexion
    $query = "SELECT * FROM utilisateurs WHERE util_pseudo = :username";
    $statement = $bdd->prepare($query);
    $statement->bindParam(':username', $util_pseudo);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des utilisateurs correspondent au pseudonyme
    if ($users) {
        $authenticated = false;

        foreach ($users as $user) {
            // Vérification du mot de passe pour chaque utilisateur
            if (password_verify($util_mdp, $user['util_mdp'])) {
                // Connexion réussie, enregistrez l'utilisateur dans une session
                $_SESSION['util_id'] = $user['util_id'];
                $_SESSION['is_logged_in'] = true;

                // Rediriger l'utilisateur vers la page de succès (par exemple, "index.php")
                header("Location: index.php");
                exit();
            }
        }

        // Si aucun mot de passe correspondant n'est trouvé
        // Mot de passe incorrect, rediriger vers la page "connexion_mot_de_passe_incorrect.php"
        header("Location: connexion_mot_de_passe_incorrect.php");
        exit();
    } else {
        // Si aucun utilisateur correspondant n'est trouvé
        // Pseudonyme incorrect, rediriger vers la page "connexion_pseudo_incorrect.php"
        header("Location: connexion_pseudo_incorrect.php");
        exit();
    }

} else {
    // Identifiants manquants, rediriger vers la page de connexion avec une erreur
    header("Location: connexion_pseudo_incorrect.php");
    exit();
}
?>






<p class="remplir"><a href="connexion.php">Cliquez-ici se connecter </a></p>


</body>
</html>