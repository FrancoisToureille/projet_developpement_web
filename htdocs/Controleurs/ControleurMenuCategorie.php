<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new MenuCategorie();
        Vue::montrer('categorie/menuCategorie', array('categorie' => $O_MenuCategorie->donneListeCategorie()));

    }

}