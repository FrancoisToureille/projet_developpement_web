<?php

final class ControleurRecette
{
    public function defautAction()
    {
        $_O_recette =  new Recette("cake au citron", "melanger le tout","cat"/*,array("farine","citron"),2*/);
        Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneInstructions()));
    }

    public function afficheRecettesAction()
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
       
        /*$_A_recettes = array(new Recette("cake au citron", "melanger le tout",array("farine","citron"),2),
        new Recette("cake aux olives", "melanger le tout",array("farine","olive"),2));*/

        foreach (range(0, sizeof($_A_recettes) - 1) as $_I_indexRecette) {
            Vue::montrer('recette/voir', array('recette' => "recette:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneNomRecette()));
            Vue::montrer('recette/voir', array('recette' => "ingredients:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneIngredients()));
            Vue::montrer('recette/voir', array('recette' => "quantites:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneQuantites()));
            Vue::montrer('recette/voir', array('recette' => "instructions:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneInstructions()));
            Vue::montrer('recette/voir', array('recette' => "categories:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneNomCategories()));
            Vue::montrer('recette/voir', array('recette' => "\n *******"));
            

            /*$_I_nombre = $_A_recettes[$_I_indexRecette]->donneNombreIngredients();
            foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
                Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneIngredients($_I_indexIngredient)));

            }
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneDifficulte()));*/
        }
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