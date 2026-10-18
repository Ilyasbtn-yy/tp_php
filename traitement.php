<?php
/**
 * Auteur : Ilyas Elboatani
 * Objectif : Validation des notes saisies en POST, calcul de la moyenne et écriture dans le fichier CSV.
 * Date : 14/10/2026
 */
require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Récapitulatif des Notes (POST)</h2>";

if (
    isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) &&
    !empty(trim($_POST['nom'])) &&
    $_POST['note_info'] !== '' &&
    $_POST['note_math'] !== ''
) {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $note_info = $_POST['note_info'];
    $note_math = $_POST['note_math'];

    if (
        is_numeric($note_info) && is_numeric($note_math) &&
        $note_info >= NOTE_MIN && $note_info <= NOTE_MAX &&
        $note_math >= NOTE_MIN && $note_math <= NOTE_MAX
    ) {
        $moyenne = ($note_info + $note_math) / 2;
        $ment = mention($moyenne);

        // Exercice 5.1 : Ajout d'une ligne dans data/notes.csv avec le mode "a"
        if (!is_dir('data')) {
            mkdir('data', 0777, true);
        }
        $fp = fopen('data/notes.csv', 'a');
        if ($fp) {
            fputcsv($fp, [$nom, $note_info, $note_math, round($moyenne, 2), $ment], ';');
            fclose($fp);
        }

        echo "<p><strong>Nom :</strong> $nom</p>";
        echo "<p><strong>Note Informatique :</strong> $note_info / " . NOTE_MAX . "</p>";
        echo "<p><strong>Note Mathématiques :</strong> $note_math / " . NOTE_MAX . "</p>";
        echo "<p><strong>Moyenne générale :</strong> " . round($moyenne, 2) . " / " . NOTE_MAX . "</p>";
        echo "<p style='color:green;'>Données enregistrées avec succès dans le fichier CSV !</p>";
    } else {
        echo "<p style='color:red;'>Erreur : Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    }
} else {
    echo "<p style='color:red;'>Erreur : Tous les champs doivent être remplis.</p>";
}

include 'includes/pied_inc.php';
?>