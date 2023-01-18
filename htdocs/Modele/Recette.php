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

    public static function donneToutesLesRecettesBDD() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT nomRecette,libelle FROM recette");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function donneTousLesNomsDeRecettesBDD() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $A_data = $O_pdo->query("SELECT nomRecette FROM recette")->fetchAll(PDO::FETCH_COLUMN);
            return $A_data;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function donneToutesNomRecetteNomCategorie() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT nomRecette,nomCategorie FROM recette R, categorie C, recetteCategorie RC WHERE R.idRecette = RC.idRecette AND C.idCategorie = RC.idCategorie");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function donneToutesNomRecetteNomIngredient() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT nomRecette, I.libelle FROM recette R, ingredient I, recetteIngredient RI WHERE R.idRecette = RI.idRecette AND I.idIngredient = RI.idIngredient");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
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