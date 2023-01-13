<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new MenuCategorie();
        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => $O_MenuCategorie->donneListeCategorie()));

    }

}