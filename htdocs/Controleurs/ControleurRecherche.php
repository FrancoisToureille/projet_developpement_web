<?php

class ControleurRecherche
{

    public function defautAction(){

        $O_Categorie = new Categorie();
    }


    public function afficheResultAction(){

        $O_Categorie = new Categorie();

        $A_listeRecette = $O_Categorie->donneListeRecetteCategorie($_POST['categories']);

        $S_recherche = !empty($_POST["search_input"]) ? $_POST["search_input"] : ""; //Récupere texte barre de recherche
        $A_listeRecetteRecherche = array();
        foreach ($A_listeRecette as $key => $O_recette) { //Pour chaque recette
            if (preg_match('/'.$S_recherche.'/i', $O_recette->nomRecette)) { //Si elle correspond à la recherche
                array_push($A_listeRecetteRecherche, $O_recette->nomRecette);
            }
        }

        $S_AffichageRecetteRecherche = "";
        foreach ($A_listeRecetteRecherche as $S_recetteRecherche) { //A modifier pour bien afficher
            $S_AffichageRecetteRecherche .= $S_recetteRecherche . "<br />";
        }
        Vue::montrer("recherche/rechercheRegex", array('recherche' =>  $S_AffichageRecetteRecherche));


        //Vue::montrer('recherche/recherche', array('listeRecetteRecherche' => print_r($A_listeRecetteCategorie)));


    }
}