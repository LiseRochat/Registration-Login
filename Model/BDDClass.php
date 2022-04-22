<?php 

class BDD {

    private static $pdo;
    private static $user = "root";
    private static $password = "";

    // Gere la creation a la base de données
    private static function setBDD() {

        self::$pdo = new PDO("mysql:host=localhost;dbname=zsite;charset=utf8", self::$user, self::$password);
        // gerer les erreurs liées a PDO
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Accesible depuis la classe qui étend model
    protected function getBDD() {
        // Si l'attribut est nul je crée une connexion
        if(self::$pdo === null) {
            self::setBDD();
        }
        return self::$pdo;
    }
}