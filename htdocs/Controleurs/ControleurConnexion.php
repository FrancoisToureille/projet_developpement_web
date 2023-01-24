<?php

final class ControleurConnexion
{
    public function defautAction() {
        $connexion = new ConnexionUtilisateurBDD();
        Vue::montrer('standard/connexion', array('information' =>  "deefault"));
    }

    /**
     * Actualise la vue du formulaire de connexion en fonction des résultats de la requêtes sql
     * @return void
     */
    public function resultatConnexionAction() {

        $connexion = new ConnexionUtilisateurBDD();

        $emailConnexion = $_POST["email"];
        $mdpConnexion = $_POST["motDePasse"];
        //echo $emailConnexion;
        //echo $mdpConnexion;
        //echo sha1($mdpConnexion);
        Vue::montrer('connexion/resultatConnexion', array('information' =>  $connexion->seConnecter($emailConnexion,$mdpConnexion)));
    }
}