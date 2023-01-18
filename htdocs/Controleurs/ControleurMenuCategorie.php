<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new Categorie();
        $A_listeCategorie = $O_MenuCategorie->donneListeCategorie();



        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => $S_affichageCategorie));

        $controleurRecherche = new ControleurRecherche();
        $controleurRecherche->defautAction();

    }

}