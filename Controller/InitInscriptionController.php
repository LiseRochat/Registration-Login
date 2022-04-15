<?php
// Apelle de nos class
require("../Model/BDDClass.php");
require("../Model/StorageClass.php");
require("../Controller/BDDController.php");

/*************************************** Inscription Utilisateur *************************************** */

if(!empty($_POST)) {
    // On verifie que tous les champs du formulaire sont remplis
    if(!empty($_POST['firstname'] && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']))) {
        // On nettoie les donnés recu avec la methode validationData de notre classe BDD
        $firstname = $bdd->validationData($_POST['firstname']);
        $lastname = $bdd->validationData($_POST['lastname']);
        $email = $bdd->validationData($_POST['email']);
        $password = $bdd->validationData($_POST['password']);
        $bdd->newUser($bddConnection, $fristname, $lastname, $email, $password, 1);
    }
}
