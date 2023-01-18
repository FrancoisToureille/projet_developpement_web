<?php

final class Recette
{
    private $S_nomRecette;
    private $S_instructions;
    private $S_nomCategories;
    private $S_ingredients;
    private $_quantites;
    /*private $_I_difficulte;*/

    public function __construct($S_nomRecette, $S_instructions, $S_nomCategories, $S_ingredients, $S_quantites/*, $_I_difficulte*/) { 
        $this->S_nomRecette = $S_nomRecette;
        $this->S_instructions = $S_instructions;
        $this->S_nomCategories = $S_nomCategories;
        $this->S_ingredients = $S_ingredients;
        $this->S_quantites = $S_quantites;
        /*$this->_I_difficulte = $_I_difficulte;*/
        /* attention pas de symbole dollar sur les attributs après le this.*/
    }

    public function donneNomRecette()
    {
        return $this->S_nomRecette;
    }

    public function donneQuantites()
    {
        return $this->S_quantites;
    }

    public function donneInstructions()
    {
        return $this->S_instructions;
    }

    public function donnenomCategories()
    {
        return $this->S_nomCategories;
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

    public static function donneRecette($S_nomRecetteDemandee) {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("SELECT r.idRecette, r.nomRecette, r.libelle, cat.categories, ing.ingredients, ing.quantites
            FROM recette r
            
            INNER JOIN
            (SELECT rc.idRecette as rcIdRecette, GROUP_CONCAT(c.nomCategorie) categories
            FROM recetteCategorie rc
            INNER JOIN categorie c ON c.idCategorie = rc.idCategorie
            GROUP BY rc.idRecette) cat
            
            ON cat.rcIdRecette = r.idRecette
            
            INNER JOIN 
            (SELECT ri.idRecette as riIdRecette, GROUP_CONCAT(i.libelle) as ingredients, GROUP_CONCAT(ri.quantite) as quantites
            FROM recetteIngredient ri
            INNER JOIN ingredient i ON ri.idIngredient = i.idIngredient
            GROUP BY ri.idRecette) ing
            
            ON ing.riIdRecette = r.idRecette
            WHERE r.nomRecette = ?;");
            $O_statement->execute(array($S_nomRecetteDemandee));
            $O_statement->setFetchMode(PDO::FETCH_ASSOC);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public static function donneToutesRecettes() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT r.idRecette, r.nomRecette, r.libelle, cat.categories, ing.ingredients, ing.quantites
            FROM recette r
            
            INNER JOIN
            (SELECT rc.idRecette as rcIdRecette, GROUP_CONCAT(c.nomCategorie) categories
            FROM recetteCategorie rc
            INNER JOIN categorie c ON c.idCategorie = rc.idCategorie
            GROUP BY rc.idRecette) cat
            
            ON cat.rcIdRecette = r.idRecette
            
            INNER JOIN 
            (SELECT ri.idRecette as riIdRecette, GROUP_CONCAT(i.libelle) as ingredients, GROUP_CONCAT(ri.quantite) as quantites
            FROM recetteIngredient ri
            INNER JOIN ingredient i ON ri.idIngredient = i.idIngredient
            GROUP BY ri.idRecette) ing
            
            ON ing.riIdRecette = r.idRecette");
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
    }*/
    
    public function donneIngredients()
    {
        return $this->S_ingredients;
    }

    /**
     * Renvoie toutes les recettes (id, nom) d'une catégorie (idCategorie)
     * Toutes categorie fille d'une categorie sont considérées comme telle
     * @param $I_idCategorie
     * @return array|false|string|void
     */
    public static function donneToutesRecettesCategorie($I_idCategorie){
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("
            with recursive f (idCategorie, idPere) as (
            SELECT c1.idCategorie, c1.idPere
            FROM categorie c1
    		WHERE idCategorie = ?
            union all
            SELECT c2.idCategorie, c2.idPere
            FROM categorie c2
            inner join f on f.idCategorie = c2.idPere)
            select rc.idRecette, nomRecette, rc.idCategorie, c.nomCategorie
            from recetteCategorie rc, f, recette r, categorie c
            where f.idCategorie = rc.idCategorie
            AND rc.idRecette = r.idRecette
            AND rc.idCategorie = c.idCategorie;");

            $O_statement->setFetchMode(PDO::FETCH_ASSOC);
            $O_statement->execute(array($I_idCategorie));
            if ($O_statement->columnCount()){
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}