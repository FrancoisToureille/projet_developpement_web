<?php

class ControleurHome
{
    public function defautAction()
    {
        $O_Categorie = new Categorie();
        $A_listeCategorie = $O_Categorie->donneListeCategorie();

        //Pour l'affichage des recettes aléatoires

        $A_recettesBD = Recette::donneRecettesAleatoiresImage();
        $A_recettes = array();
        $A_moyennesNotation = array();
        foreach (range(0, sizeof($A_recettesBD) - 1) as $I_indexRecette) {
            $A_recettes[$I_indexRecette] = new Recette($A_recettesBD[$I_indexRecette]->nomRecette,
                $A_recettesBD[$I_indexRecette]->libelle,
                $A_recettesBD[$I_indexRecette]->categories,
                $A_recettesBD[$I_indexRecette]->ingredients,
                $A_recettesBD[$I_indexRecette]->quantites,
                $A_recettesBD[$I_indexRecette]->image);
            $A_moyennesNotation[] = Recette::moyenneAvisRecette($A_recettesBD[$I_indexRecette]->idRecette); // recupere la moyenne de notation pour chaques recettes
        }

        // on appelle la vue

        Vue::montrer('home/home', array('listeCategorie' => $A_listeCategorie,'recette1' => $A_recettes[0]->donneNomRecette(),
            'recette1' => $A_recettes[0]->donneNomRecette(), 'ingredients1' =>  $A_recettes[0]->donneIngredients(),'quantites1' =>  $A_recettes[0]->donneQuantites(), 'instructions1' =>  $A_recettes[0]->donneInstructions(),'categories1' =>  $A_recettes[0]->donneNomCategories(),'image1' =>  $A_recettes[0]->donneImage(), 'moyenneNotation1' =>$A_moyennesNotation[0],
            'recette2' => $A_recettes[1]->donneNomRecette(), 'ingredients2' =>  $A_recettes[1]->donneIngredients(),'quantites2' =>  $A_recettes[1]->donneQuantites(), 'instructions2' =>  $A_recettes[1]->donneInstructions(),'categories2' =>  $A_recettes[1]->donneNomCategories(),'image2' =>  $A_recettes[1]->donneImage(), 'moyenneNotation2' =>$A_moyennesNotation[1],
            'recette3' => $A_recettes[2]->donneNomRecette(), 'ingredients3' =>  $A_recettes[2]->donneIngredients(),'quantites3' =>  $A_recettes[2]->donneQuantites(), 'instructions3' =>  $A_recettes[2]->donneInstructions(),'categories3' =>  $A_recettes[2]->donneNomCategories(),'image3' =>  $A_recettes[2]->donneImage(), 'moyenneNotation3' =>$A_moyennesNotation[2]));
    }
}