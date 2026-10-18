<?php
/**
 * Auteur : Ilyas Elboatani
 * Objectif : Utilisation des structures de contrôle (conditions if/else, switch et boucles).
 * Date : 14/10/2026
 */

//EXERCICE 2.1
require 'config.php';

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// Tester la fonction avec plusieurs notes
$notesTest = [17, 15, 13, 10, 8];

foreach ($notesTest as $n) {
    echo "Note : $n -> Mention : " . mention($n) . "<br>";
}




// Exercice 2.2 

$moisCourant = date("m");
$nomMois = "";

switch ($moisCourant) {
    case "01":
        $nomMois = "Janvier";
        break;
    case "02":
        $nomMois = "Février";
        break;
    case "03":
        $nomMois = "Mars";
        break;
    case "04":
        $nomMois = "Avril";
        break;
    case "05":
        $nomMois = "Mai";
        break;
    case "06":
        $nomMois = "Juin";
        break;
    case "07":
        $nomMois = "Juillet";
        break;
    case "08":
        $nomMois = "Août";
        break;
    case "09":
        $nomMois = "Septembre";
        break;
    case "10":
        $nomMois = "Octobre";
        break;
    case "11":
        $nomMois = "Novembre";
        break;
    case "12":
        $nomMois = "Décembre";
        break;
    default:
        $nomMois = "Mois inconnu";
        break;
}

echo "Nous sommes au mois de : $nomMois<br>";

/*
   Question : que se passe-t-il si vous oubliez un break dans un case ?
   
   Réponse : 
   Si on oublie le `break`, PHP continue d'exécuter le code des cas suivants 
   jusqu'à ce qu'il rencontre un `break` ou la fin du `switch`, ce qui donne des résultats erronés 
   car plusieurs blocs de code s'exécutent en même temps.
*/







// Exercice 2.3 


//1)
echo "<h3>Triangle d'étoiles</h3>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";

// 2)
echo "<h3>Nombres de 0 à 20 (pas de 2)</h3>";
$k = 0;
while ($k <= 20) {
    if ($k == 10) {
        echo "<b>$k</b><br>";
    } else {
        echo "$k<br>";
    }
    $k += 2;
}
echo "<br>";

// 3)
echo "<h3>Nombres pairs avec for et continue</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i<br>";
}
echo "<br>";

// 4)
echo "<h3>Boucle while avec switch et break</h3>";
$i = 0;
while (true) {
    $i++;
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break 1; 
        case 10:
            echo "At 10; quitting<br>";
            break 2; 
        default:
            break;
    }
    if ($i >= 10) {
        break;
    }
}
echo "<br>";

// 5)
echo "<h3>Réécriture avec do-while</h3>";
$m = 0;
do {
    if ($m == 10) {
        echo "<b>$m</b><br>";
    } else {
        echo "$m<br>";
    }
    $m += 2; } while ($m <= 20);

/*
   Différence essentielle entre while et do-while :
    # `while` vérifier la condition *avant* d'exécuter le bloc de code.
    #`do-while` exécute le bloc de code *au moins une fois* avant de vérifier la condition.
*/
?>