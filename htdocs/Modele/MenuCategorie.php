<?php

class menuCategorie
{

    private $listeCategorie = array();

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
            }

            $this->listeCategorie[$superCategorie->nomCategorie] = $listeSousCategorie;
        }
    }

    public function donneListeCategorie(){
        return $this->listeCategorie;
    }

}