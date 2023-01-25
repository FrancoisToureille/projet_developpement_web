<?php

final class ControleurInsertion {
    public function defautAction() {
        $O_Categorie = new Categorie();
        Vue::montrer('insertion/insertion', array('listeSousCategorie' => $O_Categorie->donneListeSousCategorie(), 'listeIngredient' => Ingredient::donneTousLesIngredients()));
    }
}