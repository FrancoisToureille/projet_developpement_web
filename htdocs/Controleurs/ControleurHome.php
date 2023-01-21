<?php

class ControleurHome
{
    public function defautAction()
    {
        $O_Categorie = new Categorie();
        $A_listeCategorie = $O_Categorie->donneListeCategorie();

        Vue::montrer('home/home', array('listeCategorie' => $A_listeCategorie));

    }
}