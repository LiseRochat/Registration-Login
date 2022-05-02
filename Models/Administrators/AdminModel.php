<?php
require_once("./Models/MainManager.php");

class AdminManager extends MainManager {
    
    public function getUsers(){
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function dbModificationRole($email, $role) {
        $req ="UPDATE user set role = :role WHERE email = :email";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $stmt->execute();
        $isModification = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isModification;
    }
}