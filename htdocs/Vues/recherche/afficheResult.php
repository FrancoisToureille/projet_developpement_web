<?php


foreach ($A_vue['listeRecetteRecherche'] as $O_recetteRecherche) {
    echo "<form action='/Recette/afficheRecette' method='POST'>
            <input type='hidden' name='id' value='". $O_recetteRecherche->idRecette . "' /> 
            <input type='submit' value='" . $O_recetteRecherche->nomRecette . "' class='button' />
        </form>";
}

