<?php
session_start();

// Supprimez toutes les variables de session liées à la connexion de l'utilisateur
// unset($_SESSION['util_id']);
// unset($_SESSION['is_logged_in']);

session_destroy();

// Redirigez l'utilisateur vers la page de connexion ou une autre page
header("Location: connexion.php");
exit();
?>