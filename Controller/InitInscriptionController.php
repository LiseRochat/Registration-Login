<?php
// Apelle de nos class
require("../Model/BDDClass.php");
require("../Model/StorageClass.php");
require("../Controller/BDDController.php");

/*************************************** Inscription Utilisateur *************************************** */
$bdd->newUser($bddConnection,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['password'],
                '1'
            );