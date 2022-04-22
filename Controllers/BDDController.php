<?php

/*************************************** Connexion BDD *************************************** */
// On crée une nouvelle instance de BDD
$bdd = new BDD();
// On utilise la methode connection de notre class BDD pour pouvoir se connecter
$bddConnection = $bdd->connection();