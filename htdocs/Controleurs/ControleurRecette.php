<?php

final class ControleurRecette
{
    public function defautAction()
    {

        $_O_recette =  new Recette("cake au citron", "melanger le tout"/*,array("farine","citron"),2*/);
        Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneInstructions()));
       
        /*affichage des ingrédients d'une recette*/
        /*$_I_nombre = $_O_recette->donneNombreIngredients();
        foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
            Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneIngredients($_I_indexIngredient)));

        }
        Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneDifficulte()));*/

    }


    /*public function afficheIngredientAction()
    {

        $_O_recette =  new Recette("cake au citron", "melanger le tout",array("farine","citron"),2);
       
        affichage des ingrédients d'une recette
        $_I_nombre = $_O_recette->donneNombreIngredients();
        foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
            Vue::montrer('recette/voir', array('recette' =>  $_O_recette->donneIngredients($_I_indexIngredient)));

        }

    }*/

    public function afficheRecettesAction()
    {
        $_A_recettesBD = Recette::donneToutesLesRecettesBDD();
        $_A_recettes = array();
        foreach (range(0, sizeof($_A_recettesBD) - 1) as $_I_indexRecette) {

            $_A_recettes[$_I_indexRecette] = new Recette($_A_recettesBD[$_I_indexRecette]->nomRecette,$_A_recettesBD[$_I_indexRecette]->libelle);
        }
       
        /*$_A_recettes = array(new Recette("cake au citron", "melanger le tout",array("farine","citron"),2),
        new Recette("cake aux olives", "melanger le tout",array("farine","olive"),2));*/

        foreach (range(0, sizeof($_A_recettes) - 1) as $_I_indexRecette) {
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneNomRecette()));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneInstructions()));       
            /*$_I_nombre = $_A_recettes[$_I_indexRecette]->donneNombreIngredients();
            foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
                Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneIngredients($_I_indexIngredient)));

            }
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneDifficulte()));*/
    }
    }
}