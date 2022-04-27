<?php
class Security {
    public static function secureHTML($datas) {
        return htmlentities($datas);
    }
    public static function isConnected() {
        // Vrais si l'utilisateur est connécté faux si il ne l'es pas 
        return (!empty($_SESSION['profil']));
    }
}