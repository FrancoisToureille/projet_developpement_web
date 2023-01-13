<?php

final class ControleurRecette
{
    public function defautAction()
    {

        $O_recette =  new Recette("cake au citron", "melanger le tout",array("farine","citron"),2);
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneInstructions()));
       
        /*affichage des ingrédients d'une recette*/
        $_I_nombre = $O_recette->donneNombreIngredients();
        foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
            Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneIngredients($_I_indexIngredient)));

        }
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneDifficulte()));

    }


    public function afficheIngredientAction()
    {

        $O_recette =  new Recette("cake au citron", "melanger le tout",array("farine","citron"),2);
       
        /*affichage des ingrédients d'une recette*/
        $_I_nombre = $O_recette->donneNombreIngredients();
        foreach (range(0, $_I_nombre - 1) as $_I_indexIngredient) {
            Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneIngredients($_I_indexIngredient)));

        }

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {
        Vue::montrer('recette/testform', array('formData' =>  $A_postParams));
    }
}