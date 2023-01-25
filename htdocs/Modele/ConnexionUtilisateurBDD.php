<?php
//session_start();
class ConnexionUtilisateurBDD {
    public static function seConnecter($S_email, $S_motDePasse, $S_statusName, $S_nomId) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            $O_requete = $O_pdo->query("SELECT $S_nomId  FROM $S_statusName WHERE email='" . $S_email . "' AND motDePasse='" . $S_motDePasse ."'");
            $O_requete->setFetchMode(PDO::FETCH_OBJ);
            if ($O_requete->rowCount()) {
                if (isset($_SESSION['idUtilisateur'])) {
                    echo print_r($_SESSION['idUtilisateur'], true);
                    return "Utilisateur déjà connecté";
                    exit();
                }
                $_SESSION['idUtilisateur'] = $O_requete->fetch();
                echo print_r($_SESSION['idUtilisateur'], true);
                return "Utilisateur connecté";
                exit();
            }
            return "Nom d'utilisateur et/ou mot de passe incorrect(s)";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}