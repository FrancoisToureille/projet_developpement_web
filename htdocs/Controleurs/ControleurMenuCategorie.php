<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new MenuCategorie();
        $A_listeCategorie = $O_MenuCategorie->donneListeCategorie();

        $S_affichageCategorie = "";

        foreach ($A_listeCategorie as $superCategorie => $categorie){
            $S_affichageCategorie .= "<li id='$superCategorie'> <p>$superCategorie</p> <ul>";
            foreach ($categorie as $sousCategorie){
                $S_affichageCategorie .= "<li id='$sousCategorie->idCategorie'> $sousCategorie->nomCategorie </li>";
            }
            $S_affichageCategorie .= "</ul> </li>";
        }

        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => print($S_affichageCategorie)));

    }

}