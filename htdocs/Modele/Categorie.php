<?php

class Categorie
{

    private $listeCategorie = array();
    private $listeSousCategorie = array();

    public function __construct(){
        $this->chargerCategorie();
    }

    private function chargerCategorie(){
        $connexionBD = ConnexionBDD::getInstance();

        $requetteRecupererSuperCategorie = "SELECT idCategorie, nomCategorie FROM categorie WHERE idPere IS NULL";

        $O_requette = $connexionBD->query($requetteRecupererSuperCategorie);
        $O_requette->setFetchMode(PDO::FETCH_OBJ);

        $resultatSuperCategorie = $O_requette->fetchAll();

        foreach ($resultatSuperCategorie as $superCategorie){
            $requetteRecupererSousCategorie = "SELECT idCategorie, nomCategorie FROM categorie WHERE idPere = $superCategorie->idCategorie";
            $O_requetteSousCategorie = $connexionBD->query($requetteRecupererSousCategorie);
            $listeSousCategorie = array();

            while ($categorie = $O_requetteSousCategorie->fetch(PDO::FETCH_OBJ)){
                $listeSousCategorie[] = $categorie;
                $this->listeSousCategorie[] =$categorie;
            }

            $this->listeCategorie[$superCategorie->nomCategorie] = $listeSousCategorie;
        }
    }

    public function donneListeCategorie(){
        return $this->listeCategorie;
    }

    public function donneListeSousCategorie(){
        return $this->listeSousCategorie;
    }

    public function donneListeRecetteCategorie($categories){
        $numargs = count(!empty($categories) ? $categories : array()); // nombre d'arguments

        if ($numargs < 1){
            return Recette::donneToutesLesRecettesNomId(); //renvoie la requette avec toutes les recettes si il n'y a pas de valeurs de recherche
        }
        $connexionBD = ConnexionBDD::getInstance(); //on appelle le pdo

        // On ecris la requette avec les paramettres de la fonction
        $S_recupererRecetteSQL = "SELECT idRecette, nomRecette FROM `recette` WHERE idRecette IN (SELECT DISTINCT idRecette FROM `recetteCategorie` WHERE idCategorie IN (" . implode(',',$categories) . ") GROUP BY idRecette HAVING COUNT(*) >= " . $numargs . ");";

        $O_requetteRecette = $connexionBD->query($S_recupererRecetteSQL); // on execute la requette

        $A_recetteCategorie = $O_requetteRecette->fetchAll(PDO::FETCH_OBJ);

        return $A_recetteCategorie;
    }
}