<?php
class InscriptionUtilisateurBDD {
    public static function sinscrire($S_nomUtilisateur, $S_motDePasse, $S_email) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            //On vérifie l'existance du nom dans la BDD
            $O_requete = $O_pdo->query("SELECT idUser FROM user WHERE name='" . $S_nomUtilisateur . "'");
            $O_requete->setFetchMode(PDO::FETCH_OBJ);
            if ($O_requete->columnCount()) {
                return "L'utilisateur existe déjà";
            }
            try {
                //On vérifie l'existance de l'email
                $O_requete = $O_pdo->query("SELECT idUser FROM user WHERE email='" . $S_email . "'");
                $O_requete->setFetchMode(PDO::FETCH_OBJ);
                if ($O_requete->columnCount()) {
                    return "Email existe déjà";
                }
                //On vérifie la validité de l'email
                $S_email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                if (preg_match($S_email_exp, $S_email)) {
                    try {
                        //On crée un nouvel utilisateur dans la BDD
                        $O_requete = $O_pdo->prepare("INSERT INTO user(nom,email,motDePasse) VALUES('" . $S_nomUtilisateur . "','" . $S_email . "','" . $S_motDePasse . "'");
                        $O_requete->execute();
                        return;
                    }
                    catch (PDOException $e) {
                        return $e->getMessage();
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
