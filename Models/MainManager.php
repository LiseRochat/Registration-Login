<!-- Classe pour effectuer toutes mes requetes SQL dont la connexion à la BDD -->
<?php
require_once("Model.class.php");

abstract class MainManager extends Model{

    public function getDatas(){
        $req = $this->getBdd()->prepare("SELECT * FROM matable");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}