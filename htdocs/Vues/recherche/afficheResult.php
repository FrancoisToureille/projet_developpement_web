<?php

$S_affichageResultat = "";
foreach ($A_vue['listeRecetteRecherche'] as $O_recetteRecherche) {
    $S_affichageResultat .= "<a class='resultRecherche' href='/Recette/afficheRecette/" . $O_recetteRecherche->idRecette . "'>" . $O_recetteRecherche->nomRecette . "</a>";
}

echo "
<div id='afficheResult'>"
    . $S_affichageResultat .
"</div>
";