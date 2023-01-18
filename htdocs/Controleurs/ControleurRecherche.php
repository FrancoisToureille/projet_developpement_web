<?php

class ControleurRecherche
{

    public function defautAction(){

        $O_Categorie = new Categorie();
        $A_listeSousCategorie = $O_Categorie->donneListeSousCategorie();

        $S_affichageCheckBox = "<form method='post' action='../recherche/afficheResult' >";

        foreach ($A_listeSousCategorie as $item){
            $S_affichageCheckBox .= "<input type='checkbox' name='categories[]' value='$item->idCategorie'>$item->nomCategorie</input>";
        }

        $S_affichageCheckBox .= "<input type='submit' value='Soumettre' name='submit'></form>";

        Vue::montrer('recherche/recherche', array('checkBoxList' => $S_affichageCheckBox));
    }

    public function afficheResultAction(){

        $O_Categorie = new Categorie();

        if (isset($_POST["submit"])){
            if (!empty($_POST['categories'])){
                $A_listeRecetteCategorie = $O_Categorie->donneListeRecetteCategorie($_POST['categories']);

                Vue::montrer('recherche/recherche', array('listeRecetteRecherche' => print_r($A_listeRecetteCategorie)));
            }
        }
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