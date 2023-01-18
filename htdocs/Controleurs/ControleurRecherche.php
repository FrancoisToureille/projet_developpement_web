<?php

class ControleurRecherche
{

    public function defautAction(){

        $O_Categorie = new Categorie();
    }

    public function rechercheRegexAction() {
        $B_categorieSelectionnee = false; //A modif pour savoir si il y a un filtre par catégorie(s) activé 
        if ($B_categorieSelectionnee) { //Si la recherche est filtrée par catégorie
            $A_listeRecette = Recette::donneToutesNomRecetteNomCategorie(); //A modif, il faudrait récupérer la liste des recettes pour les catégories sélectionnées
        } else {
            $A_listeRecette = Recette::donneTousLesNomsDeRecettesBDD(); //Il faudrait une fonction donneTousLesNomsRecettesBDD
        }

        $S_recherche = $_POST["search_input"]; //Récupere texte barre de recherche
        $A_listeRecetteRecherche = array(); 
        foreach ($A_listeRecette as $key => $S_recette) { //Pour chaque recette
            if (preg_match('/'.$S_recherche.'/i', $S_recette)) { //Si elle correspond à la recherche
                array_push($A_listeRecetteRecherche, $S_recette);
            }
        }

        $S_AffichageRecetteRecherche = "";
        foreach ($A_listeRecetteRecherche as $S_recetteRecherche) { //A modifier pour bien afficher 
            $S_AffichageRecetteRecherche .= $S_recetteRecherche . "<br />";
        }
        Vue::montrer("recherche/rechercheRegex", array('recherche' =>  $S_AffichageRecetteRecherche));

    }
}