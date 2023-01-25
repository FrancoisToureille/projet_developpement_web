<?php

class ControleurRecherche
{

    public function defautAction(){

        $O_Categorie = new Categorie();

        $A_listeRecette = $O_Categorie->donneListeRecetteCategorie(array());
        Vue::montrer("recherche/afficheResult", array('listeRecetteRecherche' =>  $A_listeRecette));
    }


    public function afficheResultAction(){

        $O_Categorie = new Categorie();

        $A_listeRecette = $O_Categorie->donneListeRecetteCategorie($_POST['categories']);

        $S_recherche = !empty($_POST["search_input"]) ? $_POST["search_input"] : ""; //Récupere texte barre de recherche
        $A_listeRecetteRecherche = array();
        foreach ($A_listeRecette as $key => $O_recette) { //Pour chaque recette
            if (preg_match('/'.$S_recherche.'/i', $O_recette->nomRecette)) { //Si elle correspond à la recherche
                array_push($A_listeRecetteRecherche, $O_recette);
            }
        }

        Vue::montrer("recherche/afficheResult", array('listeRecetteRecherche' =>  $A_listeRecetteRecherche));

    }
}