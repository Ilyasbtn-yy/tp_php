<?php
/**
 * Auteur : Ilyas Elboatani
 * Objectif : Manipulation des tableaux indexés et associatifs, fonctions de tri et statistiques.
 * Date : 14/10/2026
 */
// PARTIE 4 - Exercice 4.1 : Inclusions
// ==========================================

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

/*
   Expérience 1 : 
   - include 'inexistant.php'; -> Affiche un Warning et CONTINUE le script.
   - require 'inexistant.php'; -> Affiche une Erreur Fatale et ARRÊTE le script.

   Expérience 2 :
   - include 'includes/menu_inc.php'; deux fois -> Affiche le menu deux fois.
   - include_once 'includes/menu_inc.php'; deux fois -> L'affiche une seule fois.
*/



//partie 3

// Exercice 3.1 : Création


$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["PHP", "Probabilitée", "Structure de donnée"];

echo "<h3>Affichage des modules avec foreach :</h3>";

foreach ($modules as $module) {
    echo "- $module <br>";
}

echo "<h3>Affichage des modules par indice :</h3>";
echo "Module 0 : $modules[0] <br>";
echo "Module 1 : $modules[1] <br>";
echo "Module 2 : $modules[2] <br>";

// Exercice 3.2 : Affichage HTML
if (!function_exists('mention')) {
    function mention($note) {
        if ($note >= 16) return "Très bien";
        elseif ($note >= 14) return "Bien";
        elseif ($note >= 12) return "Assez bien";
        elseif ($note >= SEUIL) return "Passable";
        else return "Ajourné";
    }
}

echo "<h3>Exercice 3.2 : Tableau HTML des notes</h3>";
echo "<table>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? "style='color: red;'" : "";
    $ment = mention($note);
    
    echo "<tr $style>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>$ment</td>";
    echo "</tr>";
}
echo "</table>";

// Exercice 3.3 : Statistiques
echo "<h3>Exercice 3.3 : Statistiques</h3>";
$somme = 0;
$nombreNotes = 0;
$premiereValeur = reset($notes);
$maxNote = $premiereValeur;
$minNote = $premiereValeur;
$maxNom = key($notes);
$minNom = key($notes);

foreach ($notes as $nom => $note) {
    $somme += $note;
    $nombreNotes++;
    
    if ($note > $maxNote) {
        $maxNote = $note;
        $maxNom = $nom;
    }
    if ($note < $minNote) {
        $minNote = $note;
        $minNom = $nom;
    }
}
$moyenne = $somme / $nombreNotes;

echo "1) Avec boucles : Somme = $somme, Moyenne = " . round($moyenne, 2) . ", Max = $maxNote ($maxNom), Min = $minNote ($minNom) <br>";

$vSomme = array_sum($notes);
$vCount = count($notes);
$vMoyenne = $vSomme / $vCount;
$vMax = max($notes);
$vMin = min($notes);


echo "2) Avec fonctions natives : Somme = $vSomme, Moyenne = " . round($vMoyenne, 2) . ", Max = $vMax, Min = $vMin <br>";

$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}

echo "3) Effectifs par mention : <br>";
foreach ($effectifs as $mentionNom => $eff) {
    echo "- $mentionNom : $eff apprenant(s) <br>";
}

// Exercice 3.4 : Tri

echo "<h3>Exercice 3.4 : Tri</h3>";

function afficher($tab) {
    foreach ($tab as $k => $v) {
        echo "$k : $v | ";
    }
    echo "<br>";
}

echo "<b>1) Tri par noms croissants (ksort) :</b><br>";
$notes1 = $notes;
ksort($notes1);
afficher($notes1);

echo "<b>2) Tri par notes décroissantes (arsort) :</b><br>";
$notes2 = $notes;
arsort($notes2);
afficher($notes2);

echo "<b>3) Tri par noms décroissants (krsort) :</b><br>";
$notes3 = $notes;
krsort($notes3);
afficher($notes3);

echo "<b>4) Tri par notes croissantes (asort) :</b><br>";
$notes4 = $notes;
asort($notes4);
afficher($notes4);

/*
   Question : Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?
   Réponse : On utilise `sort()` pour un tri croissant ou `rsort()` pour un tri décroissant.
*/

// Exercice 3.5 : Opérateurs de tableaux

echo "<h3>Exercice 3.5 : Opérateurs de tableaux</h3>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<b>\$a + \$b :</b><br>";
var_dump($a + $b);// true (même clés/valeurs, l'ordre n'importe pas)
echo "<br>";

echo "<b>\$a == \$b :</b><br>";
var_dump($a == $b);// false (ordre des clés différent)
echo "<br>";

echo "<b>\$a === \$b :</b><br>";
var_dump($a === $b);
echo "<br>";

/*
   Explications :
     `$a + $b` : Fait l'union, les clés de $a priment.
     `$a == $b` : Retourne true si mêmes paires clé/valeur indépendamment de l'ordre.
     `$a === $b` : Retourne true uniquement si mêmes paires ET dans le même ordre exact.
*/
?>