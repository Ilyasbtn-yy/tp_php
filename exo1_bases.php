<?php

?>
/**
 * Auteur : Ilyas Elboatani
 * Objectif : Manipulation des bases de PHP (déclaration de variables, types et affichage).
 * Date : 14/10/2026
 */
//--------------------------------------------
// PARTIE 0 
//--------------------------------------------

// Commentaire sur une ligne avec //
# Autre commentaire sur une ligne
/*
   Commentaire sur 
   plusieurs lignes
*/

echo 'Hello PHP <br>';




//--------------------------------------------
// PARTIE 1 : 
//--------------------------------------------

#Exercice 1.1

/*
   Noms valides : $x, $_x, $Prix_HT, $état
   Noms invalides : 
      *** $2x (commence par un chiffre -> interdit en PHP)
      *** $x-y (contient un tiret -> considere comme une soustraction)
*/

// Déclaration des variables valides :
$x = 1;
$_x = 2;
$Prix_HT = 60;
$état = "Actif";

// Montrer que $a et $A sont distincts :
$a = 5;
$A = 15;
echo "Valeur de \$a : $a <br>";
echo "Valeur de \$A : $A <br>";


#Exercice 1.2

require 'config.php';
//Afficher chaque constante
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "Note Min : " . NOTE_MIN . "<br>";
echo "Note Max : " . NOTE_MAX . "<br>";
echo "Seuil : " . SEUIL . "<br>";
//Tester defined('SEUIL') et defined('INCONNUE')
var_dump(defined('SEUIL'));  
echo "<br>";
var_dump(defined('INCONNUE')); 
echo "<br>";


/*
   Réponses aux questions :
   
   - Que se passe-t-il si vous affichez une constante non définie ?
         ==> PHP affiche un (Warning) et affiche le nom de la constante brute sous forme de chaîne de caractères.
     
   - Quelle différence y a-t-il entre const et define() ?
         ==> 'const' est évalué à la compilation (il est statique et ne peut pas être placé à l'intérieur d'une condition if),
            tandis que 'define()' est évalué à l'exécution (il est dynamique et peut être utilisé de manière conditionnelle).
*/



#Exercice 1.3

$prix_ht = 60;
$tva = 20; 
$prix_ttc = $prix_ht * (1 + $tva / 100);

echo "Le prix TTC du produit est: $prix_ttc € <br>";



#Exercice 1.4

//1)
$test = 42;
$test = (string) $test;
var_dump($test);
echo "<br>";

//2) Prédictions :
/*
   # 0     -> false
   # 0.0   -> false
   # "0"   -> false
   # ""    -> false (chaîne vide)
   # "abc" -> true  (chaîne non vide)
   # []    -> false (tableau vide)
   # null  -> false
*/
var_dump((bool) 0);    
var_dump((bool) 0.0);  
var_dump((bool) "0");  
var_dump((bool) "");   
var_dump((bool) "abc");
var_dump((bool) []);   
var_dump((bool) null); 
echo "<br>";

// 3) Prédictions

/*
   # (int) 3.9    -> int(3)
   # (int) "12abc"-> int(12) (PHP lit les chiffres au début de la chaîne)
   # (float)"1.5e3"-> float(1500) (notation scientifique 1.5 * 10^3)
   # (int) true   -> int(1) (true vaut 1 en entier)
*/
var_dump((int) 3.9);    
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);   
echo "<br>";

// 4) Écrire le nombre 255 en décimal, hexadécimal, octal et binaire
$dec = 255;         // Notation décimale classique
$hex = 0xFF;        // Notation hexadécimale (préfixe 0x)
$oct = 0377;        // Notation octale (préfixe 0)
$bin = 0b11111111;  // Notation binaire (préfixe 0b)

echo "Décimal : $dec, Hexadécimal : $hex, Octal : $oct, Binaire : $bin <br>";


#Exercice 1.5

$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';

echo 'Voulez-vous supprimer C:\*.*?<br>';

echo 'Ceci n\'affichera pas \n de nouvelle ligne (le \n doit apparaître tel quel)<br>';

echo 'Les variables ne seront pas $traitees $ici (variables non interprétées)<br>';

echo "5. Les variables seront $traitees $ici (variables interprétées)<br>";




$chaine = "*Bonjour les développeurs*";
echo trim($chaine, "*") . "<br>";

$mot = "Bonjour les developpeurs";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}




?>