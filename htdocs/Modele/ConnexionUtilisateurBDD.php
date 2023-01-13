<?php
class ConnexionUtilisateurBDD {
    public function seConnecter($S_nomUtilisateur, $S_motDePasse) {
        $O_pdo = ConnexionBDD::donnerPdo();
        try {
            $O_statement = $O_pdo->query("SELECT idUser FROM user WHERE name='" . $S_nomUtilisateur . "' AND password='" . $S_motDePasse ."'");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return "Utilisateur connecté";
            }
            return "Nom d'utilisateur et/ou mot de passe incorrect(s)";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}