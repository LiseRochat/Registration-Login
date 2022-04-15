<?php
// Pour pouvoir utiliser la variable globale de php $_SESSION
session_start();

// Apelle de nos class
require("Model/BDDClass.php");
require("Model/StorageClass.php");

/*************************************** Connexion BDD *************************************** */
// On crée une nouvelle instance de BDD
$bdd = new BDD();
// On utilise la methode connection de notre class BDD pour pouvoir se connecter
$bddConnection = $bdd->connection();

/*************************************** Inscription Utilisateur *************************************** */
//$bdd->newUser($bddConnection,'lise','rochat','liserochat@live.fr','azerty','1');

/*************************************** Connexion Utilisateur *************************************** */
// On recupère les données du formulaire de connexion aec la methode POST et on fait apelle a la méthode login denotre class BDD
$user = $bdd->login($bddConnection, $_POST['password'], $_POST['email']);

/*************************************** Sauveagrde S_SESSION*************************************** */
// On instancie un nouvel objet Storage
$sessionUserSignIng = new Storage();
// On sauvegarde ses données dans la variable globale $_SESSIN a l'aide de la methode de notre classe on récupère un tableau de donnée
$sessionUserSignIng->storeUSerData($user);
// On affiche ses données soit toutes soit une valeur en particulier
var_dump($sessionUserSignIng->getUserData()['firstname']);