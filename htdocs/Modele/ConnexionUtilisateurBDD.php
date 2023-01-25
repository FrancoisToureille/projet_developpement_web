<?php
class ConnexionUtilisateurBDD {
    public static function seConnecter($S_email, $S_motDePasse, $S_statusName) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            $O_requete = $O_pdo->query("SELECT email FROM " . $S_statusName . " WHERE email='" . $S_email . "' AND motDePasse='" . $S_motDePasse ."'");
            $O_requete->setFetchMode(PDO::FETCH_OBJ);
            if ($O_requete->rowCount()) {
                return "Utilisateur connecté";
            }
            return "Nom d'utilisateur et/ou mot de passe incorrect(s)";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}