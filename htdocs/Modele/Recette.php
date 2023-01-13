<?php

final class Recette
{
    private $_S_nomRecette;
    private $_S_instructions;
    /*private $_A_ingredients;
    private $_I_difficulte;*/

    public function __construct($_S_nomRecette, $_S_instructions,/*$_A_ingredients, $_I_difficulte*/) { 
        $this->_S_nomRecette = $_S_nomRecette;
        $this->_S_instructions = $_S_instructions;
        /*$this->_A_ingredients = $_A_ingredients;
        $this->_I_difficulte = $_I_difficulte;*/
        /* attention pas de symbole dollar sur les attributs après le this.*/
    }

    public function donneNomRecette()
    {
        return $this->_S_nomRecette;
    }

    public function donneInstructions()
    {
        return $this->_S_instructions;
    }
    /*public function donneDifficulte()
    {
        return $this->_I_difficulte;
    }
    public function donneNombreIngredients() {
        return sizeof($this->_A_ingredients); 
    }
    public function donneIngredients($_I_index)
    {
        return $this->_A_ingredients[$_I_index];
    }*/

}