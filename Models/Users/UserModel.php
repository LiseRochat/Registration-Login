<?php
require_once("./Models/MainManager.php");

class UserManager extends MainManager {

    private function getPasswordUser($email) {
        $req ="SELECT password FROM user WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetc(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin['password'];
    }

    public function isValide($email, $password) {
        $passwordDB = $this->getPasswordUser($email);
        return password_verify($password, $passwordDB);
    }
}