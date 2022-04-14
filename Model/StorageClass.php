<?php

class Storage {

    
    public function storeUserData($user) {
        $_SESSION['user'] = $user; 
    }

    public function getUserData() {
        return $_SESSION['user'];
    }
}