<?php
// Apelle de nos class
require("../Model/BDDClass.php");
require("../Model/StorageClass.php");
require("../Controller/BDDController.php");

/*************************************** Inscription Utilisateur *************************************** */

if(!empty($_POST)) {
    // On verifie que tous les champs du formulaire sont remplis
    if(!empty($_POST['firstname'] && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']))) {
        $bdd->newUser($bddConnection,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['password'],
                '1'
            );
    }
}
