<?php

class ControleurMenuCategorie
{

    public function defautAction()
    {

        $O_MenuCategorie = new MenuCategorie();
        $A_listeCategorie = $O_MenuCategorie->donneListeCategorie();

        Vue::montrer('menuCategorie/menuCategorie', array('menuCategorie' => print_r($A_listeCategorie)));

    }

}