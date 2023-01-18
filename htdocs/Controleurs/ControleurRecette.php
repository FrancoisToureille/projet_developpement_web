<?php

final class ControleurRecette
{
    public function defautAction()
    {
        $_A_recettesBD = Recette::donneToutesRecettes();
        $_A_recettes = array();
        foreach (range(0, sizeof($_A_recettesBD) - 1) as $_I_indexRecette) {
            $_A_recettes[$_I_indexRecette] = new Recette($_A_recettesBD[$_I_indexRecette]->nomRecette,
            $_A_recettesBD[$_I_indexRecette]->libelle,
            $_A_recettesBD[$_I_indexRecette]->categories,
             $_A_recettesBD[$_I_indexRecette]->ingredients,
              $_A_recettesBD[$_I_indexRecette]->quantites);
        }

        Vue::montrer('recette/blocDebut',array('recettes' => "Recettes"));
        foreach (range(0, sizeof($_A_recettes) - 1) as $_I_indexRecette) {
            Vue::montrer('recette/voirTitreRecette', array('titreRecette' =>  $_A_recettes[$_I_indexRecette]->donneNomRecette()));
            Vue::montrer('recette/voir', array('recette' => "ingredients:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneIngredients()));
            Vue::montrer('recette/voir', array('recette' => "quantites:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneQuantites()));
            Vue::montrer('recette/voir', array('recette' => "instructions:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneInstructions()));
            Vue::montrer('recette/voir', array('recette' => "categories:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneNomCategories()));
            Vue::montrer('recette/voir', array('recette' => "\n *******"));
        }
        Vue::montrer('recette/blocFin',array('fin' => ""));

    }

    public function afficheRecetteAction()
    {
        $_A_recettesBD = Recette::donneRecette("cake");
        $O_recette = new Recette($_A_recettesBD[0]['nomRecette'],
        $_A_recettesBD[0]['libelle'],
        $_A_recettesBD[0]['categories'],
        $_A_recettesBD[0]['ingredients'],
        $_A_recettesBD[0]['quantites']);
        
        Vue::montrer('recette/blocDebut',array('recettes' => "Recettes"));
        Vue::montrer('recette/voirTitreRecette', array('titreRecette' =>  $O_recette->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' => "ingredients:"));
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneIngredients()));
        Vue::montrer('recette/voir', array('recette' => "quantites:"));
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneQuantites()));
        Vue::montrer('recette/voir', array('recette' => "instructions:"));
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneInstructions()));
        Vue::montrer('recette/voir', array('recette' => "categories:"));
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneNomCategories()));
        Vue::montrer('recette/voir', array('recette' => "\n *******"));
        Vue::montrer('recette/blocFin',array('fin' => ""));
        
    }

    public function afficheRecettesCategorieAction(): void
    {
        $_A_recettesBD = Recette::donneToutesRecettes();
        $_A_recettes = array();
        foreach (range(0, sizeof($_A_recettesBD) - 1) as $_I_indexRecette) {
            $_A_recettes[$_I_indexRecette] = new Recette($_A_recettesBD[$_I_indexRecette]->nomRecette,
                $_A_recettesBD[$_I_indexRecette]->libelle,
                $_A_recettesBD[$_I_indexRecette]->categories,
                $_A_recettesBD[$_I_indexRecette]->ingredients,
                $_A_recettesBD[$_I_indexRecette]->quantites);
        }
        $_A_recetteCategorie = Recette::donneToutesRecettesCategorie(2);
        foreach (range(0, sizeof($_A_recetteCategorie) - 1) as $_I_index) {
            Vue::montrer('recette/voir', array('recette' => $_A_recetteCategorie[$_I_index]['nomRecette']));
            Vue::montrer('recette/voir', array('recette' => $_A_recetteCategorie[$_I_index]['nomCategorie']));
        }
    }
}