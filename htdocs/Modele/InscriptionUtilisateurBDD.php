<?php
class InscriptionUtilisateurBDD {
    public static function sinscrire($S_nomUtilisateur, $S_motDePasse, $S_email) {
        $O_pdo = ConnexionBDD::getInstance();
        try {
            //On vérifie l'existance du nom dans la BDD
            $O_requete = $O_pdo->query("SELECT idUtilisateur FROM Utilisateur WHERE name='" . $S_nomUtilisateur . "'");
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
                    try {
                        //On crée un nouvel utilisateur dans la BDD
                        $motDePasseHasher = sha1($S_motDePasse);
                        $O_requete = $O_pdo->prepare("INSERT INTO Utilisateur(nom,email,motDePasse) VALUES('" . $S_nomUtilisateur . "','" . $S_email . "','" . $motDePasseHasher . "'");
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
