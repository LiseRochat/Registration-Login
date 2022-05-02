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

    public function  getUserInformation($email) {
        $req ="SELECT * FROM user WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        // Si le compte est validé on retourne vrais sinon faux 
        return  $resultat;
    }

    public function verifEmailAvailable($email) {
        $user = $this->getUserInformation($email);
        return empty($user);
    }

    public function dbCreationAccount($firstname, $lastname, $email, $passwordCrypte, $key, $image) {
        $req = "INSERT INTO user (firstname, lastname, email, password, role, avatar, isValid, keyValidation)
                VALUES (:firstname, :lastname, :email, :password, 'utilisateur', :image, 0, :key )";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindValue(":lastname", $lastname, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":key", $key, PDO::PARAM_INT);
        $stmt->execute();
        // On conserve le resultat de la requete : si les données sont enregistré isAdd = true sinon false
        $isAdd = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isAdd;
    }

    public function bddValidationMailAccount($email, $key) {
        $req ="UPDATE user set isValid = 1 WHERE email = :email and keyValidation = :key";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":key", $key, PDO::PARAM_INT);
        $stmt->execute();
        // On conserve le resultat de la requete : si les données sont enregistré isAdd = true sinon false
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }

    public function bdEditMailUser($email, $emailEdit) {
        $req ="UPDATE user set email = :emailEdit WHERE email = :email";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":emailEdit", $emailEdit, PDO::PARAM_STR);
        $stmt->execute();
        // On conserve le resultat de la requete : si les données sont enregistré isAdd = true sinon false
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }

    public function bdModificationPassword($email,$passwordEdit ) {
        $req ="UPDATE user set password = :passwordEdit WHERE email = :email";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":passwordEdit", $passwordEdit, PDO::PARAM_STR);
        $stmt->execute();
        // On conserve le resultat de la requete : si les données sont enregistré isAdd = true sinon false
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }

    public function dbAddPicture($email,$dbNameAvatar) {
        $req ="UPDATE user set avatar = :dbNameAvatar WHERE email = :email";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":dbNameAvatar", $dbNameAvatar, PDO::PARAM_STR);
        $stmt->execute();
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }
    public function getAvatarUser($email) {
        $req ="SELECT avatar FROM user WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['avatar'];
    }
    public function bdDeleteAccount($email) {
        $req = "DELETE FROM user WHERE email = :email";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }
}