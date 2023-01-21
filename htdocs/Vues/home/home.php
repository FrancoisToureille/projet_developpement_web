<?php

// liste de categoorie
$S_affichageCategorie = "";
foreach ($A_vue['listeCategorie'] as $superCategorie => $categorie){
    $S_affichageCategorie .= "<li id='$superCategorie'> $superCategorie <ul>";
    foreach ($categorie as $sousCategorie){
        $S_affichageCategorie .= "<li id='$sousCategorie->idCategorie'> $sousCategorie->nomCategorie </li>";
    }
    $S_affichageCategorie .= "</ul> </li>";
}