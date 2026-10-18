<?php

/**
 * Auteur : Ilyas Elboatani
 * Objectif : Sérialisation des données, export et lecture au format JSON, et comparaison avec serialize().
 * Date : 14/10/2026
 */
require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Sérialisation et Export JSON</h2>";

// 1. Construire un tableau associatif des résultats
$donneesExport = [
    "etablissement" => ETABLISSEMENT,
    "date" => date('Y-m-d'),
    "notes" => []
];

$fichierCsv = 'data/notes.csv';
if (file_exists($fichierCsv)) {
    $fp = fopen($fichierCsv, 'r');
    while (($ligne = fgetcsv($fp, 1000, ';')) !== FALSE) {
        $donneesExport["notes"][] = [
            "nom" => $ligne[0],
            "info" => $ligne[1],
            "math" => $ligne[2],
            "moyenne" => $ligne[3],
            "mention" => $ligne[4]
        ];
    }
    fclose($fp);
}

// 2. Écrire dans data/notes.json avec json_encode() et file_put_contents()
if (!is_dir('data')) {
    mkdir('data', 0777, true);
}
$jsonString = json_encode($donneesExport, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data/notes.json', $jsonString);
echo "<p style='color:green;'>Données exportées avec succès dans <code>data/notes.json</code>.</p>";

// 3. Relire avec file_get_contents() puis json_decode(..., true)
$contenuJson = file_get_contents('data/notes.json');
$tableauDecode = json_decode($contenuJson, true);

echo "<h3>Contenu décodé du fichier JSON :</h3>";
echo "<pre>";
print_r($tableauDecode);
echo "</pre>";

// 4. Comparaison serialize() et json_encode()
$donneesSimple = ["nom" => "Mohamed", "note" => 16];
$serialise = serialize($donneesSimple);
$encodeJson = json_encode($donneesSimple);

echo "<h3>Comparaison :</h3>";
echo "<p><strong>serialize() :</strong> " . htmlspecialchars($serialise) . "</p>";
echo "<p><strong>json_encode() :</strong> " . htmlspecialchars($encodeJson) . "</p>";
echo "<p><em>Le format JSON est directement exploitable par une application JavaScript.</em></p>";

include 'includes/pied_inc.php';
?>