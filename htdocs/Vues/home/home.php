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

//liste de cattegorie pour le filtre
$S_affichageCheckBox = "<form method='post' action='../recherche/afficheResult' >";

foreach ($A_vue['listeSousCategorie'] as $item){
    $S_affichageCheckBox .= "<input type='checkbox' name='categories[]' value='$item->idCategorie'>$item->nomCategorie</input>";
}

$S_affichageCheckBox .= "<input type='submit' value='Soumettre' name='submit'></form>";

echo "<div class = \"menuCategorie\">
     <ul>"
    . $S_affichageCategorie  .
    "</ul>
    </div>
    <div class = \"checkBoxCategorie\"> " . $S_affichageCheckBox . "</div>";
