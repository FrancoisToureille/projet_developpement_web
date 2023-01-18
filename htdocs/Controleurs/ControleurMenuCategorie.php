<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_Categorie = new Categorie();
        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => $O_Categorie->donneListeCategorie()));

    }

}