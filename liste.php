<?php
/**
 * Auteur : Ilyas Elboatani
 * Objectif : Lecture du fichier CSV, affichage des notes dans un tableau HTML et calcul de la moyenne de la classe.
 * Date : 14/10/2026
 */
require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Liste des Apprenants (Fichier CSV)</h2>";

$fichier = 'data/notes.csv';

if (file_exists($fichier)) {
    $fp = fopen($fichier, 'r');
    if (!$fp) {
        echo "<p style='color:red;'>Erreur d'ouverture du fichier.</p>";
        exit;
    }

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

    $sommeClasses = 0;
    $compteur = 0;

    // Exercice 5.2 : Lecture ligne par ligne avec fgetcsv()
    while (($ligne = fgetcsv($fp, 1000, ';')) !== FALSE) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($ligne[0]) . "</td>";
        echo "<td>" . htmlspecialchars($ligne[1]) . "</td>";
        echo "<td>" . htmlspecialchars($ligne[2]) . "</td>";
        echo "<td>" . htmlspecialchars($ligne[3]) . "</td>";
        echo "<td>" . htmlspecialchars($ligne[4]) . "</td>";
        echo "</tr>";

        $sommeClasses += floatval($ligne[3]);
        $compteur++;
    }
    fclose($fp);
    echo "</table>";

    if ($compteur > 0) {
        $moyenneClasse = $sommeClasses / $compteur;
        echo "<p><strong>Moyenne générale de la classe :</strong> " . round($moyenneClasse, 2) . "</p>";
    }
} else {
    echo "<p>Aucun fichier CSV trouvé. Veuillez d'abord saisir des notes.</p>";
}

include 'includes/pied_inc.php';
?>