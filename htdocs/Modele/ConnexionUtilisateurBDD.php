<?php
session_start(); //demarre la session
class ConnexionUtilisateurBDD {
    public static function seConnecter($S_email, $S_motDePasse, $S_statusName, $S_nomId) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            $S_motDePasseHasher = sha1($S_motDePasse);
            $O_requete = $O_pdo->query("SELECT $S_nomId, nom  FROM $S_statusName WHERE email='" . $S_email . "' AND motDePasse='" . $S_motDePasseHasher ."'");
            $O_requete->setFetchMode(PDO::FETCH_NUM);
            if ($O_requete->rowCount()) {
                $O_lignes = $O_requete->fetch(); //On récupère le résultat
                //On regarde il y a déjà une connexion établie
                if (!empty($_SESSION['idPersonneConnectee']) && !empty($_SESSION['nomPersonneConnectee'])) {
                    //On regarde si la personne qui se connecte est déjà connectée
                    if ($_SESSION['idPersonneConnectee']==$O_lignes[0] && $_SESSION['nomPersonneConnectee']==$O_lignes[1]) {
                        return $O_lignes[1] . ", vous êtes déjà connecté!";
                    }
                    else {
                        mettreAJourDerniereConnexion($_SESSION['idPersonneConnectee'], $S_statusName, $S_nomId);
                        return $O_lignes[1] . ", vous êtes connecté!";
                    }
                }
                //On enregistre les identifiants de la session
                $_SESSION['idPersonneConnectee'] = $O_lignes[0]; //Assigne l'email du résultat de la table à la session emailPersonneConnectee
                $_SESSION['nomPersonneConnectee'] = $O_lignes[1];//Assigne le nom du résultat de la table à la session nomPersonneConnectee
                return $O_lignes[1] . ", vous êtes connecté!";
            }
            $S_messageUtilisateurDeco = "";
            //On n'enregistre/supprime aucun identifiant de session
            if (!empty($_SESSION['idPersonneConnectee']) && !empty($_SESSION['nomPersonneConnectee'])) {
                self::mettreAJourDerniereConnexion($_SESSION['idPersonneConnectee'], $S_statusName, $S_nomId);
                $S_messageUtilisateurDeco = $_SESSION['nomPersonneConnectee'] . " vous êtes déconnecté!<br/>";
            }
            $_SESSION['idPersonneConnectee'] = null;
            $_SESSION['nomPersonneConnectee'] = null;
            return $S_messageUtilisateurDeco . "Nom d'utilisateur et/ou mot de passe incorrect(s)";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function mettreAJourDerniereConnexion($S_idPersonneConnectee, $S_statusName, $S_nomId) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            $O_requete = $O_pdo->query("UPDATE $S_statusName SET derniereConnexion=CURRENT_DATE() WHERE $S_nomId='" . $S_idPersonneConnectee . "'");
            return;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}