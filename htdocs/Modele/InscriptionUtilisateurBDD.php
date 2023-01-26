<?php
session_start(); //Démarrage de la session
class InscriptionUtilisateurBDD {
    public static function sinscrire($S_nomUtilisateur, $S_motDePasse, $S_motDePasseVerification, $S_email) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            //On vérifie l'existance du nom dans la BDD
            $O_requete = $O_pdo->query("SELECT idUtilisateur FROM Utilisateur WHERE nom='" . $S_nomUtilisateur . "'");
            $O_requete->setFetchMode(PDO::FETCH_OBJ);
            if ($O_requete->rowCount()) {
                return "L'utilisateur existe déjà";
            }
            try {
                //On vérifie l'existance de l'email
                $O_requete = $O_pdo->query("SELECT idUtilisateur FROM Utilisateur WHERE email='" . $S_email . "'");
                $O_requete->setFetchMode(PDO::FETCH_OBJ);
                if ($O_requete->rowCount()) {
                    return "Email existe déjà";
                }
                //On vérifie la validité de l'email
                $S_email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                if (preg_match($S_email_exp, $S_email)) {
                    if ($S_motDePasse === $S_motDePasseVerification) {
                        //On vérifie que les 2 mots de passe sont les mêmes
                        try {
                            echo "Je vais m'inscrire";
                            //On crée un nouvel utilisateur dans la BDD
                            $S_motDePasseHasher = sha1($S_motDePasse);
                            $S_requete = $O_pdo->query("INSERT INTO Utilisateur(nom,email,motDePasse) VALUES('$S_nomUtilisateur','$S_email','$S_motDePasseHasher')");

                            $O_requete2 = $O_pdo->query("SELECT idUtilisateur, nom  FROM Utilisateur WHERE email='" . $S_email . "' AND motDePasse='" . $S_motDePasseHasher ."'");
                            $O_requete2->setFetchMode(PDO::FETCH_NUM);
                            $O_lignes = $O_requete2->fetch();
                            //Assigne l'email et le nom du résultat de la table à la session correspondante
                            $_SESSION['idPersonneConnectee'] = $O_lignes[0];
                            $_SESSION['nomPersonneConnectee'] = $O_lignes[1];
                            return $_SESSION['nomPersonneConnectee'] . ", vous êtes inscrit et connecté!";
                        } catch (PDOException $e) {
                            return $e->getMessage();
                        }
                    } else {
                        return "Mots de passe différents";
                    }
                }
                else {
                        return "Email non valide";
                    }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
