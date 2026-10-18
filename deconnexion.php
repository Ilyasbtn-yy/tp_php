<?php

/**
 * Auteur : Ilyas Elboatani
 * Objectif : Destruction de la session utilisateur active et redirection vers la page de connexion.
 * Date : 14/10/2026
 */
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>