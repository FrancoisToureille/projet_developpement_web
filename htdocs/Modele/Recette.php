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

    public static function donneToutesLesRecettesNomId() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT nomRecette, idRecette FROM recette");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function donneRecette($S_idRecetteDemandee) {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("SELECT r.idRecette, r.nomRecette, r.libelle, cat.categories, ing.ingredients, ing.quantites
            FROM recette r
            
            INNER JOIN
            (SELECT rc.idRecette as rcIdRecette, GROUP_CONCAT(c.nomCategorie SEPARATOR ', ') categories
            FROM recetteCategorie rc
            INNER JOIN categorie c ON c.idCategorie = rc.idCategorie
            GROUP BY rc.idRecette) cat
            
            ON cat.rcIdRecette = r.idRecette
            
            INNER JOIN 
            (SELECT ri.idRecette as riIdRecette, GROUP_CONCAT(i.libelle SEPARATOR ', ') as ingredients, GROUP_CONCAT(ri.quantite SEPARATOR ', ') as quantites
            FROM recetteIngredient ri
            INNER JOIN ingredient i ON ri.idIngredient = i.idIngredient
            GROUP BY ri.idRecette) ing
            
            ON ing.riIdRecette = r.idRecette
            WHERE r.idRecette = ?;");
            $O_statement->execute(array($S_idRecetteDemandee));
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
            (SELECT rc.idRecette as rcIdRecette, GROUP_CONCAT(c.nomCategorie SEPARATOR ', ') categories
            FROM recetteCategorie rc
            INNER JOIN categorie c ON c.idCategorie = rc.idCategorie
            GROUP BY rc.idRecette) cat
            
            ON cat.rcIdRecette = r.idRecette
            
            INNER JOIN 
            (SELECT ri.idRecette as riIdRecette, GROUP_CONCAT(i.libelle SEPARATOR ', ') as ingredients, GROUP_CONCAT(ri.quantite SEPARATOR ', ') as quantites
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

    public static function donneRecettesAleatoires() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT r.idRecette, r.nomRecette, r.libelle, cat.categories, ing.ingredients, ing.quantites
            FROM recette r
            
            INNER JOIN
            (SELECT rc.idRecette as rcIdRecette, GROUP_CONCAT(c.nomCategorie SEPARATOR ', ') categories
            FROM recetteCategorie rc
            INNER JOIN categorie c ON c.idCategorie = rc.idCategorie
            GROUP BY rc.idRecette) cat
            
            ON cat.rcIdRecette = r.idRecette
            
            INNER JOIN 
            (SELECT ri.idRecette as riIdRecette, GROUP_CONCAT(i.libelle SEPARATOR ', ') as ingredients, GROUP_CONCAT(ri.quantite SEPARATOR ', ') as quantites
            FROM recetteIngredient ri
            INNER JOIN ingredient i ON ri.idIngredient = i.idIngredient
            GROUP BY ri.idRecette) ing
            
            ON ing.riIdRecette = r.idRecette ORDER BY RAND() LIMIT 3");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
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
    /**
     * Ajoute la la BDD la recette $S_nomRecette
     * @param $S_nomRecette
     * @param $S_libelle
     * @return array|false|string|void
     */
    
    public static function ajouterRecetteBDD($S_nomRecette, $S_libelle)
    {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("
            INSERT INTO recette (nomRecette, libelle) VALUES (?,?)");
            $O_statement->setFetchMode(PDO::FETCH_ASSOC);
            $O_statement->execute(array($S_nomRecette, $S_libelle));
            if ($O_statement->columnCount()){
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function donnerIdRecette($S_nomRecette)
    {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("
            SELECT idRecette as idR FROM recette 
            WHERE nomRecette = ?");
            $O_statement->setFetchMode(PDO::FETCH_ASSOC);
            $O_statement->execute(array($S_nomRecette));
            if ($O_statement->columnCount()){
                return $O_statement->fetch();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function ajouterRecette($S_nomRecette, $S_libelleRecette, $S_lienImage=NULL, $A_idsCategories, $A_idsQuantiteIngredients, $A_nomsQuantiteNouveauxIngredients=array())
    {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            //on prepare la requette pour inserer la recette
            $O_requetteRecette = $O_pdo->prepare("
            INSERT INTO `recette` (`idRecette`, `nomRecette`, `libelle`, `image`) 
            VALUES (NULL, ?, ?, ?);");
            $O_requetteRecette->execute(array($S_nomRecette, $S_libelleRecette, $S_lienImage));

            // On recupere l'Id de la recette inserée
            $O_requetteId = $O_pdo->query("SELECT MAX(idRecette) AS id FROM recette");
            $I_idRecette = $O_requetteId->fetch(PDO::FETCH_OBJ)->id;

            // On prepare toutes les autres requettes
            $O_requetteCategorie = $O_pdo->prepare("INSERT INTO `recetteCategorie` (`idRecette`, `idCategorie`) 
            VALUES (" . $I_idRecette . ", ?)");
            $O_requetteIngredients = $O_pdo->prepare("INSERT INTO `recetteIngredient` (`idRecette`, `idIngredient`, `quantite`) 
            VALUES (" . $I_idRecette . ", ?, ?)");
            $O_requetteNouveauxIngredients = $O_pdo->prepare("INSERT INTO `ingredient` (`idIngredient`, `libelle`) 
            VALUES (NULL, ?)");

            //On ajoute les categories
            foreach ($A_idsCategories as $I_idCategorie){
                $O_requetteCategorie->execute(array($I_idCategorie));
            }

            //On ajoute les ingredients
            foreach ($A_idsQuantiteIngredients as $I_idIngredient => $S_quantiteIngredient){
                $O_requetteIngredients->execute(array($I_idIngredient,$S_quantiteIngredient));
            }

            //On créé les nouveaux ingrédients
            foreach ($A_nomsQuantiteNouveauxIngredients as $S_nomNouveauIngredient => $S_quantiteNouveauIngredient){
                //creation de l'ingredient
                $O_requetteNouveauxIngredients->execute(array($S_nomNouveauIngredient));

                // On recupere l'Id de l'ingredient inseré
                $O_requetteIdIngredient = $O_pdo->query("SELECT MAX(idIngredient) AS id FROM ingredient");
                $I_idIngredient = $O_requetteIdIngredient->fetch(PDO::FETCH_OBJ)->id;

                //On ajoute le nouvel ingredient à la recette
                $O_requetteIngredients->execute(array($I_idIngredient,$S_quantiteNouveauIngredient));
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function ajouterAvis($I_idUtilisateur, $I_idRecette, $I_notation){
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try{
            //On prepare puis execute la requette d'insertion
            $O_requetteAjouterAvis = $O_pdo->prepare("INSERT INTO `avis` (`idUtilisateur`, `idRecette`, `notation`) VALUES (?, ?, ?)");
            $O_requetteAjouterAvis->execute(array($I_idUtilisateur, $I_idRecette, $I_notation));
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public static function moyenneAvisRecette($I_idRecette){
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try{
            //On prepare puis execute la requette d'insertion
            $O_requetteMoyenne = $O_pdo->prepare("SELECT ROUND(AVG(notation),1) AS moyenne FROM `avis` WHERE idRecette = ?;");
            $O_requetteMoyenne->execute(array($I_idRecette));
            $I_moyenne = $O_requetteMoyenne->fetch(PDO::FETCH_OBJ)->moyenne;
            return $I_moyenne;
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public static function donnerIdCategorie($S_nomCategorie)
    {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->prepare("
            SELECT idCategorie as idC FROM categorie 
            WHERE nomCategorie = ?");
            $O_statement->setFetchMode(PDO::FETCH_ASSOC);
            $O_statement->execute(array($S_nomCategorie));
            if ($O_statement->columnCount()){
                return $O_statement->fetch();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}