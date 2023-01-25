<?php


foreach ($A_vue['listeRecetteRecherche'] as $O_recetteRecherche) {
    echo "<a href='/Recette/afficheRecette/" . $O_recetteRecherche->idRecette . "'>" . $O_recetteRecherche->nomRecette . "</a>";
}

