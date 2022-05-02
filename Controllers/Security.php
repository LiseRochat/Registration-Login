<?php
class Security {
    public const COOKIE_NAME="cookies";

    public static function secureHTML($datas) {
        return htmlentities($datas);
    }
    public static function isConnected() {
        // Vrais si l'utilisateur est connécté faux si il ne l'es pas 
        return (!empty($_SESSION['profil']));
    }

    public static function isUser() {
        return ($_SESSION['profil']['role'] === "user");
    }

    public static  function isAdmin() {
        return ($_SESSION['profil']['role'] === "admin");
    }

    public static function generateCookieConnection() {
        $ticket = session_id().microtime().rand(0,9999999);
        $ticket = hash("sha512",$ticket);
        setcookie(self::COOKIE_NAME,$ticket,time()+(60*20));
        $_SESSION['profil'][self::COOKIE_NAME] = $ticket;
    }

    public static function checkCookieConnection() {
        return $_COOKIE[self::COOKIE_NAME] === $_SESSION['profil'][self::COOKIE_NAME];
    }
}