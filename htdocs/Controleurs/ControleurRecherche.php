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
}