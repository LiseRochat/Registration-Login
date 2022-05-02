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
        
    }
}