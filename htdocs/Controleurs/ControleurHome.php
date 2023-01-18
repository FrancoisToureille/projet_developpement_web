<?php

class ControleurHome
{
    public function defautAction()
    {
        $O_Categorie = new Categorie();
        $A_listeCategorie = $O_Categorie->donneListeCategorie();

        $A_listeSousCategorie = $O_Categorie->donneListeSousCategorie();

        Vue::montrer('home/home', array('listeCategorie' => $A_listeCategorie, 'listeSousCategorie' => $A_listeSousCategorie));


    }
}