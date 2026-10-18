<?php

/**
 * Auteur : Ilyas Elboatani
 * Objectif : Gestion de l'authentification, initialisation de la session et création du cookie de mémorisation.
 * Date : 14/10/2026
 */
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        
        // Enregistrement dans la session
        $_SESSION['login'] = $login;

        // Création du cookie valable 24h
        setcookie("dernier_login", $login, time() + 86400, "/");

        // Redirection vers profil.php
        header("Location: profil.php");
        exit;
    }
}

// Récupération du cookie s'il existe pour pré-remplir le champ
$dernierLogin = isset($_COOKIE['dernier_login']) ? $_COOKIE['dernier_login'] : '';

require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
?>

<h2>Connexion</h2>
<form action="login.php" method="POST">
    <label for="login">Identifiant (Login) :</label><br>
    <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($dernierLogin); ?>" required><br><br>
    <input type="submit" value="Se connecter">
</form>

<?php
include 'includes/pied_inc.php';
?>