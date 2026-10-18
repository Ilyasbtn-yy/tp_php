<?php

/**
 * Auteur : Ilyas Elboatani
 * Objectif : Réception et traitement des données transmises par le formulaire GET.
 * Date : 14/10/2026
 */
require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Résultat du Formulaire (GET)</h2>";

if (isset($_GET['nom'], $_GET['prenom'],$_GET['sexe']) && !empty($_GET['nom']) && !empty($_GET['prenom'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe =$_GET['sexe'];

    $titre = ($sexe === 'M') ? "Bonjour Monsieur" : "Bonjour Madame";

    echo "<p>$titre <strong>$prenom$nom</strong></p>";
} else {
    echo "<p style='color:red;'>Veuillez remplir tous les champs du formulaire.</p>";
}

/*
   Observation sur l'URL après l'envoi :
            Les données sont transmises directement dans l'URL sous la forme :
            `info.php?nom=...&prenom=...&sexe=...`
*/

include 'includes/pied_inc.php';
?>