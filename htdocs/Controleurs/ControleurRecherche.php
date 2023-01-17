<?php

class ControleurRecherche
{

    public function defautAction(){

        $O_Categorie = new Categorie();
        $A_listeSousCategorie = $O_Categorie->donneListeSousCategorie();

        $S_affichageCheckBox = "<form method='post' action='../gestionnaire/GestionnaireCheckCategorie.php' >";

        foreach ($A_listeSousCategorie as $item){
            $S_affichageCheckBox .= "<input type='checkbox' name='categories' value='$item->nomCategorie'>$item->nomCategorie</input>";
        }

        $S_affichageCheckBox .= "<input type='submit' value='Soumettre' name='submit'></form>";

        Vue::montrer('menuCategorie', array('checkBoxList' => $S_affichageCheckBox));
    }

    public function afficheCheckAction(){

        $O_Categorie = new Categorie();

        if (isser($_POST["submit"])){
            if (!empty($_POST['categories'])){
                $A_listeRecetteCategorie = $O_Categorie->donneListeRecetteCategorie($_POST['categories']);

                Vue::montrer('menuCategorie', array('listeRecetteRecherche' => print_r($A_listeRecetteCategorie)));
            }
        }
    }
}