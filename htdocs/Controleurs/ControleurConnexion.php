<?php

final class ControleurConnexion
{
    public function defautAction() {
        $connexion = new ConnexionUtilisateurBDD();
    }

    public function resultatConnexionAction() {

        $connexion = new ConnexionUtilisateurBDD();

        $emailConnexion = $_POST["email"];
        $mdpConnexion = $_POST["motDePasse"];
        //echo $emailConnexion;
        //echo $mdpConnexion;
        //echo sha1($mdpConnexion);
        Vue::montrer('standard/connexion', array('information' =>  $connexion->seConnecter($emailConnexion,$mdpConnexion)));
        //echo "<script> goToConnexion() </script>";
    }
}