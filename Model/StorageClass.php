<?php
// Class permettant la sauvegarde des données de l'utilisateur
class Storage {

    // Methode : on sauvegarde l'utilisateur
    public function storeUserData($user) {
        $_SESSION['user'] = $user; 
    }

    // On retourne l'utilisateur
    public function getUserData() {
        return $_SESSION['user'];
    }
}