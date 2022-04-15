<?php
// Pour pouvoir utiliser la variable globale de php $_SESSION
session_start();

// Apelle de nos class
require("../Model/BDDClass.php");
require("../Model/StorageClass.php");
require("../Controller/BDDController.php");

/*************************************** Inscription Utilisateur *************************************** */
$bdd->newUser($bddConnection,
                $_POST['firstnameIns'],
                $_POST['lastnameIns'],
                $_POST['emailIns'],
                $_POST['passwordIns'],
                '1'
            );

/*************************************** Connexion Utilisateur *************************************** */
// On recupère les données du formulaire de connexion avec la methode POST et on fait apelle a la méthode login de notre class BDD
$user = $bdd->login($bddConnection, $_POST['password'], $_POST['email']);

/*************************************** Sauveagrde S_SESSION*************************************** */
// On instancie un nouvel objet Storage
$sessionUserSignIng = new Storage();
// On sauvegarde ses données dans la variable globale $_SESSIN a l'aide de la methode de notre classe on récupère un tableau de donnée
$sessionUserSignIng->storeUSerData($user);
// On affiche ses données soit toutes soit une valeur en particulier
var_dump($sessionUserSignIng->getUserData()['firstname']);