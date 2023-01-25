<?php

final class Ingredient {
    public static function donneTousLesIngredients() {
        $O_pdo = ConnexionBDD::getInstance()->getPdo();
        try {
            $O_statement = $O_pdo->query("SELECT idIngredient, libelle FROM ingredient");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return $O_statement->fetchAll();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}