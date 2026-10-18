<?php

/**
 * Auteur : Ilyas Elboatani
 * Objectif : Affichage de l'espace sécurisé réservé à l'utilisateur connecté via les sessions.
 * Date : 14/10/2026
 */
session_start();

// Si l'utilisateur n'est pas connecté, redirection vers login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
?>

<h2>Espace Profil</h2>
<p>Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['login']); ?></strong> !</p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<?php
include 'includes/pied_inc.php';
?>