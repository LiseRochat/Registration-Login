<?php
require_once("./Models/MainManager.php");
class VisitorsManager extends MainManager {
    public function getDatas(){
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}