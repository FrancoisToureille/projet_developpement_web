<?php

final class ControleurInsertion {
    public function defautAction() {
        $O_Categorie = new Categorie();
        Vue::montrer('insertion/insertion', array('listeSousCategorie' => $O_Categorie->donneListeSousCategorie(), 'listeIngredient' => Ingredient::donneTousLesIngredients()));
    }

    public function enregistreRecetteAction() {
        //Récupération des informations sur la recette
        $S_nomRecette = $_POST['nom_recette'];
        $S_libelle = $_POST['libelle'];
        $S_lienImage = $_POST['lienImage'];
        
        $A_quantite = $_POST['quantites'];

        $A_ingredients = $_POST['ingredients'];
        $A_categories = $_POST['categories'];

        $A_idIngredients = array();

        foreach ($A_ingredients as $key => $idIngredient) { //Construction du tableau pour la fonction d'insertion
            $A_idIngredients[$idIngredient] = $A_quantite[$key];
        }

        Recette::ajouterRecette($S_nomRecette, $S_libelle, $S_lienImage, $A_categories, $A_idIngredients);
    }
}