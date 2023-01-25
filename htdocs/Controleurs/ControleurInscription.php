<?php

final class ControleurInscription
{
    public function defautAction() {
        $inscripton = new InscriptionUtilisateurBDD();
        Vue::montrer('standard/inscription', array('information' =>  ""));
    }

    /**
     * Actualise la vue du formulaire d'inscription en fonction des résultats de la requêtes sql
     * @return void
     */
    public function resultatInscriptionAction() {
        $inscription = new InscriptionUtilisateurBDD();
        $S_nom = $_POST["nom"];
        $S_email = $_POST["email"];
        $S_mdp = $_POST["motDePasse"];
        $S_mdpVerif = $_POST["motDePasseVerification"];
        Vue::montrer('inscription/resultatInscription', array('information' =>  $inscription->sinscrire($S_nom, $S_mdp, $S_mdpVerif,$S_email)));
    }
}