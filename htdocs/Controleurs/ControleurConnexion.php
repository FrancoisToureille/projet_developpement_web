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
        if (isset($_POST["admin"])) {
            $S_statusName = "admin";
            $S_status = "Utilisateur";
            $S_nomId = "idAdmin";
        }
        if (isset($_POST["Utilisateur"])) {
            $S_statusName = "Utilisateur";
            $S_status = "admin";
            $S_nomId = "idUtilisateur";
        }
        $emailConnexion = $_POST["email"];
        $mdpConnexion = $_POST["motDePasse"];

        Vue::montrer('connexion/resultatConnexion', array('statusBouton' => $S_status, 'statusBoutonName' => $S_statusName, 'information' =>  $connexion->seConnecter($emailConnexion,$mdpConnexion, $S_statusName, $S_nomId)));
    }
}