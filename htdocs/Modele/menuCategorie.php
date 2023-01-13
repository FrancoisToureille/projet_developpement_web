<?php

class menuCategorie
{

    private $listeCategorie = array();

    public function __construct(){
        $this->chargerCategorie();
    }

    private function chargerCategorie(){
        $connecteur = new ConnexionBDD(Constantes::nomUtilisateurBD(), Constantes::motDePAsseBD());

        $requetteRecupererSuperCategorie = "SELECT idCategorie, nomCategorie FROM categorie WHERE idPere IS NULL";

        $connecteur::donnerPdo()->prepare($requetteRecupererSuperCategorie);
        $connecteur::donnerPdo()->execute();
        $connecteur::donnerPdo()->setFetchMode(PDO::FETCH_OBJ);

        $resultatSuperCategorie = $connecteur::donnerPdo()->fetchAll();

        while ($superCategorie = $resultatSuperCategorie->fecth()){
            $requetteRecupererSousCategorie = "SELECT idCategorie, nomCategorie FROM categorie WHERE idPere = $superCategorie->idCategorie";
            $connecteur::donnerPdo()->prepare($requetteRecupererSousCategorie);
            $connecteur::donnerPdo()->execute();
            $listeSousCategorie = array();

            while ($categorie = $connecteur::donnerPdo()->fetch()){
                $listeSousCategorie[] = $categorie;
            }

            $this->listeCategorie[$superCategorie] = $listeSousCategorie;
        }
    }

    public function donneListeCategorie(){
        return $this->listeCategorie;
    }

}