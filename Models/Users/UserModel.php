<?php
require_once("./Models/MainManager.php");

class UserManager extends MainManager {

    private function getPasswordUser($email) {
        $req ="SELECT password FROM user WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['password'];
    }

    public function isValide($email, $password) {
        $passwordDB = $this->getPasswordUser($email);
        return password_verify($password, $passwordDB);
    }

    public function isAccountValid($email) {
        $req ="SELECT isValid FROM user WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        // Si le compte est validé on retourne vrais sinon faux 
        return ((int)$resultat['isValid'] === 1) ? true : false;
    }
}