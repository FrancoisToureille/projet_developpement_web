<?php
class InscriptionUtilisateurBDD {
    public function sinscrire($S_nomUtilisateur, $S_motDePasse, $S_email) {
        $O_pdo = ConnexionBDD::donnerPdo();
        try {
            //On vérifie l'existance du nom dans la BDD
            $O_statement = $O_pdo->query("SELECT idUser FROM user WHERE name='" . $S_nomUtilisateur . "'");
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            if ($O_statement->columnCount()) {
                return "L'utilisateur existe déjà";
            }
            try {
                //On vérifie l'existance de l'email
                $O_statement = $O_pdo->query("SELECT idUser FROM user WHERE email='" . $S_email . "'");
                $O_statement->setFetchMode(PDO::FETCH_OBJ);
                if ($O_statement->columnCount()) {
                    return "Email existe déjà";
                }
                //On vérifie la validité de l'email
                $S_email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                if (preg_match($S_email_exp, $S_email)) {
                    try {
                        //On crée un nouvel utilisateur dans la BDD
                        $O_statement = $O_pdo->prepare("INSERT INTO user(nom,email,motDePasse) VALUES('" . $S_nomUtilisateur . "','" . $S_email . "','" . $S_motDePasse . "'");
                        $O_statement->execute();
                    }
                    catch (PDOException $e) {
                        return $e->getMessage();
                    }
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
