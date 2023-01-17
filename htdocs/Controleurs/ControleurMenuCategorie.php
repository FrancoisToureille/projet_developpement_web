<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new Categorie();
        $A_listeCategorie = $O_MenuCategorie->donneListeCategorie();

        $S_affichageCategorie = "";

        foreach ($A_listeCategorie as $superCategorie => $categorie){
            $S_affichageCategorie .= "<li id='$superCategorie'> $superCategorie <ul>";
            foreach ($categorie as $sousCategorie){
                $S_affichageCategorie .= "<li id='$sousCategorie->idCategorie'> $sousCategorie->nomCategorie </li>";
            }
            $S_affichageCategorie .= "</ul> </li>";
        }

        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => $S_affichageCategorie));

    }

}